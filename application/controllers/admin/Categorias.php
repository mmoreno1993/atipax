<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Categoria_model");
        if(!isset($this->session->usuario)){
            redirect("/admin/login");
        }
    }
    
    public function index()
    {
        $categoria = $this->Categoria_model->obtener_categorias_catalogos();
        $categorias = "<option value='null' selected>Seleccione</option>";
        $categorias .= "<option value='manuales'>Manuales</option>";
        $categorias .= "<option value='flyers'>Flyers</option>";
        $categorias .= "<option value='catalogos'>Catalogos</option>";
        $data = array(
            "page_title" => "Categorias",
            "content" => "admin/categoria_view",
            "menu" => "Categorias",
            "sub_menu" => "",
            "categorias" => $categorias
        );

        $this->load->view("admin/template/index.php", $data);
    }
    public function lista()
    {
        $tipo = $_POST['categoria'];
        $html = "<div class='card-block'>";
        $html .= "<a href='#' onclick =\"$('#mdFormulario').modal();limpiar();return false;\" ><button class='btn btn-primary'>Agregar</button></a>";
        $html .= "</div>";
        $html .= "<div class='card-block'><div class='row'>";
        $html .= "<div class='col-sm-12 table-responsive'>";
        $html .= "<table class='table table-striped table-bordered' id='dt-table'>";
        $html .= "<thead>";
        $html .= "<tr>";
        switch ($tipo) {
            case "manuales":
                $lista = $this->Categoria_model->obtener_categorias_manuales();
                break;
            case "flyers":
                $lista = $this->Categoria_model->obtener_categorias_flyers();
                break;
            case "catalogos":
                $lista = $this->Categoria_model->obtener_categorias_catalogos();
                break;
            default:
                $lista = [];
                break;
        }
        $html .= "<th class='text-center'>N°.</th>";
        $html .= "<th class='text-center'>Nombre</th>";
        $html .= "<th class='text-center'>Estado</th>";
        $html .= "<th class='text-center'>Opciones</th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";
        $offset = 1;
        foreach($lista as $val){
            switch($val->estado){
                case 0:
                    $status = "<td class='text-center'><span id='cambiar{$val->categoria_id}' class='label label-md label-danger'>Inactivo</span></td>"; 
                    $btn_status = "<button id='estado{$val->categoria_id}' class='btn btn-sm btn-success waves-effect waves-light' onClick='cambiar_estado({$val->categoria_id},1)'><i  class='icofont icofont-check'></i></button>";
                    break;
                case 1:
                    $status = "<td class='text-center'><span id='cambiar{$val->categoria_id}' class='label label-md label-success'>Activo</span></td>";
                    $btn_status = "<button id='estado{$val->categoria_id}' class='btn btn-sm btn-danger waves-effect waves-light' onClick='cambiar_estado({$val->categoria_id},0)'><i  class='icofont icofont-close'></i></button>";
                    break;
            }
            $html .= "<tr>";
            $html .= "<td class='text-center'>". str_pad($offset, 2, "0", STR_PAD_LEFT) ."</td>";
            $html .= "<td class='text-center'>{$val->nombre}</td>";
            $html .= $status;
            $edit = base_url("/admin/usuarios/editar") . $val->categoria_id;
            $html .= "<td class='text-center'>
                        <div class='btn-group'>
                        <a href='#' onclick='consultar({$val->categoria_id});return false;'><button class='btn btn-sm btn-info waves-effect waves-light'><i class='icofont icofont-ui-edit'></i></button></a>
                        {$btn_status}
                        </div>
                      </td>";
            $html .= "</tr>";
            $offset++;
        }
        $html .= "</tbody>";
        $html .= "</table>";
        $html .= "</div></div>";
        $html .= "</div>";
        $data = new stdClass();
        $data->html = $html;
        echo json_encode($data);
    }
    public function agregar()
    {
        $data = new stdClass();
        $data->nombre = @$_POST["nombre"];
        $data->categoria = @$_POST["categoria"];
        switch ($data->categoria) {
            case "manuales":
                $data->categoria_id = $this->Categoria_model->insertar_categoria_manual($data);
                break;
            case "flyers":
                $data->categoria_id = $this->Categoria_model->insertar_categoria_flyer($data);
                break;
            case "catalogos":
                $data->categoria_id = $this->Categoria_model->insertar_categoria_catalogo($data);
                break;
            default:
                $data->categoria_id = 0;
                break;
        }
        echo json_encode($data->categoria_id);
    }
    public function modificar()
    {
        $data = new stdClass();
        $data->nombre = @$_POST["nombre"];
        $data->categoria = @$_POST["categoria"];
        switch ($data->categoria) {
            case "manuales":
                $data->categoria_manual_id = @$_POST["id"];
                $data->categoria_id = $this->Categoria_model->modificar_categoria_manual($data);
                break;
            case "flyers":
                $data->categoria_flyer_id =  @$_POST["id"];
                $data->categoria_id = $this->Categoria_model->modificar_categoria_flyer($data);
                break;
            case "catalogos":
                $data->categoria_id =  @$_POST["id"];
                $data->categoria_id = $this->Categoria_model->modificar_categoria_catalogo($data);
                break;
            default:
                $data->categoria_id = 0;
                break;
        }
        echo json_encode($data->categoria_id);
    }
    public function obtener()
    {
        $id = @$_POST["id"];
        $categoria = @$_POST["categoria"];
        switch ($categoria) {
            case "manuales":
                $data = $this->Categoria_model->obtener_categoria_manual($id);
                break;
            case "flyers":
                $data = $this->Categoria_model->obtener_categoria_flyer($id);
                break;
            case "catalogos":
                $data = $this->Categoria_model->obtener_categoria_catalogos($id);
                break;
            default:
                $data = false;
                break;
        }
        if($data == false)
            $data["respuesta"] = 0;
        else
            $data->respuesta = 1;
        echo json_encode($data);
    }
    public function cambiar_estado()
    {
        $data = new stdClass();
        $data->estado = @$_POST['estado'];
        $data->categoria = @$_POST['categoria'];
        switch ($data->categoria) {
            case "manuales":
                $data->categoria_manual_id = @$_POST["id"];
                $data->categoria_id = $this->Categoria_model->cambiar_estado_categoria_manual($data);
                break;
            case "flyers":
                $data->categoria_flyer_id =  @$_POST["id"];
                $data->categoria_id = $this->Categoria_model->cambiar_estado_categoria_flyer($data);
                break;
            case "catalogos":
                $data->categoria_id =  @$_POST["id"];
                $data->categoria_id = $this->Categoria_model->cambiar_estado_categoria_catalogo($data);
                break;
            default:
                $data->categoria_id = 0;
                break;
        }
        echo json_encode($data->categoria_id);
    }
}
