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
        
        if (isset($_POST['search']))
            echo $_POST['search'];
        else
            echo 'no existe post';
        
        if (isset($_POST['filter']))
            echo $_POST['filter'];
        else
            echo 'no existe post';

        $libros = getallbook();
        
        if(file_exists($file)){
            include_once $file;
        }
    }
}
