<?php

namespace App\Controllers;

class Periode extends BaseController
{
	public \App\Models\PeriodeModel $periodemodel;
	public \App\Models\KandangModel $kandangmodel;
	public \App\Models\DocModel $docmodel;
	public \App\Models\PeternakModel $peternakmodel;
	public \App\Models\RecordingModel $recordingmodel;
	protected $session;

	public function __construct()
	{
		$this->periodemodel = new \App\Models\PeriodeModel();
		$this->kandangmodel = new \App\Models\KandangModel();
		$this->docmodel = new \App\Models\DocModel();
		$this->peternakmodel = new \App\Models\PeternakModel();
		$this->session = \Config\Services::session();
	}

	public function index()
	{
		$data['periode'] = $this->periodemodel->findAll();
		return view('periode/tampilPeriode', $data);
	}

	public function periode()
	{
		$id_kandang = $this->request->getPost('id_kandang');
		$periode = $this->kandangmodel->AllPeriode($id_kandang);
		echo '<option value="">--Pilih Periode--</option>';
		foreach ($periode as $key => $value) :
			echo "<option value=" . $value->id_periode . ">" . $value->periode . "</option>";
		endforeach;
	}

	public function sidebar()
	{
		$data['periode'] = $this->periodemodel->getAll();
		return view('periode/tampilPeriode', $data);
	}

	public function sidebarPPL()
	{
		$data['periode'] = $this->periodemodel->getWherePPL();
		return view('periode/tampilPeriodePPL', $data);
	}

	public function recording()
	{
		$id_kandang = $this->request->getPost('id_kandang');
		$data['periode'] = $this->periodemodel->getWhere($id_kandang);
		return view('recording/tampilPeriode', $data);
	}

	public function recordingA($id_kandang)
	{
		$data['periode'] = $this->periodemodel->getWhere($id_kandang);
		return view('recording/tampilPeriode', $data);
	}

	public function recordingPPL()
	{
		$id_kandang = $this->request->getPost('id_kandang');
		$data['periode'] = $this->periodemodel->getWhere($id_kandang);
		return view('recording/tampilPeriodePPL', $data);
	}

	public function recordingP($id_kandang)
	{
		$data['periode'] = $this->periodemodel->getWhere($id_kandang);
		return view('recording/tampilPeriodePPL', $data);
	}

	public function inputData()
	{
		$data['kandang'] = $this->kandangmodel->findAll();
		$data['doc'] = $this->docmodel->findAll();
		return view('periode/formInputPeriode', $data);
	}

	public function inputDataPeriode($id_kandang)
	{
		$data['kandang'] = $this->kandangmodel->PerKandang($id_kandang);
		$data['doc'] = $this->docmodel->findAll();
		return view('recording/formInputPeriode', $data);
	}

	public function inputDataPPL($id_kandang)
	{
		$data['kandang'] = $this->kandangmodel->PerKandangPPL($id_kandang);
		$data['doc'] = $this->docmodel->findAll();
		return view('periode/formInputPeriodePPL', $data);
	}


	public function simpanData()
	{
		$newId = $this->periodemodel->newId();
		$data = [
			'id_periode' => $newId,
			'id_kandang' => $_POST['id_kandang'],
			'id_doc' => $_POST['id_doc'],
			'periode' => $_POST['periode'],
			'tgl_periode' => $_POST['tgl_periode'],
			'isRead' => 'no'
		];

		if ($this->periodemodel->insert($data) == false) {
			unset($data);
			$data['errors'] = $this->periodemodel->errors();
			$data['periode'] = $this->periodemodel->getAll();
			echo "<script>
			alert('Penambahan Periode gagal!');
			</script>";
			return view('periode/tampilPeriode', $data);
		} else {
			$data['periode'] = $this->periodemodel->getAll();
			$this->session->setFlashdata('successIPer', 'Data berhasil disisipkan.');
			return view('periode/tampilPeriode', $data);
		}
	}

	public function simpanDataPPL()
	{
		$newId = $this->periodemodel->newId();
		$data = [
			'id_periode' => $newId,
			'id_kandang' => $_POST['id_kandang'],
			'id_doc' => $_POST['id_doc'],
			'periode' => $_POST['periode'],
			'tgl_periode' => $_POST['tgl_periode'],
			'isRead' => 'no'
		];

		if ($this->periodemodel->insert($data) == false) {
			unset($data);
			$data['errors'] = $this->periodemodel->errors();
			$data['kandang'] = $this->kandangmodel->getWhere();
			$data['doc'] = $this->docmodel->findAll();
			return view('periode/formInputPeriodePPL', $data);
		} else {
			$this->session->setFlashdata('successIP', 'Data berhasil disisipkan.');
			$id_kandang = $this->request->getPost('id_kandang');
			$data['periode'] = $this->periodemodel->getWhere($id_kandang);
			return view('recording/tampilPeriodePPL', $data);
		}
	}

