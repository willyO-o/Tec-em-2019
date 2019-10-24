<?php

if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='registrar') {

        include '../fun/conexion.php';

        $libroPrestamo= filter_var($_POST['libroPrestamo'], FILTER_SANITIZE_STRING);

        $UsuarioPrestamo= filter_var($_POST['UsuarioPrestamo'], FILTER_SANITIZE_STRING);

        $resLibro=$con->query("SELECT id_libro FROM b_libro WHERE UPPER(titulo)=UPPER('$libroPrestamo')");

        $resUser=$con->query("SELECT id_usuario FROM b_usuario WHERE UPPER(usuario)=UPPER('$UsuarioPrestamo')");

        $row_lib= mysqli_num_rows($resLibro);

        $row_us= mysqli_num_rows($resUser);
        if ($row_lib==1 && $row_us==1) {

            $lib=$resLibro->fetch_assoc();
            $us=$resUser->fetch_assoc();
            $res=$con->query("INSERT INTO b_prestamo  VALUES(NULL,'".$lib['id_libro']."','".$us['id_usuario']."',NOW())",$con->affected_rows);

            $con->query("UPDATE b_libro SET disponibilidad=0 WHERE id_libro = '".$lib['id_libro']."'" );
            
            if ($res) {
                header('location: ../crud-prestamos.php');
            }else{
                header('location: ../registrar-prestamo.php?error=no_inserto');
            }

            
        }else{
            header('location: ../registrar-prestamo.php?error=existe');
        }
        $con->close();

    }


 
        

   


    if ($_POST['accion']=='actualizar') {

        include '../fun/conexion.php';

        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $libroPrestamo= filter_var($_POST['libroPrestamo'], FILTER_SANITIZE_STRING);

        $UsuarioPrestamo= filter_var($_POST['UsuarioPrestamo'], FILTER_SANITIZE_STRING);

        $resLibro=$con->query("SELECT id_libro FROM b_libro WHERE UPPER(titulo)=UPPER('$libroPrestamo')");

        $resUser=$con->query("SELECT id_usuario FROM b_usuario WHERE UPPER(usuario)=UPPER('$UsuarioPrestamo')");

        $row_lib= mysqli_num_rows($resLibro);

        $row_us= mysqli_num_rows($resUser);
        if ($row_lib==1 && $row_us==1) {

            $lib=$resLibro->fetch_assoc();
            $us=$resUser->fetch_assoc();
            $res=$con->query("UPDATE b_prestamo  SET id_libro='".$lib['id_libro']."',id_usuario='".$us['id_usuario']."' WHERE id_prestamo='$id' ",$con->affected_rows);
            $con->query("UPDATE b_libro SET disponibilidad=0 WHERE id_libro = '".$lib['id_libro']."'" );
            if ($res) {
                header('location: ../crud-prestamos.php');
            }else{
                header('location: ../registrar-prestamo.php?error=no_actualizo&id='.$id);
            }

            
        }else{
            header('location: ../registrar-prestamo.php?error=existe');
        }
        $con->close();
    }
}


    if (isset($_GET['accion'])) {
        if ($_GET['accion']=='eliminar') {

            include '../fun/conexion.php';
    
            $id= filter_var($_GET['id'], FILTER_SANITIZE_STRING);

            $con->query("DELETE FROM b_prestamo WHERE id_prestamo = '$id' ");

                if ($con->affected_rows>0) {
                    header('location: ../crud-prestamos.php');
                }else{
                    header('location: ../crud-prestamos.php?error=no_elimino');
                }
    
                $con->close();
        }
    }

?>