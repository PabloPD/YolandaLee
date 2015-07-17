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
        $temas = getalltemas();
        $_SESSION['count_libros']=  count($libros);
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function goSearch(){
        include_once 'Controller/Client.php';
        $file = "View/index.php";
        echo $_POST['search'];
        echo $_POST['filter'];
        $libros = getallbook();
        $temas = getalltemas();
        $_SESSION['count_libros']=  count($libros);
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function getTemas(){
        
    }
}
