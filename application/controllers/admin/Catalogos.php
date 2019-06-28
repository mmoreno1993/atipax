<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogos extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Catalogo_model");
        $this->load->model("Categoria_model");
        if(!isset($this->session->usuario)){
            redirect("/admin/login");
        }
    }
    
    public function index()
    {
        $lista = $this->Catalogo_model->obtener_catalogos();
        $categoria = $this->Categoria_model->obtener_categorias_catalogos();
        $categorias = "<option value='null' selected>Seleccione</option>";
        $c = 0;
        foreach ($categoria as $key) {
            $categorias .= "<option value='{$key->categoria_id}'>{$key->nombre}</option>";
        }
        $html = "<div class='col-md-12 col-xs-12'>";
        $html .= "<div class='card'>";
        $html .= "<div class='card-header'>";
        //$html .= "<h5 class='card-header-text'>Dashboard</h5>";
        $html .= "<a href='#' onclick =\"$('#mdFormulario').modal();limpiar();return false;\" ><button class='btn btn-primary'>Agregar</button></a>";
        $html .= "</div>";
        $html .= "<div class='card-block'><div class='row'>";
        $html .= "<div class='col-sm-12 table-responsive'>";
        $html .= "<table class='table table-striped table-bordered' id='dt-table'>";
        $html .= "<thead>";
        $html .= "<tr>";
        $html .= "<th class='text-center'>N°.</th>";
        $html .= "<th class='text-center'>Titulo</th>";
        $html .= "<th class='text-center'>Imagen</th>";
        $html .= "<th class='text-center'>Catalogo</th>";
        $html .= "<th class='text-center'>Categoria</th>";
        $html .= "<th class='text-center'>Estado</th>";
        $html .= "<th class='text-center'>Opciones</th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";

        $offset = 1;
        foreach($lista as $val){
            switch($val->estado){
                case 0:
                    $status = "<td class='text-center'><span id='cambiar{$val->catalogo_id}' class='label label-md label-danger'>Inactivo</span></td>"; 
                    $btn_status = "<button id='estado{$val->catalogo_id}' class='btn btn-sm btn-success waves-effect waves-light' onClick='cambiar_estado({$val->catalogo_id},1)'><i  class='icofont icofont-check'></i></button>";
                    break;
                case 1:
                    $status = "<td class='text-center'><span id='cambiar{$val->catalogo_id}' class='label label-md label-success'>Activo</span></td>";
                    $btn_status = "<button id='estado{$val->catalogo_id}' class='btn btn-sm btn-danger waves-effect waves-light' onClick='cambiar_estado({$val->catalogo_id},0)'><i  class='icofont icofont-close'></i></button>";
                    break;
            }
            $html .= "<tr>";
            $html .= "<td class='text-center'>". str_pad($offset, 2, "0", STR_PAD_LEFT) ."</td>";
            $html .= "<td class='text-center'>{$val->titulo}</td>";
            $html .= "<td class='text-center'><a href='{$val->imagen_url}' target='_blank'><img width = '30px' height='30px' src='{$val->imagen_url}' /></a></td>";
            $html .= "<td class='text-center'><a href='{$val->catalogo_url}' target='_blank'><img width = '30px' height='30px' src='{$val->catalogo_url}' /></a></td>";
            $html .= "<td class='text-center'>{$val->categoria}</td>";
            $html .= $status;
            $edit = base_url("/admin/usuarios/editar") . $val->catalogo_id;
            $html .= "<td class='text-center'>
                        <div class='btn-group'>
                        <a href='#' onclick='consultar({$val->catalogo_id});return false;'><button class='btn btn-sm btn-info waves-effect waves-light'><i class='icofont icofont-ui-edit'></i></button></a>
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
        $html .= "</div>";
        $html .= "</div>";

        $data = array(
            "page_title" => "Catalogos",
            "content" => "admin/catalogo_view",
            "menu" => "Catalogos",
            "sub_menu" => "",
            "html" => $html,
            "categorias" => $categorias
        );

        $this->load->view("admin/template/index.php", $data);
    }
    public function agregar()
    {
        $data = new stdClass();
        $data->titulo = @$_POST["titulo"];
        $data->categoria_id = @$_POST["categoria"];
        $data->catalogo_id = $this->Catalogo_model->insertar($data);
        if($data->catalogo_id != 0)
        {
            if(isset($_FILES['imagen'])){
                if($_FILES['imagen']['name'] != "")
                {
                    $name = basename($_FILES['imagen']['name']);
                    $ext = substr($name, strpos($name, "."), strlen($name));
                    $name = $this->randomDir(40).$ext;
                    $path = APPPATH.'assets\\admin\\carga_fotos\\'.$name;
                    $path = str_replace("application", "", $path);
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $path);
                    chmod($path, 0777);
                    $path = $_SERVER['SERVER_NAME'].'../assets/admin/carga_fotos/'.$name;
                    $path = str_replace("localhost", "", $path);
                    $data->imagen_url = $path;
                    $this->Catalogo_model->subir_imagen($data);
                }
            }
            if(isset($_FILES['catalogo']))
            {
                if($_FILES['catalogo']['name'] != "")
                {
                    $name = basename($_FILES['catalogo']['name']);
                    $ext = substr($name, strpos($name, "."), strlen($name));
                    $path = APPPATH.'assets\\admin\\carga_fotos\\'.$name;
                    $path = str_replace("application", "", $path);
                    move_uploaded_file($_FILES['catalogo']['tmp_name'], $path);
                    chmod($path, 0777);
                    $path = $_SERVER['SERVER_NAME'].'../assets/admin/carga_fotos/'.$name;
                    $path = str_replace("localhost", "", $path);
                    $data->catalogo_url = $path;
                    $this->Catalogo_model->subir_catalogo($data);
                }    
            }
            $data->catalogo_id = 1;
        }
        echo json_encode($data->catalogo_id);
    }
    function randomDir($n) { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
      
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        }
        return $randomString; 
    }
    public function modificar()
    {
        $data = new stdClass();
        $data->catalogo_id = @$_POST["id"];
        $data->titulo = @$_POST["titulo"];
        if(isset($_FILES['imagen'])){
            if($_FILES['imagen']['name'] != "")
            {
                $name = basename($_FILES['imagen']['name']);
                $ext = substr($name, strpos($name, "."), strlen($name));
                $name = $this->randomDir(40).$ext;
                $path = APPPATH.'assets\\admin\\carga_fotos\\'.$name;
                $path = str_replace("application", "", $path);
                move_uploaded_file($_FILES['imagen']['tmp_name'], $path);
                chmod($path, 0777);
                $path = $_SERVER['SERVER_NAME'].'../assets/admin/carga_fotos/'.$name;
                $path = str_replace("localhost", "", $path);
                $data->imagen_url = $path;
                $this->Catalogo_model->subir_imagen($data);
            }
        }
        if(isset($_FILES['catalogo']))
        {
            if($_FILES['catalogo']['name'] != "")
            {
                $name = basename($_FILES['catalogo']['name']);
                $ext = substr($name, strpos($name, "."), strlen($name));
                $path = APPPATH.'assets\\admin\\carga_fotos\\'.$name;
                $path = str_replace("application", "", $path);
                move_uploaded_file($_FILES['catalogo']['tmp_name'], $path);
                chmod($path, 0777);
                $path = $_SERVER['SERVER_NAME'].'../assets/admin/carga_fotos/'.$name;
                $path = str_replace("localhost", "", $path);
                $data->catalogo_url = $path;
                $this->Catalogo_model->subir_catalogo($data);
            }    
        }
        $data->categoria_id = @$_POST["categoria"];
        echo json_encode($this->Catalogo_model->modificar($data));
    }
    public function obtener()
    {
        $id = @$_POST["id"];
        $data = $this->Catalogo_model->obtener($id);
        if($data == false)
            $data["respuesta"] = 0;
        else
            $data->respuesta = 1;
        echo json_encode($data);
    }
    public function cambiar_estado()
    {
        $data = new stdClass();
        $data->catalogo_id = @$_POST['id'];
        $data->estado = @$_POST['estado'];
        echo json_encode($this->Catalogo_model->cambiar_estado($data));
    }
}
