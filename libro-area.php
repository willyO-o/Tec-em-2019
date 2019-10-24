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
                            WHERE id_categoria = '$id' ");   
    }else {
        $res=$con->query("SELECT * FROM b_libro JOIN b_categoria USING(id_categoria)  
                            ORDER BY RAND()  LIMIT 0, 4 ");
    }
    


    $res3=$con->query("SELECT * FROM b_categoria");

?>
<main role="main" class="container">

    <div class="row">
        <div class="col-3 m-0  p-0 pl-3">
            <div class="d-flex align-items-center p-3 mt-3 text-white-50 bg-primary rounded box-shadow">
                <div class="w-100 d-flex justify-content-center">
                    <h3 class="mb-0 text-white lh-100 ">Categorias </h3>
                </div>
            </div>
            <div class="nav flex-column nav-pills  bg-white" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                <?php  while($row3=$res3->fetch_assoc()){ ?>
                    <a href="?id=<?php echo $row3['id_categoria'] ?>" class="nav-link "><?php echo $row3['categoria'] ?></a>
                <?php } ?>
            </div>
        </div>

        <div class="col-9 m-0  p-0 pr-3">

            <div class="d-flex align-items-center p-3 mt-3 text-white-50 bg-primary rounded box-shadow">
                <div class="w-100 d-flex justify-content-center">
                    <h3 class="mb-0 text-white lh-100 ">Lista  de Libros por Categorias</h3>
                </div>
            </div>

            <div class="mb-3 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Descripcion del Libro </h6>

                <?php  while($row=$res->fetch_assoc()){ ?>
                <div class="media text-muted pt-3">
                    <img class="mr-2 rounded" src="img/libro.png" data-holder-rendered="true"
                        style="width: 32px; height: 32px;">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark"><?php echo $row['titulo'] ?></strong>
                            <strong
                                class="text-white rounded   bg-<?php echo $row['disponibilidad']==1 ? 'success' : 'warning' ?> "><?php echo $row['disponibilidad']==1 ? 'Disponible' : 'En Sala' ?></strong>
                        </div>

                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span class="d-block"><?php echo $row['resumen'] ?></span>
                            <a class="text-right w-100" href="libro.php?id=<?php echo $row['id_libro'] ?>">Ver Libro</a>
                        </div>

                    </div>
                </div>
                <?php } ?>


            </div>


        </div>
    </div>


</main>




<?php
    require_once 'inc/layout/footer.php';

?>