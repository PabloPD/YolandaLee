<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bootstrap
 *
 * @author Pablo
 */
class Bootstrap {

    //put your code here
    public function __construct() {
        
        $_SESSION['busqueda']=false;
        
        if (isset($_GET['url'])) {
 
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            $file = 'Controller/View.php';
            
            if (file_exists($file)) {
                
                require_once $file;
                $controller = new View();
                
                if(isset($url[2])){
                    echo '<h1>No intentes timar hacker</h1>';
                }
                elseif (isset($url[1])) {
                    if($url[0]=="Server") include_once './Server/index.php';
                    else{
                        $_SESSION['busqueda']=TRUE;
                        $controller->{$url[0]}($url[1]);
                    }
                }
                elseif (isset($url[0])) {
                    if($url[0] == 'Search'){
                        $controller->{$_POST['filter']}($_POST['search']);
                    }
                    else{
                        $controller->{$url[0]}();
                    }
                    
                }
                else{
                    $_SESSION['busqueda']=false;
                    $controller->goIndex();
                }

            }
        } else {
            $file = 'Controller/View.php';
            if (file_exists($file)) {
                $_SESSION['busqueda'] = FALSE;
                require_once $file;
                $controller = new View();
                $controller->goIndex();
            } else
                echo "View.php doesn't exists";
        }
    }

}
