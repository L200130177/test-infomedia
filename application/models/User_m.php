<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class User_m extends CI_Model {

	private $_client;

	public function __construct()
	{
		$this->_client = new Client([
			'base_uri' => 'http://localhost:8080/infomedia/api/'
		]);
	}

	public function get()
	{

		$response = $this->_client->request('GET', 'api_user');

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'];
	}

	public function getId($id)
	{

		$response = $this->_client->request('GET', 'api_user', [
			'query' => [
				'id' => $id
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'][0];
	}

	public function add($post)
	{
		$params = [
			'username' => $post['username'],
			'password' => $post['password'],
			'role_id' => $post['role'],
			'last_update' => date('Y-m-d H:i:s'),
			// 'nama kolom database' => $post['tag name pada kolom input'],
		];
		$response = $this->_client->request('POST', 'api_user',[
			'form_params' => $params
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function edit($post)
	{
		$params = [
			'id_user' => $post['id_user'],
			'username' => $post['username'],
			'password' => $post['password'],
			'role_id' => $post['role'],
			'last_update' => date('Y-m-d H:i:s'),
			// 'nama kolom database' => $post['tag name pada kolom input'],
		];
		$response = $this->_client->request('PUT', 'api_user',[
			'form_params' => $params
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function del($id_user)
	{
		$response = $this->_client->request('DELETE', 'api_user',[
			'form_params' => [
				'id' => $id_user
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function cari($berdasarkan, $yangdicari)
	{
		$this->db->from('t_user');
		$this->db->join('t_role','t_role.id_role = t_user.role_id');
		$this->db->like($berdasarkan, $yangdicari);
		$query = $this->db->get();
		return $query;
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

	public function print()
	{
		return $this->db->get('t_user');
	}
}