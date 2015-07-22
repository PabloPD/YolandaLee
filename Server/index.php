<?php

require_once('lib/nusoap/nusoap.php'); // nusoap library
require_once('Functions/webservice_functions.php');

// SOAP Server creation
$server = new soap_server();

// WSDL Configuration
$server->configureWSDL('yoliLee', 'urn:yoliLeews');

// Register login method
$server->register('getbooks', // method
        array('data' => 'xsd:string'), // input parameters
        array('result' => 'xsd:Array'), // output parameters
        'urn:yoliLeews', // namespace
        'urn:yoliLeews#getbooks', // soapaction
        'rpc', // style
        'encoded', // use
        'Method return books'// documentation
);

$server->register('gettemas', // method
        array('data' => 'xsd:string'), // input parameters
        array('result' => 'xsd:Array'), // output parameters
        'urn:yoliLeews', // namespace
        'urn:yoliLeews#gettemas', // soapaction
        'rpc', // style
        'encoded', // use
        'Method return temas'// documentation
);

$server->register('getautor', // method
        array('nameAutor' => 'xsd:string'), // input parameters
        array('result' => 'xsd:Array'), // output parameters
        'urn:yoliLeews', // namespace
        'urn:yoliLeews#getautor', // soapaction
        'rpc', // style
        'encoded', // use
        'Method return author`s books'// documentation
);

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
