<?php

namespace App\Controllers;

class User extends BaseController
{
    public \App\Models\UserModel $userModel;
    public \App\Models\PplModel $pplmodel;
    public \App\Models\PeternakModel $peternakmodel;
    protected $session;

    public function __construct(){
        $this->peternakmodel = new \App\Models\PeternakModel();
        $this->userModel=new \App\Models\UserModel();
        $this->pplmodel=new \App\Models\PplModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('login');
    }

    public function sidebar()
	{
		$data['user'] = $this->userModel->findAll();
		return view('user/tampilUser',$data);
	 }

    

     public function inputData(){
        $data['user'] = $this->userModel->findAll();
        return view('user/formInputUser',$data);
     }
     
     public function simpanData(){
         $newId = $this->userModel->newId();
         $data = [
            'id_user' => $newId,
             'username' => $_POST['username'],
             'password' => $_POST['password'],
             'level' => 'admin'
         ];
 
         if($this->userModel->insert($data)==false){
             unset($data);
             $data['errors'] = $this->userModel->errors();
             $data['user'] = $this->userModel->findAll();
             $this->session->setFlashdata('danger', 'Data gagal ditambahkan.');
		return view('user/tampilUser',$data);
         }else{
            $this->session->setFlashdata('successIUser', 'Data berhasil ditambahkan.');
             $data['user'] = $this->userModel->findAll();
             return view('user/tampilUser',$data);
         }
     }

     public function ubahData($key){
		$data=$this->userModel->find($key);
		$data['user'] = $this->userModel->findAll();
        return view('user/formEditUser',$data);
	}
	
	
	public function simpanUbahData($id){
		$data = [
             'username' => $_POST['username'],
             'password' => $_POST['password'],
             'level' => $_POST['level']
         ];
			
		$this->userModel->update($id,$data);
		
		$data['user'] = $this->userModel->findAll();
        $this->session->setFlashdata('successUUser', 'Data berhasil diubah.');
		return view('user/tampilUser',$data);
		
	}

     public function ubahDataUser($key){
		$data=$this->userModel->find($key);
		$data['user'] = $this->userModel->getWhereUser();
        return view('user/formEditUserProfile',$data);
	}
	
	
	public function simpanUbahDataUser($id){
		$data = [
             'username' => $_POST['username'],
             'password' => $_POST['password']
         ];
			
		$this->userModel->update($id,$data);
		$data['ppl'] = $this->pplmodel->getWhere();
		$data['user'] = $this->userModel->getWhereUser();
        $this->session->setFlashdata('successEPpl', 'Akun berhasil diubah. Silahkan melakukan login lagi.');
		return view('login');
		
	}

    public function ubahDataPeternak($key){
		$data=$this->userModel->find($key);
		$data['user'] = $this->userModel->getEditPeternak($key);
        return view('user/formEditPeternak',$data);
	}

    public function simpanUbahDataPeternak($id){
		$data = [
             'username' => $_POST['username'],
             'password' => $_POST['password']
         ];
			
		$this->userModel->update($id,$data);
		$data['peternak'] = $this->peternakmodel->getAll();
        $this->session->setFlashdata('successUUPet', 'Data berhasil diubah.');
		return view('peternak/tampilPeternak',$data);
		
	}

    public function ubahDataPpl($key){
		$data=$this->userModel->find($key);
		$data['user'] = $this->userModel->getEditPeternak($key);
        return view('user/formEditPpl',$data);
	}

    public function simpanUbahDataPpl($id){
		$data = [
             'username' => $_POST['username'],
             'password' => $_POST['password']
         ];
			
		$this->userModel->update($id,$data);
		$data['ppl'] = $this->pplmodel->getAll();
        $this->session->setFlashdata('successUUPpl', 'Data berhasil diubah.');
		return view('ppl/tampilPpl',$data);
		
	}
     
     public function hapusData($key){
         try{
             $this->userModel->delete($key);
         }finally{
         $data['user'] = $this->userModel->findAll();
         $this->session->setFlashdata('successDUser', 'Data berhasil dihapus.');
         return view('user/tampilUser',$data);
         }
     }

    function auth(){
        // $u = $this->request->getPost('username');
        // $p = $this->request->getPost('password');
        $u = $_POST['username'];
        $p = $_POST['password'];

        $r = $this -> userModel -> getRole($u,$p);

        if($r=="admin"){
            $dataSession = ['username' => $u];
            $this->session->set($dataSession);
            return view('admin');
        }else if($r=="ppl"){
            $dataSession = ['username' => $u];
            $this->session->set($dataSession);
            return view('ppl');
        }else {
            $this->session->setFlashdata('danger', 'Username atau password salah.');
            return view('login');
        }
    }

}
?>