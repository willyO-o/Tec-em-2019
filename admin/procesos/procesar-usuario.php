<?php

if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='registrar') {

        include '../fun/conexion.php';

        $usuario= filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $ci= filter_var($_POST['ci'], FILTER_SANITIZE_STRING);
        $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $confirmPassword= filter_var($_POST['confirmPassword'], FILTER_SANITIZE_STRING);
        $tipo= filter_var($_POST['tipo'], FILTER_SANITIZE_STRING);

        $con->query("SELECT * FROM b_usuario WHERE UPPER(usuario)=UPPER('$usuario')");

        $opciones = array('cost' => 12 );
        $password_hashed= password_hash($password, PASSWORD_BCRYPT ,$opciones);

        if ($con->affected_rows>0) {
            header('location: ../registrar-usuario.php?error=existe');
        }else{
            $res=$con->query("INSERT INTO b_usuario  VALUES(NULL,'$usuario','$password_hashed','$ci','$tipo')",$con->affected_rows);

  
            if ($res) {
                header('location: ../crud-usuarios.php');
            }else{
                header('location: ../registrar-usuario.php?error=no_inserto');
            }
        }
        $con->close();

    }


 
        

   


    if ($_POST['accion']=='actualizar') {

        include '../fun/conexion.php';

        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $usuario= filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $ci= filter_var($_POST['ci'], FILTER_SANITIZE_STRING);
        $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $tipo= filter_var($_POST['tipo'], FILTER_SANITIZE_STRING);

        $con->query("SELECT * FROM b_usuario WHERE UPPER(usuario)=UPPER('$usuario') AND id_usuario!= '$id' ");

        
        if ($con->affected_rows>0) {
            header('location: ../editar-usuario.php?error=existe&id='.$id);
        }else{

            if ($password!='') {
                $opciones = array('cost' => 12 );
                $password_hashed= password_hash($password, PASSWORD_BCRYPT ,$opciones);
                $con->query("UPDATE b_usuario SET password='$password_hashed' WHERE id_usuario='$id' ");
            }

            $res=$con->query("UPDATE b_usuario  SET usuario='$usuario', ci='$ci', id_tipo='$tipo' WHERE id_usuario= '$id' ",$con->affected_rows);

  
            if ($res) {
                header('location: ../crud-usuarios.php');
            }else{
                header('location: ../editar-usuario.php?error=no_actualizo&id='.$id);
            }
        }
        $con->close();

    }


    if ($_POST['accion']=='ingresar') {

        include '../fun/conexion.php';

        $usuario= filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $res=($con->query("SELECT * FROM b_usuario WHERE usuario='$usuario'"))->fetch_assoc();

        if ($con->affected_rows>0  AND password_verify($password, $res['password'])) {
            session_start();
            $_SESSION['admin']='admin';
            $_SESSION['id']=$res['id_usuario'];
            header('location: ../index.php');
        }else{

            header('location: ../../login.php?error=nh');
           
        }
        $con->close();

    }
}


    if (isset($_GET['accion'])) {
        if ($_GET['accion']=='eliminar') {

            include '../fun/conexion.php';
    
            $id= filter_var($_GET['id'], FILTER_SANITIZE_STRING);

            $con->query("DELETE FROM b_usuario WHERE id_usuario = '$id' ");

                if ($con->affected_rows>0) {
                    header('location: ../crud-usuarios.php');
                }else{
                    header('location: ../crud-usuarios.php?error=no_elimino');
                }
    
                $con->close();
        }
    }

?>