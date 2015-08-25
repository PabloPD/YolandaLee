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
    private $numLibrosPagina = 6;
    
    public function __construct() {
        
    }
    
    function goIndex(){
        include_once 'Controller/Client.php';
        $file = "View/newindex.php";

        $_SESSION['libros'] = getallbook();
        $temas = getalltemas();
        $_SESSION['count_libros']=  count($_SESSION['libros']);
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function goIndexUrl(){
        include_once 'Controller/Client.php';
        $file = "View/temas.php";

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
            return;
        }
        else{
            $_SESSION['not_found']='';
        }
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    /*
     * Creado en 2puesto
     */
    function Titulo($nameTitulo){
        include_once 'Controller/Client.php';
        $file = "View/index.php";

        $_SESSION['libros'] = getalltitulo($nameTitulo);
        $temas = getalltemas();
        $_SESSION['count_libros'] = count($_SESSION['libros']);
        
        if($_SESSION['count_libros']==0){
            $_SESSION['not_found']='No hay resultados con esa busqueda';
            $this->goIndex ();
            return;
        }
        else{
            $_SESSION['not_found']='';
        }
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function Todo($option){
        include_once 'Controller/Client.php';
        $file = "View/index.php";

        $_SESSION['libros'] = getallsearch($option);
        $temas = getalltemas();
        $_SESSION['count_libros'] = count($_SESSION['libros']);
        
        if($_SESSION['count_libros']==0){
            $_SESSION['not_found']='No hay resultados con esa busqueda';
            $this->goIndex ();
            return;
        }
        else{
            $_SESSION['not_found']='';
        }
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    
    function Tema($theme){
        include_once 'Controller/Client.php';
        $file = "View/temas.php";
        $_SESSION['libros'] = getbooksTheme($theme);
        $temas = getalltemas();
        $_SESSION['count_libros'] = count($_SESSION['libros']);
        if($_SESSION['count_libros']==0){
            $_SESSION['not_found']='No hay resultados con esa busqueda';
            $this->goIndexUrl();
            return;
        }
        else{
            $_SESSION['not_found']='';
        }
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    
    function Clasificacion($option){
        include_once 'Controller/Client.php';
        $file = "View/temas.php";
        $_SESSION['libros'] = getbooksTheme($theme);
        $temas = getalltemas();
        $_SESSION['count_libros'] = count($_SESSION['libros']);
        if($_SESSION['count_libros']==0){
            $_SESSION['not_found']='No hay resultados con esa busqueda';
            $this->goIndexUrl();
            return;
        }
        else{
            $_SESSION['not_found']='';
        }
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function More(){
        $file = "View/newindex.php";
        include_once 'Controller/Client.php';
        $temas = getalltemas();
        if($_SESSION['num_pag'] + $this->numLibrosPagina < $_SESSION['count_libros'] + $this->numLibrosPagina) $_SESSION['num_pag'] = $_SESSION['num_pag'] + $this->numLibrosPagina;
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
    function Less(){
        $file = "View/newindex.php";
        include_once 'Controller/Client.php';
        $temas = getalltemas();
        if($_SESSION['num_pag'] - $this->numLibrosPagina <= 0) $_SESSION['num_pag'] = $this->numLibrosPagina;
        else $_SESSION['num_pag'] = $_SESSION['num_pag'] - $this->numLibrosPagina;
        
        if(file_exists($file)){
            include_once $file;
        }
    }
    
}
