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
            <a > Administrar Prestamos</a>
          </li>
        </ol>


        <?php 
          include 'fun/conexion.php';

          $res=$con->query("SELECT id_devolucion,titulo,usuario, fecha_devolucion  FROM b_libro 
                          JOIN b_devolucion USING(id_libro) 
                          JOIN b_usuario USING(id_usuario) ");

          
        ?>
      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header d-flex justify-content-between">
            <h4>Lista de Devoluciones</h4>
            <a href="registrar-devolucion.php" class="btn btn-success"> <i class="fas fa-book"></i>  Registrar Devolucion de Libro</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Libro</th>
                    <th>Usuario</th>
                    <th>Fecha Devolucion</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Libro</th>
                    <th>Usuario</th>
                    <th>Fecha Devolucion</th>
                    <th>Acciones</th>
                  </tr>
                </tfoot>
                <tbody>
                
                <?php  while ($row =$res->fetch_assoc()) { ?>
                
                  <tr>
                    <td><?php echo $row['titulo'] ?></td>
                    <td><?php echo $row['usuario'] ?></td>
                    <td><?php echo $row['fecha_devolucion'] ?></td>
                    <td>
                      <a href="registrar-devolucion.php?id=<?php echo $row['id_devolucion'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
                      <a href="procesos/procesar-devolucion.php?accion=eliminar&id=<?php echo $row['id_devolucion'] ?>" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
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