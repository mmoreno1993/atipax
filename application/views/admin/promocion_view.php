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
    <div data-backdrop="static" class="modal fade bs-example-modal-sm" id="mdUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabez" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="mdUsuario_Titulo"><b>Información</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
						<div class="form-group">
                            <label for="txtUsuario">Usuario(*):</label>
                            <input maxlength="50" onkeypress="return fn_sin_espacio(event)" class="form-control" type="text" id="txtUsuario" name="txtUsuario" />
                            <input class="form-control" type="hidden" id="txtId" name="txtId" value="0" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
						<div class="form-group">
                            <label for="txtPassword">Password(*):</label>
                            <input maxlength="50" onkeypress="return fn_sin_espacio(event)" class="form-control" type="password" id="txtPassword" name="txtPassword" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
						<div class="form-group">
                            <label for="txtPasswordC">Conf. Password(*):</label>
                            <input maxlength="50" onkeypress="return fn_sin_espacio(event)" class="form-control" type="password" id="txtPasswordC" name="txttxtPasswordCPassword" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="txtNombre">Nombre:</label>
                            <input maxlength="60" onkeypress="return fn_sin_espacio(event)" class="form-control" type="text" id="txtNombre" name="txtNombre" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="txtApellidos">Apellidos:</label>
                            <input maxlength="100" onkeypress="return fn_espacio(event)" class="form-control" type="text" id="txtApellidos" name="txtApellidos" />    
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="cbRol">Rol:</label>
                            <select id="cbRol" class="form-control">
                            	<option value="1" selected>Cliente</option>
                            	<option value="10">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="txtEmail">Email:</label>
                            <input maxlength="60" class="form-control" type="email" id="txtEmail" name="txtEmail" />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="txtTelefono">Telefono:</label>
                            <input maxlength="9" onkeypress="return fn_solo_numeros(event)" class="form-control" type="number" id="txtTelefono" name="txtTelefono" />
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
		$("#txtUsuario").val("");
		$("#txtUsuario").removeAttr("readonly");
	    $("#txtNombre").val("");
	    $("#txtApellidos").val("");
	    $("#cbRol").val(1);
	    $("#txtEmail").val("");
	    $("#txtTelefono").val("");
	    $("#txtPassword").val("");
	    $("#txtPasswordC").val("");
	}
	function consultar(id)
	{
		limpiar();
		$("#txtId").val(id);
    	$.ajax({
	        type: "POST",
	        url: "<?=base_url('/admin/usuarios/obtener');?>",
	        async: true,
	        dataType: "json",
	        data: {
	            id: id
	        },
	        success: function(data){
	            if(data.respuesta == 1)
	            {
					$("#txtUsuario").val(data.usuario);
					$("#txtUsuario").attr("readonly","readonly");
				    $("#txtNombre").val(data.nombre);
				    $("#txtApellidos").val(data.apellidos);
				    $("#cbRol").val(data.rol);
				    $("#txtEmail").val(data.email);
				    $("#txtTelefono").val(data.telefono);
				    $('#mdUsuario').modal();
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
            url: "<?=base_url('/admin/usuarios/cambiar_estado');?>",
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
	    var usuario = $("#txtUsuario").val();
	    var nombre = $("#txtNombre").val();
	    var apellidos = $("#txtApellidos").val();
	    var rol = $("#cbRol").val();
	    var email = $("#txtEmail").val();
	    var telefono = $("#txtTelefono").val();
	    var password = $("#txtPassword").val();
	    var passwordc = $("#txtPasswordC").val();
	    var duplicado = false;
	    if(usuario == "")
	    {
            swal(
                'Falta completar',
                'El campo usuario es obligatorio',
                'warning'
            )
            return false;
	    }
	    if(id == "0")
	    {
		    if(password == "")
		    {
	            swal(
	                'Falta completar',
	                'El campo password es obligatorio',
	                'warning'
	            )
	            return false;
		    }
	    	$.ajax({
		        type: "POST",
		        url: "<?=base_url('/admin/usuarios/verificar_usuario');?>",
		        async: false,
		        dataType: "json",
		        data: {
		            usuario: usuario
		        },
		        success: function(data){
		        	console.log(data);
		            if(data == 1)
		            {
			            swal(
			                'Ocurrio un problema',
			                'El usuario que intenta agregar ya existe, pruebe otro',
			                'warning'
			            )
			            duplicado = true;
		            }
		        },
		    });
		    if(duplicado)
		    	return false;
		    
	    }
	    if(password != "" || passwordc != "")
	    {
	    	if(passwordc != password)
		    {
		    	swal(
	                'Error',
	                'Los campos password no son iguales',
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
		        url: "<?=base_url('/admin/usuarios/agregar');?>",
		        async: true,
		        dataType: "json",
		        data: {
		            id: id,
		            usuario: usuario,
		            password: password,
		            nombre: nombre,
		            apellidos: apellidos,
		            rol: rol,
		            email: email,
		            telefono: telefono
		        },
		        success: function(data){
		            $('#mdUsuario').modal('toggle');
		            if(data == 1)
		            {
		                swal({
		                    title: 'Correcto',
		                    text: 'Se agrego el usuario nuevo',
		                    icon: 'success',
		                    timer: 1500,
		                    buttons: false
		                    }).then(
		                    function () {
		                        window.location.href = "<?=base_url('/admin/usuarios');?>";
		                    },
		                    function (dismiss) {
		                        if (dismiss === 'timer') {
		                            window.location.href = "<?=base_url('/admin/usuarios');?>";
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
		        url: "<?=base_url('/admin/usuarios/modificar');?>",
		        async: true,
		        dataType: "json",
		        data: {
		            id: id,
		            password: password,
		            nombre: nombre,
		            apellidos: apellidos,
		            rol: rol,
		            email: email,
		            telefono: telefono
		        },
		        success: function(data){
		            $('#mdUsuario').modal('toggle');
		            if(data == 1)
		            {
		            	swal({
		                    title: 'Correcto',
		                    text: 'Se modifico el usuario',
		                    icon: 'success',
		                    timer: 1500,
		                    buttons: false
		                    }).then(
		                    function () {
		                        window.location.href = "<?=base_url('/admin/usuarios');?>";
		                    },
		                    function (dismiss) {
		                        if (dismiss === 'timer') {
		                            window.location.href = "<?=base_url('/admin/usuarios');?>";
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
