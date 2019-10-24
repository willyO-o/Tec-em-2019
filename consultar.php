<?php
    require_once 'inc/layout/header.php';
    require_once 'inc/layout/nav.php';

    include 'admin/fun/conexion.php';



    $res1=$con->query("SELECT * FROM b_libro JOIN b_categoria USING(id_categoria) 
    ORDER BY RAND()  LIMIT 0, 4 ");



    

?>

<main role="main" class="container">
    <div class="d-flex align-items-center p-3 mt-3 text-white-50 bg-primary rounded box-shadow">
        <div class="w-100 d-flex ">
            <h3 class="mb-0 text-white lh-100 p-2 w-40">Consultar texto </h3>
            <div class="for-group p-2 w-40">
                <form action="#" method="POST">
                    <div class="form-row">
                        <div class="col-md-8">
                             <input type="search" name="buscar" class="form-control w-30" placeholder="Buscar texto">
                        </div>
                        <div class="col">
                            <input type="hidden" name="accion" value="search">
                             <input type="submit" value="Buscar" class="btn btn-dark">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="mb-3 p-3 bg-white rounded box-shadow">
   <?php  if (isset($_POST['accion'])) { 
        $buscar=$_POST['buscar'];
        $res_bus=$con->query("SELECT * FROM b_libro JOIN b_categoria USING(id_categoria) 
                            WHERE UPPER(titulo) LIKE UPPER('%".$buscar."%') " );
        $num_filas=mysqli_num_rows($res_bus);
        if ($num_filas>0) {  ?>
              <h6 class="border-bottom border-gray pb-2 mb-0">Se Encontraron <?php echo $num_filas ;?> Resultados</h6>

            <?php  while($row_bus=$res_bus->fetch_assoc()){ ?>
            <div class="media text-muted pt-3">
                <img class="mr-2 rounded" src="img/libro.png" data-holder-rendered="true" style="width: 32px; height: 32px;">
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <strong class="text-gray-dark "><?php echo $row_bus['titulo'] ?></strong>
                        <strong  class="text-white rounded   bg-<?php echo $row_bus['disponibilidad']==1 ? 'success' : 'warning' ?> "><?php echo $row_bus['disponibilidad']==1 ? 'Disponible' : 'En Sala' ?></strong>

                    </div>
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <span class="d-block pr-2"><?php echo $row_bus['resumen'] ?></span>
                        <a href="libro.php?id=<?php echo $row_bus['id_libro'] ?>">Ver Libro</a>

                    </div>
                    
                </div>
            </div>
            <?php } ?>
 
       <?php }else {?>
        <h6 class="border-bottom border-gray pb-2 mb-0">No se Encontraron Resultados</h6>

        <?php }?>
   
      
    <?php } ?>

        

    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Sugerencias</h6>


        <?php  while($row1=$res1->fetch_assoc()){ ?>
        <div class="media text-muted pt-3">
            <img class="mr-2 rounded" src="img/libro.png" data-holder-rendered="true" style="width: 32px; height: 32px;">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark"><?php echo $row1['titulo'] ?></strong>
                    <a href="libro.php?id=<?php echo $row1['id_libro'] ?>">Ver Libro</a>
                </div>
                <span class="d-block"><?php echo $row1['resumen'] ?></span>
            </div>
        </div>
        <?php } ?>
        <small class="d-block text-right mt-3">
            <b><a href="index.php">Ver Todos...</a></b>
        </small>
    </div>
</main>

<?php
    require_once 'inc/layout/footer.php';

?>