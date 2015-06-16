<?php

require_once('lib/nusoap/nusoap.php'); // nusoap library
require_once('Functions/webservice_functions.php');

// SOAP Server creation
$server = new soap_server();

// WSDL Configuration
$server->configureWSDL('KnowFirst WS', 'urn:knowfirstws');

// Register login method
$server->register('login', // method
        array('email' => 'xsd:string', 'password' => 'xsd:string'), // input parameters
        array('result' => 'xsd:int'), // output parameters
        'urn:knowfirstws', // namespace
        'urn:knowfirstws#login', // soapaction
        'rpc', // style
        'encoded', // use
        'Method that check if credentials are correct'
        . ' and user is confirmed.<br>'
        . 'Return:<br>'
        . '0 -> credentials are not correct<br>'
        . '1 -> user not confirmed<br>'
        . '2 -> correct login' // documentation
);

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
