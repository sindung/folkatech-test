<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gifts extends CI_Model {

    public $table = 'gifts';

    function __construct() {
        
    }

    public function getData($id = null, $limit = null, $offset = null) {
        if ($limit !== null) {
            $this->db->limit($limit);
        }
        if ($offset !== null) {
            $this->db->offset($offset);
        }

        $data = [];
        if ($id === null) {
            $result = $this->db->get($this->table)->result_array();
        } else {
            $result = $this->db->get_where($this->table, ['id' => $id])->result_array();
        }

        foreach ($result as $key => $value) {
            $data[] = array(
                "id" => $value['id'],
                "title" => $value['title'],
                "image" => $value['image'],
                "sort_desc" => $value['sort_desc'],
                "category" => $value['category'],
                "created_date" => $value['created_date'],
                "updated_date" => $value['updated_date'],
                "status" => $value['status'],
                "info_produk" => $value['info_produk'],
                "points" => $value['points'],
                "is_new" => $value['is_new'],
                "reviews" => $this->model_reviews->getData($value['id'])
            );
        }

        return $data;
    }

    public function replaceData($data) {
        $this->db->set($data);
        $this->db->replace($this->table);
        return $this->db->affected_rows();
    }

    public function updateData($id) {
        $this->db->delete($this->table, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteData($id) {
        $this->db->delete($this->table, ['id' => $id]);
        return $this->db->affected_rows();
    }

}
