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
                    <div class="col-md-12">
                        <a href="<?php echo base_url(); ?>mantenimiento/Clientes/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"> Agregar Cliente</span></a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>RUT</th>
                                    <th>Empresa</th>
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
                                        <?php echo $cliente->apellidos; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente->telefono; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente->direccion; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente->rut; ?>
                                    </td>
                                    <td>
                                        <?php echo $cliente->empresa; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-cl-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $cliente->id ?>">
                                                <span class="fa fa-search"></span>
                                            </button>
                                            <a href="<?php echo base_url(); ?>mantenimiento/Clientes/edit/<?php echo $cliente->id; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                            <a href="<?php echo base_url(); ?>mantenimiento/Clientes/delete/<?php echo $cliente->id; ?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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
                <h4 class="modal-title">Info de Categoria</h4>
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