<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Flyer_model extends CI_Model
{
    public function obtener_3_ultimos()
    {
        $sql = "SELECT *
                FROM flyers
                ORDER BY modificado_en DESC, creado_en DESC
                LIMIT 3";

        if ($this->db->query($sql)->num_rows > 0) {
            return $this->db->query($sql)->result();
        } else {
            return null;
        }
    }
    public function obtener_flyers(){
        $sql = "SELECT f.flyer_id,f.titulo,f.imagen_url,cf.nombre as categoria,f.estado from flyers f left join categorias_flyers cf on cf.categoria_flyer_id = f.categoria_id ";
        $registro = $this->db->query($sql)->result();
        return $registro;
    }
    public function obtener($id){
        $sql = "SELECT flyer_id,titulo,imagen_url,categoria_id from flyers where flyer_id = {$id}";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->titulo))
            return $registro;
        else
            return false;
    }
    public function insertar($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "INSERT INTO flyers(titulo, estado, categoria_id,creado_por, creado_en) values('{$data->titulo}', 1, {$data->categoria_id}, '{$usuario}', now())";
        $this->db->query($sql);
        $sql = "SELECT flyer_id FROM flyers order by flyer_id desc limit 1";
        $txn = $this->db->query($sql)->first_row()->flyer_id;
        return $txn;
    }
    public function modificar($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE flyers SET titulo='{$data->titulo}', categoria_id = {$data->categoria_id}, modificado_por = '{$usuario}',modificado_en = now() WHERE flyer_id = {$data->flyer_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function subir_imagen($data)
    {
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE flyers SET imagen_url = '{$data->imagen_url}', modificado_por = '{$usuario}',modificado_en = now() WHERE flyer_id = {$data->flyer_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_estado($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE flyers SET estado={$data->estado}, modificado_por='{$usuario}',modificado_en = now() WHERE flyer_id = {$data->flyer_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
}
