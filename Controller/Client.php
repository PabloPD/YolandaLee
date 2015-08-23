<?php
@session_start();

/**
 * Conexion con wsdl servidor
 */
function getClient() {
    //$wsdl="http://www.knowfirst.me/server/index.php?wsdl";  // SOAP Server
    //$wsdl="http://localhost:8080/YolandaLee/server/index.php?wsdl";  // SOAP Server
    $wsdl="http://localhost/YolandaLee/server/index.php?wsdl";  // SOAP Server
    $client=new soapclient($wsdl) or die("Error");
    return $client;
}

/**
 * Establecemos el metodo que vamos a utilizar
 */
if(isset($_POST["method"])) {
//    require_once "../Model/Log.php";
    switch ($_POST["method"]) {
        case "getallbook":
            getallbook();
            break;
        
    }
}
else {
    require_once "Model/Log.php";
    $log = new Log();
    $log->message("No exist post[method] ");
}

function getallbook() {
    $client = getClient();
    $response = $client->__call('getbooks',array("data")); 
    return $response;
}

function getalltemas() {
    $client = getClient();
    $response = $client->__call('gettemas',array("data")); 
    return $response;
}

function getallautor($nameAutor) {
    $client = getClient();
    $response = $client->__call('getautor',array($nameAutor)); 
    return $response;
}

function getalltitulo($nameTitle) {
    $client = getClient();
    $response = $client->__call('gettitulos',array($nameTitle)); 
    return $response;
}

function getallsearch($option) {
    $client = getClient();
    $response = $client->__call('getall',array($option)); 
    return $response;
}

function getbooksTheme($themes) {
    $client = getClient();
    $response = $client->__call('getbooksTemas',array($themes)); 
    return $response;
}

function getallclasificacion() {
    $client = getClient();
    $response = $client->__call('gettemas',array("data")); 
    return $response;
}