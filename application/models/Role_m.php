<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Role_m extends CI_Model {

	private $_client;

	public function __construct()
	{
		$this->_client = new Client([
			'base_uri' => 'http://localhost:8080/infomedia/api/'
		]);
	}

	public function get()
	{

		$response = $this->_client->request('GET', 'api_role');

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'];
	}

	public function getId($id)
	{

		$response = $this->_client->request('GET', 'api_role', [
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
			'desc' => $post['desc'],
			'last_update' => date('Y-m-d H:i:s'),
			// 'nama kolom database' => $post['tag name pada kolom input'],
		];
		$response = $this->_client->request('POST', 'api_role',[
			'form_params' => $params
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function edit($post)
	{
		$params = [
			'id_role' => $post['id_role'],
			'desc' => $post['desc'],
			'last_update' => date('Y-m-d H:i:s'),
			// 'nama kolom database' => $post['tag name pada kolom input'],
		];
		$response = $this->_client->request('PUT', 'api_role',[
			'form_params' => $params
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function del($id_role)
	{
		$response = $this->_client->request('DELETE', 'api_role',[
			'form_params' => [
				'id' => $id_role
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function login($post)
	{
		$params = [
			'username' => $post['username'],
			'password' => $post['password'],
			// 'nama kolom database' => $post['tag name pada kolom input'],
		];
		$response = $this->_client->request('POST', 'api/login',[
			'form_params' => $params
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}
}