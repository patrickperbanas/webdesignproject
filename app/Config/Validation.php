<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	// validasi login
	public $authlogin = [
		'username'         => 'required',
		'password'      => 'required'
	];
	 
	public $authlogin_errors = [
		'username'=> [
			'required'  => 'Username wajib diisi.',
			'valid_email'   => 'Username tidak valid'
		],
		'password'=> [
			'required'  => 'Password wajib diisi.'
		]
	];

	 // validasi register
	public $authregister = [
		'nik'              => 'required|alpha_numeric_space|min_length[3]|max_length[35]|is_unique[user.nik]',
		'username'          => 'required|alpha_numeric|is_unique[user.username]|min_length[8]|max_length[35]',
		'password'          => 'required|string|min_length[8]|max_length[35]',
		'confirm_password'  => 'required|string|matches[password]|min_length[8]|max_length[35]',
	];
	 
	public $authregister_errors = [
		'nik'=> [
			'required'      => 'NIK wajib diisi',
			'valid_email'   => 'NIK tidak valid',
			'is_unique'     => 'NIK sudah terdaftar'
		],
		'username'=> [
			'required'      => 'Username wajib diisi',
			'alpha_numeric' => 'Username hanya boleh berisi huruf dan angka',
			'is_unique'     => 'Username sudah terdaftar',
			'min_length'    => 'Username minimal 8 karakter',
			'max_length'    => 'Username maksimal 35 karakter'
		],
		'password'=> [
			'required'      => 'Password wajib diisi',
			'string'        => 'Password hanya boleh berisi huruf, angka, spasi dan karakter lain',
			'min_length'    => 'Password minimal 8 karakter',
			'max_length'    => 'Password maksimal 35 karakter'
		],
		'confirm_password'=> [
			'required'      => 'Konfirmasi password wajib diisi',
			'string'        => 'Konfirmasi password hanya boleh berisi huruf, angka, spasi dan karakter lain',
			'matches'       => 'Konfirmasi password tidak sama dengan password',
			'min_length'    => 'Konfirmasi password minimal 8 karakter',
			'max_length'    => 'Konfirmasi password maksimal 35 karakter'
		]
	];

	public $authcuti = [
		'start_date'=>'required',
		'end_date' =>'required',	
	];

	public $authcuti_errors = [
		'start_date'=> [
			'required'      => 'Start Date Harus Diisi',
		],
		'end_date'=> [
			'required'      => 'End Date Harus Diisi',
		],
	];

	public $authperjalananbisnis = [
		'start_date'=>'required',
		'end_date' =>'required',
		'estimasi_biaya'=>'required|numeric|min_length[3]',	
		'keterangan'=>'required',
	];

	public $authperjalananbisnis_errors = [
		'start_date'=> [
			'required'      => 'Start Date Harus Diisi',
		],
		'end_date'=> [
			'required'      => 'End Date Harus Diisi',
		],
		'estimasi_biaya'=>[
			'required'=> "Biaya harus diisi",
			'numeric'=> "Biaya hanya bisa numeric",
			'min_length'=> "Biaya minimal 3 digit",
		],	
		'keterangan'=>[
			'required' => "keterangan harap diisi"
		],
	];
	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
