<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Atipax Destinos</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=base_url('assets/web/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/web/css/correction_bootstrap.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/web/css/styles.css');?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="menu_web">
        <div class="logo text-center">
            <a href="index.html"><img src="<?=base_url('assets/web/img/atipax_group.png');?>" alt="Atipax Perú LOGO"></a>
        </div>
        <div class="menu_items">
            <div id="accordion">
                <!--
                <div class="panel panel_menu_list">
                    <li class="menu_group menu_section" data-slide-to="0" data-target="#slider_home"><a data-toggle="collapse" data-parent="#accordion" href="#peru">PERÚ Y CIRCUITOS</a></li>
                    <div id="peru" class="panel-collapse collapse in">
                        <div class="panel-body panel_menu">
                            <ul>
                                <li class="menu_group menu_section"><a href="#">COSTA</a></li>
                                <li class="menu_destinos"><a href="#">Chiclayo</a></li>
                                <li class="menu_destinos"><a href="#">Lima</a></li>
                                <li class="menu_destinos"><a href="#">Paracas</a></li>
                                <li class="menu_destinos"><a href="#">Ica</a></li>
                                <li class="menu_destinos"><a href="#">Nasca</a></li>
                                <li class="menu_destinos"><a href="#">Playas</a></li>
                                <li class="menu_destinos"><a href="#">Tacna</a></li>
                                <li class="menu_destinos"><a href="#">Trujillo</a></li>

                                <li class="menu_group menu_section"><a href="#">SIERRA</a></li>
                                <li class="menu_destinos"><a href="#">Arequipa</a></li>
                                <li class="menu_destinos"><a href="#">Ayacucho</a></li>
                                <li class="menu_destinos"><a href="#">Cajamarca</a></li>
                                <li class="menu_destinos"><a href="#">Chachapoyas</a></li>
                                <li class="menu_destinos"><a href="cusco.html">Cusco</a></li>
                                <li class="menu_destinos"><a href="#">Huaráz</a></li>
                                <li class="menu_destinos"><a href="#">Puno</a></li>

                                <li class="menu_group menu_section"><a href="#">SELVA</a></li>
                                <li class="menu_destinos"><a href="#">Iquitos</a></li>
                                <li class="menu_destinos"><a href="#">Pucallpa</a></li>
                                <li class="menu_destinos"><a href="#">Puerto Maldonado</a></li>
                                <li class="menu_destinos"><a href="#">Tarapoto</a></li>
                                <li class="menu_destinos"><a href="#">Selva Central</a></li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel_menu_list">
                    <li class="menu_group menu_section" data-slide-to="1" data-target="#slider_home"><a data-toggle="collapse" data-parent="#accordion" href="#america">AMÉRICA Y CARIBE</a></li>
                    <div id="america" class="panel-collapse collapse">
                        <div class="panel-body panel_menu">
                            <ul>
                                <li class="menu_group menu_section"><a href="#">CARIBE</a></li>
                                <li class="menu_destinos"><a href="aruba.html">Aruba</a></li>
                                <li class="menu_destinos"><a href="#">Curacao</a></li>
                                <li class="menu_destinos"><a href="#">Bahamas</a></li>
                                <li class="menu_destinos"><a href="#">Cancún</a></li>
                                <li class="menu_destinos"><a href="#">Cuba</a></li>
                                <li class="menu_destinos"><a href="#">Jamaica</a></li>
                                <li class="menu_destinos"><a href="#">República Dominicana</a></li>
                                <li class="menu_destinos"><a href="#">Riviera Maya</a></li>

                                <li class="menu_group menu_section"><a href="#">CENTRO AMÉRICA</a></li>
                                <li class="menu_destinos"><a href="#">Costa Rica</a></li>
                                <li class="menu_destinos"><a href="#">Mexico</a></li>
                                <li class="menu_destinos"><a href="#">Panama</a></li>
                                <li class="menu_group menu_section"><a href="suramerica.html">SURAMÉRICA</a></li>
                                <li class="menu_destinos"><a href="#">Argentina </a></li>
                                <li class="menu_destinos"><a href="#">Brasil</a></li>
                                <li class="menu_destinos"><a href="#">Colombia</a></li>
                                <li class="menu_destinos"><a href="#">Chile</a></li>
                                <li class="menu_destinos"><a href="#">Ecuador</a></li>
                                <li class="menu_destinos"><a href="#">Uruguay</a></li>
                                <li class="menu_group menu_section"><a href="#">USA</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel_menu_list">
                    <li class="menu_group menu_section" data-slide-to="2" data-target="#slider_home"><a data-toggle="collapse" data-parent="#accordion" href="#europa">EUROPA Y ORIENTE</a></li>
                    <div id="europa" class="panel-collapse collapse">
                        <div class="panel-body panel_menu">
                            <li class="menu_group menu_section"><a href="#">EUROPA</a></li>
                            <li class="menu_destinos"><a href="#">Alemania</a></li>
                            <li class="menu_destinos"><a href="#">Bulgaria</a></li>
                            <li class="menu_destinos"><a href="#">España</a></li>
                            <li class="menu_destinos"><a href="#">Francia</a></li>
                            <li class="menu_destinos"><a href="#">Inglaterra</a></li>
                            <li class="menu_destinos"><a href="#">Portugal</a></li>
                            <li class="menu_destinos"><a href="#">Países Bálticos</a></li>
                            <li class="menu_destinos"><a href="#">Italia</a></li>
                            <li class="menu_group menu_section"><a href="#">MEDIO ORIENTE</a></li>
                            <li class="menu_destinos"><a href="#">Alemania</a></li>
                            <li class="menu_destinos"><a href="#">Egipto</a></li>
                            <li class="menu_destinos"><a href="#">Grecia</a></li>
                            <li class="menu_destinos"><a href="#">Israel</a></li>
                            <li class="menu_destinos"><a href="#">Jordania</a></li>
                            <li class="menu_destinos"><a href="#">Turquia</a></li>
                            <li class="menu_destinos"><a href="#">Marruecos</a></li>
                            <li class="menu_group menu_section"><a href="#">ORIENTE</a></li>
                            <li class="menu_destinos"><a href="aruba.html">China</a></li>
                            <li class="menu_destinos"><a href="#">Camboya</a></li>
                            <li class="menu_destinos"><a href="#">India</a></li>
                            <li class="menu_destinos"><a href="#">Emiratos y Arabes</a></li>
                            <li class="menu_destinos"><a href="#">Japón</a></li>
                            <li class="menu_destinos"><a href="#">Tailandia</a></li>
                            <li class="menu_destinos"><a href="#">Vietnam</a></li>
                            <li class="menu_group menu_section"><a href="#">OCEANÍA Y ÁFRICA</a></li>
                            <li class="menu_destinos"><a href="aruba.html">Australia</a></li>
                            <li class="menu_destinos"><a href="#">kenya</a></li>
                            <li class="menu_destinos"><a href="#">Polinesia</a></li>
                            <li class="menu_destinos"><a href="#">Nueva Zelanda</a></li>
                            <li class="menu_destinos"><a href="#">Tanzania</a></li>
                            <li class="menu_destinos"><a href="#">Sudafrica</a></li>
                        </div>
                    </div>
                </div>
                -->
                <?=$menu_list;?>
                <li class="menu_group menu_section"><a href="<?=base_url("/flyers");?>">FLYERS</a></li>
                <li class="menu_group menu_section"><a href="<?=base_url("/manuales");?>">MANUALES</a></li>
                <li class="menu_group menu_section"><a href="<?=base_url("/catalogos");?>">CATÁLOGOS</a></li>
                <li class="menu_group menu_section"><a href="<?=base_url("/");?>">COTIZADOR</a></li>
            </div>
        </div>
    </div>
    <div class="contenido page_section">

