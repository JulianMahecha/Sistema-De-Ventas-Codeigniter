<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.1
    </div>
    <strong>Copyright &copy; 2019 <a href="https://#">CHIEFS DEVELOPERS</a>.</strong> All rights
    reserved.
</footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/template//datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>
<script>
    /* JQuery para prevenir la eliminacion de Clientes, si el usuario acepta la funcion devuelve mantenimiento/Clientes */
    $(document).ready(function() {
        var base_url = "<?php echo base_url(); ?>";

        $(document).on("click", '.btn-remove', function(e) {
            e.preventDefault();
            if (confirm("Esta seguro de eliminar el registro?")) {
                var $ruta = $(this).attr("href");
                $.ajax({
                    url: $ruta,
                    type: "POST",
                    success: function(response) {
                        window.location.href = base_url + response;
                    }
                });
            }
        })
        /* JQuery para prevenir la eliminacion de Productos, si el usuario acepta la funcion devuelve mantenimiento/Clientes */
        $(document).on("click", '.btn-pr-remove', function(e) {
            e.preventDefault();
            if (confirm("Esta seguro de eliminar el registro?")) {
                var $ruta = $(this).attr("href");
                $.ajax({
                    url: $ruta,
                    type: "POST",
                    success: function(response) {
                        window.location.href = base_url + response;
                    }
                });
            }
        })

        /* JQuery para modal de Categorias*/
        $(".btn-view").on("click", function() {

            var id = $(this).val();
            $.ajax({
                url: base_url + "mantenimiento/Categorias/view/" + id,
                type: "POST",
                success: function(resp) {
                    $("#modal-default .modal-body").html(resp);
                }
            })

        })
        /* JQuery para modal de Clientes*/
        $(".btn-cl-view").on("click", function() {

            var id = $(this).val();
            $.ajax({
                url: base_url + "mantenimiento/Clientes/view/" + id,
                type: "POST",
                success: function(resp) {
                    $("#modal-default .modal-body").html(resp);
                }
            })

        })
        /* Sobreescribiendo Datatables*/
        $('#example1').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "primero",
                    "last": "ultimo",
                    "previous": "Anterior",
                    "next": "Siguiente"
                }
            }
        });
        $('#example1').DataTable();
        $('.sidebar-menu').tree()
    })
</script>
</body>

</html> 