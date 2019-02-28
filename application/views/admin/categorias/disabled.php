<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categoria
            <small>Deshabilitadas</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>mantenimiento/Categorias/" class="btn btn-primary btn-flat"><span class="fa fa-backward"> Regresar</span></a>
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
                                            <a href="<?php echo base_url();?>mantenimiento/Categorias/enable/<?php echo $categoria->id;?>" class="btn btn-info"><span class="fa fa-upload"></span></a>
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