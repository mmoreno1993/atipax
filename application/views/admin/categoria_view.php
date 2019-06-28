<div class="col-md-12 col-xs-12">
	<div class="card">
		<div class="card-block">
			<div class="row">
				<div class="col-md-6 col-ls-6">
					<div class="form-group">
						<label for="cbCategorias">Categorias:</label>
						<select class="form-control" id="cbCategorias" onclick="cambiar_categoria();return false;">
							<?=$categorias;?>
						</select>
					</div>
				</div>
			</div>
		</div>	
		<div id="vista_html"></div>
	</div>
</div>
<style type="text/css">
	.modal-footer{
		border-top: 0px;
	}
    .modal-dialog{
        min-width: 340px;   
    }
</style>
<div class='col-md-12 col-xs-12'>
    <div data-backdrop="static" class="modal fade bs-example-modal-sm" id="mdFormulario" tabindex="-1" role="dialog" aria-labelledby="myModalLabez" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="md_titulo">Agregar</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="form-group">
                            <label for="txtNombre">Nombre(*):</label>
                            <input maxlength="70" onkeypress="return fn_apos(event)" class="form-control" type="text" id="txtNombre" name="txtNombre" />
                            <input class="form-control" type="hidden" id="txtId" name="txtId" value="0" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                	<button name="btnGuardar" id="btnGuardar" onclick="guardar();return false;" class="btn btn-primary"> Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	function cambiar_categoria()
	{
		var categoria = $("#cbCategorias").val();
		if(categoria == "null"){
			$("#vista_html").html("");
			return false;
		}
		$.ajax({
            type: "POST",
            async: true,
            url: "<?=base_url('/admin/categorias/lista');?>",
            data: {
                categoria: categoria
            },
            dataType: "json",
            complete: function (data) {
            	$("#vista_html").html(data.responseJSON.html);
            }
        });
	}
	function fn_sin_espacio(e)
	{
        tecla = (document.all) ? e.keyCode : e.which;
        patron = /[a-zA-ZÀ-ÿ\u00f1\u00d1]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
	}
	function fn_espacio(e)
	{
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla == 32) {
            return true;
        }
        patron = /[a-zA-ZÀ-ÿ\u00f1\u00d1]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
	}
	function fn_solo_numeros(e)
	{
		tecla = (document.all) ? e.keyCode : e.which;
        patron = /[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
	}
	function limpiar()
	{
		$("#txtId").val(0);
		$("#txtNombre").val("");
		$('#btnGuardar').removeAttr("disabled");
	    $("#md_titulo").html("Agregar");
	}
	function consultar(id)
	{
		limpiar();
		$("#txtId").val(id);
		var categoria = $("#cbCategorias").val();
    	$.ajax({
	        type: "POST",
	        url: "<?=base_url('/admin/categorias/obtener');?>",
	        async: true,
	        dataType: "json",
	        data: {
	            id: id,
	            categoria: categoria
	        },
	        success: function(data){
	            if(data.respuesta == 1)
	            {
					$("#txtNombre").val(data.nombre);
				    $("#md_titulo").html("Modificar");
				    $('#mdFormulario').modal();
	            }else
	            {
	            	swal(
		                'Error',
		                'Ocurrio un problema, por favor contacte con el programador',
		                'error'
		            )
	            }
	        },
	    });
	}
	function cambiar_estado(id,estado)
	{
		var categoria = $("#cbCategorias").val();
        var idEstado = "#cambiar" + id;
        var idCambiar = "#estado" + id;
		if(estado == 0)
		{
			$(idEstado).html("Inactivo");
			$(idEstado).removeClass("label-success");
            $(idEstado).addClass("label-danger");
            $(idCambiar).attr("onclick","cambiar_estado(" + id +",1);return false;");
            $(idCambiar).removeClass("btn-danger");
            $(idCambiar).addClass("btn-success");
            $(idCambiar).html("<i class='icofont icofont-check'></i>");
		}else
		{
			$(idEstado).html("Activo");
			$(idEstado).removeClass("label-danger");
            $(idEstado).addClass("label-success");
            $(idCambiar).attr("onclick","cambiar_estado(" + id +",0);return false;");
            $(idCambiar).removeClass("btn-success");
            $(idCambiar).addClass("btn-danger");
            $(idCambiar).html("<i class='icofont icofont-close'></i>");
		}
        $.ajax({
            type: "POST",
            async: true,
            url: "<?=base_url('/admin/categorias/cambiar_estado');?>",
            data: {
                id: id,
                estado: estado,
                categoria: categoria
            },
            dataType: "json",
            complete: function (data) {
            	if(data.responseJSON == 0)
            	{
		            swal(
		                'Error',
		                'Ocurrio un problema, por favor contacte con el programador',
		                'error'
		            )
					if(estado == 1)
					{
						$(idEstado).html("Inactivo");
						$(idEstado).removeClass("label-success");
			            $(idEstado).addClass("label-danger");
			            $(idCambiar).attr("onclick","cambiar_estado(" + id +",1);return false;");
			            $(idCambiar).removeClass("btn-danger");
			            $(idCambiar).addClass("btn-success");
			            $(idCambiar).html("<i class='icofont icofont-check'></i>");
					}else
					{
						$(idEstado).html("Activo");
						$(idEstado).removeClass("label-danger");
			            $(idEstado).addClass("label-success");
			            $(idCambiar).attr("onclick","cambiar_estado(" + id +",0);return false;");
			            $(idCambiar).removeClass("btn-success");
			            $(idCambiar).addClass("btn-danger");
			            $(idCambiar).html("<i class='icofont icofont-close'></i>");
					}
            	}
            }
        });
	}
	function guardar()
	{
		var id = $("#txtId").val();
	    var nombre = $("#txtNombre").val();
	    var categoria = $("#cbCategorias").val();
	    if(nombre == "")
	    {
            swal(
                'Falta completar',
                'El campo nombre es obligatorio',
                'warning'
            )
            return false;
	    }
	    $('#btnGuardar').attr("disabled","disabled");
	    if(id == "0")
	    {
	    	$.ajax({
		        type: "POST",
		        url: "<?=base_url('/admin/categorias/agregar');?>",
		        async: true,
		        dataType: "json",
		        data: {
		            id: id,
		            nombre: nombre,
		            categoria: categoria
		        },
		        success: function(data){
		            $('#mdFormulario').modal('toggle');
		            if(data == 1)
		            {
		                swal(
		                    'Correcto',
		                    'Se agrego la categoria nueva',
		                    'success',
		                );
		                cambiar_categoria();
		            }else
		            {
		            	swal(
			                'Error',
			                'Ocurrio un problema, por favor contacte con el programador',
			                'error'
			            )
		            }
		            limpiar();
		        },
		    });
	    }else{
	    	$.ajax({
		        type: "POST",
		        url: "<?=base_url('/admin/categorias/modificar');?>",
		        async: true,
		        dataType: "json",
		        data: {
		            id: id,
		            nombre: nombre,
		            categoria: categoria
		        },
		        success: function(data){
		            $('#mdFormulario').modal('toggle');
		            if(data == 1)
		            {
		                swal(
		                    'Correcto',
		                    'Se modifico la categoria',
		                    'success',
		                );
		                cambiar_categoria();
		            }else
		            {
		            	swal(
			                'Error',
			                'Ocurrio un problema, por favor contacte con el programador',
			                'error'
			            )
		            }
		        },
		    });
	    }
	}
</script>