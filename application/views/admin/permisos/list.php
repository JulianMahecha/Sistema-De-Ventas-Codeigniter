<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Permisos
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
                        <a href="<?php echo base_url(); ?>administrador/Permisos_Controller/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"> Agregar Permiso</span></a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Menu</th>
                                    <th>Rol</th>
                                    <th>Leer</th>
                                    <th>Insertar</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                    <?php if($accesos->p_delete == 1 || $accesos->p_update == 1 ):?>
                                    <th>Opciones</th>
                                    <?php endif;?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($permisos)) : ?>
                                <?php foreach ($permisos as $permiso) : ?>
                                <tr>
                                    <td>
                                        <?php echo $permiso->id; ?>
                                    </td>
                                    <td>
                                        <?php echo $permiso->menu; ?>
                                    </td>
                                    <td>
                                        <?php echo $permiso->rol; ?>
                                    </td>
                                    <td>
                                        <?php if ($permiso->p_read == 0) : ?>
                                        <span class="fa fa-times"></span>
                                        <?php else : ?>
                                        <span class="fa fa-check"></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($permiso->p_insert == 0) : ?>
                                        <span class="fa fa-times"></span>
                                        <?php else : ?>
                                        <span class="fa fa-check"></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($permiso->p_update == 0) : ?>
                                        <span class="fa fa-times"></span>
                                        <?php else : ?>
                                        <span class="fa fa-check"></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($permiso->p_delete == 0) : ?>
                                        <span class="fa fa-times"></span>
                                        <?php else : ?>
                                        <span class="fa fa-check"></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <?php if ($accesos->p_update == 1) : ?>
                                                <a href="<?php echo base_url(); ?>administrador/Permisos_Controller/edit/<?php echo $permiso->id; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                            <?php endif; ?>
                                            <?php if ($accesos->p_delete == 1) : ?>
                                                <a href="<?php echo base_url(); ?>administrador/Permisos_Controller/delete/<?php echo $permiso->id; ?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                                            <?php endif; ?>
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
<!-- /.modal  --> 