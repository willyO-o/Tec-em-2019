<?php
    require_once 'inc/layout/header.php';
    require_once 'inc/layout/nav.php';

    include 'admin/fun/conexion.php';

    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        if (!is_numeric($id)) {
            $_die("ERROR: dato invalido");
        }

        $res=$con->query("SELECT * FROM b_libro JOIN b_categoria USING(id_categoria)  
                            WHERE id_libro = '$id' ");
    }
    

    $res1=$con->query("SELECT * FROM b_libro JOIN b_categoria USING(id_categoria) 
    ORDER BY RAND()  LIMIT 0, 4 ");

?>

<main role="main" class="container">
    <div class="d-flex align-items-center p-3 mt-3 text-white-50 bg-primary rounded box-shadow">
        <div class="w-100 d-flex justify-content-center">
            <h3 class="mb-0 text-white lh-100 ">Lista de Libros </h3>
        </div>
    </div>

    <div class="mb-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Descripcion del Libro  </h6>

        <?php  while($row=$res->fetch_assoc()){ ?>
        <div class="media text-muted pt-3">
            <img class="mr-2 rounded" src="img/libro-rojo.jpg"
                data-holder-rendered="true" style="width: 102px; height: 102px;">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark"><?php echo $row['titulo'] ?></strong>
                    <strong  class="text-white rounded   bg-<?php echo $row['disponibilidad']==1 ? 'success' : 'warning' ?> "><?php echo $row['disponibilidad']==1 ? 'Disponible' : 'En Sala' ?></strong>
                </div>
                <span class="d-block"><?php echo $row['resumen'] ?></span>
<br><br>
                
                    <p>Autor:  <strong class="text-gray-dark"> <?php echo $row['autor'] ?></strong></p> 
                    <p>Categoria:<strong class="text-gray-dark"> Categoria: <?php echo $row['categoria'] ?></strong></p>
                
            </div>
        </div>
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