<!DOCTYPE html>
<html>
    <?php include_once 'View/head.php'; ?>

</head>
<body >
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
                            <option value="todo">todo</option>
                            <option value="clasificación">clasificación</option>
                            <option value="autor">autor</option>
                            <option value="título">título</option>
                            <?php
                            foreach ($temas as $t) {
                                
                                echo '<option value="'.$t->name.'">'.$t->name.'</option>';
                                
                            }
                            ?>
                        </select>
                        <input type="submit" class="form-control btn-success" value="search" id="updateBtn" />
                    </form>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="container">
        <div class="row">
            
                <?php
                
                if(isset($libros)){

                    if(!isset($_SESSION['num_pag'])){
                        $_SESSION['num_pag']=10;
                    }
                    
                    
                    $side = $_SESSION['num_pag']-10;
                    foreach ($libros as $b) {
                        
                        if($side%2==0){
                            echo '<div class="col-xs-12 col-sm-12 col-md-2 bordearLibro">';
                            echo '<img src="img/'.$b->picture.'.png" width="140" height="200">';
                            echo '</div>';
                            echo '<div class="col-xs-12 col-sm-12 col-md-10 bordearLibro">';
                            echo '<href class="btn btn-success links">Titulo : '. $b->tittle .'</href>';
                            echo '<href class="btn btn-primary links">Autor : '. $b->autor .'</href>';
                            echo '<href class="btn btn-warning links">Valoracion : '. $b->valoration .'</href>';
                            echo '<href class="btn btn-warning links">tema : '. $b->tema .'</href><br><br>';
                            echo $b->coment;
                            echo '</div>';
                            $side++;
                            if($side >= $_SESSION['num_pag']) break;
                        }
                        else{
                            echo '<div class="col-xs-12 col-sm-12 col-md-10 bordearLibro">';
                            echo '<href class="btn btn-success links">Titulo : '. $b->tittle .'</href>';
                            echo '<href class="btn btn-primary links">Autor : '. $b->autor .'</href>';
                            echo '<href class="btn btn-warning links">Valoracion : '. $b->valoration .'</href>';
                            echo '<href class="btn btn-warning links">tema : '. $b->tema .'</href><br><br>';
                            echo $b->coment;
                            echo '</div>';
                            echo '<div class="col-xs-12 col-sm-12 col-md-2 bordearLibro">';
                            echo '<img src="img/'.$b->picture.'.png" width="125" height="175">';
                            echo '</div>';
                            $side++;
                            if($side >= $_SESSION['num_pag']) break;
                        }    
                    }
                    
                    //ssprint_r($libros);
                }
                
                ?>
            
        </div>
    </div>
    
    

    <script type="text/javascript" src="bs/js/bootstrap.min.js"></script> 
</body>
</html>


