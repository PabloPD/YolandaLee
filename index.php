<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        session_start();
        $filename = 'Controller/Bootstrap.php';
        if (file_exists($filename)) {
            require_once $filename;
            $controller = new Bootstrap();
        } else
        echo '<h1>Página en construcción</h1>';
        ?>
    </body>
</html>
