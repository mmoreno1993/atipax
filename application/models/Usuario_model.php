<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function validar_admin($usuario, $password){
        $sql = "SELECT *, true as login
                FROM usuarios
                WHERE usuario = '{$usuario}'
                AND password = '{$password}'
                AND estado = 1
                AND rol = 10
                LIMIT 1";
        
        if($this->db->query($sql)->num_rows() > 0){
            return $this->db->query($sql)->first_row();
        }else{
            return false;
        }
    }

    public function obtener_todos(){
        $sql = "SELECT *
                FROM usuarios";
        
        return $this->db->query($sql)->result();
    }
    public function obtener($id){
        $sql = "SELECT nombre,apellidos,email,telefono,usuario,rol,creado_por,estado FROM usuarios WHERE id_usuario = {$id}";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->nombre))
            return $registro;
        else
            return false;
    }
    public function verificar_usuario($usuario)
    {
        $sql = "SELECT usuario FROM usuarios WHERE usuario = '{$usuario}'";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->usuario))
            return 1;
        else
            return 0;
    }
    public function insertar($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "INSERT INTO usuarios(nombre,apellidos,email,telefono,usuario,password,rol,creado_por,estado)
        values('{$data->nombre}', '{$data->apellidos}','{$data->email}','{$data->telefono}','{$data->usuario}','{$data->password}',{$data->rol},'{$usuario}',1)";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function modificar($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE usuarios SET nombre='{$data->nombre}', apellidos = '{$data->apellidos}', telefono = '{$data->telefono}', rol = {$data->rol} WHERE id_usuario = {$data->id_usuario}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_estado($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE usuarios SET estado={$data->estado} WHERE id_usuario = {$data->id_usuario}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_password($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE usuarios SET password='{$data->password}' WHERE id_usuario = {$data->id_usuario}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }

}

/* End of file ModelName.php */
