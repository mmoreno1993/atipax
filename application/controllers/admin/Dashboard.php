<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        if(!isset($this->session->id_usuario)){
            redirect("/admin/login");
        }

        $id_usuario = $this->session->id_usuario;
        $usuario = $this->session->usuario;
        $nombre = $this->session->nombre;
        $apellidos = $this->session->apellidos;
    }
    
    public function index()
    {
        $html = "<div class='col-md-12 col-xs-12'>";
        $html .= "<div class='card'>";
        $html .= "<div class='card-header'>";
        $html .= "<h5 class='card-header-text'>Dashboard</h5>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</div>";
        $data = array(
            "page_title" => "Bienvenid@ {$this->session->nombre} {$this->session->apellidos}",
            "content" => "admin/dashboard_view",
            "menu" => "Dashboard",
            "sub_menu" => "",
            "html" => $html
        );

        $this->load->view("admin/template/index.php", $data);
    }
}
