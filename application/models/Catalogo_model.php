<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo_model extends CI_Model {
    public function obtener_catalogos(){
        $sql = "SELECT c.catalogo_id,c.titulo,c.imagen_url,c.catalogo_url,c.estado,ca.nombre as categoria FROM catalogos c left join categorias_catalogos ca on ca.categoria_id = c.categoria_id";
        $registro = $this->db->query($sql)->result();
        return $registro;
    }
    public function obtener($id){
        $sql = "SELECT titulo, imagen_url, catalogo_url, categoria_id FROM catalogos WHERE catalogo_id = {$id}";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->titulo))
            return $registro;
        else
            return false;
    }
    public function insertar($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "INSERT INTO catalogos(titulo, categoria_id, estado, creado_por, creado_en) values('{$data->titulo}', {$data->categoria_id}, 1, '{$usuario}', now())";
        $this->db->query($sql);
        $sql = "SELECT catalogo_id FROM catalogos order by catalogo_id desc limit 1";
        $txn = $this->db->query($sql)->first_row()->catalogo_id;
        return $txn;
    }
    public function subir_imagen($data)
    {
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE catalogos SET imagen_url = '{$data->imagen_url}', modificado_por = '{$usuario}',modificado_en = now() WHERE catalogo_id = {$data->catalogo_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function subir_catalogo($data)
    {
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE catalogos SET catalogo_url = '{$data->catalogo_url}', modificado_por = '{$usuario}',modificado_en = now() WHERE catalogo_id = {$data->catalogo_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function modificar($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE catalogos SET titulo='{$data->titulo}', categoria_id = {$data->categoria_id}, modificado_por = '{$usuario}',modificado_en = now() WHERE catalogo_id = {$data->catalogo_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_estado($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE catalogos SET estado={$data->estado}, modificado_por='{$usuario}',modificado_en = now() WHERE catalogo_id = {$data->catalogo_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }	
}
