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
            <a >Panel de Administracion</a>
          </li>
        </ol>

        <!-- Icon Cards-->


        <?php 
          include 'fun/conexion.php';

          $res=$con->query("SELECT *  FROM b_libro JOIN b_categoria USING(id_categoria) ");

          
        ?>
      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header d-flex justify-content-between">
            <h4>Administrar Libros</h4>
            <a href="registrar-libro.php" class="btn btn-success"> <i class="fas fa-book"></i>  Registrar Nuevo Libro</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Resumen</th>
                    <th>Disponibilidad</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Resumen</th>
                    <th>Disponibilidad</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                  </tr>
                </tfoot>
                <tbody>
                
                <?php  while ($row =$res->fetch_assoc()) { ?>
                
                  <tr>
                    <td><?php echo $row['titulo'] ?></td>
                    <td><?php echo $row['autor'] ?></td>
                    <td><?php echo $row['resumen'] ?></td>
                    <td><span class="btn text-white bg-<?php echo $row['disponibilidad']==1 ?  'success': 'danger' ?>"><?php echo $row['disponibilidad']==1 ?  'Disponible': 'En sala' ?></span></td>
                    <td><?php echo $row['categoria'] ?></td>
                    <td>
                      <a href="editar-libro.php?id=<?php echo $row['id_libro'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
                      <a href="procesos/procesar-libro.php?accion=eliminar&id=<?php echo $row['id_libro'] ?>" class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></a>
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