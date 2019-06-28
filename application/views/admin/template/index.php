<!DOCTYPE html>
<html lang="en">

<head>
    <title>TPP Apps - Panel de Configuración</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab" rel="stylesheet">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?=base_url("assets/admin/images/favicon.png");?>" type="image/x-icon">
    <link rel="icon" href="<?=base_url("assets/admin/images/favicon.ico");?>" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/admin/icon/icofont/css/icofont.css");?>">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css"
        href="<?=base_url("assets/admin/icon/simple-line-icons/css/simple-line-icons.css");?>">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/admin/plugins/bootstrap/css/bootstrap.min.css");?>">

    <!-- Weather css -->
    <link href="<?=base_url("assets/admin/css/svg-weather.css");?>" rel="stylesheet">

    <!-- Echart js -->
    <script src="<?=base_url("assets/admin/plugins/charts/echarts/js/echarts-all.js");?>"></script>

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/admin/css/main.css");?>">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/admin/css/responsive.css");?>">

    <!--color css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/admin/css/color/color-3.min.css");?>" id="color" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url("assets/admin/plugins/sweetalert/sweetalert.css")?>"/>
</head>

<body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
        <!--   <div class="loader-bg">
    <div class="loader-bar">
    </div>
</div> -->
        <!-- Navbar-->
        <header class="main-header-top hidden-print">
            <a href="index.html" class="logo" style='font-size: 20px;'>Atipax Group</a>
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button--><a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
                <!-- Navbar Right Menu-->
                <div class="navbar-custom-menu f-right">

                    <ul class="top-nav">


                        <!-- window screen -->
                        <li class="pc-rheader-submenu">
                            <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                                <i class="icon-size-fullscreen"></i>
                            </a>

                        </li>
                        <!-- User Menu-->
                        <li class="dropdown">
                            <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                                class="dropdown-toggle drop icon-circle drop-image">
                                <span><img class="img-circle " src="<?=base_url("assets/admin/images/avatar-2.png");?>"
                                        style="width:40px;" alt="User Image"></span>
                                <span><?=$this->session->username;?> <i class=" icofont icofont-simple-down"></i></span>

                            </a>
                            <ul class="dropdown-menu settings-menu">
                                <li><a href="<?=base_url("/profile");?>"><i class="icon-user"></i> Perfil</a></li>
                                <li class="p-0">
                                    <div class="dropdown-divider m-0"></div>
                                </li>
                                <li><a href="<?=base_url("/admin/login/logout");?>"><i class="icon-logout"></i> Salir</a></li>

                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>
        <!-- Side-Nav-->
        <aside class="main-sidebar hidden-print ">
            <section class="sidebar" id="sidebar-scroll">

                <div class="user-panel">
                    <div class="f-left image"><img src="<?=base_url("assets/admin/images/avatar-2.png");?>" alt="User Image"
                            class="img-circle"></div>
                    <div class="f-left info">
                        <p><?=$this->session->usuario;?></p>
                        <p class="designation"><?=$this->session->nombre . " " . $this->session->apellidos;?> <i
                                class="icofont icofont-caret-down m-l-5"></i></p>
                    </div>
                </div>
                <!-- sidebar profile Menu-->
                <ul class="nav sidebar-menu extra-profile-list">
                    <li>
                        <a class="waves-effect waves-dark" href="<?=base_url("/profile");?>">
                            <i class="icon-user"></i>
                            <span class="menu-text">Perfil</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="<?=base_url("/admin/login/logout");?>">
                            <i class="icon-logout"></i>
                            <span class="menu-text">Salir</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- Sidebar Menu-->
                <ul class="sidebar-menu">
                    <li class="nav-level">Navegación</li>
                    <li class='treeview'>
                    <a class='waves-effect waves-dark' href='<?=base_url("/admin/dashboard");?>'><i class='icofont icofont-dashboard-web'></i><span> Dashboard</span></a>
                    <a class='waves-effect waves-dark' href='<?=base_url("/admin/menu");?>'><i class='icofont icofont-navigation-menu'></i><span> Menus</span></a>
                    <a class='waves-effect waves-dark' href='<?=base_url("/admin/usuarios");?>'><i class='icofont icofont-ui-user-group'></i><span> Usuarios</span></a>
                    <a class='waves-effect waves-dark' href='<?=base_url("/admin/promociones");?>'><i class='icofont icofont-sale-discount'></i><span> Promociones</span></a>
                    <a class='waves-effect waves-dark' href='<?=base_url("/admin/flyers");?>'><i class='icofont icofont-travelling'></i><span> Flyers</span></a>
                    <a class='waves-effect waves-dark' href='<?=base_url("/admin/manuales");?>'><i class='icofont icofont-book-alt'></i><span> Manuales</span></a>
                    <a class='waves-effect waves-dark' href='<?=base_url("/admin/catalogos");?>'><i class='icofont icofont-read-book'></i><span> Catálogos</span></a>
                    </li>
                    <!--
                    <li class="active treeview">
                        <a class="waves-effect waves-dark" href="index.html">
                            <i class="icon-speedometer"></i><span> Dashboard</span>
                        </a>
                    </li>
                    -->
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">

            <!-- Container-fluid starts -->
            <!-- Main content starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="main-header">
                        <h4 id="page_title"><?=$page_title;?></h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#"><?=$menu;?></a>
                            </li>
                            <?php
