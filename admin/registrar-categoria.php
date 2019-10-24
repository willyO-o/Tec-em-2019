<?php
    require_once 'inc/header.php';
    
?>
<div id="wrapper">
    <?php   require_once 'inc/aside.php'; ?>
    <!-- Sidebar -->

 <?php
 if (isset($_GET['id'])) {
    if ($_GET['id']) {
        $id=$_GET['id'];
       if (!is_numeric($id)) {
           die('Error: no se pude continuar');
       }
       include 'fun/conexion.php';
       $res=($con->query("SELECT * FROM b_categoria WHERE id_categoria ='$id' "))->fetch_assoc();
       $con->close();
    }
 }
    
?>

    <div id="content-wrapper">
        <!-- Breadcrumbs-->

        <div class="container-fluid">

            <div class="card card-register mx-auto mt-5">
                <div class="card-header">
                    <h4><?php echo isset($_GET['id']) ? 'Editar': 'Agregar' ;?> Categoria<small>(todos los campos son obligatorios)</small></h4>
                </div>
                <div class="card-body">
                    <form action="procesos/procesar-categoria.php" method="POST">
                        <div class="form-group">
                            <label for="firstName">Nombre de Categoria</label>
                            <input type="text" name="categoria" id="categoria" class="form-control"
                                        placeholder="Nombre de la Categoria" required autofocus="autofocus" 
                                        value="<?php echo isset($_GET['id']) ? $res['categoria'] : '' ;?>">


                        </div>
                        <div class="form-group">
                            <label for="firstName">Descripcion de la Categoria</label>
                            <input type="text" name="descripcion" id="categoria" class="form-control"
                                        placeholder="Descripcion de la Categoria" required autofocus="autofocus"
                                        value="<?php echo isset($_GET['id']) ? $res['descripcion_categoria'] : '' ;?>">


                        </div>

                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $id : '' ;?>">
                        <input type="hidden" name="accion" value="<?php echo isset($_GET['id']) ? 'actualizar': 'registrar' ;?>">
                        <button type="submit" class="btn btn-primary btn-block"><?php echo isset($_GET['id']) ? 'Guardar Cambios': 'Agregar Categoria' ;?></button>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3 btn btn-danger" href="crud-categorias.php">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->

<br><br>
        <?php require_once 'inc/footer.php' ;?>