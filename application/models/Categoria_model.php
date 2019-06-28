<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Categoria_model extends CI_Model
{
    public function obtener_categorias_manuales(){
        $sql = "SELECT categoria_manual_id, categoria_manual_id as categoria_id,nombre, estado FROM categorias_manuales";
        $registro = $this->db->query($sql)->result();
        return $registro;
    }
    public function obtener_categoria_manual($id){
        $sql = "SELECT nombre FROM categorias_manuales WHERE categoria_manual_id = {$id}";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->nombre))
            return $registro;
        else
            return false;
    }
    public function insertar_categoria_manual($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "INSERT INTO categorias_manuales(nombre, estado, creado_por, creado_en) values('{$data->nombre}', 1, '{$usuario}', now())";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function modificar_categoria_manual($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE categorias_manuales SET nombre='{$data->nombre}', modificado_por = '{$usuario}',modificado_en = now() WHERE categoria_manual_id = {$data->categoria_manual_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_estado_categoria_manual($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE categorias_manuales SET estado={$data->estado}, modificado_por='{$usuario}',modificado_en = now() WHERE categoria_manual_id = {$data->categoria_manual_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }


    public function obtener_categorias_flyers(){
        $sql = "SELECT categoria_flyer_id, categoria_flyer_id as categoria_id,nombre, estado FROM categorias_flyers";
        $registro = $this->db->query($sql)->result();
        return $registro;
    }
    public function obtener_categoria_flyer($id){
        $sql = "SELECT nombre FROM categorias_flyers WHERE categoria_flyer_id = {$id}";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->nombre))
            return $registro;
        else
            return false;
    }
    public function insertar_categoria_flyer($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "INSERT INTO categorias_flyers(nombre, estado, creado_por, creado_en) values('{$data->nombre}', 1, '{$usuario}', now())";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function modificar_categoria_flyer($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE categorias_flyers SET nombre='{$data->nombre}', modificado_por = '{$usuario}',modificado_en = now() WHERE categoria_flyer_id = {$data->categoria_flyer_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_estado_categoria_flyer($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE categorias_flyers SET estado={$data->estado}, modificado_por='{$usuario}',modificado_en = now() WHERE categoria_flyer_id = {$data->categoria_flyer_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }

    public function obtener_categorias_catalogos(){
        $sql = "SELECT categoria_id,nombre, estado FROM categorias_catalogos";
        $registro = $this->db->query($sql)->result();
        return $registro;
    }
    public function obtener_categoria_catalogos($id){
        $sql = "SELECT nombre FROM categorias_catalogos WHERE categoria_id = {$id}";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->nombre))
            return $registro;
        else
            return false;
    }
    public function insertar_categoria_catalogo($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "INSERT INTO categorias_catalogos(nombre, estado, creado_por, creado_en) values('{$data->nombre}', 1, '{$usuario}', now())";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function modificar_categoria_catalogo($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE categorias_catalogos SET nombre='{$data->nombre}', modificado_por = '{$usuario}',modificado_en = now() WHERE categoria_id = {$data->categoria_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_estado_categoria_catalogo($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE categorias_catalogos SET estado={$data->estado}, modificado_por='{$usuario}',modificado_en = now() WHERE categoria_id = {$data->categoria_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
}