<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Clientes
            <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if (isset($error) && $error == 1) : ?>
        <div class="alert alert-danger" role="alert">
            Los campos Nombres, Documento y Telefono son obligatorios.
        </div>
        <?php endif; ?>
        <?php if (isset($error) && $error == 0) : ?>
        <div class="alert alert-success" role="alert">
            Cliente Agregado
        </div>
        <?php endif; ?>
        <?php if (isset($error) && $error == 2) : ?>
        <div class="alert alert-success" role="alert">
            No se pudo guardar la informacion
        </div>
        <?php endif; ?>
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/mantenimiento/clientes/store" method="POST">
                            <div class="form-group <?php echo !empty(form_error('nombre'))?'has-error':''; ?>">
                                <label for="nombre">Nombres</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" name="nombres" value="<?php echo set_value("nombre")?>">
                                <?php echo form_error('nombre', '<span class = "help-block">', '</span>')?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('telefono'))?'has-error':''; ?>">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                                <?php echo form_error('telefono', '<span class = "help-block">', '</span>')?>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion">
                            </div>
                            <div class="form-group">
                                <label for="tipo_cliente">Tipo Cliente</label>
                                <select class="form-control" name="tipo_cliente" id="tipo_cliente">
                                    <?php foreach ($tipo_clientes as $tipo_cliente) : ?>
                                    <option value="<?php echo $tipo_cliente->id ?>">
                                        <?php echo $tipo_cliente->nombre ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('documento'))?'has-error':''; ?>">
                                <label for="documento">Numero Documento</label>
                                <input type="text" class="form-control" id="documento" name="documento" value="<?php echo set_value("documento")?>">
                                <?php echo form_error('documento', '<span class = "help-block">', '</span>')?>
                            </div>
                            <div class="form-group">
                                <label for="tipo_documento">Tipo Documento</label>
                                <select class="form-control" name="tipo_documento" id="tipo_documento">
                                    <?php foreach ($tipo_documentos as $tipo_documento) : ?>
                                    <option value="<?php echo $tipo_documento->id ?>">
                                        <?php echo $tipo_documento->nombre ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="reset" class="btn btn-primary btn-flat">Limpiar</button>
                                <a href="<?php echo base_url(); ?>mantenimiento/Clientes" class="btn btn-danger btn-flat">Regresar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div> 