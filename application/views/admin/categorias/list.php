<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categoria
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
                        <a href="<?php echo base_url();?>mantenimiento/Categorias/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"> Agregar Categoria</span></a>
                        <a href="<?php echo base_url();?>mantenimiento/Categorias/disabled_cat" class="btn btn-primary btn-flat"><span class="fa fa-eye-slash"> Ver Categorias Deshabilitadas</span></a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($categorias)): ?>
                                <?php foreach ($categorias as $categoria): ?>
                                <tr>
                                    <td>
                                        <?php echo $categoria->id; ?>
                                    </td>
                                    <td>
                                        <?php echo $categoria->nombre; ?>
                                    </td>
                                    <td>
                                        <?php echo $categoria->descripcion; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-info"><span class="fa fa-eye"></span></a>
                                            <a href="<?php echo base_url();?>mantenimiento/Categorias/edit/<?php echo $categoria->id;?>" class="btn btn-warning" ><span class="fa fa-pencil"></span></a>
                                            <a href="<?php echo base_url();?>mantenimiento/Categorias/delete/<?php echo $categoria->id;?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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