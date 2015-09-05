<!DOCTYPE html>
<html>
    <head>
    <?php 
    //include_once '../View/headurl.php'; 
    ?>
    <!--<link rel="stylesheet" href="../css/yolandalee.css"/> Asi si q encuentra el fichero-->
    <meta name="viewport" content="width=device-widht, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="../bs/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/yolandalee.css"/>
    <script type="text/javascript" src="../js/yolandalee.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <link rel="stylesheet" href="../css/jquery-ui.css"/>
    <link rel="stylesheet" href="../css/jquery-ui.theme.css">
    </head>
<body>
    <header>  
        <nav class="navbar navbar-default navbar-fixed-top navbar transparent">
            <div class="container headersize ">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse  margintopnav navbarcolors" id="navbar-1">
                    <form action="./Search" method="POST" class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="search"/>
                        </div>
                        <select class="form-group" name="filter">
                            <option value="todo">Todo</option>
                            <option value="autor">Autor</option>
                            <option value="titulo">Título</option>
                        </select>
                        <input type="submit" class="form-control btn-success" value="search" id="updateBtn" />
                    </form>
                    <div class="visible-xs">
                        <?php
                        if(isset($_SESSION['temas'])){
                          foreach ($_SESSION['temas'] as $t) {

                            echo '<a href="'.$t->name.'" style="font-size:'.rand(10, 18).'px;color:rgb('.rand(100, 250).','.rand(50, 180).','.rand(1, 150).');"> '.$t->name.'  </a>';

                            }  
                        }  
                    ?>
                    </div>
                    <div >
                        <h3>La Mar de Libros</h3> 
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <br><br>   
             
            <div class="col-sm-2 col-md-2 hidden-xs borderright"> 
                <a href=".">Clasificacion A-E</a><br><br>
                <a href=".">Clasificacion E-A</a><br><br>
                <a href="./Clasificacion/A">A</a> , 
                <a href="./Clasificacion/B">B</a> , 
                <a href="./Clasificacion/C">C</a> , 
                <a href="./Clasificacion/D">D</a> , 
                <a href="./Clasificacion/E">E</a> ,
                <a href="./Clasificacion/E">estas en new index</a><br><br><br><br>
     
                <div class="flas">Temas</div><br>
                <?php
                for($x=0; $x<2;$x++){
                    if(isset($_SESSION['temas'])){
                        shuffle($_SESSION['temas']);
                        foreach ($_SESSION['temas'] as $t) {

                        echo '<a href="'.$t->name.'" style="font-size:'.rand(12, 24).'px;color:rgb('.rand(100, 250).','.rand(50, 180).','.rand(1, 150).');"> '.$t->name.'  </a>';

                        }  
                    }  
                }
                    ?>
                
                <br><br><div>Autores</div><br>
                <?php
                for($x=0; $x<1;$x++){
                    if(isset($_SESSION['autores'])){
                        shuffle($_SESSION['autores']);
                        foreach ($_SESSION['autores'] as $a) {

                        echo '<a href="www.lamardelibros.cat/Autors/'.$a->name.'" style="font-size:'.rand(12, 24).'px;color:rgb('.rand(100, 250).','.rand(50, 180).','.rand(1, 150).');"> '.$a->name.'  </a>';

                        }  
                    }
                }
                    ?>
                
                <br><br><div><b>Libros</b></div><br>
                <?php
                for($x=0; $x<1;$x++){
                    if(isset($_SESSION['titulos'])){
                        shuffle($_SESSION['titulos']);
                        foreach ($_SESSION['titulos'] as $t) {

                        echo '<a href="www.lamardelibros.cat/Titulos/'.$t->name.'" style="font-size:'.rand(12, 24).'px;color:rgb('.rand(100, 250).','.rand(50, 180).','.rand(1, 150).');"> '.$t->name.'  </a>';

                        }
                    }   
                }
                    ?>
                
            </div>
            <div>
                <div class="container"><?php
                    if(isset($_SESSION['libros'])){

                        if(isset($_SESSION['not_found']) AND !$_SESSION['not_found']==''){
                            echo '<div class="col-xs-12 col-sm-9 col-md-9 librosFound">';
                            echo '<h3>'.$_SESSION['not_found'].'</h3>';
                            echo '<br></div>';
                        }
                        else{
                            echo '<div class="col-xs-12 col-sm-9 col-md-9 librosFound">';
                            echo '<h3>Hay '.count($_SESSION['libros']).' libros</h3>';
                            echo '<br></div>';
                        }

                        if(!isset($_SESSION['num_pag'])){
                            $_SESSION['num_pag']=6;
                        }

                        $_SESSION['contar_libs_pag'] = 0;

                        foreach ($_SESSION['libros'] as $b) {

                            if($_SESSION['contar_libs_pag'] >= $_SESSION['num_pag'] - 6 AND $_SESSION['contar_libs_pag'] < $_SESSION['num_pag']){
                                echo '<div class="col-xs-12 col-sm- col-md-4 bordearLibro col-md-push-1 col-sm-push-1" >';
                                echo '<br><div class="links">Titulo : '. $b->tittle .'<br>';
                                echo 'Autor : '. $b->autor .'<br>';
                                echo 'Valoracion : '. $b->valoration .'<br>';
                                echo 'tema : '. $b->tema .'</div><br>';
                                echo '<div style="background-image: url(img/'.$b->picture.'.PNG);" class="fondoLibro" ></div>';
                                echo '<strong><div class="text-justify textoLibro">'.$b->coment.'</div></strong>';
                                echo '</div>';
                            }
                            else{
                                if($_SESSION['num_pag'] - 6 > 0) $_SESSION['disableless'] = false;
                                else $_SESSION['disableless'] = true;

                                if($_SESSION['num_pag']+6 < $_SESSION['count_libros'] +6) $_SESSION['disablemore'] = false;
                                else $_SESSION['disablemore'] = true;
                            }
                              $_SESSION['contar_libs_pag']++;

                        }
                        $_SESSION['not_found']='';
                    }
                    $_SESSION['not_found']='';
                    ?>
                    </div>
            </div>
            
        </div>
        
        <?php
                if($_SESSION['disableless']){
                ?>
            
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="./Less" class="btn btn-lg disabled"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="./More" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            
        </div>
        <?php
                }
                
        if($_SESSION['disablemore']){
                ?>
            
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="./Less" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="./More" class="btn btn-lg disabled"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            
        </div>
        <?php
                }
        if(!$_SESSION['disableless'] AND !$_SESSION['disablemore']){
            
                ?>
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="./Less" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="./More" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            
        </div>
        <?php
                }
        
        ?>
    </div>
    <br>
    
    <script type="text/javascript" src="bs/js/bootstrap.min.js"></script> 
</body>
</html>




