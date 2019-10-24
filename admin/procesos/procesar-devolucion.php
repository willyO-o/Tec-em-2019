<?php

if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='registrar') {

        include '../fun/conexion.php';

        $libroDevolucion= filter_var($_POST['libroDevolucion'], FILTER_SANITIZE_STRING);

        $UsuarioDevolucion= filter_var($_POST['UsuarioDevolucion'], FILTER_SANITIZE_STRING);

        $resLibro=$con->query("SELECT id_libro FROM b_libro WHERE UPPER(titulo)=UPPER('$libroDevolucion')");

        $resUser=$con->query("SELECT id_usuario FROM b_usuario WHERE UPPER(usuario)=UPPER('$UsuarioDevolucion')");

        $row_lib= mysqli_num_rows($resLibro);

        $row_us= mysqli_num_rows($resUser);
        if ($row_lib==1 && $row_us==1) {

            $lib=$resLibro->fetch_assoc();
            $us=$resUser->fetch_assoc();
            $res=$con->query("INSERT INTO b_devolucion  VALUES(NULL,'".$lib['id_libro']."','".$us['id_usuario']."',NOW())",$con->affected_rows);
            $con->query("UPDATE b_libro SET disponibilidad=1 WHERE id_libro = '".$lib['id_libro']."'" );
            if ($res) {
                header('location: ../crud-devoluciones.php');
            }else{
                header('location: ../registrar-devolucion.php?error=no_inserto');
            }

            
        }else{
            header('location: ../registrar-devolucion.php?error=existe');
        }
        $con->close();

    }


 
        

   


    if ($_POST['accion']=='actualizar') {

        include '../fun/conexion.php';

        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $libroDevolucion= filter_var($_POST['libroDevolucion'], FILTER_SANITIZE_STRING);

        $UsuarioDevolucion= filter_var($_POST['UsuarioDevolucion'], FILTER_SANITIZE_STRING);

        $resLibro=$con->query("SELECT id_libro FROM b_libro WHERE UPPER(titulo)=UPPER('$libroDevolucion')");

        $resUser=$con->query("SELECT id_usuario FROM b_usuario WHERE UPPER(usuario)=UPPER('$UsuarioDevolucion')");

        $row_lib= mysqli_num_rows($resLibro);

        $row_us= mysqli_num_rows($resUser);
        if ($row_lib==1 && $row_us==1) {

            $lib=$resLibro->fetch_assoc();
            $us=$resUser->fetch_assoc();
            $res=$con->query("UPDATE b_devolucion  SET id_libro='".$lib['id_libro']."',id_usuario='".$us['id_usuario']."' WHERE id_devolucion='$id' ",$con->affected_rows);
            $con->query("UPDATE b_libro SET disponibilidad=1 WHERE id_libro = '".$lib['id_libro']."'" );
            if ($res) {
                header('location: ../crud-devoluciones.php');
            }else{
                header('location: ../registrar-devolucion.php?error=no_actualizo&id='.$id);
            }

            
        }else{
            header('location: ../registrar-devolucion.php?error=existe');
        }
        $con->close();
    }
}


    if (isset($_GET['accion'])) {
        if ($_GET['accion']=='eliminar') {

            include '../fun/conexion.php';
    
            $id= filter_var($_GET['id'], FILTER_SANITIZE_STRING);

            $con->query("DELETE FROM b_devolucion WHERE id_devolucion = '$id' ");

                if ($con->affected_rows>0) {
                    header('location: ../crud-devoluciones.php');
                }else{
                    header('location: ../crud-devoluciones.php?error=no_elimino');
                }
    
                $con->close();
        }
    }

?>