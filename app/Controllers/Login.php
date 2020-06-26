<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\ProfilModel;
use App\Controllers\Home;

class Login extends BaseController
{

    public function __construct()
	{
        helper('form');
        $this->LoginModel = new LoginModel();
        $this->ProfilModel = new ProfilModel();
    }
    
	public function index()
	{
		echo view('v_login');
    }
    
    public function cek_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $cek = $this->LoginModel->cek_login($username, $password_hash);

        $passIsValid = password_verify($password, $cek['password']);
        

        if ($passIsValid == true) {
            session()->set('username', $cek['username']);
            session()->set('nik', $cek['nik']);
            session()->set('role', $cek['role']);
            return redirect()->to(base_url('home'));    
        } else {
            // jika username dan password salah
            session()->setFlashdata('gagal', 'Username Atau Password Salah !!!');
            return redirect()->to(base_url('login'));
        }

        session()->destroy();
    }

    public function logout() 
    {
        session()->remove('username');
        session()->remove('nik');
        session()->remove('role');
        session()->setFlashdata('sukses', 'Anda Berhasil Logout !!!');
        return redirect()->to(base_url('login'));
    }

    public function register()
    {
        echo view('v_register');
    }

    public function process_register()
    {   
        $validation =  \Config\Services::validation();

        $data = [
			'nik' => $this->request->getPost('nik'),
			'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
			'confirm_password' => $this->request->getPost('confirm_password'),
        ];
        
        if($validation->run($data, 'authregister') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('login/register'));
        } else {
            $datalagi = [
                'nik'         => $this->request->getPost('nik'),
                'username'          => $this->request->getPost('username'),
                'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'         => $this->request->getPost('role'),
            ];

            $simpan = $this->LoginModel->insert_user($datalagi);
            $data_profil = [
                "nik"=> $this->request->getPost('nik'),
                "Jabatan"=> $this->request->getPost('role') == 1?"Admin" : $this->request->getPost('role') == 2? "Manager": "Staff",
                "kuota_cuti"=>$this->request->getPost('role') == 1?15 : $this->request->getPost('role') == 2? 20: 12,
            ];
            $simpan_profile = $this->ProfilModel->insert_profile($data_profil);
            // $this->LoginModel->insert_user($data);
            if($simpan) {
                session()->setFlashdata('success', 'Register Berhasil');
                return redirect()->to(base_url('login/register'));
            }
        }
    }
}



 

