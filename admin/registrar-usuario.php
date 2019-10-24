<?php
    require_once 'inc/header.php';
    
?>
<div id="wrapper">
    <?php   require_once 'inc/aside.php'; ?>
    <!-- Sidebar -->

 <?php
    include 'fun/conexion.php';
    $res=$con->query("SELECT * FROM b_tipo");
    $con->close();
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
                                        placeholder="Nombre de Usuario" required autofocus="autofocus">


                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label for="firstName">C.I.</label>
                                        <input type="text" name="ci" id="usuario" class="form-control"
                                            placeholder="C.I." required autofocus="autofocus">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cagoria">Seleccione Tipo de Usuario</label>
                                        <select name="tipo" class="custom-select">
                                            <option value="0" selected><-- Seleccine--></option>
                                        <?php     while ($row=$res->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['id_tipo'] ?>" > <?php echo $row['tipo'] ?> </option>

                                        <?php } ?>

                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label for="firstName">Password</label>
                                        <input type="password" name="password" id="usuario" class="form-control"
                                            placeholder="Password" required autofocus="autofocus">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">Confirmar Password</label>
                                        <input type="password" name="confirmPassword" id="autor" class="form-control"
                                            placeholder="Confirmar Password" required autofocus="autofocus">
                                    </div>
                                </div>
                            </div>
                        </div>                      
         
                        <input type="hidden" name="accion" value="registrar">
                        <button type="submit" class="btn btn-primary btn-block">Registrar Usuario</button>
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