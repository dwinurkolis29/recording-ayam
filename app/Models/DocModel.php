<?php

namespace App\Models;

use CodeIgniter\Model;

class DocModel extends Model
{
    protected $table      = 'doc';
    protected $primaryKey = 'id_doc';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_doc', 'jenis_doc','keterangan_doc'];

    protected $useTimestamps = false;

    protected $validationRules    = [
        'jenis_doc' => 'required'
	];
	
    protected $validationMessages = [
        'jenis_doc'        => [
            'required' => 'maaf jenis doc harus diisi',
        ],
	];
	
    protected $skipValidation     = false;
	
	function newId(){
		$query = $this->db->query("select id_doc from doc order by id_doc desc limit 1");
		$rows = $query->getResult();
		if(isset($rows[0]->id_doc)){
			return $rows[0]->id_doc + 1;
		}else{
			return 1;
		}
	}
}

?>