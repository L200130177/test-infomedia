<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Api_privilege extends RestController {

    function __construct(){
        parent:: __construct();
        $this->load->model('api_m');
    }

    public function index_get()
    {

        $id = $this->get('id');
        if($id === null){
            $data = $this->api_m->get_privilege()->result();
        }else{
            $data = $this->api_m->get_privilege($id)->result();
        }

        if($data){
            $this->response([
                'status' => true,
                'data' => $data
            ],200);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ],404);
        }
    }

    public function index_post()
    {
        $post = $this->input->post(null, TRUE);
        $this->api_m->add_privilege($post);
            if($this->db->affected_rows()>0){
                $this->response([
                'status' => true,
                'message' => 'Data berhasil ditambahkan'
            ],201);
           }else{
            $this->response([
                'status' => true,
                'message' => 'Gagal menambahkan data'
            ],400);
           }
    }

    public function index_put()
    {
        $id_privilege = $this->put('id_privilege');
        $post = $this->put(null, TRUE);
        $this->api_m->edit_privilege($post, $id_privilege);
        if($this->db->affected_rows()>0){
                $this->response([
                'status' => true,
                'message' => 'Data berhasil diubah'
            ],201);
           }else{
            $this->response([
                'status' => true,
                'message' => 'Gagal mengubah data'
            ],400);
           }    
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'Tolong masukkan ID yang akan dihapus'
            ],400);
        }else{

            $this->api_m->del_privilege($id);
            if($this->db->affected_rows()>0){
                $this->response([
                'status' => true,
                'id' => $id,
                'message' => 'Data berhasil dihapus'
            ],200);
           }else{
            $this->response([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ],404);
           }
        }
    }

    public function login_post()
    {
       $data = [
            'username' => trim($this->input->post('username', TRUE)),
            'password' => sha1(trim($this->input->post('password'), TRUE))
       ];

       $cek = $this->db->get_where('t_user', array('username' => $this->input->post('username', TRUE)));
       $row = $this->db->get_where('t_user', $data)->row();

       if($cek->num_rows() >= 1){
        if($row){
            $result = [
                'logged_in' => true,
                'username' => $row->username,
                'role_id' => $row->role_id
            ];
            $this->response([
                'error' => false,
                'message' => 'Login berhasil',
                'result' => $result
            ],401);
           }else{
            $this->response([
                'error' => true,
                'message' => 'Login gagal'
            ],401);
           }
        }else{
             $this->response([
                'error' => true,
                'message' => 'Data tidak ditemukan'
            ],401);
        }
       }
}
