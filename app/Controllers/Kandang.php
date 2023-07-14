<?php

namespace App\Controllers;

class Kandang extends BaseController
{
	public \App\Models\KandangModel $kandangmodel;
	public \App\Models\PeternakModel $peternakmodel;
	public \App\Models\PplModel $pplmodel;
	public \App\Models\PeriodeModel $periodemodel;
	protected $session;
	
	public function __construct(){
		$this->kandangmodel = new \App\Models\KandangModel();
		$this->peternakmodel = new \App\Models\PeternakModel();
		$this->pplmodel = new \App\Models\PplModel();
		$this->periodemodel = new \App\Models\PeriodeModel();
		$this->session = \Config\Services::session();

	}
	
    public function index()
    {
		$data['kandang'] = $this->kandangmodel->findAll();
        return view('kandang/tampilKandang',$data);
    }

	public function sidebar()
	{
		$data['ppl'] = $this->pplmodel->findAll();

		$data['kandang'] = $this->kandangmodel->getAll();
		return view('kandang/tampilKandang',$data);
	 }

	 public function kandang(){
		$id_peternak = $this->request->getPost('id_peternak');
		$kandang = $this->kandangmodel->AllKandang($id_peternak);
		echo '<option value="">--Pilih Kandang--</option>';
		foreach ($kandang as $key => $value):
			echo "<option value=". $value->id_kandang.">".$value->nama_k."</option>";
		endforeach;
	}

	public function melihat()
	{
		$data['ppl'] = $this->pplmodel->findAll();
		$data['kandang'] = $this->kandangmodel->getWhere();
		return view('kandang/tampilKandangPPL',$data);
	 }

	public function recording()
	{
		$data['kandang'] = $this->kandangmodel->getAll();
		return view('recording/tampilKandang',$data);
	 }

	 public function pilihan()
	{
		$data['kandang'] = $this->kandangmodel->getAll();
		$data['kandangg'] = $this->kandangmodel->findAll();
		$data['periode'] = $this->periodemodel->getAll();
		return view('recording/tampilPilihan',$data);
	 }

	public function recordingPPL()
	{
		$data['kandang'] = $this->kandangmodel->getWhere();
		return view('recording/tampilKandangPPL',$data);
	 }

	public function inputData(){
		$data['peternak'] = $this->peternakmodel->findAll();
		$data['ppl'] = $this->pplmodel->findAll();
       	return view('kandang/formInputKandang',$data);
	}
	
	
	
	public function simpanData(){
		$newId = $this->kandangmodel->newId();
		$file = $this->request->getFile('gambar_k');
		$file->move('./img/kandang');
		$data = [
			'id_kandang' => $newId,
			'id_peternak' => $_POST['id_peternak'],
			'id_ppl' => $_POST['id_ppl'],
			'nama_k' => $_POST['nama_k'],
			'jenis_k' => $_POST['jenis_k'],
			'kapasitas_k' => $_POST['kapasitas_k'],
			'alamat_k' => $_POST['alamat_k'],
			'gambar_k' => $_FILES['gambar_k']['name']
		];

		if($this->kandangmodel->insert($data)==false){
			unset($data);
			$data['errors'] = $this->kandangmodel->errors();
			$data['kandang'] = $this->kandangmodel->getAll();
			$data['ppl'] = $this->pplmodel->findAll();
			echo "<script>
			alert('Penambahan data kandang gagal!');
			</script>";
			return view('kandang/tampilKandang',$data);
		}else{
			$data['kandang'] = $this->kandangmodel->getAll();
			$data['peternak'] = $this->peternakmodel->findAll();
			$data['ppl'] = $this->pplmodel->findAll();
			$this->session->setFlashdata('successIKandang', 'Data berhasil disisipkan.');
			return view('kandang/tampilKandang',$data);
		}
	}
	
	public function ubahData($key){
		$data=$this->kandangmodel->find($key);
		$data['peternak'] = $this->peternakmodel->findAll();
		$data['petugas'] = $this->pplmodel->getPPL($key);
		$data['ppl'] = $this->pplmodel->findAll();
		$data['peter'] = $this->kandangmodel->getPeternak($key);
        return view('kandang/formEditKandang',$data);
	}
	
	
	public function simpanUbahData($id){
		$gambar = $this->request->getFile('gambar_k');
		if ($gambar->getError() == 4) {
			$namaGambar = $this->request->getPost('gambarLama');
		} else {
			$namaGambar = $gambar->getRandomName();
			$gambar->move('./img/kandang/',$namaGambar);
			unlink('./img/kandang/'.$this->request->getPost('gambarLama'));
		}
		$data = [
			'id_peternak' => $_POST['id_peternak'],
			'id_ppl' => $_POST['id_ppl'],
			'nama_k' => $_POST['nama_k'],
			'jenis_k' => $_POST['jenis_k'],
			'kapasitas_k' => $_POST['kapasitas_k'],
			'alamat_k' => $_POST['alamat_k'],
			'gambar_k' => $namaGambar
		];
			
		$this->kandangmodel->update($id,$data);
		
		$data['kandang'] = $this->kandangmodel->getAll();
		$data['ppl'] = $this->pplmodel->getAll();
		$this->session->setFlashdata('successEKandang', 'Data berhasil diubah.');

		return view('kandang/tampilKandang',$data);
		
	}
	
	public function hapusData($key){
		try{
			$this->kandangmodel->delete($key);
		}finally{
		$data['kandang'] = $this->kandangmodel->getAll();
		$data['ppl'] = $this->pplmodel->getAll();
		$this->session->setFlashdata('successDKandang', 'Data berhasil dihapus.');
        return view('kandang/tampilKandang',$data);
		}
	}
}
