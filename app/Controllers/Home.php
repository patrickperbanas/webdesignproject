<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'tampil' => 'admin/dashboard',
		];
		echo view('wrapp', $data);
	}

	public function profil(){
		$data = [
			'title' => 'Data User',
			'tampil' => 'admin/v_profil_user',
		];
		echo view('wrapp', $data);
	}

	public function perjalanan_bisnis(){
		$data = [
			'title' => 'Data Perjalanan Bisnis',
			'tampil' => 'admin/v_perjalanan_bisnis',
		];
		echo view('wrapp', $data);
	}

	public function cuti(){
		$data = [
			'title' => 'Data Pengajuan Cuti',
			'tampil' => 'admin/v_cuti',
		];
		echo view('wrapp', $data);
	}

	
	public function laporan(){
		$data = [
			'title' => 'Data Laporan',
			'tampil' => 'admin/v_laporan',
		];
		echo view('wrapp', $data);
	}
}
