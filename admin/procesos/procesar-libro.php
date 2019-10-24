<?php

if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='registrar') {

        include '../fun/conexion.php';

        $titulo= filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
        $autor= filter_var($_POST['autor'], FILTER_SANITIZE_STRING);
        $resumen= filter_var($_POST['resumen'], FILTER_SANITIZE_STRING);
        $disponibilidad= filter_var($_POST['disponibilidad'], FILTER_SANITIZE_STRING);
        $categoria= filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);

        $con->query("SELECT * FROM b_libro WHERE UPPER(titulo)=UPPER('$titulo')");

        if ($con->affected_rows>0) {
            header('location: ../registrar-libro.php?error=existe');
        }else{
            $res=$con->query("INSERT INTO b_libro  VALUES(NULL,'$titulo','$autor','$resumen','$disponibilidad','$categoria')",$con->affected_rows);

  
            if ($res) {
                header('location: ../index.php');
            }else{
                header('location: ../registrar-libro.php?error=no_inserto');
            }
        }
        $con->close();

    }


 
        

   


    if ($_POST['accion']=='actualizar') {
        
        include '../fun/conexion.php';

        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $titulo= filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
        $autor= filter_var($_POST['autor'], FILTER_SANITIZE_STRING);
        $resumen= filter_var($_POST['resumen'], FILTER_SANITIZE_STRING);
        $disponibilidad= filter_var($_POST['disponibilidad'], FILTER_SANITIZE_STRING);
        $categoria= filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);

        $con->query("SELECT * FROM b_libro WHERE UPPER(titulo)=UPPER('$titulo') AND id_libro!= '$id' ");

        if ($con->affected_rows>0) {
            header('location: ../editar-libro.php?error=existe&id='.$id);
        }else{
            $res=$con->query("UPDATE b_libro  SET titulo='$titulo', autor='$autor', resumen='$resumen',
            disponibilidad='$disponibilidad',id_categoria='$categoria' WHERE id_libro= '$id' ",$con->affected_rows);

  
            if ($res) {
                header('location: ../index.php');
            }else{
                header('location: ../editar-libro.php?error=no_actualizo&id='.$id);
            }
        }
        $con->close();

    }
}


    if (isset($_GET['accion'])) {
        if ($_GET['accion']=='eliminar') {

            include '../fun/conexion.php';
    
            $id= filter_var($_GET['id'], FILTER_SANITIZE_STRING);

            $con->query("DELETE FROM b_libro WHERE id_libro = '$id' ");

                if ($con->affected_rows>0) {
                    header('location: ../index.php');
                }else{
                    header('location: ../index.php?error=no_elimino');
                }
    
                $con->close();
        }
    }

?>