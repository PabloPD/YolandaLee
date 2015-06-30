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
function getbooks($email, $password) {
    $dbo = (new ModelPDO())->getDBO();  // Database Object

    $sth = $dbo->prepare("select b_valoracion, b_comentario, b_picture, ti_name, au_name from book left join titulo on b_ti_fk=ti_id left join autor on ti_au_fk_autor=au_id");
    // Set parameters
    //$sth->execute(array($email, $password));
    $result = $sth->fetchAll();

    if (count($result) > 0)
        return $result[0]['user_role'];

    return 0;
}
