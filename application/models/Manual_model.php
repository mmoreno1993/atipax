<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manual_model extends CI_Model
{
    public function obtener_manuales(){
        $sql = "SELECT m.manual_id, m.titulo,m.imagen_url, m.manual_url, m.estado, c.nombre as categoria FROM manuales m LEFT JOIN categorias_manuales c on c.categoria_manual_id = m.categoria_id";
        $registro = $this->db->query($sql)->result();
        return $registro;
    }
    public function obtener($id){
        $sql = "SELECT titulo, imagen_url, manual_url, categoria_id FROM manuales WHERE manual_id = {$id}";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->titulo))
            return $registro;
        else
            return false;
    }
    public function insertar($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "INSERT INTO manuales(titulo, estado, creado_por, creado_en, categoria_id) values('{$data->titulo}', 1, '{$usuario}', now(), {$data->categoria_id})";
        $this->db->query($sql);
        $sql = "SELECT manual_id FROM manuales order by manual_id desc limit 1";
        $txn = $this->db->query($sql)->first_row()->manual_id;
        return $txn;
    }
    public function modificar($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE manuales SET titulo='{$data->titulo}', categoria_id = {$data->categoria_id}, modificado_por = '{$usuario}',modificado_en = now() WHERE manual_id = {$data->manual_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function subir_imagen($data)
    {
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE manuales SET imagen_url = '{$data->imagen_url}', modificado_por = '{$usuario}',modificado_en = now() WHERE manual_id = {$data->manual_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function subir_manual($data)
    {
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE manuales SET manual_url = '{$data->manual_url}', modificado_por = '{$usuario}',modificado_en = now() WHERE manual_id = {$data->manual_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_estado($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE manuales SET estado={$data->estado}, modificado_por='{$usuario}',modificado_en = now() WHERE manual_id = {$data->manual_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
}
