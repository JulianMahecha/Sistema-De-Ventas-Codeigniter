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
        <?php if (isset($error) && $error == 1): ?>
        <div class="alert alert-danger" role="alert">
            Debes introducir informacion para poder almacenarla
        </div>
        <?php endif; ?>
        <?php if (isset($error) && $error == 0): ?>
        <div class="alert alert-success" role="alert">
            Categoria Agregada
        </div>
        <?php endif; ?>
        <?php if (isset($error) && $error == 2): ?>
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
                        <form action="<?php echo base_url(); ?>/mantenimiento/categorias/update" method="POST">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $categoria->id ?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $categoria->nombre ?>">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $categoria->descripcion ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="reset" class="btn btn-primary btn-flat">Limpiar</button>
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