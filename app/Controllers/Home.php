<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfilModel;
use App\Models\dashboardModel;

class Home extends BaseController
{
	protected $ProfilModel;

	public function __construct()
	{
		$this->ProfilModel = new ProfilModel();
		$this->dashboardModel = new dashboardModel();
	}

	public function index()
	{
		// Proteksi Halaman
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}
		$data= [
			'title' => 'Sistem Informasi Employee',
			'subTitle' => 'Dashboard',
			'total_profile' => $this->dashboardModel->getCountProfile(),
			'total_cuti' => $this->dashboardModel->getCountIzin(1),
			'total_perjalanan' => $this->dashboardModel->getCountIzin(2),
			'total_user' => $this->dashboardModel->getCountUser(),
			'latest_izin' => $this->dashboardModel->getLatestIzin(),
			'grafik' => $this->dashboardModel->getGrafik(),
			'isi' => 'v_dashboard'
		];
		
		$chart= [
			'grafik' => $this->dashboardModel->getGrafik(),
		];
		
		echo view('layout/v_wrapper', $data);
		echo view('v_grafik', $chart);
	}

	
	public function profil()
	{
		
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}

		$data= [
			'title' => 'List Menu Profile',
			'subTitle' => 'Profile',
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
			'subTitle' => 'Tambah Profile',
			'title' => 'Form Pengisian Data Profil',
			'profil' => $this->ProfilModel->get_profil(),
			'isi' => 'v_add_profile',
		];
		echo view('layout/v_wrapper', $data);
	}

	public function simpan_profile()
	{
		$validation = \Config\Services::validation();
		
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}

		$data= [
			'nik' => $this->request->getPost('nik'),
			'nama' => $this->request->getPost('nama'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
			'alamat' => $this->request->getPost('alamat'),
			'jabatan' => $this->request->getPost('jabatan'),
            'kuota_cuti' => $this->request->getPost('kuota_cuti'),
			'history_perjalanan' => $this->request->getPost('history_perjalanan'),
		];

		if($validation->run($data, 'profile') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('home/tambah_profil'));
		} else {
			$this->ProfilModel->insert_profile($data);
			session()->setFlashdata('success', 'Data Profile Berhasil Ditambahkan');
			return redirect()->to(base_url('home/profil'));
		}
	}

	public function edit_profile($id_profile)
	{
		
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}	

		$data= [
			'subTitle' => 'Edit Profile',
			'title' => 'Edit Data Profile',
			'profil' => $this->ProfilModel->edit_profile($id_profile),
			'isi' => 'v_edit_profile',
		];

		echo view('layout/v_wrapper', $data);
	}

	public function update_profile($id_profile)
	{
		$validation = \Config\Services::validation();
		
		if (session()->get('username')=='') {
			session()->setFlashdata('gagal', 'Anda Belum Login !!!');
			return redirect()->to(base_url('login'));
		}

		$data= [
			'id_profile' => $this->request->getPost('id_profile'),
			'nik' => $this->request->getPost('nik'),
			'nama' => $this->request->getPost('nama'),
			'alamat' => $this->request->getPost('alamat'),
			'tgl_lahir' => $this->request->getPost('tgl_lahir'),
			'jabatan' => $this->request->getPost('jabatan'),
			'kuota_cuti' => $this->request->getPost('kuota_cuti'),
			'history_perjalanan' => $this->request->getPost('history_perjalanan'),
		];

		if($validation->run($data, 'editprofile') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('home/edit_profile/'.$data['id_profile']));
		} else {
			$this->ProfilModel->update_profile($data, $id_profile);
			session()->setFlashData('success', 'Data Berhasil Diupdate !!!');
			return redirect()->to(base_url('home/profil'));
		}
	}

	public function delete_profile($id_profile)
	{
		$this->ProfilModel->delete_profile($id_profile);
		session()->setFlashData('success', 'Data Berhasil Dihapus !!!');
		return redirect()->to(base_url('home/profil'));
	}

}
