<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author Pablo
 */
class View {
    //put your code here
    public function __construct() {
        
    }
    
    function goIndex(){
        include_once 'Controller/Client.php';
        $file = "View/index.php";

        $libros = getallbook();
        
        if(file_exists($file)){
            include_once $file;
        }
    }
}
