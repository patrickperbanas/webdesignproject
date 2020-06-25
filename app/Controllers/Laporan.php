<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\izinModel;

class Laporan extends BaseController
{

    protected $izinModel;

    public function __construct()
	{
		$this->izinModel = new izinModel();
    }
    
	public function all_laporan()
	{
        if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}
		if (session()->get('role')==1 || session()->get('role')==2){
			$data= [
				'title' => 'Laporan Semua Pegawai',
				'izin' => $this->izinModel->get_all_izin(),
				'isi' => 'v_laporan',
			];
			echo view('layout/v_wrapper', $data);
		}else{
			$data= [
				'title' => 'Laporan Semua Izin Anda',
				'izin' => $this->izinModel->get_all_izin_by_nik(session()->get('nik')),
				'isi' => 'v_laporan',
			];
			echo view('layout/v_wrapper', $data);
		}
	}

}
