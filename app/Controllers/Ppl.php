<?php

namespace App\Controllers;

class Ppl extends BaseController
{
	public \App\Models\PplModel $pplmodel;
	public \App\Models\UserModel $usermodel;
	protected $session;

	public function __construct(){
		$this->pplmodel = new \App\Models\PplModel();
		$this->usermodel = new \App\Models\UserModel();
		$this->session = \Config\Services::session();
	}
	
    public function index()
    {
		$data['ppl'] = $this->pplmodel->findAll();
        return view('ppl/tampilPpl',$data);
    }

	public function profile()
	{
		$data['user'] = $this->usermodel->getWhereUser();
		$data['ppl'] = $this->pplmodel->getWhere();
		return view('ppl/tampilProfile',$data);
	 }

	public function sidebar()
	{
		$data['ppl'] = $this->pplmodel->getAll();
		return view('ppl/tampilPpl',$data);
	 }

	 public function detailPPL($key){
		$data=$this->pplmodel->find($key);
		$data['ppl'] = $this->pplmodel->detail($key);
        return view('ppl/tampilPplDetail',$data);
	}

	public function inputData(){
       	return view('ppl/formInputPpl');
	}
	
	
	public function simpanData(){
		$newIdP = $this->pplmodel->newId();
		$newIdU = $this->usermodel->newId();
		$file = $this->request->getFile('gambar_ppl');
		$file->move('./img/profil');
		$data1 = [
            'id_user' => $newIdU,
             'username' => $_POST['username'],
             'password' => $_POST['password'],
             'level' => 'ppl'
         ];

		$data2 = [
			'id_ppl' => $newIdP,
			'id_user' => $newIdU,
			'nip_ppl' => $_POST['nip_ppl'],
			'nama_ppl' => $_POST['nama_ppl'],
			'jk_ppl' => $_POST['jk_ppl'],
			'tgLahir_ppl' => $_POST['tgLahir_ppl'],
			'alamat_ppl' => $_POST['alamat_ppl'],
			'gambar_ppl' => $_FILES['gambar_ppl']['name']
		];

		if($this->usermodel->insert($data1)==false){
			unset($data1);
			$data1['errors'] = $this->usermodel->errors();
			$this->session->setFlashdata('danger', 'Data gagal ditambahkan.');
			return view('ppl/formInputPpl',$data1);
		}else if($this->pplmodel->insert($data2)==false){
			unset($data2);
			$data2['errors'] = $this->pplmodel->errors();
			$this->session->setFlashdata('danger', 'Data gagal ditambahkan.');
			return view('ppl/formInputPpl',$data2);
		}else{
			$data2['ppl'] = $this->pplmodel->getAll();
			$this->session->setFlashdata('successIPpl', 'Data berhasil ditambahkan.');
			return view('ppl/tampilPpl',$data2);
		}
	}
	
	public function ubahData($key){
		$data=$this->pplmodel->find($key);
		$data['ppl'] = $this->pplmodel->getAll();
		$data['user'] = $this->usermodel->findAll();
        return view('ppl/formEditPpl',$data);
	}

	public function ubahDataPPL($key){
		$data=$this->pplmodel->find($key);
		$data['ppl'] = $this->pplmodel->getAll();
		$data['user'] = $this->usermodel->findAll();
        return view('ppl/formEditProfilePpl',$data);
	}
	
	
	public function simpanUbahData($id){
		$gambar = $this->request->getFile('gambar_ppl');
		if ($gambar->getError() == 4) {
			$namaGambar = $this->request->getPost('gambarLama');
		} else {
			$namaGambar = $gambar->getRandomName();
			$gambar->move('./img/profil/',$namaGambar);
			unlink('./img/profil/'.$this->request->getPost('gambarLama'));
		}
		$data = [
			'nip_ppl' => $_POST['nip_ppl'],
			'nama_ppl' => $_POST['nama_ppl'],
			'jk_ppl' => $_POST['jk_ppl'],
			'tgLahir_ppl' => $_POST['tgLahir_ppl'],
			'alamat_ppl' => $_POST['alamat_ppl'],
			'gambar_ppl' => $namaGambar
		];
			
		if($this->pplmodel->update($id,$data)==false){
			unset($data);
			$data=$this->pplmodel->find($id);
			$this->session->setFlashdata('danger', 'Data gagal diubah.');
			return view('ppl/formEditProfilePpl',$data);
		}else{
			$this->pplmodel->update($id,$data);
			$data['errors'] = $this->pplmodel->errors();
			$data['ppl'] = $this->pplmodel->getAll();
			$this->session->setFlashdata('successUPpl', 'Data berhasil diubah.');
			return view('ppl/tampilPpl',$data);
		}
		
		
	}

	public function simpanUbahDataPPL($id){
		$gambar = $this->request->getFile('gambar_ppl');
		if ($gambar->getError() == 4) {
			$namaGambar = $this->request->getPost('gambarLama');
		} else {
			$namaGambar = $gambar->getRandomName();
			$gambar->move('./img/profil/',$namaGambar);
			unlink('./img/profil/'.$this->request->getPost('gambarLama'));
		}
		$data = [
			'nip_ppl' => $_POST['nip_ppl'],
			'nama_ppl' => $_POST['nama_ppl'],
			'jk_ppl' => $_POST['jk_ppl'],
			'tgLahir_ppl' => $_POST['tgLahir_ppl'],
			'alamat_ppl' => $_POST['alamat_ppl'],
			'gambar_ppl' => $namaGambar
		];
			
		if($this->pplmodel->update($id,$data)==false){
			unset($data);
			$data=$this->pplmodel->find($id);
			$data['errors'] = $this->pplmodel->errors();
			return view('ppl/formEditProfilePpl',$data);
		}else{
			$this->pplmodel->update($id,$data);
			$data['user'] = $this->usermodel->getWhereUser();
			$data['ppl'] = $this->pplmodel->getWhere();
			$this->session->setFlashdata('successUPpl', 'Data berhasil diubah.');
			return view('ppl/tampilProfile',$data);
		}
		
		
	}
	
	public function hapusData($key){
		try{
			$this->pplmodel->delete($key);
		}finally{
		$data['ppl'] = $this->pplmodel->getAll();
		$this->session->setFlashdata('successDPpl', 'Data berhasil dihapus.');
        return view('ppl/tampilPpl',$data);
		}
	}
}