if ($sub_menu != "") {
    echo "<li class='breadcrumb-item'><a href='#'>{$sub_menu}</a></li>";
}
;?>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <?php $this->load->view($content);?>
                </div>

            </div>
            <!-- Main content ends -->
            <!-- Container-fluid ends -->

        </div>
    </div>


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
                          <img src="assets/images/browser/chrome.png" alt="Chrome">
                          <div>Chrome</div>
                      </a>
                  </li>
                  <li>
                      <a href="https://www.mozilla.org/en-US/firefox/new/">
                          <img src="assets/images/browser/firefox.png" alt="Firefox">
                          <div>Firefox</div>
                      </a>
                  </li>
                  <li>
                      <a href="http://www.opera.com">
                          <img src="assets/images/browser/opera.png" alt="Opera">
                          <div>Opera</div>
                      </a>
                  </li>
                  <li>
                      <a href="https://www.apple.com/safari/">
                          <img src="assets/images/browser/safari.png" alt="Safari">
                          <div>Safari</div>
                      </a>
                  </li>
                  <li>
                      <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                          <img src="assets/images/browser/ie.png" alt="">
                          <div>IE (9 & above)</div>
                      </a>
                  </li>
              </ul>
          </div>
          <p>Sorry for the inconvenience!</p>
      </div>
      <![endif]-->
    <!-- Warning Section Ends -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <!-- Required Jqurey -->
    <script src="<?=base_url("assets/admin/plugins/jquery/dist/jquery.min.js");?>"></script>
    <script src="<?=base_url("assets/admin/plugins/jquery-ui/jquery-ui.min.js");?>"></script>
    <script src="<?=base_url("assets/admin/plugins/tether/dist/js/tether.min.js");?>"></script>

    <!-- Required Fremwork -->
    <script src="<?=base_url("assets/admin/plugins/bootstrap/js/bootstrap.min.js");?>"></script>

    <!-- waves effects.js -->
    <script src="<?=base_url("assets/admin/plugins/Waves/waves.min.js");?>"></script>

    <!-- Scrollbar JS-->
    <script src="<?=base_url("assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.js");?>"></script>
    <script src="<?=base_url("assets/admin/plugins/jquery.nicescroll/jquery.nicescroll.min.js");?>"></script>

    <!--classic JS-->
    <script src="<?=base_url("assets/admin/plugins/classie/classie.js");?>"></script>

    <!-- notification -->
    <script src="<?=base_url("assets/admin/plugins/notification/js/bootstrap-growl.min.js");?>"></script>

    <!-- Rickshaw Chart js -->
    <script src="<?=base_url("assets/admin/plugins/d3/d3.js");?>"></script>
    <script src="<?=base_url("assets/admin/plugins/rickshaw/rickshaw.js");?>"></script>

    <!-- Sparkline charts -->
    <script src="<?=base_url("assets/admin/plugins/jquery-sparkline/dist/jquery.sparkline.js");?>"></script>

    <!-- Counter js  -->
    <script src="<?=base_url("assets/admin/plugins/waypoints/jquery.waypoints.min.js");?>"></script>
    <script src="<?=base_url("assets/admin/plugins/countdown/js/jquery.counterup.js");?>"></script>

    <!-- custom js -->
    <script type="text/javascript" src="<?=base_url("assets/admin/js/main.js");?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/admin/pages/dashboard.js");?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/admin/pages/elements.js");?>"></script>
    <script src="<?=base_url("assets/admin/js/menu.min.js");?>"></script>


    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?=base_url("assets/admin/plugins/sweetalert/sweetalert.min.js")?>"></script>


    <script>
    var $window = $(window);
    var nav = $('.fixed-button');
    $window.scroll(function() {
        if ($window.scrollTop() >= 200) {
            nav.addClass('active');
        } else {
            nav.removeClass('active');
        }
    });

    $(".table").dataTable();
    </script>
</body>

</html>