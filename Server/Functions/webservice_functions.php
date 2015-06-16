<?php

require_once('Model/ModelPDO.php');   // ModelPDO class to access to DB
require_once('Functions/global_functions.php');

/**
 * Method to confirm login credentials
 * 
 * @param string $email
 * @param string $password
 * return int
 */
function login($email, $password) {
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    // Get role from user if exists
    //$password = '62c8ad0a15d9d1ca38d5';
    $sth = $dbo->prepare("SELECT user_role FROM kf_user WHERE user_email = ? AND user_password = ?");
    // Set parameters
    $sth->execute(array($email, $password));
    $result = $sth->fetchAll();

    if (count($result) > 0)
        return $result[0]['user_role'];

    return 0;
}

/**
 * Method to sign up a new user
 * 
 * @param string $email
 * @param string $password
 * @param string $dob
 * @param string $gender
 * @return int
 */
function signUp($email, $password, $dob, $gender) {
    
    if(getUserPK($email)!=0) return 5;
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    try {
        // Try to insert a new user
        $sth = $dbo->prepare("INSERT INTO kf_user VALUES(null,?,?,STR_TO_DATE(?, '%d/%m/%Y'),2);");
        // Set parameters
        $sth->execute(array($email, $password, $dob));
        // Try to insert a new profile
        $sth = $dbo->prepare("INSERT INTO kf_userprofile VALUES (null, null, ?, null, null, null, null, ?)");
        // Set parameters
        $sth->execute(array($gender, getUserPK($email)));
        return 1;
    } catch (Exception $e) {
        return 0;
    }
}
/**
 * Method to know if an email is free
 * 
 * @param string $email
 * @return int
 */
function emailFree($email) {
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    try {
        // Try to insert a new user
        $sth = $dbo->prepare("SELECT user_email FROM kf_user WHERE user_email = ?");
        // Set parameters
        $sth->execute(array($email));
        $return = $sth->fetchAll();
        if(count($return) == 0)
            return 1;
        return 0;
    } catch (Exception $e) {
        return 0;
    }
}

/**
 * Method to change a user role from 1 to 2
 * 
 * @param string $email
 * @param string $password
 * @return int
 */
function confirmUser($email, $password) {
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    // Get role from user if exists
    $sth = $dbo->prepare("SELECT user_role FROM kf_user WHERE user_email = ? AND user_password = ?");
    // Set parameters
    $sth->execute(array($email, $password));
    $result = $sth->fetchAll();
    if (count($result) > 0)
        if ($result[0]['user_role'] == 1) {
            // Try to update a user role
            $sth = $dbo->prepare("UPDATE kf_user SET user_role = 2 WHERE user_PK = ?");
            // Set parameters
            $sth->execute(array(getUserPK($email)));
            return 1;
        }

    return 0;
}

/**
 * Method that returns an array with profile values
 * 
 * @param type $email
 * @param type $password
 * @return array
 */
function getProfile($email, $password) {
    if (!verifyUser($email, $password))
        return 0;

    $dbo = (new ModelPDO())->getDBO();  // Database Object
    // Get user profile
    $sth = $dbo->prepare("SELECT upr_PK, upr_name, upr_gender, upr_lookfor, upr_location, upr_color, upl_filename FROM kf_user LEFT JOIN kf_userprofile ON upr_FK_user_PK = user_PK LEFT JOIN kf_uploads ON upr_FK_upl_PK = upl_PK WHERE user_email = ?");
    // Set parameters
    $sth->execute(array($email));
    $return = $sth->fetchAll();

    if (count($return) > 0) {
        // Get the profile features
        $sth = $dbo->prepare("SELECT uft_name FROM kf_userprofile, kf_userprofilefeature, kf_userfeature WHERE upr_PK = ? AND upr_PK = upf_FK_upr_PK AND upf_FK_uft_PK = uft_PK");
        // Set parameters
        $sth->execute(array($return[0]['upr_PK']));
        $return2 = $sth->fetchAll();

        // Interate the result to get values non duplicated
        $features = array();
        foreach ($return2 as $value) {
            array_push($features, $value['uft_name']);
        }

        $profile = array(
            "name" => $return[0]['upr_name'],
            "gender" => $return[0]['upr_gender'],
            "lookfor" => $return[0]['upr_lookfor'],
            "location" => $return[0]['upr_location'],
            "color" => $return[0]['upr_color'],
            "filename" => $return[0]['upl_filename'],
            "tags" => $features
        );

        return $profile;
    }

    return 0;
}

