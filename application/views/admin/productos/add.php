<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Productos
            <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if (isset($error) && $error == 1): ?>
        <div class="alert alert-danger" role="alert">
            Los campos Nombres, Apellidos y Telefono son obligatorios.
        </div>
        <?php endif; ?>
        <?php if (isset($error) && $error == 0): ?>
        <div class="alert alert-success" role="alert">
            Producto Agregado
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
                        <form action="<?php echo base_url(); ?>/mantenimiento/Productos/store" method="POST">
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" >
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="text" class="form-control" id="precio" name="precio">
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock">
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <input type="text" class="form-control" id="categoria" name="categoria">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="reset" class="btn btn-primary btn-flat">Limpiar</button>
                                <a href="<?php echo base_url(); ?>mantenimiento/Productos" class="btn btn-danger btn-flat">Regresar</a>
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