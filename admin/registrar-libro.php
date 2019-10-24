<?php
    require_once 'inc/header.php';
    
?>
<div id="wrapper">
    <?php   require_once 'inc/aside.php'; ?>
    <!-- Sidebar -->

 <?php
    include 'fun/conexion.php';
    $res=$con->query("SELECT * FROM b_categoria");
    $con->close();
?>

    <div id="content-wrapper">
        <!-- Breadcrumbs-->

        <div class="container-fluid">

            <div class="card card-register mx-auto mt-5">
                <div class="card-header">
                    <h4>Registrar Nuevo Libro <small>(todos los campos son obligatorios)</small></h4>
                </div>
                <div class="card-body">
                    <form action="procesos/procesar-libro.php" method="POST">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="formgroup">
                                        <label for="firstName">Titulo</label>
                                        <input type="text" name="titulo" id="titulo" class="form-control"
                                            placeholder="Titulo" required autofocus="autofocus">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">Autor</label>
                                        <input type="text" name="autor" id="autor" class="form-control"
                                            placeholder="Autor" required autofocus="autofocus">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="inputEmail">Resumen</label>
                                <textarea name="resumen" id="resumen" required rows="4" class="form-control"></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="">
                                        <label for=" inputPassword">Disponibilidad</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="disponibilidad1" required name="disponibilidad"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="disponibilidad1" >En
                                                Sala</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="disponibilidad2" required name="disponibilidad"
                                                class="custom-control-input" value="1" checked>
                                            <label class="custom-control-label" for="disponibilidad2"
                                                >Disponible</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cagoria">Seleccione Categoria</label>
                                        <select name="categoria" class="custom-select">
                                            <option value="0" selected><-- Seleccine--></option>
                                        <?php     while ($row=$res->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['id_categoria'] ?>" > <?php echo $row['categoria'] ?> </option>

                                        <?php } ?>

                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="accion" value="registrar">
                        <button type="submit" class="btn btn-primary btn-block">Registrar Libro</button>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3 btn btn-danger" href="index.php">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->

<br><br>
        <?php require_once 'inc/footer.php' ;?>