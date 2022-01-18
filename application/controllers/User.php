<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		check_not_login();
		$this->load->model(['user_m','role_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Halaman User';
		$data ['user'] = $this->user_m->get();
		$this->template->load('template','user/user_data', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah User';
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[t_user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]'	,array('matches' => '%s tidak sesuai dengan password.'));
		$this->form_validation->set_rules('role', 'Role', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silakan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah terpakai, silakan ganti');
		$this->form_validation->set_error_delimiters('<span class="invalid-feedback">','</span>');

		if ($this->form_validation->run() == FALSE){
			$data['role'] = $this->role_m->get(); 
            $this->template->load('template','user/user_form_add', $data);
        }else{
           $post = $this->input->post(null, TRUE);
           $this->user_m->add($post);
           if($this->db->affected_rows()>0){
           		echo "<script>alert ('Data berhasil disimpan');</script>";
           }
           		echo "<script>window.location ='".site_url('user')."';</script>";
		
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit User';
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|callback_username_check');
		$this->form_validation->set_rules('role', 'Role', 'required');
	if($this->input->post('password')){
		$this->form_validation->set_rules('password', 'Password', 'min_length[3]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]'	,array('matches' => '%s tidak sesuai dengan password.'));
	}
	if($this->input->post('passconf')){
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]'	,array('matches' => '%s tidak sesuai dengan password.'));
	}

		$this->form_validation->set_message('required', '%s masih kosong, silakan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah terpakai, silakan ganti');
		$this->form_validation->set_error_delimiters('<span class="invalid-feedback">','</span>');

		if ($this->form_validation->run() == FALSE){
			$data['role'] = $this->role_m->get();
			$data['row'] = $this->user_m->getId($id);
			
				 $this->template->load('template','user/user_form_edit', $data);
           
        }else{
           $post = $this->input->post(null, TRUE);
           $this->user_m->edit($post);
           if($this->db->affected_rows()>0){
           		echo "<script>alert ('Data berhasil disimpan');</script>";
           }
           		echo "<script>window.location ='".site_url('user')."';</script>";
		
		}
	}

	public function del()
	{
		$id = $this->input->post ('id_user');
		$this->user_m->del($id);

		if($this->db->affected_rows()>0){
           		echo "<script>alert ('Data berhasil dihapus');</script>";
           }
           		echo "<script>window.location ='".site_url('user')."';</script>";
		
	}

	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM t_user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
		if ($query->num_rows() > 0 ) {
			$this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silakan ganti');
			return FALSE;
		}else{
			return TRUE;
		}
	}


	public function cari()
	{

		$data['title'] = 'Hasil Pencarian';

		$data ['cariberdasarkan'] = $this->input->post("cariberdasarkan");

		$data ['yangdicari'] = $this->input->post("yangdicari");

		$data['user'] = $this->user_m->cari($data['cariberdasarkan'],$data['yangdicari']);

		$data_session = array(
						'cariberdasarkan' => $data['cariberdasarkan'],
						'yangdicari' => $data['yangdicari']
						);
		 
		$this->session->set_userdata($data_session);

		$this->template->load('template','user/user_data_filter', $data);

	}

	public function print()
	{
		$data['cariberdasarkan'] = $this->session->userdata('cariberdasarkan');

		$data['yangdicari'] = $this->session->userdata('yangdicari');

		$data['user'] = $this->user_m->cari($data['cariberdasarkan'],$data['yangdicari']);

		$this->load->view('user/print_user',$data);
	}

}
