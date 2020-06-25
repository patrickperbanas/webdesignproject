<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\izinModel;
use App\Models\ProfilModel;

class Approval extends BaseController
{

    protected $izinModel;
	protected $profilModel;

    public function __construct()
	{
		$this->izinModel = new izinModel();
		$this->profilModel = new profilModel();
    }
    
	public function list()
	{
        if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}if(session()->get('role')!=2){
            session()->setFlashdata('gagal', 'Anda Tidak Punya Akses !!!');
            return redirect()->to(base_url('home/profil'));
		}
		$nik = session()->get('nik');
			$data= [
				'title' => 'Laporan Semua Pegawai',
				'izin' => $this->izinModel->get_all_izin_to_approve($nik),
				'isi' => 'v_approval_list',
            ];
			echo view('layout/v_wrapper', $data);
	}

	public function view($id){
		$izin = $this->izinModel->get_izin_by_id($id);
		$profil = $this->profilModel->get_profile_by_nik($izin['nik']);
		$data= [
			'title' =>"Detail Izin Pegawai",
			'type' => $type,
			'profil' => $profil,	 
			'izin' => $izin,
			'isi' => 'v_approval_read',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function approve($id){
		$izin = $this->izinModel->get_izin_by_id($id);
		$izin['status'] = "Approved";
		$this->izinModel->update_izin($izin, $id);
		session()->setFlashData('success', 'Izin '. $izin['id_izin'] .' Sudah Diterima');
		return redirect()->to(base_url('approval/list'));
	}

	public function reject($id){
		$izin = $this->izinModel->get_izin_by_id($id);
		$izin['status'] = "Rejected";
		$profil = $this->profilModel->get_profile_by_nik($izin['nik']);
		$this->izinModel->update_izin($izin, $id);

		if($izin['izin_type'] == 1) {
			$end = strtotime($izin['end_date']);
			$start = strtotime($izin['start_date']);
			$datediff = $end - $start;  
			$diff = round($datediff /60/60/24) + 1;
			$profil["kuota_cuti"] += intval($diff);
			$this->profilModel->update_profile($profil, $profil['id_profile']);
		}
		session()->setFlashData('success', 'Izin '. $izin['id_izin'] .' Sudah Ditolak');
		return redirect()->to(base_url('approval/list'));

	}
}
