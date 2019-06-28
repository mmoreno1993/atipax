<?php
defined('BASEPATH') or exit('No direct script access allowed');

class General_model extends CI_Model
{

    public function return_query_result($query)
    {
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function return_query_first_row($query)
    {
        if ($query->num_rows() > 0) {
            return $query->first_row();
        } else {
            return null;
        }
    }

    public function get_all($table)
    {
        $query = $this->db->get($table);

        return $this->return_query_result($query);
    }

    public function get_where($table, $filter)
    {
        $query = $this->db->get_where($table, $filter);

        return $this->return_query_result($query);
    }

    public function get_count($table)
    {
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    public function get_first_where($table, $filter)
    {
        $query = $this->db->get_where($table, $filter);

        return $this->return_query_first_row($query);
    }

    public function get_count_where($table, $filter)
    {
        $query = $this->db->get_where($table, $filter);
        return $query->num_rows();
    }

    public function get_where_order($table, $filter, $column, $direction)
    {
        $this->db->order_by($column, $direction);
        $query = $this->db->get_where($table, $filter);

        return $this->return_query_result($query);
    }

    public function get_where_in_order($table, $filter, $column_in, $filter_in, $columnm_order, $direction)
    {
        $this->db->where_in($column_in, $filter_in);
        $this->db->order_by($column_order, $direction);
        $query = $this->db->get_where($table, $filter);

        return $this->return_query_result($query);
    }

    public function get_all_limit_top($table, $per_page, $segment)
    {
        $query = $this->db->get($table, $table, $per_page, $segment);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function get_all_order($table, $column, $direction)
    {
        $this->db->order_by($column, $direction);
        $query = $this->db->get($table);

        return $this->return_query_result($query);
    }

    public function get_max($table, $filter, $as_name = false)
    {
        $this->db->select_max($filter, $as_name);
        $query = $this->db->get($table);

        return $this->return_query_result($query);
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function edit($table, $data, $column, $value)
    {
        $this->db->where($column, $value);
        $this->db->update($table, $data);
    }

    public function deactivate($table, $data = array("status" => 0), $column, $value)
    {
        $this->db->where($column, $value);
        $this->db->update($table, $data);
    }

    public function delete($table, $filter)
    {
        $this->db->delete($table, $filter);
    }

}