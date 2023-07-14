<?php

namespace App\Models;

use CodeIgniter\Model;

class kandangModel extends Model
{
    protected $table      = 'kandang';
    protected $primaryKey = 'id_kandang';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_kandang', 'id_peternak','id_ppl','nama_k','jenis_k','kapasitas_k','alamat_k','gambar_k'];

    protected $useTimestamps = false;
    protected $createdField  = false;
    protected $updatedField  = false;
    protected $deletedField  = false;

    protected $validationRules    = [
        'kapasitas_k' => 'required'
	];
	
    protected $validationMessages = [
        'kapasitas_k'        => [
            'required' => 'Untuk kapasitas kandang ayam harus diisi sesuai kondisi kandang',
        ],
	];
	
    protected $skipValidation     = false;
	
	function newId(){
		$query = $this->db->query("select id_kandang from kandang order by id_kandang desc limit 1");
		$rows = $query->getResult();
		if(isset($rows[0]->id_kandang)){
			return $rows[0]->id_kandang + 1;
		}else{
			return 1;
		}
	}

    function getAll(){
        $builder = $this->db->table('kandang');
        $builder->join('peternak','peternak.id_peternak = kandang.id_peternak');
        $builder->join('ppl','ppl.id_ppl = kandang.id_ppl');
        $query = $builder->get();
        return $query->getResult();
    }

    function getWhere(){
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $ppl = $session->get('username');

        $builder = $this->db->table('kandang');
        $builder->join('peternak','peternak.id_peternak = kandang.id_peternak');
        $builder->join('ppl','ppl.id_ppl = kandang.id_ppl');
        $builder->join('user','user.id_user = ppl.id_user');
        $query = $builder->getWhere(['user.username'=>$ppl]);
        return $query->getResult();
    }

    function getPeternak($key){
        $builder = $this->db->table('kandang');
        $builder->join('peternak','kandang.id_peternak = peternak.id_peternak');
        $query = $builder->getWhere(['kandang.id_kandang'=>$key]);
        return $query->getResult();
    }

    public function AllPeriode($id_kandang){
        $builder = $this->db->table('periode');
        $builder->join('kandang','periode.id_kandang = kandang.id_kandang');
        $query = $builder->getWhere(['kandang.id_kandang'=>$id_kandang]);
        return $query->getResult();
    }

    public function AllKandang($id_peternak){
        $builder = $this->db->table('kandang');
        $builder->join('peternak','kandang.id_peternak = peternak.id_peternak');
        $query = $builder->getWhere(['peternak.id_peternak'=>$id_peternak]);
        return $query->getResult();
    }

    public function PerKandang($id_kandang){
        $builder = $this->db->table('kandang');
        $builder->join('peternak','kandang.id_peternak = peternak.id_peternak');
        $query = $builder->getWhere(['kandang.id_kandang'=>$id_kandang]);
        return $query->getResult();
    }

    public function PerKandangPPL($id_kandang){
        $builder = $this->db->table('kandang');
        $builder->join('peternak','kandang.id_peternak = peternak.id_peternak');
        $query = $builder->getWhere(['kandang.id_kandang'=>$id_kandang]);
        return $query->getResult();
    }



}

?>