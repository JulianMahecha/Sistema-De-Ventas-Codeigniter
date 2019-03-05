<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Clientes
            <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="<?php echo base_url(); ?>/mantenimiento/clientes/update" method="POST">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $cliente->id ?>">
                            </div>
                            <div class="form-group <?php echo !empty(form_error('nombre'))?'has-error':''; ?>">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $cliente->nombres ?>">
                                <?php echo form_error('nombre', '<span class = "help-block">', '</span>')?>
                            </div>
                            <div class="form-group">
                                <label for="tipo_cliente">Tipo Cliente</label>
                                <select class="form-control" name="tipo_cliente" id="tipo_cliente">
                                    <?php foreach ($tipo_clientes as $tipo_cliente) : ?>
                                    <?php if ($tipo_cliente->id == $cliente->tipo_cliente_id) : ?>
                                    <option value="<?php echo $tipo_cliente->id ?>" selected>
                                        <?php echo $tipo_cliente->nombre ?>
                                    </option>
                                    <?php else : ?>
                                    <option value="<?php echo $tipo_cliente->id ?>">
                                        <?php echo $tipo_cliente->nombre ?>
                                    </option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipo_documento">Tipo Documento</label>
                                <select class="form-control" name="tipo_documento" id="tipo_documento">
                                    <?php foreach ($tipo_documentos as $tipo_documento) : ?>
                                    <?php if ($tipo_documento->id == $cliente->tipo_documento_id) : ?>
                                    <option value="<?php echo $tipo_documento->id ?>" selected>
                                        <?php echo $tipo_documento->nombre ?>
                                    </option>
                                    <?php else : ?>
                                    <option value="<?php echo $tipo_documento->id ?>">
                                        <?php echo $tipo_documento->nombre ?>
                                    </option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('documento'))?'has-error':''; ?>">
                                <label for="documento">Documento</label>
                                <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $cliente->num_documento ?>">
                                <?php echo form_error('documento', '<span class = "help-block">', '</span>')?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('telefono'))?'has-error':''; ?>">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $cliente->telefono ?>">
                                <?php echo form_error('telefono', '<span class = "help-block">', '</span>')?>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $cliente->direccion ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="reset" class="btn btn-primary btn-flat">Reset</button>
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