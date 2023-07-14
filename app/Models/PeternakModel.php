<?php

namespace App\Models;

use CodeIgniter\Model;

class PeternakModel extends Model
{
    protected $table      = 'peternak';
    protected $primaryKey = 'id_peternak';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_peternak','id_ppl', 'id_user','nik_p','nama_p','jk_p','tgLahir_p','alamat_p','gambar_p','created_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = false;
    protected $deletedField  = false;

    protected $validationRules    = [
        'nik_p' => 'required|min_length[16]'
	];
	
    protected $validationMessages = [
        'nik_p' => [
            'min_length' => 'Maaf NIK yang anda masukkan kurang dari 16 karakter.',
        ],
    ];
	
    protected $skipValidation     = false;
	

	function newId(){
		$query = $this->db->query("select id_peternak from peternak order by id_peternak desc limit 1");
		$rows = $query->getResult();
		if(isset($rows[0]->id_peternak)){
			return $rows[0]->id_peternak + 1;
		}else{
			return 1;
		}
	}

    function getAll(){
        $builder = $this->db->table('peternak');
        $builder->join('user','user.id_user = peternak.id_user');
        $builder->join('ppl','ppl.id_ppl = peternak.id_ppl');
        $builder->orderBy('id_peternak', 'ASC');
        $query = $builder->get();
        return $query->getResult();
    }

    function detail($key){
        $builder = $this->db->table('peternak');
        $builder->join('user','user.id_user = peternak.id_user');
        $query = $builder->getWhere(['peternak.id_peternak'=>$key]);
        return $query->getResult();
    }


    function getWhere(){
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $ppl = $session->get('username');

        $builder = $this->db->table('peternak');
        $builder->join('ppl','ppl.id_ppl = peternak.id_ppl');
        $builder->join('user','user.id_user = ppl.id_user');
        $query = $builder->getWhere(['user.username'=>$ppl]);
        return $query->getResult();
    }

}

?>