<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Gifts extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index_get($id = null, $limit = null, $offset = null) {
        if ($limit === null) {
            $limit = $this->get('limit');
        }
        if ($offset === null) {
            $offset = $this->get('offset');
        }
        if ($id === null) {
            $id = $this->get('id');
        }
        if ($id === NULL) {
            $get = $this->model_gifts->getData(null, $limit, $offset);
        } else {
            $get = $this->model_gifts->getData($id, $limit, $offset);
        }

        if ($get) {

            $this->response([
                'status' => TRUE,
                'data' => $get], REST_Controller::HTTP_OK
            );
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'data tidak ditemukan'], REST_Controller::HTTP_NOT_FOUND
            );
        }
    }

    public function index_post($id = null) {
        $data = array(
            'title' => $this->post('title'),
            'image' => $this->post('image'),
            'sort_desc' => $this->post('sort_desc'),
            'category' => $this->post('category'),
            'status' => $this->post('status'),
            'info_produk' => $this->post('info_produk'),
            'is_new' => $this->post('is_new'),
            'points' => $this->post('points')
        );
        if ($id !== null) {
            $data['id'] = $id;
            $this->update_post($data);
        } else {
            $this->insert_post($data);
        }
    }

    public function index_patch($id = null) {
        $data = array(
            'title' => $this->patch('title'),
            'image' => $this->patch('image'),
            'sort_desc' => $this->patch('sort_desc'),
            'category' => $this->patch('category'),
            'status' => $this->patch('status'),
            'info_produk' => $this->patch('info_produk'),
            'is_new' => $this->patch('is_new'),
            'points' => $this->patch('points')
        );
        if ($id !== null) {
            $data['id'] = $id;
        }

        $this->update_post($data);
    }

    public function index_put($id = null) {
        $data = array(
            'title' => $this->put('title'),
            'content' => $this->put('content'),
            'category' => $this->put('category'),
            'status' => $this->put('status')
        );
        if ($id !== null) {
            $data['id'] = $id;
        }

        $this->update_post($data);
    }

    public function insert_post($data) {
        if ($this->model_gifts->replaceData($data) > 0) {
            // ok
            $this->response([
                'status' => TRUE,
                'data' => $data,
                'message' => 'inserted!'], REST_Controller::HTTP_OK
            );
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'data format wrong!'], REST_Controller::HTTP_BAD_REQUEST
            );
        }
    }

    public function update_post($data) {
        $data['updated_date'] = date('Y-m-d H:i:s');

        if ($this->model_gifts->replaceData($data) > 0) {
            // ok
            $this->response([
                'status' => TRUE,
                'data' => $data,
                'message' => 'updated!'], REST_Controller::HTTP_OK
            );
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'data format wrong!'], REST_Controller::HTTP_BAD_REQUEST
            );
        }
    }

    public function index_delete($id = null) {
        if ($id === null) {
            $id = $this->delete('id');
        }
        if ($id === NULL) {
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id!'], REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this->model_gifts->deletePosts($id) > 0) {
                // ok
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'deleted!'], REST_Controller::HTTP_NO_CONTENT
                );
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'id not found!'], REST_Controller::HTTP_BAD_REQUEST
                );
            }
        }
    }

}
