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

        $_SESSION['libros'] = getallbook();
        $temas = getalltemas();
        $_SESSION['count_libros']=  count($_SESSION['libros']);
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function goTitulo(){
        include_once 'Controller/Client.php';
        $file = "View/index.php";
        $_SESSION['libros'] = getallbook();
        $temas = getalltemas();
        $_SESSION['count_libros']=  count($_SESSION['libros']);
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function Autor($nameAutor){
        include_once 'Controller/Client.php';
        $file = "View/index.php";

        $_SESSION['libros'] = getallautor($nameAutor);
        $temas = getalltemas();
        $_SESSION['count_libros'] = count($_SESSION['libros']);
        
        if($_SESSION['count_libros']==0){
            $_SESSION['not_found']='No hay resultados con esa busqueda';
            $this->goIndex ();
        }
        else{
            $_SESSION['not_found']='';
        }
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function goClasificacion(){
        include_once 'Controller/Client.php';
        $file = "View/index.php";
        echo $_POST['search'];
        echo $_POST['filter'];
        $_SESSION['libros'] = getallbook();
        $temas = getalltemas();
        $_SESSION['count_libros']=  count($_SESSION['libros']);
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function More(){
        $file = "View/index.php";

        if($_SESSION['num_pag'] + 10 < $_SESSION['count_libros'] + 10) $_SESSION['num_pag'] = $_SESSION['num_pag'] + 10;
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function Less(){
        $file = "View/index.php";
        if($_SESSION['num_pag'] - 10 <= 0) $_SESSION['num_pag'] = 10;
        else $_SESSION['num_pag'] = $_SESSION['num_pag'] - 10;
        
        if(file_exists($file)){
            include_once $file;
        }
    }
}
