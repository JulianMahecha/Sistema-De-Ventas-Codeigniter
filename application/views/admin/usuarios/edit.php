<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuarios
            <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if (isset($error) && $error == 1) : ?>
        <div class="alert alert-danger" role="alert">
            Debes introducir informacion para poder almacenarla
        </div>
        <?php endif; ?>
        <?php if (isset($error) && $error == 0) : ?>
        <div class="alert alert-success" role="alert">
            Usuario Agregado
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

                        <form action="<?php echo base_url(); ?>/administrador/Usuarios_Controller/update" method="POST">
                            <input type="hidden" value="<?php echo $usuario->id ?>" name="id" id="id">
                            <div class="form-group <?php echo !empty(form_error("nombres")) ? 'has-error' : ''; ?>">
                                <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $usuario->nombres ?>">
                                <?php echo form_error("nombres", "<span class='help-block'>", "</span>") ?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("apellidos")) ? 'has-error' : ''; ?>">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario->apellidos ?>">
                                <?php echo form_error("apellidos", "<span class='help-block'>", "</span>") ?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("telefono")) ? 'has-error' : ''; ?>">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usuario->telefono ?>">
                                <?php echo form_error("telefono", "<span class='help-block'>", "</span>") ?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("email")) ? 'has-error' : ''; ?>">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $usuario->email ?>">
                                <?php echo form_error("email", "<span class='help-block'>", "</span>") ?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("nusuario")) ? 'has-error' : ''; ?>">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario->user ?>">
                                <?php echo form_error("usuario", "<span class='help-block'>", "</span>") ?>
                            </div>
                            <div>
                                <label for="rol">Roles</label>
                                <select name="rol" id="rol" class="form-control" selected="<?php echo $usuario->rol_id ?>">
                                    <?php foreach ($roles as $rol) : ?>
                                    <option value="<?php echo $rol->id ?>"><?php echo $rol->nombre ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <hr>
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="reset" class="btn btn-primary btn-flat">Limpiar</button>
                                <a href="<?php echo base_url(); ?>administrador/Usuarios_Controller" class="btn btn-danger btn-flat">Regresar</a>
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