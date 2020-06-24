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
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}
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
		
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}

		$data= [
			'title' => 'Judul Menu Profil',
			'profil' => $this->ProfilModel->get_profil(),
			'isi' => 'v_profil',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function tambah_profil()
	{
		
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}

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

	public function edit_profile($id_profile)
	{
		
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}	

		$data= [
			'title' => 'Edit Data Profile',
			'profil' => $this->ProfilModel->edit_profile($id_profile),
			'isi' => 'v_edit_profile',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function update_profile($id_profile)
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
		$this->ProfilModel->update_profile($data, $id_profile);
		session()->setFlashData('success', 'Data Berhasil Diupdate !!!');
		return redirect()->to(base_url('home/profil'));
	}

	public function delete_profile($id_profile)
	{
		$this->ProfilModel->delete_profile($id_profile);
		session()->setFlashData('success', 'Data Berhasil Dihapus !!!');
		return redirect()->to(base_url('home/profil'));
	}

}
