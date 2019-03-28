<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Clientes
            <small>List</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <?php if ($permisos->p_insert == 1) : ?>
                        <div class="col-md-12">
                            <a href="<?php echo base_url(); ?>mantenimiento/Clientes/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"> Agregar Cliente</span></a>
                        </div>
                    <?php endif; ?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Tipo Cliente</th>
                                    <th>Tipo documento</th>
                                    <th>documento</th>
                                    <th>Telefono</th>
                                    <th>direccion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($clientes)) : ?>
                                <?php foreach ($clientes as $cliente) : ?>
                                <tr>
                                    <td>
                                        <?php echo $cliente->id; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente->nombres; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente->tipocliente; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente->tipodocumento; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente->num_documento; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente->telefono; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente->direccion; ?>
                                    </td>
                                    <?php $datacliente = $cliente->id . "*" . $cliente->nombres . "*" . $cliente->tipocliente . "*" . $cliente->tipodocumento . "*" . $cliente->num_documento . "*" . $cliente->telefono . "*" . $cliente->direccion; ?>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-cl-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $datacliente ?>">
                                                <span class="fa fa-search"></span>
                                            </button>
                                            <?php if($permisos->p_update == 1):?>
                                            <a href="<?php echo base_url(); ?>mantenimiento/Clientes/edit/<?php echo $cliente->id; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                            <?php endif;?>
                                            <?php if($permisos->p_delete == 1):?>
                                            <a href="<?php echo base_url(); ?>mantenimiento/Clientes/delete/<?php echo $cliente->id; ?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                            <?php endif;?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info de Cliente</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 