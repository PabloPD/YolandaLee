<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Log
 *
 * @author Pablo
 */
class Log {
    //put your code here
    public function __construct() {
        
    }
    
    function message($message){
        
        //date_default_timezone_set('UTC');
        $date= date('l jS \of F Y h:i:s A');

        $file = 'php_error.log';
        if(file_exists($file)){
            error_log($date." : ".$message."\r\n", 3, $file);
        }
        else    echo 'no existe fichero php_errors.log';
    }
    
    function fileNotFound($message){
        
        //date_default_timezone_set('UTC');
        $date= date('l jS \of F Y h:i:s A');

        $file = 'php_error.log';
        if(file_exists($file)){
            error_log($date." : No exist file : ".$message."\r\n", 3, $file);
        }
        else    echo 'no existe fichero php_errors.log';
    }
}
