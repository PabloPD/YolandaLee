<?php

require_once('Model/ModelPDO.php');   // ModelPDO class to access to DB

function verifyUser($email, $password) {
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    // Get user profile
    $sth = $dbo->prepare("SELECT user_role FROM kf_user WHERE user_email = ? AND user_password = ?");
    // Set email and password parameters
    $sth->execute(array($email, $password));
    $return = $sth->fetchAll();

    if (count($return) > 0)
        if ($return[0]['user_role'] == 2)
            return true;
    return false;
}

function getUserPK($email) {
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    // Get user profile
    $sth = $dbo->prepare("SELECT user_PK FROM kf_user WHERE user_email = ?");
    // Set email and password parameters
    $sth->execute(array($email));
    $return = $sth->fetchAll();

    if (count($return) > 0)
        return $return[0]['user_PK'];
    return 0;
}

function getProfilePK($email) {
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    // Get user profile
    $sth = $dbo->prepare("SELECT upr_PK FROM kf_userprofile, kf_user WHERE upr_FK_user_PK = user_PK AND user_email = ?");
    // Set email and password parameters
    $sth->execute(array($email));
    $return = $sth->fetchAll();

    if (count($return) > 0)
        return $return[0]['upr_PK'];
    return 0;
}

function getPicturePK($filename) {
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    // Get user profile
    $sth = $dbo->prepare("SELECT upl_PK FROM kf_uploads WHERE upl_filename = ?");
    // Set email and password parameters
    $sth->execute(array($filename));
    $return = $sth->fetchAll();

    if (count($return) > 0)
        return $return[0]['upl_PK'];
    return 0;
}

function insertFeatures($features) {
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    foreach ($features as $feature) {
        // Get feature
        $sth = $dbo->prepare("SELECT * FROM kf_userfeature WHERE uft_name = LOWER(?)");
        // Set parameters
        $sth->execute(array($feature));
        $return = $sth->fetchAll();
        if (count($return) < 1) {
            // Insert feature
            $sth = $dbo->prepare("INSERT INTO kf_userfeature VALUES (null, LOWER(?))");
            // Set parameters
            $sth->execute(array($feature));
        }
    }
}

function getTags($email) {
    $tags = array();
    $dbo = (new ModelPDO())->getDBO();  // Database Object
    // Get features
    $sth = $dbo->prepare("SELECT uft_name FROM kf_userfeature LEFT JOIN kf_userprofilefeature ON upf_FK_uft_PK = uft_PK LEFT JOIN kf_userprofile ON upf_FK_upr_PK = upr_PK LEFT JOIN kf_user ON upr_FK_user_PK = user_PK WHERE user_email = ?");
    // Set parameters
    $sth->execute(array($email));
    $return = $sth->fetchAll();
    foreach ($return as $tag) {
        array_push($tags, $tag['uft_name']);
    }
    return $tags;
}
