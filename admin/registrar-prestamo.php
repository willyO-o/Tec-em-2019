<?php
    require_once 'inc/header.php';
    
?>
<div id="wrapper">
    <?php   require_once 'inc/aside.php'; ?>
    <!-- Sidebar -->
<?php 

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        if (!is_numeric($id)) {
            die('ERROR: No se puede continuar');
        }
        include 'fun/conexion.php';
        $res=($con->query("SELECT id_prestamo,titulo,usuario FROM b_libro 
                            JOIN b_prestamo USING(id_libro) 
                            JOIN b_usuario USING(id_usuario) 
                            WHERE id_prestamo ='$id' "))->fetch_assoc();
        $con->close();
    }

?>
    <div id="content-wrapper">
        <!-- Breadcrumbs-->

        <div class="container-fluid">

            <div class="card card-register mx-auto mt-5">
                <div class="card-header">
                    <h4><?php echo isset($_GET['id']) ? 'Editar':'Registrar' ?> Prestamo<small>(todos los campos son obligatorios)</small></h4>
                </div>
                <div class="card-body">
                    <form action="procesos/procesar-prestamo.php" method="POST">
                        <div class="form-group">
                            <label for="firstName">Nombre de Libro <small>(Escriba  nombre de Libro a prestar</small></label>
                            <input type="text" name="libroPrestamo" id="libroPrestamo" class="form-control"
                                        placeholder="Nombre de Libro" required autofocus="autofocus" 
                                        value="<?php echo isset($_GET['id']) ? $res['titulo']:'' ?>">
                                                 
                        </div>

                        <div class="form-group">
                            <label for="firstName">Nombre de Usuario <small>(Escriba  nombre de Usuario a prestar</small></label>
                            <input type="text" name="UsuarioPrestamo" id="UsuarioPrestamo" class="form-control"
                                        placeholder="Nombre del Usuario" required autofocus="autofocus" 
                                        value="<?php echo isset($_GET['id']) ? $res['usuario']:'' ?>">
        
                        </div>
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $res['id_prestamo']:'' ?>">
                        <input type="hidden" name="accion" value="<?php echo isset($_GET['id']) ? 'actualizar':'registrar' ?>">
                        <button type="submit" class="btn btn-primary btn-block"><?php echo isset($_GET['id']) ? 'Guardar Cambios':'Registrar Prestamo' ?></button>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3 btn btn-danger" href="crud-prestamos.php">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->

<br><br>
        <?php require_once 'inc/footer.php' ;?>