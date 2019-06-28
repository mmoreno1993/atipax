<!DOCTYPE html>
<html lang="en">
<head>
	<title>Atipax Group - Panel de administrador</title>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="Phoenixcoded">
	<meta name="keywords"
		  content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab" rel="stylesheet">
	<!-- Favicon icon -->
	<link rel="shortcut icon" href="<?=base_url("/assets/admin/images/favicon.png");?>" type="image/x-icon">
	<link rel="icon" href="<?=base_url("/assets/admin/images/favicon.ico");?>" type="image/x-icon">

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="<?=base_url("/assets/admin/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="<?=base_url("/assets/admin/icon/icofont/css/icofont.css");?>">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?=base_url("/assets/admin/plugins/bootstrap/css/bootstrap.min.css");?>">

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="<?=base_url("/assets/admin/css/main.css");?>">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="<?=base_url("/assets/admin/css/responsive.css");?>">

	<!--color css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("/assets/admin/css/color/color-3.min.css");?>" id="color"/>
    
    <!--font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">



</head>
<body>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material">
						<div class="text-center">
							<img src="<?=base_url("/assets/admin/images/logo-blue.png");?>" alt="logo">
						</div>
						<h3 class="text-center txt-primary">
							Panel de administración
                        </h3>
                        <p align="center"><i id="login_message" class="text-center txt-warning"></i></p>
						<div class="md-input-wrapper">
							<input id="username" type="text" class="md-form-control" />
							<label>Usuario</label>
						</div>
						<div class="md-input-wrapper">
							<input id="password" type="password" class="md-form-control" />
							<label>Contraseña</label>
						</div>
						<div class="row">
							<div class="col-sm-6 col-xs-12">
							
                            </div>
                            <!--
							<div class="col-sm-6 col-xs-12 forgot-phone text-right">
								<a href="forgot-password.html" class="text-right f-w-600"> Recuperar Contraseña</a>
                            </div>
                            -->
                            <br><br>
						</div>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button id="btn-login" type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" onClick="login()">INGRESAR</button>
                            </div>
						</div>
						<!-- <div class="card-footer"> -->
						<div class="col-sm-12 col-xs-12 text-center">
							<span class="text-muted">Copyright © 2019 Atipax Group</span>
						</div>

						<!-- </div> -->
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>

<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
	<h1>Warning!!</h1>
	<p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
	<div class="iew-container">
		<ul class="iew-download">
			<li>
				<a href="http://www.google.com/chrome/">
					<img src="assets/admin/images/browser/chrome.png" alt="Chrome">
					<div>Chrome</div>
				</a>
			</li>
			<li>
				<a href="https://www.mozilla.org/en-US/firefox/new/">
					<img src="assets/admin/images/browser/firefox.png" alt="Firefox">
					<div>Firefox</div>
				</a>
			</li>
			<li>
				<a href="http://www.opera.com">
					<img src="assets/admin/images/browser/opera.png" alt="Opera">
					<div>Opera</div>
				</a>
			</li>
			<li>
				<a href="https://www.apple.com/safari/">
					<img src="assets/admin/images/browser/safari.png" alt="Safari">
					<div>Safari</div>
				</a>
			</li>
			<li>
				<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
					<img src="assets/admin/images/browser/ie.png" alt="">
					<div>IE (9 & above)</div>
				</a>
			</li>
		</ul>
	</div>
	<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jqurey -->

<script src="<?=base_url("/assets/admin/plugins/jquery-ui/jquery-ui.min.js");?>"></script>
<script src="<?=base_url("/assets/admin/plugins/tether/dist/js/tether.min.js");?>"></script>
<!-- Required Fremwork -->
<script src="<?=base_url("/assets/admin/plugins/bootstrap/js/bootstrap.min.js");?>"></script>
<!-- waves effects.js -->
<script src="<?=base_url("/assets/admin/plugins/Waves/waves.min.js");?>"></script>
<!-- Custom js -->
<script type="text/javascript" src="<?=base_url("/assets/admin/pages/elements.js");?>"></script>

<script type="text/javascript">

function validar_inputs(){
    if(!$("#username").val() || !$("#password").val()){
        return false;
    }

    return true;
}

function login(){
    $("#login_message").html("");
    if(validar_inputs() == false){
        $("#login_message").html("Por favor ingrese sus credenciales");
        return false;
    }

    $("#btn-login").html("<i class='txt-white fas fa-spinner fa-spin'></i>");
    var username = $("#username").val();
    var password = $("#password").val();

    $.ajax({
        type: "POST",
        url: "<?=base_url('/admin/login/signin');?>",
        async: true,
        dataType: "json",
        data: {
            usuario: username,
            password: password
        },
        success: function(data){
            console.log(data);
            if(data.login){
                window.location.href = "<?=base_url("/admin/dashboard");?>";
            }else{
                $("#login_message").html("Credenciales incorrectas");
            }
            $("#btn-login").html("INGRESAR");
        },
    });
}

</script>
</body>
</html>