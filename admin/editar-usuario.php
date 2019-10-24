<?php
    require_once 'inc/header.php';
    
?>
<div id="wrapper">
    <?php   require_once 'inc/aside.php'; ?>
    <!-- Sidebar -->

<?php
    $id=$_GET['id'];
    if (is_numeric($id)) {
        include 'fun/conexion.php';
        $res=$con->query("SELECT * FROM b_tipo");

        $res_us=($con->query("SELECT * FROM b_usuario WHERE id_usuario =$id"))->fetch_assoc();


        $con->close();
    }else {
        echo 'no es';
    }


?>

    <div id="content-wrapper">
        <!-- Breadcrumbs-->

        <div class="container-fluid">

            <div class="card card-register mx-auto mt-5">
                <div class="card-header">
                    <h4>Registrar Nuevo Usuario <small>(todos los campos son obligatorios)</small></h4>
                </div>
                <div class="card-body">
                    <form action="procesos/procesar-usuario.php" method="POST">
                        <div class="form-group">
                            <label for="firstName">Nombre de Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control"
                                        placeholder="Nombre de Usuario" required autofocus="autofocus" value="<?php echo $res_us['usuario'] ?>">


                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label for="firstName">C.I.</label>
                                        <input type="text" name="ci" id="usuario" class="form-control"
                                            placeholder="C.I." required autofocus="autofocus" value="<?php echo $res_us['ci'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cagoria">Seleccione Tipo de Usuario</label>
                                        <select name="tipo" class="custom-select">
                                            <option value="0" ><-- Seleccione--></option>
                                        <?php     while ($row=$res->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['id_tipo'] ?>"  <?php echo $row['id_tipo']==$res_us['id_tipo'] ? 'selected':'' ?>> <?php echo $row['tipo'] ?> </option>

                                        <?php } ?>

                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                            <h6>Si desea cambiar el password: ingrese nuevo password</h6><hr>
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label for="firstName">Password</label>
                                        <input type="password" name="password" id="usuario" class="form-control"
                                            placeholder="Password"  autofocus="autofocus">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">Confirmar Password</label>
                                        <input type="password" name="confirmPassword" id="autor" class="form-control"
                                            placeholder="Confirmar Password"  autofocus="autofocus">
                                    </div>
                                </div>
                            </div>
                        </div>                      
                        <input type="hidden" name="id" value="<?php echo $res_us['id_usuario'] ?>">
                        <input type="hidden" name="accion" value="actualizar">
                        <button type="submit" class="btn btn-primary btn-block">Guardar  Cambios</button>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3 btn btn-danger" href="crud-usuarios.php">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->

<br><br>
        <?php require_once 'inc/footer.php' ;?>