<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}


	public function index()
	{
      	check_already_login();
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

		$this->form_validation->set_message('required', '%s masih kosong, silakan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE){
            $this->load->view('login');
        }else{
          		
          		$this->_login();
		
		}
	}

	private function _login()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();
				$params = array (
					'iduser' => $row->id_user,
					'username' => $row->username,
					'role_id' => $row->role_id
				);
				$this->session->set_userdata($params);
				echo "<script>
					alert('Selamat, Login berhasil');
					window.location='".site_url('dashboard')."';
				</script>";
			} else {
				echo "<script>
					alert('Login gagal, Username atau Password salah');
					window.location='".site_url('login')."';
				</script>";
			}
		}
	}

	public function logout()
	{
		$params = array('iduser','username','role_id');
		$this->session->unset_userdata($params);
		redirect('login');
	}
}