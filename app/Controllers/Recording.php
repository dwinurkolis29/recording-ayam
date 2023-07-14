<?php

namespace App\Controllers;

class Recording extends BaseController
{
	public \App\Models\RecordingModel $recordingmodel;
	protected $session;
	// public \App\Models\UserModel $usermodel;
	// public \App\Models\PplModel $pplmodel;

	public function __construct()
	{
		$this->recordingmodel = new \App\Models\Recordingmodel();
		$this->session = \Config\Services::session();

		// $this->usermodel = new \App\Models\UserModel();
		// $this->pplmodel = new \App\Models\PplModel();
	}

	public function index()
	{
		$data['recording'] = $this->recordingmodel->findAll();
		return view('recording/tampilRecording', $data);
	}

	public function recording($id_periode)
	{

		// Tanggal awal
		$startDate = new \DateTime($this->request->getPost('tgl_periode'));

		// Tanggal akhir (misalnya tanggal sekarang)
		$endDate = new \DateTime();

		// Hitung selisih hari
		$interval = $startDate->diff($endDate);
		$daysDiff = $interval->days;

		// Pass data ke view
		$data['daysDiff'] = $daysDiff;

		$tanggalJadwal = $this->request->getPost('tgl_periode');
		$tanggalJadwal = strtotime($tanggalJadwal); // Konversi tanggal jadwal ke format timestamp
		$tanggalSekarang = time(); // Mendapatkan tanggal saat ini dalam format timestamp

		$selisihHari = floor(($tanggalSekarang - $tanggalJadwal) / (60 * 60 * 24)); // Menghitung selisih hari antara tanggal jadwal dan tanggal saat ini

		if ($selisihHari > 60) {
			$data['hideButton'] = true; // Jika selisih hari lebih dari 60, set variabel hideButton menjadi true
		} else {
			$data['hideButton'] = false; // Jika selisih hari kurang dari atau sama dengan 60, set variabel hideButton menjadi false
		}

		// $id_periode = $this->request->getPost('id_periode');
		$data['recording'] = $this->recordingmodel->getWhere($id_periode);
		$data['profil'] = $this->recordingmodel->profil($id_periode);
		$data['terima_pakan'] = $this->recordingmodel->getSumTerimaPakan($id_periode);
		$data['habis_pakan'] = $this->recordingmodel->getSumHabisPakan($id_periode);
		$data['retur_pakan'] = $this->recordingmodel->getSumReturPakan($id_periode);
		$data['sisa_pakan'] = $this->recordingmodel->getSumSisaPakan($id_periode);
		$data['mati_ayam'] = $this->recordingmodel->getSumMatiAyam($id_periode);
		$data['sisa_ayam'] = $this->recordingmodel->getSumSisaAyam($id_periode);
		$data['avg_pakan'] = $this->recordingmodel->getAvgPakanAyam($id_periode);
		$data['avg_mati'] = $this->recordingmodel->getAvgMatiAyam($id_periode);
		// Buat instance dari model yang Anda gunakan
		$data['results'] = $this->recordingmodel->FCR($id_periode);
		return view('recording/tampilRecording', $data);
	}

	public function recordingPPL($id_periode)
	{
		$data['recording'] = $this->recordingmodel->getWhere($id_periode);
		$data['profil'] = $this->recordingmodel->profil($id_periode);
		$data['terima_pakan'] = $this->recordingmodel->getSumTerimaPakan($id_periode);
		$data['habis_pakan'] = $this->recordingmodel->getSumHabisPakan($id_periode);
		$data['retur_pakan'] = $this->recordingmodel->getSumReturPakan($id_periode);
		$data['sisa_pakan'] = $this->recordingmodel->getSumSisaPakan($id_periode);
		$data['mati_ayam'] = $this->recordingmodel->getSumMatiAyam($id_periode);
		$data['sisa_ayam'] = $this->recordingmodel->getSumSisaAyam($id_periode);
		$data['avg_pakan'] = $this->recordingmodel->getAvgPakanAyam($id_periode);
		$data['avg_mati'] = $this->recordingmodel->getAvgMatiAyam($id_periode);
		$data['results'] = $this->recordingmodel->FCR($id_periode);
		return view('recording/tampilRecordingPPL', $data);
	}

	public function cetakRecording($id_periode)
	{
		$data['recording'] = $this->recordingmodel->getWhere($id_periode);
		$data['profil'] = $this->recordingmodel->profil($id_periode);
		$data['terima_pakan'] = $this->recordingmodel->getSumTerimaPakan($id_periode);
		$data['habis_pakan'] = $this->recordingmodel->getSumHabisPakan($id_periode);
		$data['retur_pakan'] = $this->recordingmodel->getSumReturPakan($id_periode);
		$data['sisa_pakan'] = $this->recordingmodel->getSumSisaPakan($id_periode);
		$data['mati_ayam'] = $this->recordingmodel->getSumMatiAyam($id_periode);
		$data['sisa_ayam'] = $this->recordingmodel->getSumSisaAyam($id_periode);
		$data['avg_pakan'] = $this->recordingmodel->getAvgPakanAyam($id_periode);
		$data['avg_mati'] = $this->recordingmodel->getAvgMatiAyam($id_periode);
		$data['results'] = $this->recordingmodel->FCR($id_periode);
		return view('recording/tampilCetakRecording', $data);
	}

