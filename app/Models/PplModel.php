<?php

namespace App\Models;

use CodeIgniter\Model;

class PplModel extends Model
{
    protected $table      = 'ppl';
    protected $primaryKey = 'id_ppl';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_ppl', 'id_user','nip_ppl','nama_ppl','jk_ppl','tgLahir_ppl','alamat_ppl','gambar_ppl','created_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = false;
    protected $deletedField  = false;

    protected $validationRules    = [
        'nip_ppl' => 'required|min_length[18]'
	];
	
    protected $validationMessages = [
        'nip_ppl' => [
            'min_length' => 'Maaf NIP yang anda masukkan kurang dari 18 nominal.',
        ]
        
	];
	
    protected $skipValidation     = false;
	
	function newId(){
		$query = $this->db->query("select id_ppl from ppl order by id_ppl desc limit 1");
		$rows = $query->getResult();
		if(isset($rows[0]->id_ppl)){
			return $rows[0]->id_ppl + 1;
		}else{
			return 1;
		}
	}

    function getAll(){
        $builder = $this->db->table('ppl');
        $builder->join('user','user.id_user = ppl.id_user');
        $query = $builder->get();
        return $query->getResult();
    }

    function getWhere(){
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $ppl = $session->get('username');

        $builder = $this->db->table('ppl');
        $builder->join('user','ppl.id_user = user.id_user');
        $query = $builder->getWhere(['user.username'=>$ppl]);
        return $query->getResult();
    }

    function getPPL($key){
        $builder = $this->db->table('kandang');
        $builder->join('ppl','kandang.id_ppl = ppl.id_ppl');
        $query = $builder->getWhere(['kandang.id_kandang'=>$key]);
        return $query->getResult();
    }

    function getPPLEP($id){
        $builder = $this->db->table('peternak');
        $builder->join('ppl','peternak.id_ppl = ppl.id_ppl');
        $query = $builder->getWhere(['peternak.id_peternak'=>$id]);
        return $query->getResult();
    }

    function getPPLUP($key){
        $builder = $this->db->table('peternak');
        $builder->join('ppl','peternak.id_ppl = ppl.id_ppl');
        $query = $builder->getWhere(['peternak.id_peternak'=>$key]);
        return $query->getResult();
    }

    function detail($key){
        $builder = $this->db->table('ppl');
        $builder->join('user','user.id_user = ppl.id_user');
        $query = $builder->getWhere(['ppl.id_ppl'=>$key]);
        return $query->getResult();
    }

}

?>