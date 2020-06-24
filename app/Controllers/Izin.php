<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\izinModel;

class Izin extends BaseController
{

    protected $izinModel;

    public function __construct()
	{
		$this->izinModel = new izinModel();
    }
    
	public function cuti()
	{
		$data= [
			'title' => 'Menu Cuti',
			'cuti' => $this->izinModel->get_cuti(),
			'isi' => 'v_cuti',
		];
		echo view('layout/v_wrapper', $data);
	}

}
