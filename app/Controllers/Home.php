<?php namespace App\Controllers;

class Home extends BaseController
{
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
			'title' => 'Judul Menu Laporan',
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
			'isi' => 'v_profil',
		];
		echo view('layout/v_wrapper', $data);
	}



}
