<?php

namespace App\Models;

use CodeIgniter\Model;

class RecordingModel extends Model
{
    protected $table      = 'recording';
    protected $primaryKey = 'id_recording';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_recording','id_peternak', 'id_kandang','id_periode','umur_r','terima_pakan_r',
                                'habis_pakan_r','retur_pakan_r','sisa_pakan_r','mati_ayam_r','sisa_ayam_r','berat_ayam_r'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = false;

    // protected $validationRules    = false;
	
    // protected $validationMessages = false;
	
    protected $skipValidation     = false;
	
	function newId(){
		$query = $this->db->query("select id_recording from recording order by id_recording desc limit 1");
		$rows = $query->getResult();
		if(isset($rows[0]->id_recording)){
			return $rows[0]->id_recording + 1;
		}else{
			return 1;
		}
	}

    function newUmur(){
		$query = $this->db->query("select umur_r from recording order by umur_r desc limit 1");
		$rows = $query->getResult();
		if(isset($rows[0]->umur_r)){
			return $rows[0]->umur_r + 1;
		}else{
			return 1;
		}
	}

    function getAll(){
        $builder = $this->db->table('recording');
        $builder->join('kandang','kandang.id_kandang = recording.id_kandang');
        $builder->join('peternak','peternak.id_peternak = recording.id_peternak');
        $builder->join('periode','periode.id_periode = recording.id_periode');
        $query = $builder->get();
        return $query->getResult();
    }

    function getWhere($id_periode){
        $builder = $this->db->table('recording');
        $builder->select('*,(recording.habis_pakan_r/recording.berat_ayam_r) AS fcr');
        $builder->join('kandang','kandang.id_kandang = recording.id_kandang');
        $builder->join('peternak','peternak.id_peternak = recording.id_peternak');
        $builder->join('periode','periode.id_periode = recording.id_periode');
        $builder->orderBy('umur_r','ASC');
        $query = $builder->getWhere(['recording.id_periode'=>$id_periode]);
        
        return $query->getResult();
    }

    function profil($id_periode){
        $builder = $this->db->table('recording');
        $builder->join('kandang','kandang.id_kandang = recording.id_kandang');
        $builder->join('peternak','peternak.id_peternak = recording.id_peternak');
        $builder->join('periode','periode.id_periode = recording.id_periode');
        $builder->join('ppl','ppl.id_ppl = peternak.id_ppl');
        $builder->groupBy('peternak.nama_p');
        $query = $builder->getWhere(['recording.id_periode'=>$id_periode]);
        
        return $query->getResult();
    }

    

    function getSumTerimaPakan($id_periode){
        $builder = $this->db->table('recording');
        $builder->selectSum('terima_pakan_r');
        $query = $builder->getWhere(['recording.id_periode'=>$id_periode]);
        return $query->getResult();  
    }

    function getSumHabisPakan($id_periode){
        $builder = $this->db->table('recording');
        $builder->selectSum('habis_pakan_r');
        $query = $builder->getWhere(['recording.id_periode'=>$id_periode]);
        return $query->getResult();  
    }

    function getSumReturPakan($id_periode){
        $builder = $this->db->table('recording');
        $builder->selectSum('retur_pakan_r');
        $query = $builder->getWhere(['recording.id_periode'=>$id_periode]);
        return $query->getResult();  
    }

    function getSumSisaPakan($id_periode){
        $query = $this->db->query("SELECT SUM(terima_pakan_r), SUM(habis_pakan_r),SUM(retur_pakan_r), 
        SUM(terima_pakan_r) - (SUM(habis_pakan_r) + SUM(retur_pakan_r)) AS total 
        FROM recording  WHERE id_periode = '$id_periode'");
        return $query->getResult();  
    }

    function getSumMatiAyam($id_periode){
        $builder = $this->db->table('recording');
        $builder->selectSum('mati_ayam_r');
        $query = $builder->getWhere(['recording.id_periode'=>$id_periode]);
        return $query->getResult();  
    }

    function getSumSisaAyam($id_periode){
        $query = $this->db->query("SELECT kandang.kapasitas_k, SUM(recording.mati_ayam_r) AS mati_ayam, 
        kandang.kapasitas_k - SUM(recording.mati_ayam_r) AS total_ayam 
        FROM recording JOIN kandang ON recording.id_kandang = kandang.id_kandang 
        WHERE id_periode = '$id_periode'");
        return $query->getResult();  
    }

    function getAvgPakanAyam($id_periode){
        // $builder = $this->db->table('recording');
        // $builder->selectAvg('habis_pakan_r');
        // $query = $builder->getWhere(['recording.id_periode'=>$id_periode]);
        // return $query->getResult();  

        $query = $this->db->query("SELECT ROUND(AVG(habis_pakan_r), 1) as habis_pakan_r
        FROM recording 
        WHERE id_periode = '$id_periode'");
        return $query->getResult(); 
    }

    function getAvgMatiAyam($id_periode){
        // $builder = $this->db->table('recording');
        // $builder->selectAvg('mati_ayam_r');
        // $query = $builder->getWhere(['recording.id_periode'=>$id_periode]);
        // return $query->getResult();  

        $query = $this->db->query("SELECT ROUND(AVG(mati_ayam_r), 1) as mati_ayam_r
        FROM recording 
        WHERE id_periode = '$id_periode'");
        return $query->getResult(); 
    }

    public function FCR($id_periode)
    {

        $data = []; // Variabel array kosong untuk menyimpan hasil query

        for ($i = 1; $i <= 40; $i++) {
            $query = $this->db->query("SELECT SUM(habis_pakan_r) AS habis_pakan,
            (SELECT umur_r FROM recording WHERE umur_r = $i AND id_periode = $id_periode )AS umur_ayam,
            (SELECT berat_ayam_r FROM recording WHERE umur_r = $i AND id_periode = $id_periode )/1000 AS berat_ayam,
            (kandang.kapasitas_k - SUM(recording.mati_ayam_r)) AS sisa_ayam,
            (SELECT berat_ayam_r FROM recording WHERE umur_r = $i AND id_periode = $id_periode)
            /1000*(kandang.kapasitas_k - SUM(recording.mati_ayam_r)) AS total_berat_ayam,
            round(SUM(habis_pakan_r)*50 / ((SELECT berat_ayam_r FROM recording WHERE umur_r = $i AND id_periode = $id_periode)
            /1000*(kandang.kapasitas_k - SUM(recording.mati_ayam_r))),2) AS fcr_ayam
            FROM recording
            JOIN kandang ON recording.id_kandang = kandang.id_kandang
            WHERE id_periode = $id_periode AND umur_r BETWEEN '1' AND '$i'");

            foreach ($query->getResult() as $row) {
                $data[] = $row; // Tambahkan baris ke dalam variabel array $data
            }
        }
        
        return $data;
        
    }

    

}
