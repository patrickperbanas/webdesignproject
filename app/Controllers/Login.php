<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Controllers\Home;

class Login extends BaseController
{

    public function __construct()
	{
        helper('form');
        $this->LoginModel = new LoginModel();
    }
    
	public function index()
	{
		echo view('v_login');
    }
    
    public function cek_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $this->LoginModel->cek_login($username, $password);

        $role = (int)$cek['role'];

        if (!empty($cek)) {
            session()->set('username', $cek['username']);
            session()->set('nik', $cek['nik']);
            session()->set('role', $role);
            return redirect()->to(base_url('home'));    
        } else {
            // jika username dan password salah
            session()->setFlashdata('gagal', 'Username Atau Password Salah !!!');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout() 
    {
        session()->remove('username');
        session()->remove('nik');
        session()->remove('role');
        session()->setFlashdata('sukses', 'Anda Berhasil Logout !!!');
        return redirect()->to(base_url('login'));
    }

}
