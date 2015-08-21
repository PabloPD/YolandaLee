<?php

require_once('Model/ModelPDO.php');   // ModelPDO class to access to DB
require_once('Functions/global_functions.php');
require_once ('../Model/Log.php');

/**
 * 
 * @param type $data
 * @return array , values of books
 */
function getbooks($data) {
    
    //$log = new Log();
    //$log->message("Accede a getbooks");
    $dbo = (new ModelPDO())->getDBO();  // Database Object

    $sth = $dbo->query("select b_valoracion, b_comentario, b_picture,te_name, ti_name, au_name from book left join tema on b_te_fk=te_id left join titulo on b_ti_fk=ti_id left join autor on ti_au_fk_autor=au_id");
    
    // Set parameters
    $result = $sth->fetchAll();

    $array = array();
    
    foreach ($result as $value) {
        
        $book = array(
            "valoration" => $value['b_valoracion'],
            "coment" => $value['b_comentario'],
            "picture" => $value['b_picture'],
            "tittle" => $value['ti_name'],
            "autor" => $value['au_name'],
            "tema" => $value['te_name'],
        );
        
        array_push($array, $book);
    }
    return $array;
}

function getautor($nameAutor) {
    
    //$log = new Log();
    //$log->message("Accede a getbooks");
    $dbo = (new ModelPDO())->getDBO();  // Database Object

    $sth = $dbo->query("select b_valoracion, b_comentario, b_picture,te_name, ti_name, au_name from book left join tema on b_te_fk=te_id left join titulo on b_ti_fk=ti_id left join autor on ti_au_fk_autor=au_id where au_name LIKE '%$nameAutor%'");
    
    // Set parameters
    $result = $sth->fetchAll();

    $array = array();
    
    foreach ($result as $value) {
        
        $book = array(
            "valoration" => $value['b_valoracion'],
            "coment" => $value['b_comentario'],
            "picture" => $value['b_picture'],
            "tittle" => $value['ti_name'],
            "autor" => $value['au_name'],
            "tema" => $value['te_name'],
        );
        
        array_push($array, $book);
    }
    return $array;
}


function gettemas($gettema) {
    
    //$log = new Log();
    //$log->message("Accede a getbooks");
    $dbo = (new ModelPDO())->getDBO();  // Database Object

    $sth = $dbo->query("select te_name from tema order by te_name");
    
    // Set parameters
    $result = $sth->fetchAll();

    $array = array();
    
    foreach ($result as $value) {
        
        $book = array(
            "name" => $value['te_name'],
        );
        
        array_push($array, $book);
    }
    return $array;
}

function gettitulos($gettittle) {
    
    //$log = new Log();
    //$log->message("Accede a getbooks");
    $dbo = (new ModelPDO())->getDBO();  // Database Object

    $sth = $dbo->query("select b_valoracion, b_comentario, b_picture,te_name, ti_name, au_name from book left join tema on b_te_fk=te_id left join titulo on b_ti_fk=ti_id where ti_name LIKE '%$gettittle%' left join autor on ti_au_fk_autor=au_id");
    
    // Set parameters
    $result = $sth->fetchAll();

    $array = array();
    
    foreach ($result as $value) {
        
        $book = array(
            "valoration" => $value['b_valoracion'],
            "coment" => $value['b_comentario'],
            "picture" => $value['b_picture'],
            "tittle" => $value['ti_name'],
            "autor" => $value['au_name'],
            "tema" => $value['te_name'],
        );
        
        array_push($array, $book);
    }
    return $array;
}