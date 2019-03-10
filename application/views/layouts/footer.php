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
<!-- JQuery UI -->
<script src="<?php echo base_url(); ?>assets/template/jquery-ui/jquery-ui.js"></script>
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
        /* JQuery para modal de Productos*/
        $(".btn-pr-view").on("click", function() {

            var id = $(this).val();
            $.ajax({
                url: base_url + "mantenimiento/productos/view/" + id,
                type: "POST",
                success: function(resp) {
                    $("#modal-default .modal-body").html(resp);
                }
            })
        })
        /* JQuery para modal de Cliente que recibe el valor de el boton ($datacliente)*/
        $(".btn-cl-view").on("click", function() {

            var cliente = $(this).val();
            var infoCliente = cliente.split("*");
            html = "<p><strong>Nombre: </strong>" + infoCliente[1] + "</p>" +
                "<p><strong>Tipo Cliente: </strong>" + infoCliente[2] + "</p>" +
                "<p><strong>Tipo Documento: </strong>" + infoCliente[3] + "</p>" +
                "<p><strong>Documento: </strong>" + infoCliente[4] + "</p>" +
                "<p><strong>Telefono: </strong>" + infoCliente[5] + "</p>" +
                "<p><strong>Dirección: </strong>" + infoCliente[6] + "</p>"
            $("#modal-default .modal-body").html(html);

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
        $('.sidebar-menu').tree();

        /*#comprobantes */
        $("#comprobantes").on("change", function() {

            option = $(this).val();
            infoComprobante = option.split("*");

            if (option != "") {
                $("#idcomprobante").val(infoComprobante[0]);
                $("#iva").val(infoComprobante[3]);
                $("#serie").val(infoComprobante[4]);
                $('#numero').val(generarNumero(infoComprobante[2]));
            } else {
                $("#idcomprobante").val(null);
                $("#iva").val(null);
                $("#serie").val(null);
                $('#numero').val(null);
            }

            sumar();
        })

        /* ventas/add Boton para pasar informacion del modal a la plantilla add */

        $(".btn-check").on("click", function() {
            dataCliente = $(this).val();
            infoCliente = dataCliente.split("*");

            $("#idcliente").val(infoCliente[0]);
            $("#cliente").val(infoCliente[1]);
            $("#modal-default").modal("hide");

        })

        /* Campo Autocomplete Add Venta */
        $("#producto").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: base_url + "movimientos/Ctlr_Ventas/getProductos",
                    type: "POST",
                    dataType: "json",
                    data: {
                        valor: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 2,
            select: function(event, ui) {
                data = ui.item.id + "*" + ui.item.codigo + "*" + ui.item.label + "*" + ui.item.precio + "*" +
                    ui.item.stock;

                $("#btn-agregar").val(data);
            },
        });
        /* Recuperando informacion del boton agregar */
        $("#btn-agregar").on("click", function() {
            data = $(this).val();
            if (data != '') {
                infoProducto = data.split("*");
                html = "<tr>";
                html += "<td><input type='hidden' name='idproductos[]' value='" + infoProducto[0] + "'>" + infoProducto[1] + "</td>";
                html += "<td>" + infoProducto[2] + "</td>";
                html += "<td><input type='hidden' name='precios[]' value='" + infoProducto[3] + "'>" + infoProducto[3] + "</td>";
                html += "<td>" + infoProducto[4] + "</td>";
                html += "<td><input type ='text' name='cantidades[]' class='cantidades' value='1'></td>";
                html += "<td><input type='hidden' name='importes[]' value='" + infoProducto[3] + "'><p>" + infoProducto[3] + "</p></td>";
                html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class ='fa fa-remove'></span></button></td>";
                html += "<tr>";

                $("#tbventas tbody").append(html);
                sumar();
                $("#btn-agregar").val(null);
                $("#producto").val(null);
            } else {
                alert("Seleccione un producto");
            }

        });
        /* Eliminar fila de producto en venta */
        $(document).on("click", ".btn-remove-producto", function() {
            $(this).closest("tr").remove();
            sumar();
        });
        /* Modificar valor activamente */
        $(document).on("keyup", "#tbventas input.cantidades", function() {
            cantidad = $(this).val();
            precio = $(this).closest("tr").find("td:eq(2)").text();
            importe = cantidad * precio;

            $(this).closest("tr").find("td:eq(5)").children("p").text(importe);
            $(this).closest("tr").find("td:eq(5)").children("input").val(importe);

            sumar();
        });

    })

    /* Generador de numeros para factura */
    function generarNumero(numero) {
        if (numero >= 99999 && numero < 999999) {
            return Number(numero) + 1
        }
        if (numero >= 9999 && numero < 99999) {
            return "0" + (Number(numero)) + 1
        }
        if (numero >= 999 && numero < 9999) {
            return "00" + (Number(numero) + 1)
        }
        if (numero >= 99 && numero < 999) {
            return "000" + (Number(numero) + 1)
        }
        if (numero >= 9 && numero < 99) {
            return "0000" + (Number(numero) + 1)
        }
        if (numero < 9) {
            return "00000" + (Number(numero) + 1)
        }
    }

    function sumar() {
        subtotal = 0;
        $("#tbventas tbody tr").each(function() {
            subtotal += Number($(this).find("td:eq(5)").text());
        })
        $("input[name=subtotal]").val(subtotal);
        porcentaje = $("#iva").val();
        iva = subtotal * (porcentaje/100);
        $("input[name=iva]").val(iva);
        descuento = $("input[name=descuento]").val();
        total = subtotal + iva - descuento;
        $("input[name=total]").val(total);

    }

</script>
</body>

</html> 