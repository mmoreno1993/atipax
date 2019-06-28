<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
    
    public function obtener_menus(){
        $sql_menus = "SELECT *
                      FROM menu WHERE estado = 1 ORDER BY menu_id ASC";
        
        $html = "";

        foreach($this->db->query($sql_menus)->result() as $menu){
            $html .= "<div class='panel panel_menu_list'>";
            $html .= "<li class='menu_group menu_section' dat-slide-to='{$menu->slider}' data-target='#slider_home'><a data-toggle='collapse' data-parent='#accordion' href='#menu{$menu->menu_id}'>{$menu->titulo}</li>";
            $html .= "<div id='menu{$menu->menu_id}' class='panel-collapse collapse in'>";
            $html .= "<div class='panel-body panel_menu'>";
            $html .= "<ul>";

            $sql_submenus = "SELECT *
                             FROM submenu WHERE estado = 1
                             AND menu_id = {$menu->menu_id} ORDER BY submenu_id ASC";
            
            foreach($this->db->query($sql_submenus)->result() as $submenu){
                $html .= "<li class='menu_group menu_section'><a href='#'>{$submenu->titulo}</a></li>";

                $sql_subsubmenus = "SELECT *
                                    FROM subsubmenu WHERE estado = 1
                                    AND submenu_id = {$submenu->submenu_id} ORDER BY subsubmenu_id ASC";
                
                foreach($this->db->query($sql_subsubmenus)->result() as $subsubmenu){
                    $url_destino = base_url("/destinos/") . $subsubmenu->subsubmenu_id;
                    $html .= "<li class='menu_destinos'><a href='{$url_destino}'>{$subsubmenu->titulo}</a></li>";
                }
            }

            $html .= "</ul>";
            $html .= "</div></div></div>";
        }

        return $html;
    }
    public function obtener_menu($id){
        $sql = "SELECT titulo, url, slider FROM menu WHERE menu_id = {$id}";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->titulo))
            return $registro;
        else
            return false;
    }
    public function insertar_menu($data){
        $txn = 0;
        if(!isset($data->url))
            $data->url = '';
        $usuario = $this->session->userdata('usuario');
        $sql = "INSERT INTO menu(titulo, url, estado, slider, creado_por, creado_en) values('{$data->titulo}', '{$data->url}', 1, {$data->slider}, '{$usuario}',now())";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function modificar_menu($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE menu SET titulo='{$data->titulo}', url = '{$data->url}',modificado_por='{$usuario}',modificado_en = now() WHERE menu_id = {$data->menu_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_estado_menu($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE menu SET estado={$data->estado}, modificado_por='{$usuario}',modificado_en = now() WHERE menu_id = {$data->menu_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function obtener_submenu($id){
        $sql = "SELECT menu_id,titulo, url FROM submenu WHERE submenu_id = {$id}";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->titulo))
            return $registro;
        else
            return false;
    }
    public function insertar_submenu($data){
        $txn = 0;
        if(!isset($data->url))
            $data->url = '';
        $usuario = $this->session->userdata('usuario');
        $sql = "INSERT INTO submenu(menu_id,titulo, url, estado, creado_por, creado_en) values({$data->menu_id},'{$data->titulo}', '{$data->url}', 1, '{$usuario}',now())";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function modificar_submenu($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE submenu SET titulo='{$data->titulo}', url = '{$data->url}', modificado_por='{$usuario}',modificado_en = now() WHERE submenu_id = {$data->submenu_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_estado_submenu($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE submenu SET estado={$data->estado}, modificado_por='{$usuario}',modificado_en = now() WHERE submenu_id = {$data->submenu_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function obtener_subsubmenu($id){
        $sql = "SELECT menu_id,titulo, url FROM subsubmenu WHERE subsubmenu_id = {$id}";
        $registro = $this->db->query($sql)->first_row();
        if(isset($registro->titulo))
            return $registro;
        else
            return false;
    }
    public function insertar_subsubmenu($data){
        $txn = 0;
        if(!isset($data->url))
            $data->url = '';
        $usuario = $this->session->userdata('usuario');
        $sql = "INSERT INTO subsubmenu(submenu_id,titulo, url, estado, creado_por, creado_en) values({$data->submenu_id},'{$data->titulo}', '{$data->url}', 1, '{$usuario}',now())";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function modificar_subsubmenu($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE subsubmenu SET titulo='{$data->titulo}', url = '{$data->url}', modificado_por='{$usuario}',modificado_en = now() WHERE subsubmenu_id = {$data->subsubmenu_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
    public function cambiar_estado_subsubmenu($data){
        $txn = 0;
        $usuario = $this->session->userdata('usuario');
        $sql = "UPDATE subsubmenu SET estado={$data->estado}, modificado_por='{$usuario}',modificado_en = now() WHERE subsubmenu_id = {$data->subsubmenu_id}";
        $this->db->query($sql);
        $txn = 1;
        return $txn;
    }
}
