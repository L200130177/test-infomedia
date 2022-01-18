<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privilege extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		check_not_login();
		$this->load->model('privilege_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Halaman Privilege';
		$data ['privilege'] = $this->privilege_m->get();
		$this->template->load('template','privilege/privilege_data', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Privilege';
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required|min_length[3]|is_unique[t_privilege.desc]');


		$this->form_validation->set_message('required', '%s masih kosong, silakan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah terpakai, silakan ganti');
		$this->form_validation->set_error_delimiters('<span class="invalid-feedback">','</span>');

		if ($this->form_validation->run() == FALSE){
            $this->template->load('template','privilege/privilege_form_add', $data);
        }else{
           $post = $this->input->post(null, TRUE);
           $this->privilege_m->add($post);
           if($this->db->affected_rows()>0){
           		echo "<script>alert ('Data berhasil disimpan');</script>";
           }
           		echo "<script>window.location ='".site_url('privilege')."';</script>";
		
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit privilege';
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required|min_length[3]|callback_desc_check');
		

		$this->form_validation->set_message('required', '%s masih kosong, silakan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah terpakai, silakan ganti');
		$this->form_validation->set_error_delimiters('<span class="invalid-feedback">','</span>');

		if ($this->form_validation->run() == FALSE){
			$data['row'] = $this->privilege_m->getId($id);
			
				 $this->template->load('template','privilege/privilege_form_edit', $data);
           
        }else{
           $post = $this->input->post(null, TRUE);
           $this->privilege_m->edit($post);
           if($this->db->affected_rows()>0){
           		echo "<script>alert ('Data berhasil disimpan');</script>";
           }
           		echo "<script>window.location ='".site_url('privilege')."';</script>";
		
		}
	}

	public function del()
	{
		$id = $this->input->post ('id_privilege');
		$this->privilege_m->del($id);

		if($this->db->affected_rows()>0){
           		echo "<script>alert ('Data berhasil dihapus');</script>";
           }
           		echo "<script>window.location ='".site_url('privilege')."';</script>";
		
	}

	function desc_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM t_privilege WHERE `desc` = '$post[desc]' AND id_privilege != '$post[id_privilege]'");
		if ($query->num_rows() > 0 ) {
			$this->form_validation->set_message('desc_check', '{field} ini sudah dipakai, silakan ganti');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
