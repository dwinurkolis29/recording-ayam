<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table      = 'periode';
    protected $primaryKey = 'id_periode';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_periode', 'id_kandang','id_doc','periode','tgl_periode', 'isRead'];

    protected $useTimestamps = false;
    protected $createdField  = false;
    protected $updatedField  = false;
    protected $deletedField  = false;

    protected $validationRules    = [
        'periode' => 'required'
	];
	
    protected $validationMessages = [
        'periode'        => [
            'required' => 'Mohon tuliskan periode untuk kandang yang ingin diisi DOC',
        ],
	];
	
    protected $skipValidation     = false;
	
	function newId(){
		$query = $this->db->query("select id_periode from periode order by id_periode desc limit 1");
		$rows = $query->getResult();
		if(isset($rows[0]->id_periode)){
			return $rows[0]->id_periode + 1;
		}else{
			return 1;
		}
	}

    function getAll(){
        $builder = $this->db->table('periode');
        $builder->join('kandang','kandang.id_kandang = periode.id_kandang');
        $builder->join('doc','doc.id_doc = periode.id_doc');
        $builder->join('peternak','peternak.id_peternak = kandang.id_peternak');
        $query = $builder->get();
        return $query->getResult();
    }

    function getWhere($id_kandang){
        $builder = $this->db->table('periode');
        $builder->join('doc','doc.id_doc = periode.id_doc');
        $builder->join('kandang','kandang.id_kandang = periode.id_kandang');
        $query = $builder->getWhere(['periode.id_kandang'=>$id_kandang]);
        return $query->getResult();
    }

    // batas untuk page PPL
        
    function getWherePPL(){
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $ppl = $session->get('username');

        $builder = $this->db->table('periode');
        $builder->join('kandang','kandang.id_kandang = periode.id_kandang');
        $builder->join('doc','doc.id_doc = periode.id_doc');
        $builder->join('peternak','peternak.id_peternak = kandang.id_peternak');
        $builder->join('ppl','ppl.id_ppl = kandang.id_ppl');
        $builder->join('user','user.id_user = ppl.id_user');
        $query = $builder->getWhere(['user.username'=>$ppl]);
        return $query->getResult();
    }

    // batas untuk page PPL

}

?>