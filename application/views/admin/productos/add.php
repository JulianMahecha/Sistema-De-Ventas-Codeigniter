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
            Los campos Codigo, Nombre, Precio, Stock y Categoria son obligatorios.
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
                            <div class="form-group <?php echo !empty(form_error('codigo'))?'has-error':''; ?>">
                                <label for="codigo">Codigo</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" value = "<?php echo set_value('codigo')?>">
                                <?php echo form_error('codigo', '<span class = "help-block">', '</span>')?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('nombre'))?'has-error':''; ?>">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value = "<?php echo set_value('nombre')?>">
                                <?php echo form_error('nombre', '<span class = "help-block">', '</span>')?>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="form-group <?php echo !empty(form_error('precio'))?'has-error':''; ?>">
                                <label for="precio">Precio</label>
                                <input type="text" class="form-control" id="precio" name="precio" value = "<?php echo set_value('precio')?>">
                                <?php echo form_error('precio', '<span class = "help-block">', '</span>')?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('stock'))?'has-error':''; ?>">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock" value = "<?php echo set_value('stock')?>">
                                <?php echo form_error('stock', '<span class = "help-block">', '</span>')?>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select class="form-control"name="categoria" id="categoria">
                                <?php foreach($categorias as $categoria):?>
                                    <option value="<?php echo $categoria->id?>"><?php echo $categoria->nombre?></option>
                                <?php endforeach;?>
                                </select>
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