<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_user','username','password','level'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'username' => 'required|is_unique[user.username]',
	];
	
    protected $validationMessages = [
        'username' => [
            'is_unique' => 'Maaf username sudah terpakai.',
        ],
	];
	
    protected $skipValidation     = false;
	
	function newId(){
		$query = $this->db->query("select id_user from user order by id_user desc limit 1");
		$rows = $query->getResult();
		if(isset($rows[0]->id_user)){
			return $rows[0]->id_user + 1;
		}else{
			return 1;
		}
	}

    function getRole(string $username, string $password){
        $q = $this->db->Query("SELECT level FROM `user` WHERE username='$username' AND `password`='$password'");

        $r = '';
        foreach ($q->getResult() as $row) {
            $r = $row->level;
        }

        return $r;
    }

    function getAll(){
        $builder = $this->db->table('user');
        $builder->join('peternak','peternak.id_peternak = user.id_peternak');
        $builder->join('ppl','ppl.id_ppl = user.id_ppl');
        $query = $builder->get();
        return $query->getResult();
    }

    function getWhereUser(){
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $ppl = $session->get('username');

        $builder = $this->db->table('user');
        $query = $builder->getWhere(['user.username'=>$ppl]);
        return $query->getResult();
    }

    function hapusUserP($key){
        $this->db->table('user')
        ->join('peternak','user.id_user = peternak.id_user', 'inner')
        ->where('peternak.id_peternak=', $key)
        ->delete('user');
    }

    function getEditPeternak($key){
        $builder = $this->db->table('user');
        $builder->join('peternak','user.id_user = peternak.id_user');
        $query = $builder->getWhere(['peternak.id_user'=>$key]);
        return $query->getResult();
    }

    function getEditPpl($key){
        $builder = $this->db->table('user');
        $builder->join('ppl','user.id_user = ppl.id_user');
        $query = $builder->getWhere(['ppl.id_user'=>$key]);
        return $query->getResult();
    }
    
}

?>