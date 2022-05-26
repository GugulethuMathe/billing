<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'server_ip_config';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'ip_address',
		'ip_active'
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
	public function getIpConfig()
    {
        $builder = $this->db->table('server_ip_config');
        $builder->select('*');
       
        return $builder->get();
    }
	public function getBillConfig()
    {
        $builder = $this->db->table('bill_cycle_config');
        $builder->select('*');
       
        return $builder->get();
    }
	  public function getRatesById($id)
	  {
  
		  $sql = "select * from server_ip_config where id=$id";
		  return $this->db->query($sql)->getResult();
	  }
	  public function updateUser($newData, $id)
	  {
		  $query = $this->db->table('server_ip_config')->update($newData, array('id ' => $id));
		  return $query;
	  }
	  public function getClients() {
	
			return $this->getWhere(['user_role' => 'Tenant']);
	  }
	  public function getAdmins() {
	
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