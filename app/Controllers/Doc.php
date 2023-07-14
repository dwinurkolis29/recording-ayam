<?php

namespace App\Controllers;

class Doc extends BaseController
{
	public \App\Models\DocModel $docmodel;
	protected $session;
	
	public function __construct(){
		$this->docmodel = new \App\Models\DocModel();
		$this->session = \Config\Services::session();
	}
	
    public function index()
    {
		$data['doc'] = $this->docmodel->findAll();
        return view('doc/tampilDoc',$data);
    }

	public function sidebar()
	{
		// Tanggal awal
		$startDate = new \DateTime('2023-06-10');

		// Tanggal akhir (misalnya tanggal sekarang)
		$endDate = new \DateTime();

		// Hitung selisih hari
		$interval = $startDate->diff($endDate);
		$daysDiff = $interval->days;

		// Pass data ke view
		$data['daysDiff'] = $daysDiff;

		// Buat objek DateTime dengan zona waktu yang diinginkan
		$date = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));

		// Format tanggal dan waktu
		$currentDateTime = $date->format('Y-m-d H:i:s');
	
		// Kirim data ke view
		$data['currentDateTime'] = $currentDateTime;
		$data['doc'] = $this->docmodel->findAll();
		return view('doc/tampilDoc',$data);
	 }

	public function inputData(){
       return view('doc/formInputDoc');
	}
	
	
	public function simpanData(){
		$newId = $this->docmodel->newId();
		$data = [
			'id_doc' => $newId,
			'jenis_doc' => $_POST['jenis_doc'],
			'keterangan_doc' => $_POST['keterangan_doc']
		];

		if($this->docmodel->insert($data)==false){
			unset($data);
			$data['errors'] = $this->docmodel->errors();
			$data['doc'] = $this->docmodel->findAll();
			echo "<script>
			alert('Penambahan data DOC gagal!');
			</script>";
			return view('doc/tampilDoc',$data);
		}else{
			$data['doc'] = $this->docmodel->findAll();
			$this->session->setFlashdata('successIDoc', 'Data berhasil disisipkan.');
			return view('doc/tampilDoc',$data);
		}
	}
	
	public function ubahData($key){
		$data=$this->docmodel->find($key);
        return view('doc/formEditDoc',$data);
	}
	
	
	public function simpanUbahData($id){
		$data = [
			'jenis_doc' => $_POST['jenis_doc'],
			'keterangan_doc' => $_POST['keterangan_doc']
		];
			
		$this->docmodel->update($id,$data);
		
		$data['doc'] = $this->docmodel->findAll();
		$this->session->setFlashdata('successUDoc', 'Data berhasil diubah.');
		return view('doc/tampilDoc',$data);
		
	}
	
	public function hapusData($key){
		try{
			$this->docmodel->delete($key);
		}finally{
		$data['doc'] = $this->docmodel->findAll();
		$this->session->setFlashdata('successDDoc', 'Data berhasil dihapus.');
        return view('doc/tampilDoc',$data);
		}
	}
	
}
