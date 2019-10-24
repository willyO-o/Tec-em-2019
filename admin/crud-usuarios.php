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
            <a > Administrar Usuarios</a>
          </li>
        </ol>


        <?php 
          include 'fun/conexion.php';

          $res=$con->query("SELECT *  FROM b_usuario JOIN b_tipo USING(id_tipo) ");

          
        ?>
      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header d-flex justify-content-between">
            <h4>Lista de Usuarios</h4>
            <a href="registrar-usuario.php" class="btn btn-success"> <i class="fas fa-user-plus"></i>  Registrar Nuevo Usuario</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>ci</th>
                    <th>tipo</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Usuario</th>
                    <th>ci</th>
                    <th>tipo</th>
                    <th>Acciones</th>
                  </tr>
                </tfoot>
                <tbody>
                
                <?php  while ($row =$res->fetch_assoc()) { ?>
                
                  <tr>
                    <td><?php echo $row['usuario'] ?></td>
                    <td><?php echo $row['ci'] ?></td>
                    <td><?php echo $row['tipo'] ?></td>
                    <td>
                      <a href="editar-usuario.php?id=<?php echo $row['id_usuario'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
                      <a href="procesos/procesar-usuario.php?accion=eliminar&id=<?php echo $row['id_usuario'] ?>" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
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