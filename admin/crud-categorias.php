<?php
    require_once 'inc/header.php';
    

?>
  <div id="wrapper">
<?php   require_once 'inc/aside.php'; ?>
    <!-- Sidebar -->


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a > Administrar Categorias</a>
          </li>
        </ol>


        <?php 
          include 'fun/conexion.php';

          $res=$con->query("SELECT *  FROM b_categoria ");

          
        ?>
      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header d-flex justify-content-between">
            <h4>Lista de Categorias</h4>
            <a href="registrar-categoria.php" class="btn btn-success"> <i class="fas fa-asterisk"></i>  Agregar Nueva Categoria</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Categoria</th>
                    <th>Descripcion</th>

                    <th>Acciones</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Usuario</th>
                    <th>Descripcion</th>

                    <th>Acciones</th>
                  </tr>
                </tfoot>
                <tbody>
                
                <?php  while ($row =$res->fetch_assoc()) { ?>
                
                  <tr>
                    <td><?php echo $row['categoria'] ?></td>
                    <td><?php echo $row['descripcion_categoria'] ?></td>
                    <td>
                      <a href="registrar-categoria.php?id=<?php echo $row['id_categoria'] ?>" class="btn btn-warning text-white" ><i class="fas fa-pencil-alt"></i></a>
                      <a href="procesos/procesar-categoria.php?accion=eliminar&id=<?php echo $row['id_categoria'] ?>" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

<?php require_once 'inc/footer.php' ;?>