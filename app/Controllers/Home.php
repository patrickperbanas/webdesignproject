<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfilModel;

class Home extends BaseController
{
	protected $ProfilModel;

	public function __construct()
	{
		$this->ProfilModel = new ProfilModel();
	}

	public function index()
	{
		$data= [
			'title' => 'Judul Home',
			'isi' => 'v_home',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function cuti()
	{
		$data= [
			'title' => 'Judul Menu Cuti',
			'isi' => 'v_cuti',
		];
		echo view('layout/v_wrapper', $data);
	}


	public function laporan()
	{
		$data= [
			'title' => 'List Data Laporan',
			'isi' => 'v_laporan',
		];
		echo view('layout/v_wrapper', $data);
	}


	public function perjalananBisnis()
	{
		$data= [
			'title' => 'Judul Menu Perjalanan Bisnis',
			'isi' => 'v_perjalananbisnis',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function profil()
	{
		$data= [
			'title' => 'Judul Menu Profil',
			'profil' => $this->ProfilModel->get_profil(),
			'isi' => 'v_profil',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function tambah_profil()
	{
		$data= [
			'title' => 'Form Pengisian Data Profil',
			'profil' => $this->ProfilModel->get_profil(),
			'isi' => 'v_add_profile',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function simpan_profile()
	{
		$data= [
			'nik' => $this->request->getPost('nik'),
			'nama' => $this->request->getPost('nama'),
			'alamat' => $this->request->getPost('alamat'),
			'tgl_lahir' => $this->request->getPost('tgl_lahir'),
			'jabatan' => $this->request->getPost('jabatan'),
			'kuota_cuti' => $this->request->getPost('kuota_cuti'),
			'history_perjalanan' => $this->request->getPost('history_perjalanan'),
		];
		$this->ProfilModel->insert_profile($data);
		session()->setFlashData('success', 'Data Berhasil Ditambahkan');
		return redirect()->to(base_url('home/profil'));
	}



}
