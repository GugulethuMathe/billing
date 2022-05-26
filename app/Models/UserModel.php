<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'net_users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'first_name',
		'last_name',
		'user_name',
		'email',
		'contact_number',
		'password',
		'organisation',
		'user_role',
		'address',
		'tenant_code'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = ["beforeInsert"];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	protected function beforeInsert(array $data)
	{
		$data = $this->passwordHash($data);
		return $data;
	}
	public function getUsers($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		} else {
			return $this->getWhere(['id' => $id]);
		}
	}
	public function getUserById($id)
	{

		$sql = "select * from net_users where id=$id";
		return $this->db->query($sql)->getResult();
	}
	public function updateUser($newData, $id)
	{
		$query = $this->db->table('net_users')->update($newData, array('id ' => $id));
		return $query;
	}
	public function getClients()
	{

		return $this->getWhere(['user_role' => 'Tenant']);
	}
	public function getAdmins()
	{

		return $this->getWhere(['user_role' => 'Administrator']);
	}
	protected function passwordHash(array $data)
	{
		if (isset($data['data']['password'])) {
			$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		}

		return $data;
	}
}
