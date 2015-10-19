<!DOCTYPE html>
<html>
    <?php
    $fileindex = './View/head.php';
    include_once $fileindex;
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
                    <div class="visible-xs ">
                        <?php
                        if(isset($_SESSION['temas'])){
                          foreach ($_SESSION['temas'] as $t) {

                            echo '<a href="www.lamardelibros.cat/Tema/'.$t->name.'" style="font-size:'.rand(10, 18).'px;color:rgb('.rand(100, 250).','.rand(50, 180).','.rand(1, 150).');"> '.$t->name.'  </a>';

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
                <a href="../">Inicio</a><br>
                <a href=".">Clasificacion A-E</a><br>
                <a href=".">Clasificacion E-A</a><br>
                <a href="./Clasificacion/A">A</a> , 
                <a href="./Clasificacion/B">B</a> , 
                <a href="./Clasificacion/C">C</a> , 
                <a href="./Clasificacion/D">D</a> , 
                <a href="./Clasificacion/E">E</a> <br><br><br> ,
     
                <div>Temas</div><br>
                <?php
                for($x=0; $x<2;$x++){
                    if(isset($_SESSION['temas'])){
                        shuffle($_SESSION['temas']);
                        foreach ($_SESSION['temas'] as $t) {

                        echo '<a href="../Tema/'.$t->name.'" style="font-size:'.rand(12, 24).'px;color:rgb('.rand(100, 250).','.rand(50, 180).','.rand(1, 150).');"> '.$t->name.'  </a>';

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

                        echo '<a href="../Autor/'.$a->name.'" style="font-size:'.rand(12, 24).'px;color:rgb('.rand(100, 250).','.rand(50, 180).','.rand(1, 150).');"> '.$a->name.'  </a>';

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

                        echo '<a href="../Titulo/'.$t->name.'" style="font-size:'.rand(12, 24).'px;color:rgb('.rand(100, 250).','.rand(50, 180).','.rand(1, 150).');"> '.$t->name.'  </a>';

                        }
                    }   
                }
                    ?>
                
            </div>
            <div>
                <?php
                    include_once 'View/listbooks.php';    
                ?>
            </div>
            
        </div>
        
        <?php
                if($_SESSION['disableless']){
                ?>
            
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="../Less" class="btn btn-lg disabled"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="../More" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            
        </div>
        <?php
                }
                
        if($_SESSION['disablemore']){
                ?>
            
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="../Less" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="../More" class="btn btn-lg disabled"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            
        </div>
        <?php
                }
        if(!$_SESSION['disableless'] AND !$_SESSION['disablemore']){
            
                ?>
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="../Less" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-left separatorpages" aria-hidden="true"></span></a> <a href="../More" class="btn btn-lg"><span class="glyphicon glyphicon-triangle-right separatorpages" aria-hidden="true"></span></a>
            </div> 
            
        </div>
        <?php
                }
        
        ?>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div id='botonera'>
                    <input id="botonIniciar" type='button' value = 'Iniciar'></input>
                    <input id='botonDetener' type='button' value = 'Detener'></input>
                    <input id='botonFoto' type='button' value = 'Foto'></input>
                </div>
                <div class="contenedor">
                    <div class="titulo">Cámara</div>
                    <video id="camara" autoplay controls></video>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="contenedor">
                    <div class="titulo">Foto</div>
                    <canvas id="foto" ></canvas>
                </div>
            </div>
        </div>    
    </div>
    
    <script type="text/javascript" src="bs/js/bootstrap.min.js"></script> 
</body>
</html>




