<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ventas
            <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url(); ?>movimientos/Ctlr_Ventas/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"> Agregar Venta</span></a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Cliente</th>
                                    <th>Tipo de Comprobante</th>
                                    <th>Numero comprobante</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($ventas)) { ?>

                                    <?php foreach ($ventas as $venta) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $venta->id; ?>
                                            </td>
                                            <td>
                                                <?php echo $venta->nombres; ?>
                                            </td>
                                            <td>
                                                <?php echo $venta->tipocomprobante; ?>
                                            </td>
                                            <td>
                                                <?php echo $venta->num_documento; ?>
                                            </td>
                                            <td>
                                                <?php echo $venta->fecha; ?>
                                            </td>
                                            <td>
                                                <?php echo $venta->total; ?>
                                            </td>
                                            <td>
                                                <button type ="button" class ="btn btn-info btn-view-venta"
                                                value ="<?php echo $venta->id?>" data-toggle="modal" data-target="#modal-default">
                                                    <span class ="fa fa-search"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php }; ?>
                                <?php }; ?>
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
                <h4 class="modal-title">Información de la Venta</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-print" data-dismiss="modal"><span class ="fa fa-print"> Imprimir</span></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 