<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		check_not_login();
		$this->load->model('role_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Halaman Role';
		$data ['role'] = $this->role_m->get();
		$this->template->load('template','role/role_data', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah role';
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required|min_length[3]|is_unique[t_role.desc]');


		$this->form_validation->set_message('required', '%s masih kosong, silakan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah terpakai, silakan ganti');
		$this->form_validation->set_error_delimiters('<span class="invalid-feedback">','</span>');

		if ($this->form_validation->run() == FALSE){
            $this->template->load('template','role/role_form_add', $data);
        }else{
           $post = $this->input->post(null, TRUE);
           $this->role_m->add($post);
           if($this->db->affected_rows()>0){
           		echo "<script>alert ('Data berhasil disimpan');</script>";
           }
           		echo "<script>window.location ='".site_url('role')."';</script>";
		
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit role';
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required|min_length[3]|callback_desc_check');
		

		$this->form_validation->set_message('required', '%s masih kosong, silakan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah terpakai, silakan ganti');
		$this->form_validation->set_error_delimiters('<span class="invalid-feedback">','</span>');

		if ($this->form_validation->run() == FALSE){
			$data['row'] = $this->role_m->getId($id);
			
				 $this->template->load('template','role/role_form_edit', $data);
           
        }else{
           $post = $this->input->post(null, TRUE);
           $this->role_m->edit($post);
           if($this->db->affected_rows()>0){
           		echo "<script>alert ('Data berhasil disimpan');</script>";
           }
           		echo "<script>window.location ='".site_url('role')."';</script>";
		
		}
	}

	public function del()
	{
		$id = $this->input->post ('id_role');
		$this->role_m->del($id);

		if($this->db->affected_rows()>0){
           		echo "<script>alert ('Data berhasil dihapus');</script>";
           }
           		echo "<script>window.location ='".site_url('role')."';</script>";
		
	}

	function desc_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM t_role WHERE `desc` = '$post[desc]' AND id_role != '$post[id_role]'");
		if ($query->num_rows() > 0 ) {
			$this->form_validation->set_message('desc_check', '{field} ini sudah dipakai, silakan ganti');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
