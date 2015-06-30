<?php
@session_start();

/**
 * Conexion con wsdl servidor
 */
function getClient() {
    //$wsdl="http://www.knowfirst.me/server/index.php?wsdl";  // SOAP Server
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

    //$response = $client->__call('getbooks',array("data"));  //Send two inputs strings. {1} DECODED CONTENT {2} FILENAME
    
    echo "hola";
    //print($response);
}