	public function cetakGrafik($id_periode)
	{
		$data['recording'] = $this->recordingmodel->getWhere($id_periode);
		$data['profil'] = $this->recordingmodel->profil($id_periode);
		return view('recording/tampilCetakGrafik', $data);
	}

	public function sidebar()
	{
		$data['recording'] = $this->recordingmodel->getAll();
		return view('recording/tampilRecording', $data);
	}

	public function sidebarPPL()
	{
		$data['recording'] = $this->recordingmodel->getAll();
		return view('recording/tampilRecording', $data);
	}

	public function ubahData($key)
	{
		$data = $this->recordingmodel->find($key);
		$data['recording'] = $this->recordingmodel->getAll();
		return view('recording/formEditRecording', $data);
	}


	public function simpanUbahData($id)
	{
		$data = [
			'umur_r' => $_POST['umur_r'],
			'terima_pakan_r' => $_POST['terima_pakan_r'],
			'habis_pakan_r' => $_POST['habis_pakan_r'],
			'retur_pakan_r' => $_POST['retur_pakan_r'],
			'mati_ayam_r' => $_POST['mati_ayam_r'],
			'berat_ayam_r' => $_POST['berat_ayam_r']
		];

		$this->recordingmodel->update($id, $data);
		$id_periode = $this->request->getPost('id_periode');
		$data['recording'] = $this->recordingmodel->getWhere($id_periode);
		$data['profil'] = $this->recordingmodel->profil($id_periode);
		$data['terima_pakan'] = $this->recordingmodel->getSumTerimaPakan($id_periode);
		$data['habis_pakan'] = $this->recordingmodel->getSumHabisPakan($id_periode);
		$data['retur_pakan'] = $this->recordingmodel->getSumReturPakan($id_periode);
		$data['sisa_pakan'] = $this->recordingmodel->getSumSisaPakan($id_periode);
		$data['mati_ayam'] = $this->recordingmodel->getSumMatiAyam($id_periode);
		$data['sisa_ayam'] = $this->recordingmodel->getSumSisaAyam($id_periode);
		$data['avg_pakan'] = $this->recordingmodel->getAvgPakanAyam($id_periode);
		$data['avg_mati'] = $this->recordingmodel->getAvgMatiAyam($id_periode);
		$data['results'] = $this->recordingmodel->FCR($id_periode);
		$this->session->setFlashdata('successURec', 'Data berhasil diubah.');
		return view('recording/tampilRecording', $data);
	}

	public function ubahDataPPL($key)
	{
		$data = $this->recordingmodel->find($key);
		$data['recording'] = $this->recordingmodel->getAll();
		return view('recording/formEditRecordingPPL', $data);
	}


	public function simpanUbahDataPPL($id)
	{
		$data = [
			'umur_r' => $_POST['umur_r'],
			'terima_pakan_r' => $_POST['terima_pakan_r'],
			'habis_pakan_r' => $_POST['habis_pakan_r'],
			'retur_pakan_r' => $_POST['retur_pakan_r'],
			'mati_ayam_r' => $_POST['mati_ayam_r'],
			'berat_ayam_r' => $_POST['berat_ayam_r']
		];

		$this->recordingmodel->update($id, $data);
		$id_periode = $this->request->getPost('id_periode');
		$data['recording'] = $this->recordingmodel->getWhere($id_periode);
		$data['profil'] = $this->recordingmodel->profil($id_periode);
		$data['terima_pakan'] = $this->recordingmodel->getSumTerimaPakan($id_periode);
		$data['habis_pakan'] = $this->recordingmodel->getSumHabisPakan($id_periode);
		$data['retur_pakan'] = $this->recordingmodel->getSumReturPakan($id_periode);
		$data['sisa_pakan'] = $this->recordingmodel->getSumSisaPakan($id_periode);
		$data['mati_ayam'] = $this->recordingmodel->getSumMatiAyam($id_periode);
		$data['sisa_ayam'] = $this->recordingmodel->getSumSisaAyam($id_periode);
		$data['avg_pakan'] = $this->recordingmodel->getAvgPakanAyam($id_periode);
		$data['avg_mati'] = $this->recordingmodel->getAvgMatiAyam($id_periode);
		$data['results'] = $this->recordingmodel->FCR($id_periode);
		$this->session->setFlashdata('successURecord', 'Data berhasil diubah.');
		return view('recording/tampilRecordingPPL', $data);
	}
}
