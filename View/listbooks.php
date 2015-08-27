<html>
    <head>
        
    </head>
    <div class="container"><?php
   


    if(isset($_SESSION['libros'])){

        if(isset($_SESSION['not_found']) AND !$_SESSION['not_found']==''){
            echo '<div class="col-xs-12 col-sm-12 col-md-12 librosFound">';
            echo '<h3>'.$_SESSION['not_found'].'</h3>';
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
</html>