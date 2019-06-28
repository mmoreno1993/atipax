<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalogos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("General_model");
        $this->load->model("Catalogo_model");
/*
if(!isset($this->session->id_usuario)){
redirect("/admin/login");
}
 */
    }

    public function index()
    {
        $categorias = $this->General_model->get_all("categorias_catalogos");

        $html = "";

        $contador = 0;
        $active = "";

        if ($categorias != null) {
            
            $html .= "<div class='container section_index'>";
            $html .= "<ul class='nav nav-tabs tabs_section'>";
            foreach ($categorias as $categoria) {
                if($contador == 0){
                    $active = "active";
                }else{
                    $active = "";
                }
                $contador++;


                $html .= "<li class='$active'><a data-toggle='tab' href='#tab{$categoria->categoria_catalogo_id}'>$categoria->nombre</a></li>";
            }
            $html .= "</ul>";

            $contador = 0;
            $html .= "<div class='tab-content'>";
            foreach($categorias as $categoria2) {
                if($contador == 0){
                    $active = "active";
                }else{
                    $active = "";
                }
                $contador++;
                

                $html .= "<div id='tab{$categoria2->categoria_catalogo_id}' class='tab-pane fade in $active'>";
                $html .= "<div class='container-fluid'>";
                $html .= "<div class='row'>";
                $manuales = $this->General_model->get_where("catalogos", array("categoria_id" => $categoria2->categoria_catalogo_id));
                    foreach($catalogos as $catalogo){
                        $html .= "<div class='col-md-4 img_hover'><img src='$catalogo->imagen_url' class='img-responsive'>";
                        $download = base_url("/assets/web/img/icon_download.png");
                        $html .= "<div class=\"img_hover_btn text-center\">
                                    <a href=\"$catalogo->catalogo_url\" target=\"_blank\"><img src=\"$download\" alt=\"Descargar\"></a>
                                </div>
                                <div class=\"bg_hover_img\">

                                </div>";
                        $html .= "</div>";
                    }
                $html .= "</div>";
                $html .= "</div>";
                $html .= "</div>";
            }
            $html .= "</div>";
            
            $html .= "</div>";
        }

        $data = array(
            "header_url" => base_url('assets/web/img/catalogo_bg.jpg'),
            "page_title" => "Catálogos",
            "menu_list" => $this->Menu_model->obtener_menus(),
            "page_subtitle" => "",
            "content" => "catalogos_view",
            "menu" => "Usuarios",
            "sub_menu" => "",
            "modified_at" => "Viernes, 05 de Febrero 2019 - 17:22",
            "published_at" => "Viernes, 05 de Febrero 2019 - 17:22",
            "html" => $html,
        );

        $this->load->view("template/index.php", $data);
    }

}

/* End of file Usuarios.php */
