<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Usuario_model");
    }
    
	public function index()
    {
        $this->load->view("admin/login_view");
    }

    public function signin(){
        $user = $_POST["usuario"];
        $password = $_POST["password"];

        $usuario = $this->Usuario_model->validar_admin($user, $password);
        
        $data = array();

        if($usuario == false){
            $data["login"] = false;
        }else{
            $this->load->model("Usuario_model");

            $data["login"] = $usuario->login;
            $data["id_usuario"] = $usuario->id_usuario;
            $data["usuario"] = $usuario->usuario;
            $data["email"] = $usuario->email;
            $data["nombre"] = $usuario->nombre;
            $data["apellidos"] = $usuario->apellidos;
            //$data["menu"] = $this->Usuario_model->menu($usuario->id_usuario);

            $this->session->set_userdata("id_usuario", $data["id_usuario"]);
            $this->session->set_userdata("usuario", $data["usuario"]);
            $this->session->set_userdata("nombre", $data["nombre"]);
            $this->session->set_userdata("apellidos", $data["apellidos"]);
            $this->session->set_userdata("email", $data["email"]);

        }

        echo json_encode($data);
        //redirect("/admin/dashboard", true);
    }

    public function logout(){
        $this->session->sess_destroy();

        redirect("admin/login", true);
    }
}