<!--CONTENIDO-->
<div class="header_page" style="background:url(<?=$header_url;?>)">
            <div class="h_page text-center"><?=$page_title;?></div>
        </div>
        <div class="container">
            <ul class="text_navigation">
                <li class="navigation_title">atipax group</li>
                <?php
                    if(isset($page_title) && $page_title != ""){
                        echo "<li class=\"navigation_destino\"><a href=\"\">{$page_title}</a></li>";
                    }
                    if(isset($page_subtitle) && $page_subtitle != ""){
                        echo "<li class=\"navigation_destino navigation_select\"><a href=\"\">{$page_subtitle}</a></li>";
                    }
                ;?>
            </ul>
            <div class="upgrade_publication">
                <div class="upgrade_destino">
                    <b>Última actualización:</b> <span class="upgrade_date"><?=$modified_at;?></span>
                </div>
                <div class="publication_destino">
                    <b>Publicado: </b><span class="publication_date"><?=$published_at;?></span>
                </div>
            </div>
            <?php echo $html; ?>
        </div>

<!--FIN CONTENIDO-->
        <div class="footer_atipax">
            <div class="footer_img">
                <img src="<?=base_url('assets/web/img/atipax_footer.jpg');?>" alt="">
            </div>
            <div class="container">
                <div class="col-md-3"><img src="<?=base_url('assets/web/img/atipax_logo_bn.png');?>" alt="" class="img-responsive"></div>
                <div class="col-md-3">
                    <h4>Perú y Circuitos</h4>
                    <ul>
                        <li>reservas1@atipaxgroup.com</li>
                        <li>reservas3@atipaxgroup.com</li>
                        <li>reservas4@atipaxgroup.com</li>
                        <li>reservas5@atipaxgroup.</li>
                        <li>CEL #983-280-560</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>América y Caribe</h4>
                    <ul>
                        <li>inter1@atipaxgroup.com</li>
                        <li>inter2@atipaxgroup.com</li>
                        <li>inter4@atipaxgroup.com</li>
                        <li>inter3@atipaxgroup.com</li>
                        <li>productomundo@atipaxgroup.com</li>
                        <li>CEL #983-280-561</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>Europa y Oriente</h4>
                    <ul>
                        <li>europa@atipaxgroup.</li>
                        <li>europa1@atipaxgroup.com</li>
                        <li>productoeuropa@atipaxgroup.com</li>
                        <li>CEL #983-280-554</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="flyer-pop" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button class="btn_pop_close" data-dismiss="modal">&times;</button>
                <img src="<?=base_url('assets/web/img/pop-up.jpg');?>" alt="pop-up" class="img-responsive">
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="<?=base_url('assets/web/js/bootstrap.min.js');?>"></script>
</body>

</html>