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
        
        if (isset($_GET['url'])) {
 
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            print_r($url);

            $file = 'Controlle/' . $url[0] . '.php';

            if (file_exists($file)) {
                echo 'fichero';

            }
        } else {
            $file = 'Controller/View.php';
            if (file_exists($file)) {
                require_once $file;
                $controller = new View();
                $controller->goIndex();
            } else
                echo "View.php doesn't exists";
            echo 'aki';
        }
    }

}
