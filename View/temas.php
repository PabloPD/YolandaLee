<!DOCTYPE html>
<html>
    <?php 
    include_once 'View/headurl.php'; 
    ?>
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
                    <form action="http://localhost/YolandaLee/Search" method="POST" class="navbar-form navbar-right" role="search">
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
                        <ul class="list-inline">
                        <?php
                            foreach ($temas as $t) {
                                
                                echo '<li><a href="./'.$t->name.'" style="font-size:'.rand(14, 28).'px;color:rgb('.rand(100, 250).','.rand(50, 180).','.rand(1, 150).');"> '.$t->name.' </li> </a>';
                                
                            }
                            ?>
                        </ul>
                    </div>
                    <div>
                        <br>Clasificación categoría <a href="http://localhost/YolandaLee/Clasificacion/az"> A-Z </a> / <a href="http://localhost/YolandaLee/Clasificacion/za"> Z-A </a>
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
            <br>    
                <?php
                
                if(isset($_SESSION['libros'])){
                     
                    if(isset($_SESSION['not_found']) AND !$_SESSION['not_found']==''){
                        echo '<div class="col-xs-12 col-sm-12 col-md-12 librosFound">';
                        echo '<h4>'.$_SESSION['not_found'].'</h4>';
                        echo '<br></div>';
                    }

                    if(!isset($_SESSION['num_pag'])){
                        $_SESSION['num_pag']=6;
                    }

                    $_SESSION['contar_libs_pag'] = 0;
                    
                    foreach ($_SESSION['libros'] as $b) {

                        if($_SESSION['contar_libs_pag'] >= $_SESSION['num_pag'] - 6 AND $_SESSION['contar_libs_pag'] < $_SESSION['num_pag']){
                            echo '<div class="col-xs-12 col-sm-5 col-md-5 bordearLibro col-md-push-1 col-sm-push-1" >';
                            echo '<br>';
                            echo '<div class="links">Titulo : '. $b->tittle .'<br>';
                            echo 'Autor : '. $b->autor .'<br>';
                            echo 'Valoracion : '. $b->valoration .'<br>';
                            echo 'tema : '. $b->tema .'</div><br><br>';
                            echo $b->coment;
                            echo '<div class="fondoLibro bordearLibro"></div>';
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
        
        <?php
                if($_SESSION['disableless']){
                ?>
            
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="http://localhost/YolandaLee/Less" class="btn btn-lg disabled"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="http://localhost/YolandaLee/More" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            
        </div>
        <?php
                }
                
        if($_SESSION['disablemore']){
                ?>
            
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="http://localhost/YolandaLee/Less" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="http://localhost/YolandaLee/More" class="btn btn-lg disabled"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            
        </div>
        <?php
                }
        if(!$_SESSION['disableless'] AND !$_SESSION['disablemore']){
            
                ?>
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="http://localhost/YolandaLee/Less" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="http://localhost/YolandaLee/More" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
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




