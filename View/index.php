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
                    <form action="" class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="search"/>
                        </div>
                        <select class="form-group" name="" id="search">
                            <option value="">.........................................</option>
                            <option value="">clasificación</option>
                            <option value="">autor</option>
                            <option value="">título</option>
                        </select>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="container-fluid encabezadotemas">
        <div class="row temas">
            <div class="col-xs-12 col-sm-2 col-md-2 text-center temamarcado" id="romantico">
                <spam><b>Romántico</b></spam>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 text-center temamarcado" id="ficcion">
                <spam><b>Ciencia-ficción</b></spam>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 text-center temamarcado" id="juvenil">
                <spam><b>Juvenil</b></spam>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 text-center temamarcado" id="ficcion">
                <spam><b>Mistério</b></spam>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 text-center temamarcado" id="ficcion">
                <spam><b>Hechos reales</b></spam>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 text-center temamarcado" id="ficcion">
                <spam><b>Aventuras</b></spam>
            </div>
        </div>
        <div class="row temas">
            <div class="col-xs-12 col-sm-2 col-sm-offset-1 col-md-2 col-md-offset-1 col-lg-offset-1 text-center temamarcado">
                <spam><b>Romántico</b></spam>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 text-center temamarcado" id="ficcion">
                <spam><b>Ciencia-ficción</b></spam>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 text-center temamarcado" id="ficcion">
                <spam><b>Todo</b></spam>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 text-center temamarcado" id="ficcion">
                <spam><b>Mistério</b></spam>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 text-center temamarcado" id="ficcion">
                <spam><b>Hechos reales</b></spam>
            </div>
        </div>
    </div>
    
    

    <script type="text/javascript" src="bs/js/bootstrap.min.js"></script> 
</body>
</html>


