<?php

if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='registrar') {

        include '../fun/conexion.php';

        $categoria= filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);

        $descripcion= filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);

        $con->query("SELECT * FROM b_categoria WHERE UPPER(categoria)=UPPER('$categoria')");

  
        if ($con->affected_rows>0) {
            header('location: ../registrar-categoria.php?error=existe');
        }else{
            $res=$con->query("INSERT INTO b_categoria  VALUES(NULL,'$categoria','$descripcion')",$con->affected_rows);

  
            if ($res) {
                header('location: ../crud-categorias.php');
            }else{
                header('location: ../registrar-categoria.php?error=no_inserto');
            }
        }
        $con->close();

    }


 
        

   


    if ($_POST['accion']=='actualizar') {

        include '../fun/conexion.php';

        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $categoria= filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);

        $descripcion= filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);

        $con->query("SELECT * FROM b_categoria WHERE UPPER(categoria)=UPPER('$categoria') AND id_categoria!= '$id' ");

        
        if ($con->affected_rows>0) {
            header('location: ../registrar-categoria.php?error=existe&id='.$id);
        }else{

            $res=$con->query("UPDATE b_categoria  SET categoria='$categoria', descripcion_categoria='$descripcion' WHERE id_categoria= '$id' ",$con->affected_rows);

  
            if ($res) {
                header('location: ../crud-categorias.php');
            }else{
                header('location: ../editar-categoria.php?error=no_actualizo&id='.$id);
            }
        }
        $con->close();

    }
}


    if (isset($_GET['accion'])) {
        if ($_GET['accion']=='eliminar') {

            include '../fun/conexion.php';
    
            $id= filter_var($_GET['id'], FILTER_SANITIZE_STRING);

            $con->query("DELETE FROM b_categoria WHERE id_categoria = '$id' ");

                if ($con->affected_rows>0) {
                    header('location: ../crud-categorias.php');
                }else{
                    header('location: ../crud-categorias.php?error=no_elimino');
                }
    
                $con->close();
        }
    }

?>