	public function simpanDataPeriode()
	{
		$newId = $this->periodemodel->newId();
		$data = [
			'id_periode' => $newId,
			'id_kandang' => $_POST['id_kandang'],
			'id_doc' => $_POST['id_doc'],
			'periode' => $_POST['periode'],
			'tgl_periode' => $_POST['tgl_periode'],
			'isRead' => 'no'
		];

		if ($this->periodemodel->insert($data) == false) {
			unset($data);
			$data['errors'] = $this->periodemodel->errors();
			$data['periode'] = $this->periodemodel->getAll();
		} else {
			$this->session->setFlashdata('successIP', 'Data berhasil disisipkan.');
			$id_kandang = $this->request->getPost('id_kandang');
			$data['periode'] = $this->periodemodel->getWhere($id_kandang);
			return view('recording/tampilPeriode', $data);
		}
	}

	public function inputDataPerPpl()
	{
		$data['kandang'] = $this->kandangmodel->getWhere();
		$data['doc'] = $this->docmodel->findAll();
		return view('periode/formInputPerPPL', $data);
	}

	public function simpanDataPerPpl()
	{
		$newId = $this->periodemodel->newId();
		$data = [
			'id_periode' => $newId,
			'id_kandang' => $_POST['id_kandang'],
			'id_doc' => $_POST['id_doc'],
			'periode' => $_POST['periode'],
			'tgl_periode' => $_POST['tgl_periode'],
			'isRead' => 'no'
		];

		if ($this->periodemodel->insert($data) == false) {
			unset($data);
			$data['errors'] = $this->periodemodel->errors();
			$data['kandang'] = $this->kandangmodel->getWhere();
			$data['doc'] = $this->docmodel->findAll();
			return view('periode/formInputPeriodePPL', $data);
		} else {
			$this->session->setFlashdata('successIP', 'Data berhasil disisipkan.');
			$data['periode'] = $this->periodemodel->getWherePPL();
			return view('periode/tampilPeriodePPL', $data);
		}
	}

	public function ubahData($key)
	{
		$data = $this->periodemodel->find($key);
		$data['periode'] = $this->periodemodel->getAll();
		$data['kandang'] = $this->kandangmodel->findAll();
		$data['doc'] = $this->docmodel->findAll();
		$data['peternak'] = $this->peternakmodel->findAll();
		return view('periode/formEditPeriode', $data);
	}

	public function ubahDataPPL($key)
	{
		$data = $this->periodemodel->find($key);
		$data['periode'] = $this->periodemodel->getAll();
		$data['kandang'] = $this->kandangmodel->findAll();
		$data['doc'] = $this->docmodel->findAll();
		$data['peternak'] = $this->peternakmodel->findAll();
		return view('periode/formEditPeriodePPL', $data);
	}


	public function simpanUbahData($id)
	{
		$data = [
			'tgl_periode' => $_POST['tgl_periode']
		];

		$this->periodemodel->update($id, $data);

		$data['periode'] = $this->periodemodel->getAll();
		$this->session->setFlashdata('successUPer', 'Data berhasil diubah.');
		return view('periode/tampilPeriode', $data);
	}

	public function simpanUbahDataPPL($id)
	{
		$data = [
			'tgl_periode' => $_POST['tgl_periode']
		];

		$this->periodemodel->update($id, $data);
		$data['periode'] = $this->periodemodel->getWherePPL();
		$this->session->setFlashdata('successEPer', 'Data berhasil diubah.');
		return view('periode/tampilPeriodePPL', $data);
	}

	public function hapusData($key)
	{
		try {
			$this->periodemodel->delete($key);
		} finally {
			$data['periode'] = $this->periodemodel->getAll();
			$this->session->setFlashdata('successDPer', 'Data berhasil dihapus.');
			return view('periode/tampilPeriode', $data);
		}
	}

	public function hapusDataPPL($key)
	{
		try {
			$this->periodemodel->delete($key);
		} finally {
			$data['periode'] = $this->periodemodel->getWherePPL();
			$this->session->setFlashdata('successDPer', 'Data berhasil dihapus.');
			return view('periode/tampilPeriodePPL', $data);
		}
	}
}
