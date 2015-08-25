<!DOCTYPE html>
<html>
    <?php 
    include_once 'View/head.php'; 
    ?>
<link rel="stylesheet" href="css/yolandalee.css"/>
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
                    <div>
                        <?php
                            foreach ($temas as $t) {
                                
                                echo '<a href="./Tema/'.$t->name.'" style="font-size:'.rand(14, 28).'px;color:rgb('.rand(100, 250).','.rand(50, 180).','.rand(1, 150).');"> '.$t->name.'  </a>';
                                
                            }
                            ?>
                    </div>
                    <div>
                        <br>Clasificación categoría <a href="./Clasificacion/az"> A-Z </a> / <a href="./Clasificacion/za"> Z-A </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row bordear">
            <br>    
                <?php
                
                if(isset($_SESSION['libros'])){
                     
                    if(isset($_SESSION['not_found']) AND !$_SESSION['not_found']==''){
                        echo '<div class="col-xs-12 col-sm-12 col-md-12 bordearLibro">';
                        echo '<h3>'.$_SESSION['not_found'].'</h3>';
                        echo '<br></div>';
                    }

                    if(!isset($_SESSION['num_pag'])){
                        $_SESSION['num_pag']=9;
                    }

                    $_SESSION['contar_libs_pag'] = 0;
                    
                    foreach ($_SESSION['libros'] as $b) {
                        echo $b->tittle;
                        if($_SESSION['contar_libs_pag'] >= $_SESSION['num_pag'] - 9 AND $_SESSION['contar_libs_pag'] < $_SESSION['num_pag']){
                            echo '<div class="col-xs-12 col-sm-4 col-md-4 bordearLibro bordear ">';
                            echo '<img src="img/'.$b->picture.'.png" width="285" height="130"><br>';
                            echo '<a href="#" class="links">Titulo : '. $b->tittle .'</a><br>';
                            echo '<a href="#" class="links">Autor : '. $b->autor .'</a><br>';
                            echo '<a href="#" class="links">Valoracion : '. $b->valoration .'</a><br>';
                            echo '<a href="#" class="links">tema : '. $b->tema .'</a><br><br>';
                            echo $b->coment;
                            echo '</div>';
                        }
                        else{
                            if($_SESSION['num_pag'] - 9 > 0) $_SESSION['disableless'] = false;
                            else $_SESSION['disableless'] = true;
                            
                            if($_SESSION['num_pag']+9 < $_SESSION['count_libros'] +10) $_SESSION['disablemore'] = false;
                            else $_SESSION['disablemore'] = true;
                        }
                          $_SESSION['contar_libs_pag']++;

                    }
                    $_SESSION['not_found']='';
                }
                ?>
            
                </div>
        
        <?php
                if($_SESSION['disableless']){
                ?>
            
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="Less" class="btn btn-lg disabled"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="More" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            <br><br><br>
        </div>
        <?php
                }
                
        if($_SESSION['disablemore']){
                ?>
            
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="Less" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="More" class="btn btn-lg disabled"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            <br><br><br>
        </div>
        <?php
                }
        if(!$_SESSION['disableless'] AND !$_SESSION['disablemore']){
            
                ?>
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="Less" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="More" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            <br><br><br>
        </div>
        <?php
                }
        
        ?>
    </div>
    <script type="text/javascript" src="bs/js/bootstrap.min.js"></script> 
</body>
</html>




