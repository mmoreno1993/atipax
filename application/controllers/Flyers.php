<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Flyers extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("General_model");
        $this->load->model("Flyer_model");
/*
if(!isset($this->session->id_usuario)){
redirect("/admin/login");
}
 */
    }

    public function index()
    {
        $categorias = $this->General_model->get_all("categorias_flyers");

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


                $html .= "<li class='$active'><a data-toggle='tab' href='#tab{$categoria->categoria_flyer_id}'>$categoria->nombre</a></li>";
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
                

                $html .= "<div id='tab{$categoria2->categoria_flyer_id}' class='tab-pane fade in $active'>";
                $html .= "<div class='container-fluid'>";
                $html .= "<div class='row'>";
                $flyers = $this->General_model->get_where("flyers", array("categoria_id" => $categoria2->categoria_flyer_id));
                    foreach($flyers as $flyer){
                        $html .= "<div class='col-md-4 img_hover'><img src='$flyer->imagen_url' class='img-responsive'>";
                        $google = base_url("/assets/web/img/icon_google.png");
                        $download = base_url("/assets/web/img/icon_download.png");
                        $link = base_url("/assets/web/img/icon_link.png");
                        $html .= "<div class=\"img_hover_btn text-center\">
                                    <a data-toggle=\"modal\" href=\"#flyer-pop\" type=\"button\"><img src=\"$google\" alt=\"\"></a><a href=\"$flyer->imagen_url\" target=\"_blank\"><img src=\"$download\" alt=\"\"></a><a href=\"atiflash2.html\" hre><img src=\"$link\" alt=\"\"></a>
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
            "header_url" => base_url('assets/web/img/flyer_bg.jpg'),
            "page_title" => "Flyers",
            "page_subtitle" => "",
            "content" => "flyers_view",
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
