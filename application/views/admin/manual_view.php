<?php
    echo $html;
?>
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
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
						<div class="form-group">
                            <label for="txtTitulo">Titulo(*):</label>
                            <input maxlength="50" onkeypress="return fn_apos(event)" class="form-control" type="text" id="txtTitulo" name="txtTitulo" />
                            <input class="form-control" type="hidden" id="txtId" name="txtId" value="0" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
						<div class="form-group">
                            <label for="txtImagen">Imagen(*):</label>
                            <input maxlength="255" onkeypress="return fn_apos(event)" class="form-control" accept="image/png, image/jpeg, image/jpg" type="file" id="txtImagen" name="txtImagen" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
						<div class="form-group">
                            <label for="txtManual">Manual(*):</label>
                            <input class="form-control" type="file" id="txtManual" name="txtManual" accept="image/png, image/jpeg, image/jpg" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="cbCategoria">Categoria:</label>
                            <select id="cbCategoria" class="form-control">
                            	<?=$categorias?>
                            </select>
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
	function fn_apos(e)
	{
		tecla = (document.all) ? e.keyCode : e.which;
        if (tecla == 39 || tecla == 32)
            return false;
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
		$("#txtTitulo").val("");
		$("#txtImagen").val("");
		$("#txtManual").val("");
	    $("#cbCategoria").html("<?=$categorias?>");
	    $("#md_titulo").html("Agregar");
	}
	function consultar(id)
	{
		limpiar();
		$("#txtId").val(id);
    	$.ajax({
	        type: "POST",
	        url: "<?=base_url('/admin/manuales/obtener');?>",
	        async: true,
	        dataType: "json",
	        data: {
	            id: id
	        },
	        success: function(data){
	            if(data.respuesta == 1)
	            {
					$("#txtTitulo").val(data.titulo);
					if(data.categoria_id == null)
						data.categoria_id = "null";
				    $("#cbCategoria").val(data.categoria_id);
				    $("#md_titulo").val("Modificar");
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
            url: "<?=base_url('/admin/manuales/cambiar_estado');?>",
            data: {
                id: id,
                estado: estado
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
	    var titulo = $("#txtTitulo").val();
	    var imagen = $("#txtImagen")[0].files[0];
	    var manual = $("#txtManual")[0].files[0];
	    var categoria = $("#cbCategoria").val();
		var formData = new FormData();
		formData.append("id", id);
		formData.append("titulo", titulo);
		if($("#txtImagen")[0].files.length != 0)
			formData.append("imagen", imagen, imagen.name);
		if($("#txtManual")[0].files.length != 0)
			formData.append("manual", manual,manual.name);
		formData.append("categoria", categoria);
	    if(titulo == "")
	    {
            swal(
                'Falta completar',
                'El campo titulo es obligatorio',
                'warning'
            )
            return false;
	    }
	    if(id == 0)
	    {
	    	if($("#txtImagen")[0].files.length == 0)
		    {
	            swal(
	                'Falta completar',
	                'El campo imagen es obligatorio',
	                'warning'
	            )
	            return false;
		    }
		    if($("#txtManual")[0].files.length == 0)
		    {
	            swal(
	                'Falta completar',
	                'El campo manual es obligatorio',
	                'warning'
	            )
	            return false;
		    }
	    }
		    
	    $('#btnGuardar').attr("disabled","disabled");
	    if(id == "0")
	    {
	    	$.ajax({
		        type: "POST",
		        url: "<?=base_url('/admin/manuales/agregar');?>",
		        async: true,
                enctype: 'multipart/form-data',
                mimeType: 'multipart/form-data',
                processData:false,
                contentType:false,
                dataType: "json",
		        data: formData,
		        success: function(data){
		            $('#mdFormulario').modal('toggle');
		            if(data == 1)
		            {
		                swal({
		                    title: 'Correcto',
		                    text: 'Se agrego el manual nuevo',
		                    icon: 'success',
		                    timer: 1500,
		                    buttons: false
		                    }).then(
		                    function () {
		                        window.location.href = "<?=base_url('/admin/manuales');?>";
		                    },
		                    function (dismiss) {
		                        if (dismiss === 'timer') {
		                            window.location.href = "<?=base_url('/admin/manuales');?>";
		                        }
		                });
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
		        url: "<?=base_url('/admin/manuales/modificar');?>",
		        async: true,
                enctype: 'multipart/form-data',
                mimeType: 'multipart/form-data',
                processData:false,
                contentType:false,
                dataType: "json",
		        data: formData,
		        success: function(data){
		            $('#mdFormulario').modal('toggle');
		            if(data == 1)
		            {
		            	swal({
		                    title: 'Correcto',
		                    text: 'Se modifico el manual',
		                    icon: 'success',
		                    timer: 1500,
		                    buttons: false
		                    }).then(
		                    function () {
		                        window.location.href = "<?=base_url('/admin/manuales');?>";
		                    },
		                    function (dismiss) {
		                        if (dismiss === 'timer') {
		                            window.location.href = "<?=base_url('/admin/manuales');?>";
		                        }
		                });
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
