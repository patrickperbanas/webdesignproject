<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\izinModel;
use App\Models\ProfilModel;

class Izin extends BaseController
{

	protected $izinModel;
	protected $profilModel;

    public function __construct()
	{
		$this->izinModel = new izinModel();
		$this->profilModel = new profilModel();
    }
    
	public function cuti()
	{
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}
		
		$data= [
			'title' => 'Menu Cuti',
			'subTitle' => 'Cuti',
			'type' => 1,
			'cuti' => $this->izinModel->get_all_izin_by_type_and_nik(1,session()->get('nik')),
			'isi' => 'v_izin',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function perjalanan_bisnis()
	{
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}
		$data= [
			'title' => 'Menu Perjalanan Bisnis',
			'subTitle' => 'Perjalanan Bisnis',
			'type' => 2,
			'cuti' => $this->izinModel->get_all_izin_by_type_and_nik(2,session()->get('nik')),
			'isi' => 'v_izin',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function tambah(){
		$type = intval($_GET["type"]);
		$kuota_cuti = 0;
		$nik = session()->get('nik');
		$profil = $this->profilModel->get_profile_by_nik($nik);
		$kuota_cuti = $profil["kuota_cuti"] == null ? 0 : $profil["kuota_cuti"];
		
		$data= [
			'title' =>$type == 1? 'Form Pengajuan Cuti' : 'Form Pengajuan Perjalanan Bisnis',
			'subTitle' => $type == 1? 'Tambah Cuti' : 'Tambah Perjalanan Bisnis',
			'type' => $type,
			'kuota_cuti' => $kuota_cuti,	 
			'cuti' => $this->izinModel->get_perjalanan_bisnis(),
			'isi' => 'v_form_izin',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function simpan(){
		$type = $_GET["type"];
		$nik = session()->get('nik');
		$profil = $this->profilModel->get_profile_by_nik($nik);

		if($type == 1) {
			if($this->request->getPost('id') == 0){
				$length = $this->request->getPost('length');
				$profil['kuota_cuti'] -= $length;
				$data= [
					'nik' => session()->get('nik'),
					'izin_type' => $type,
					'start_date' => $this->request->getPost('start_date'),
					'end_date' => $this->request->getPost('end_date'),
					'status' => 'Waiting Approval',
					'estimasi_biaya' => 0,
					'history_perjalanan' => '',
				];
			
				$this->profilModel->update_profile($profil, $profil['id_profile']);
				$izin = $this->izinModel->insert_izin($data);
			}
			else {

				$izin = $this->izinModel->get_izin_by_id($this->request->getPost('id'));
				$data= [
					'nik' => session()->get('nik'),
					'izin_type' => $type,
					'start_date' => $this->request->getPost('start_date'),
					'end_date' => $this->request->getPost('end_date'),
					'status' => 'Waiting Approval',
					'estimasi_biaya' => 0,
					'history_perjalanan' => '',
				];
				$end = strtotime($izin['end_date']);
				$start = strtotime($izin['start_date']);
				$datediff = $end - $start;  
				$length = $this->request->getPost('length');
				$diff = round($datediff /60/60/24) + 1;
				if($diff == $length || $length == '') {
					$this->izinModel->update_izin($data, $this->request->getPost('id'));
				}elseif ($diff > $length) {
					$total = intval($length) - intval($diff);
					$profil['kuota_cuti'] -= $total;
					$this->profilModel->update_profile($profil, $profil['id_profile']);
					$this->izinModel->update_izin($data, $this->request->getPost('id'));
				}else {
					$total = intval($length) - intval($diff);
					$profil['kuota_cuti'] -= $total;
					$this->profilModel->update_profile($profil, $profil['id_profile']);
					$this->izinModel->update_izin($data, $this->request->getPost('id'));
				}
			}
			session()->setFlashData('success', 'Data Berhasil Diubah');
			return redirect()->to(base_url('izin/cuti'));
		}
		else {
			if($this->request->getPost('id') == 0){
				$data= [
					'nik' => session()->get('nik'),
					'izin_type' => $type,
					'start_date' => $this->request->getPost('start_date'),
					'end_date' => $this->request->getPost('end_date'),
					'status' => 'Waiting Approval',
					'estimasi_biaya' => $this->request->getPost('est_biaya'),
					'history_perjalanan' => $this->request->getPost('keterangan'),
				];
				$izin = $this->izinModel->insert_izin($data);
				$history = explode("|",$profil['history_perjalanan']);
				array_push($history, $izin["id_izin"]);
				$profil['history_perjalanan'] = $profil['history_perjalanan'] == '' || $profil['history_perjalanan'] == null ? $izin["id_izin"] :implode("|", $history);
				
				$this->profilModel->update_profile($profil, $profil['id_profile']);
				session()->setFlashData('success', 'Data Berhasil Ditambahkan');
				return redirect()->to(base_url('izin/perjalanan_bisnis'));
			}else{
				$data= [
					'nik' => session()->get('nik'),
					'izin_type' => $type,
					'start_date' => $this->request->getPost('start_date'),
					'end_date' => $this->request->getPost('end_date'),
					'status' => 'Waiting Approval',
					'estimasi_biaya' => $this->request->getPost('est_biaya'),
					'history_perjalanan' => $this->request->getPost('keterangan'),
				];
				$this->izinModel->update_izin($data, $this->request->getPost('id'));
				session()->setFlashData('success', 'Data Berhasil Diubah');
				return redirect()->to(base_url('izin/perjalanan_bisnis'));
			}
		}
	}

	public function edit($id){
		$type = $_GET["type"];
		$type = intval($_GET["type"]);
		$kuota_cuti = 0;
		$nik = session()->get('nik');
		$profil = $this->profilModel->get_profile_by_nik($nik);
		$kuota_cuti = $profil["kuota_cuti"] == null ? 0 : $profil["kuota_cuti"];
		
		$data= [
			'title' =>$type == 1? 'Form Pengajuan Cuti' : 'Form Pengajuan Perjalanan Bisnis',
			'subTitle' => $type == 1? 'Edit Cuti' : 'Edit Perjalanan Bisnis',
			'type' => $type,
			'kuota_cuti' => $kuota_cuti,	 
			'izin' => $this->izinModel->get_izin_by_id($id),
			'isi' => 'v_form_izin',
		];	
		echo view('layout/v_wrapper', $data);
	}

	public function cancel($id){
		$nik = session()->get('nik');
		$type = intval($_GET["type"]);
		$izin = $this->izinModel->get_izin_by_id($id);
		$izin['status'] = "Canceled";
		$this->izinModel->update_izin($izin, $id);
		$profil = $this->profilModel->get_profile_by_nik($nik);
		
		if($type == 1) {
			$end = strtotime($izin['end_date']);
			$start = strtotime($izin['start_date']);
			$datediff = $end - $start;  
			$diff = round($datediff /60/60/24) + 1;
			$profil["kuota_cuti"] += intval($diff);
			$this->profilModel->update_profile($profil, $profil['id_profile']);
			session()->setFlashData('success', 'Izin Sudah Dicancel');
			return redirect()->to(base_url('izin/cuti'));
		}else {
			session()->setFlashData('success', 'Izin Sudah Dicancel');
			return redirect()->to(base_url('izin/perjalanan_bisnis'));
		}
	}

}
