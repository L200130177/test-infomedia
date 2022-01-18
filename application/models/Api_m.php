<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api_m extends CI_Model {

	public function get_username($username = null)
	{
		$this->db->from('t_user');
		if($username != null) {
			$this->db->where('username', $username);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_user($id_user = null)
	{
		$this->db->from('t_user');
		if($id_user != null) {
			$this->db->where('id_user', $id_user);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add_user($post)
	{
		$params = [
			'username' => $post['username'],
			'password' => sha1($post['password']),
			'role_id' => $post['role_id'],
			'last_update' => date('Y-m-d H:i:s'),
			// 'nama kolom database' => $post['tag name pada kolom input'],
		];
		$this->db->insert('t_user', $params);
	}

	public function edit_user($post, $id_user)
	{
		$params = [
			'username' => $post['username'],
			'role_id' => $post['role_id'],
            'last_update' => date('Y-m-d H:i:s'),
		];
		if(!empty($post['password'])) {
			$params['password'] = sha1($post['password']);
			}
		$this->db->update('t_user', $params, ['id_user' => $id_user]);
	}

	public function del_user($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('t_user');
	}

	public function get_role($id_role = null)
	{
		$this->db->from('t_role');
		if($id_role != null) {
			$this->db->where('id_role', $id_role);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add_role($post)
	{
		$params = [
			'desc' => $post['desc'],
			'last_update' => date('Y-m-d H:i:s'),
			// 'nama kolom database' => $post['tag name pada kolom input'],
		];
		$this->db->insert('t_role', $params);
	}

	public function edit_role($post, $id_role)
	{
		$params = [
			'desc' => $post['desc'],
            'last_update' => date('Y-m-d H:i:s'),
		];
		$this->db->update('t_role', $params, ['id_role' => $id_role]);
	}

	public function del_role($id_role)
	{
		$this->db->where('id_role', $id_role);
		$this->db->delete('t_role');
	}

	public function get_privilege($id_privilege = null)
	{
		$this->db->from('t_privilege');
		if($id_privilege != null) {
			$this->db->where('id_privilege', $id_privilege);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add_privilege($post)
	{
		$params = [
			'desc' => $post['desc'],
			'last_update' => date('Y-m-d H:i:s'),
			// 'nama kolom database' => $post['tag name pada kolom input'],
		];
		$this->db->insert('t_privilege', $params);
	}

	public function edit_privilege($post, $id_privilege)
	{
		$params = [
			'desc' => $post['desc'],
            'last_update' => date('Y-m-d H:i:s'),
		];
		$this->db->update('t_privilege', $params, ['id_privilege' => $id_privilege]);
	}

	public function del_privilege($id_privilege)
	{
		$this->db->where('id_privilege', $id_privilege);
		$this->db->delete('t_privilege');
	}

	public function login($post)
	{
		$this->db->select('');
		$this->db->from('t_user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}
}