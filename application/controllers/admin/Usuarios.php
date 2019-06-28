<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("General_model");
        $this->load->model("Usuario_model");

        if(!isset($this->session->id_usuario)){
            redirect("/admin/login");
        }
    }
    
    public function index()
    {
        $usuarios = $this->Usuario_model->obtener_todos();

        $html = "<div class='col-md-12 col-xs-12'>";
        $html .= "<div class='card'>";
        $html .= "<div class='card-header'>";
        //$html .= "<h5 class='card-header-text'>Dashboard</h5>";
        $add = base_url("/admin/usuarios/agregar");
        $html .= "<a href='#' onclick =\"$('#mdUsuario').modal();limpiar();return false;\" ><button class='btn btn-primary'>Agregar</button></a>";
        $html .= "</div>";
        $html .= "<div class='card-block'><div class='row'>";
        $html .= "<div class='col-sm-12 table-responsive'>";
        $html .= "<table class='table table-striped table-bordered' id='dt-usuarios'>";
        $html .= "<thead>";
        $html .= "<tr>";
        $html .= "<th class='text-center'>N°.</th>";
        $html .= "<th class='text-center'>Usuario</th>";
        $html .= "<th class='text-center'>Nombre</th>";
        $html .= "<th class='text-center'>Apellidos</th>";
        $html .= "<th class='text-center'>Rol</th>";
        $html .= "<th class='text-center'>Estado</th>";
        $html .= "<th class='text-center'>Opciones</th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";

        $offset = 1;
        
        foreach($usuarios as $usuario){
            switch($usuario->rol){
                case 1:
                    $rol = "Cliente"; break;
                case 10:
                    $rol = "<b>Administrador</b>"; break;
            }
            switch($usuario->estado){
                case 0:
                    $status = "<td class='text-center'><span id='cambiar{$usuario->id_usuario}' class='label label-md label-danger'>Inactivo</span></td>"; 
                    $btn_status = "<button id='estado{$usuario->id_usuario}' class='btn btn-sm btn-success waves-effect waves-light' onClick='cambiar_estado({$usuario->id_usuario},1)'><i  class='icofont icofont-check'></i></button>";
                    break;
                case 1:
                    $status = "<td class='text-center'><span id='cambiar{$usuario->id_usuario}' class='label label-md label-success'>Activo</span></td>";
                    $btn_status = "<button id='estado{$usuario->id_usuario}' class='btn btn-sm btn-danger waves-effect waves-light' onClick='cambiar_estado({$usuario->id_usuario},0)'><i  class='icofont icofont-close'></i></button>";
                    break;
            }
            $html .= "<tr>";
            $html .= "<td class='text-center'>". str_pad($offset, 2, "0", STR_PAD_LEFT) ."</td>";
            $html .= "<td class='text-center'>{$usuario->usuario}</td>";
            $html .= "<td class='text-center'>{$usuario->nombre}</td>";
            $html .= "<td class='text-center'>{$usuario->apellidos}</td>";
            $html .= "<td class='text-center'>{$rol}</td>";
            $html .= $status;
            $edit = base_url("/admin/usuarios/editar") . $usuario->id_usuario;
            $html .= "<td class='text-center'>
                        <div class='btn-group'>
                        <a href='#' onclick='consultar({$usuario->id_usuario});return false;'><button class='btn btn-sm btn-info waves-effect waves-light'><i class='icofont icofont-ui-edit'></i></button></a>
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
            "page_title" => "Usuarios",
            "content" => "admin/usuarios_view",
            "menu" => "Usuarios",
            "sub_menu" => "",
            "html" => $html
        );

        $this->load->view("admin/template/index.php", $data);
    }
    public function agregar()
    {
        $data = new stdClass();
        $data->usuario = @$_POST["usuario"];
        $data->password = @$_POST["password"];
        $data->nombre = @$_POST["nombre"];
        $data->apellidos = @$_POST["apellidos"];
        $data->rol = @$_POST["rol"];
        $data->email = @$_POST["email"];
        $data->telefono = @$_POST["telefono"];
        echo json_encode($this->Usuario_model->insertar($data));
    }
    public function modificar()
    {
        $data = new stdClass();
        $data->id_usuario = @$_POST["id"];
        $data->password = @$_POST["password"];
        $data->nombre = @$_POST["nombre"];
        $data->apellidos = @$_POST["apellidos"];
        $data->rol = @$_POST["rol"];
        $data->email = @$_POST["email"];
        $data->telefono = @$_POST["telefono"];
        if($data->password != "")
            $this->Usuario_model->cambiar_password($data);
        echo json_encode($this->Usuario_model->modificar($data));
    }
    public function obtener()
    {
        $id = @$_POST["id"];
        $data = $this->Usuario_model->obtener($id);
        if($data == false)
            $data["respuesta"] = 0;
        else
            $data->respuesta = 1;
        echo json_encode($data);
    }
    public function verificar_usuario()
    {
        $usuario = @$_POST['usuario'];
        echo json_encode($this->Usuario_model->verificar_usuario($usuario));
    }
    public function cambiar_estado()
    {
        $data = new stdClass();
        $data->id_usuario = @$_POST['id'];
        $data->estado = @$_POST['estado'];
        echo json_encode($this->Usuario_model->cambiar_estado($data));
    }
}

/* End of file Usuarios.php */