/**
 * Method to update a profile
 * 
 * @param string $email
 * @param string $password
 * @param array $profile
 * return int
 */
function updateProfile($email, $password, $return) {
    if (!verifyUser($email, $password))
        return 0;
    
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    //Try to update the profile
    try {
        // Create an array from object
        $profile = array();
        foreach ($return as $key => $value) {
            $profile[$key] = $value;
        }
        
        // Insert image to uploads
        $sth = $dbo->prepare("INSERT INTO kf_uploads VALUES(null, ?, NOW())");
        // Set parameters
        $sth->execute(array($profile['filename']));
        
        // Update user profile
        $sth = $dbo->prepare("UPDATE kf_userprofile SET upr_name = ?, upr_gender = ?, upr_lookfor = ?, upr_location = ?, upr_color = ?, upr_FK_upl_PK = ? WHERE upr_FK_user_PK = ?");
        // Set parameters
        $sth->execute(array($profile['name'], $profile['gender'], $profile['lookfor'], $profile['location'], $profile['color'], getPicturePK($profile['filename']), getUserPK($email)));
        
        // Delete all profile features
        $sth = $dbo->prepare("DELETE FROM kf_userprofilefeature WHERE upf_FK_upr_PK = LOWER(?)");
        // Set parameters
        $sth->execute(array(getProfilePK($email)));
        
        // Insert tags if not exists
        insertFeatures($profile['tags']);
        
        // Create the user-tag relation
        foreach ($profile['tags'] as $tag) {
            // Get tag
            $sth = $dbo->prepare("SELECT uft_PK FROM kf_userfeature WHERE uft_name = LOWER(?)");
            // Set parameters
            $sth->execute(array($tag));
            $return = $sth->fetchAll();
            // Insert user-tag relation
            $sth = $dbo->prepare("INSERT INTO kf_userprofilefeature VALUES (?, ?)");
            // Set parameters
            $sth->execute(array(getProfilePK($email), $return[0]['uft_PK']));
        }
        return 1;
    } catch (Exception $e) {
        return 0;
    }
}

/**
 * Method to update user credentials
 * 
 * @param string $email
 * @param string $password
 * @param array $credentials
 * @return int
 */
function updateCredentials($email, $password, $credentials) {
    if (!verifyUser($email, $password))
        return 0;
    
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    //Try to update the profile
    try {
        // Update user credentials
        $sth = $dbo->prepare("UPDATE kf_user SET user_password = ?, user_dob = STR_TO_DATE(?, '%d/%m/%Y') WHERE user_email = ?");
        // Set parameters
        $sth->execute(array($credentials['password'], $credentials['dob'], $email));
        
        return 1;
    } catch(Exception $e) {
        return 0;
    }
}

function getNearProfiles($email, $password) {
    if (!verifyUser($email, $password))
        return 0;
    
    $profile = getProfile($email, $password);
    
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    //Try to update the profile
    try {
        // Limit profiles to show
        $limit = 5;
        // Get near profiles
        $sth = $dbo->prepare("SELECT user_email, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(user_dob)), '%Y')+0 AS user_dob, upr_name, upr_gender, upl_filename, upr_color FROM kf_user LEFT JOIN kf_userprofile ON upr_FK_user_PK = user_PK LEFT JOIN kf_userprofilepictures ON upp_FK_upr_PK = upr_PK LEFT JOIN kf_uploads ON upp_FK_upl_PK = upl_PK WHERE upr_gender = ? AND upr_location = ? ORDER BY rand() LIMIT $limit");
        // Set parameters
        $sth->execute(array($profile['lookfor'], $profile['location']));
        $return = $sth->fetchAll();
        
        $nearProfiles = array();    // Array will be fill with near profiles
        
        foreach ($return as $claimUser) {
            $nearProfile = array(
                "claimEmail" => $claimUser['user_email'],
                "dob" => $claimUser['user_dob'],
                "name" => $claimUser['upr_name'],
                "gender" => $claimUser['upr_gender'],
                "picture" => $claimUser['upl_filename'],
                "color" => $claimUser['upr_color'],
                "tags" => getTags($claimUser['user_email'])
            );
            array_push($nearProfiles, $nearProfile);
        }
        
        return $nearProfiles;
    } catch(Exception $e) {
        return 0;
    }
}
