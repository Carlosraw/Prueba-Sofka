<?php
include_once URL_APP . '/views/resources/header.php';
?>

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            
            </div>

            <div class="modal-body">
                <h3 class="text-center">Insertar nueva nave</h3>

                <form action="<?php echo URL_PROJECT ?>/app/views/pages/home/registrar" method="POST">

                    <div class="form-group">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <select name="tipo" id="tipo" class="form-control mb-3" required>
                            <option value="" disabled selected>Seleccione el tipo</option>
                            <option value="Lanzadera">Lanzadera</option>
                            <option value="Tripulada">Tripulada</option>
                            <option value="NoTripulada">NoTripulada</option>
                            <option value="Estacion">Estacion</option>
                    </div>
                          
                    <div class="form-group">
                        <input type="text" name="pais" id="pais" class="form-control" placeholder="Pais" required>
                    </div>

                    <div class="form-group"> 
                        <input type="text" name="pais" id="pais" class="form-control" placeholder="Combustible" required>
                    </div>

                    <div class="form-group">
                        <select name="atr_especial" id="atr_especial" class="form-control mb-3" required>
                            <option value="" disabled selected>Seleccione el atributo especial</option>
                            <option value="Empuje">Empuje</option>
                            <option value="NumTripulantes">NumTripulantes</option>
                            <option value="Mision">Mision</option>
                            <option value="Area">Area</option>
                    </div>

                    <div class="form-group">
                        <input type="text" name="valor_atr_especial" id="valor_atr_especial" class="form-control" placeholder="Valor del Atributo Especial" required>
                    </div>

                    <button class="btn btn-success btn-block">Guardar nave</button>

                </form>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-3">
    <div class="contenido-acciones-formulario-naves mb-3">
        <div class="boton-crear-nueva-nave">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">Nueva nave</button>
        </div>
        <div class="formulario-buscar-nave">
            <form action="<?php echo URL_PROJECT ?>/home" method="POST" class="form-inline">
                <div class="form-group mr-2">
                    <input type="search" name="buscar" id="buscar" class="form-control" placeholder="Buscar nave" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="tabla-vista-productos-acciones">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Pais</th>
                    <th>Combustible</th>
                    <th>Atributo Especial</th>
                    <th>Valor del Atributo Especial</th>
                    <th>Acciones</th>
                </tr>

                <?php foreach ($datos['naves'] as $datosNaves) : ?>
                    <tr>
                        <td><?php echo $datosNaves->id ?></td>
                        <td><?php echo $datosNaves->nombre ?></td>
                        <td><?php echo $datosNaves->tipo ?></td>
                        <td><?php echo $datosNaves->pais ?></td>
                        <td><?php echo $datosNaves->combustible ?></td>
                        <td><?php echo $datosNaves->atr_especial ?></td>
                        <td><?php echo $datosNaves->valor_atr_especial ?></td>
                        <td>
                            <a href="#" class="btn btn-info">Editar</a>
                            <a href="#" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>

                <?php endforeach ?>

            </table>
        </div>
    </div>
</div>

<?php
include_once URL_APP . '/views/resources/footer.php';
?>