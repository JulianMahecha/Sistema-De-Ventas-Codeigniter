<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categoria
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
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/mantenimiento/categorias/update" method="POST">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $categoria->id ?>">
                            </div>
                            <div class="form-group <?php echo !empty(form_error("nombre"))?'has-error':'';?>">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control " id="nombre" name="nombre" value="<?php echo !empty(form_error("nombre"))?set_value("nombre"):$categoria->nombre?>">
                                <?php echo form_error("nombre", "<span class='help-block'>", "</span>")?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("descripcion"))?'has-error':'';?>">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $categoria->descripcion?>">
                                <?php echo form_error("descripcion", "<span class='help-block'>", "</span>")?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="reset" class="btn btn-primary btn-flat">Reset</button>
                                <a href="<?php echo base_url(); ?>mantenimiento/Categorias" class="btn btn-danger btn-flat">Regresar</a>
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