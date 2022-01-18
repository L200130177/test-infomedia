<?php

function check_already_login() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('iduser');
	if($user_session) {
		redirect ('dashboard');
	} 
}

function check_not_login() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('iduser');
	if(!$user_session) {
		redirect ('login');
	} 
}

function check_access_menu(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('iduser');
	if(!$user_session){
		redirect('login');
	}else{
		$id = $user_session;
		$menu = $ci->uri->segment(1);

		$querymenu = $ci->db->get_where('t_menu', ['nama_menu' => $menu])->row_array();
		$menu_id = $querymenu['id_menu'];

		$useraccess = $ci->db->get_where('t_akses_menu',[
			'user_id' => $id, 
			'menu_id' => $menu_id,
		]);

		if($useraccess->num_rows() < 1 ) {
			redirect('login/blocked');
		}
	}
}

function check_access_submenu(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('iduser');
	if(!$user_session){
		redirect('login');
	}else{
		$id = $user_session;
		$submenu = $ci->uri->segment(1);

		$querysubmenu = $ci->db->get_where('t_submenu', ['nama_submenu' => $submenu])->row_array();
		$submenu_id = $querysubmenu['id_submenu'];

		$useraccess = $ci->db->get_where('t_akses_submenu',[
			'user_id' => $id, 
			'submenu_id' => $submenu_id,
		]);

		if($useraccess->num_rows() < 1 ) {
			redirect('login/blocked	');
		}
	}
}

function check_roleaccess_menu($user_id, $menu_id){
	$ci =& get_instance();

		$useraccess = $ci->db->get_where('t_akses_menu',[
			'user_id' => $user_id, 
			'menu_id' => $menu_id,
		]);

		if($useraccess->num_rows() > 0 ) {
			return "checked='checked'";
		}
	}

	function check_roleaccess_submenu($user_id, $submenu_id){
	$ci =& get_instance();

		$useraccess = $ci->db->get_where('t_akses_submenu',[
			'user_id' => $user_id, 
			'submenu_id' => $submenu_id,
		]);

		if($useraccess->num_rows() > 0 ) {
			return "checked='checked'";
		}
	}

	