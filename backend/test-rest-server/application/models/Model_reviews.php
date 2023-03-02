<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_reviews extends CI_Model {

    public $table = 'reviews';
    public $gifts_id = 'gifts_id';

    function __construct() {
        
    }

    public function getData($id = null, $limit = null, $offset = null) {
        if ($limit !== null) {
            $this->db->limit($limit);
        }
        if ($offset !== null) {
            $this->db->offset($offset);
        }

        if ($id === null) {
            return $this->db->get($this->table)->result_array();
        } else {
            return $this->db->get_where($this->table, [$this->gifts_id => $id])->result_array();
        }
    }

    public function replaceData($data) {
        $this->db->set($data);
        $this->db->replace($this->table);
        return $this->db->affected_rows();
    }

    public function updateData($id) {
        $this->db->delete($this->table, [$this->gifts_id => $id]);
        return $this->db->affected_rows();
    }

    public function deleteData($id) {
        $this->db->delete($this->table, [$this->gifts_id => $id]);
        return $this->db->affected_rows();
    }

}
