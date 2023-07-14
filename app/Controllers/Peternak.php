<?php

namespace App\Controllers;

class Peternak extends BaseController
{
	public \App\Models\PeternakModel $peternakmodel;
	public \App\Models\UserModel $usermodel;
	public \App\Models\PplModel $pplmodel;
	protected $session;
	
	public function __construct(){
		$this->peternakmodel = new \App\Models\PeternakModel();
		$this->usermodel = new \App\Models\UserModel();
		$this->pplmodel = new \App\Models\PplModel();
		$this->session = \Config\Services::session();
	}
	
    public function index()
    {
		$data['peternak'] = $this->peternakmodel->findAll();
        return view('peternak/tampilPeternak',$data);
    }

    public function pilihan()
    {
		$data['peternak'] = $this->peternakmodel->findAll();
        return view('recording/tampilPilihan',$data);
    }

    public function pilihanPPL()
    {
		$data['peternak'] = $this->peternakmodel->getWhere();
        return view('recording/tampilPilihanPPL',$data);
    }

	public function sidebar()
	{
		$data['peternak'] = $this->peternakmodel->getAll();
		return view('peternak/tampilPeternak',$data);
	 }

	public function inputData(){
		$data['ppl'] = $this->pplmodel->findAll();
		$data['user'] = $this->usermodel->findAll();
       	return view('peternak/formInputPeternak',$data);
	}
	
	
	public function simpanData(){
		$newIdP = $this->peternakmodel->newId();
		$newIdU = $this->usermodel->newId();
		$file = $this->request->getFile('gambar_p');
		$file->move('./img/profil');

		$data2 = [
            'id_user' => $newIdU,
             'username' => $_POST['username'],
             'password' => $_POST['password'],
             'level' => 'peternak'
         ];

		$data1 = [
			'id_peternak' => $newIdP,
			'id_ppl' => $_POST['id_ppl'],
			'id_user' => $newIdU,
			'nik_p' => $_POST['nik_p'],
			'nama_p' => $_POST['nama_p'],
			'jk_p' => $_POST['jk_p'],
			'tgLahir_p' => $_POST['tgLahir_p'],
			'alamat_p' => $_POST['alamat_p'],
			'gambar_p' => $_FILES['gambar_p']['name']
		];

		if($this->usermodel->insert($data2)==false){
			unset($data2);
			$data2['errors'] = $this->usermodel->errors();
			$data2['ppl'] = $this->pplmodel->findAll();
			$this->session->setFlashdata('danger', 'Data gagal ditambahkan.');
			return view('peternak/formInputPeternak',$data2);
		}else{
			if($this->peternakmodel->insert($data1)==false){
				unset($data1);
				$data1['errors'] = $this->peternakmodel->errors();
				$data1['ppl'] = $this->pplmodel->findAll();
				$this->session->setFlashdata('danger', 'Data gagal ditambahkan.');
				return view('peternak/formInputPeternak',$data1);
			}else{
				$data1['peternak'] = $this->peternakmodel->getAll();
				$data1['user'] = $this->usermodel->findAll();
				$this->session->setFlashdata('successIPet', 'Data berhasil ditambahkan.');
				return view('peternak/tampilPeternak',$data1);
			}
			
		}

	}
	
	public function ubahData($key){
		$data=$this->peternakmodel->find($key);
		$data['petugas'] = $this->pplmodel->getPPLUP($key);
		$data['ppl'] = $this->pplmodel->findAll();
        return view('peternak/formEditPeternak',$data);
	}
	
	
	public function simpanUbahData($id){
		$gambar = $this->request->getFile('gambar_p');
		if ($gambar->getError() == 4) {
			$namaGambar = $this->request->getPost('gambarLama');
		} else {
			$namaGambar = $gambar->getRandomName();
			$gambar->move('./img/profil/',$namaGambar);
			unlink('./img/profil/'.$this->request->getPost('gambarLama'));
		}

		$data = [
			'id_ppl' => $_POST['id_ppl'],
			'nik_p' => $_POST['nik_p'],
			'nama_p' => $_POST['nama_p'],
			'jk_p' => $_POST['jk_p'],
			'tgLahir_p' => $_POST['tgLahir_p'],
			'alamat_p' => $_POST['alamat_p'],
			'gambar_p' => $namaGambar
		];
			
		if($this->peternakmodel->update($id,$data)==false){
			unset($data);
			$data=$this->peternakmodel->find($id);
			$data['errors'] = $this->peternakmodel->errors();
			$data['petugas'] = $this->pplmodel->getPPLEP($id);
			$data['ppl'] = $this->pplmodel->findAll();
			return view('peternak/formEditPeternak',$data);
		}else{$this->peternakmodel->update($id,$data);
			$data['peternak'] = $this->peternakmodel->getAll();
			$this->session->setFlashdata('successUPet', 'Data berhasil diubah.');
			return view('peternak/tampilPeternak',$data);
		}
	}

	public function detailPeternak($key){
		$data=$this->peternakmodel->find($key);
		$data['peternak'] = $this->peternakmodel->detail($key);
        return view('peternak/tampilPeternakDetail',$data);
	}
	
	public function hapusData($key){
		try{
			$this->peternakmodel->delete($key);
		}finally{
		$data['peternak'] = $this->peternakmodel->getAll();
		$this->session->setFlashdata('successDPet', 'Data berhasil dihapus.');
        return view('peternak/tampilPeternak',$data);
		}
	}
}
