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

	 // validasi Input Data Profile
	public $profile = [
		'nik' => 'required|is_unique[profile.nik]|string|min_length[3]|max_length[35]',
		'nama' => 'required',
		'tgl_lahir' => 'required',
		'alamat' => 'required',
		'jabatan' => 'required',
		'kuota_cuti' => 'required|numeric',
		'history_perjalanan' => 'required',
	];
	 
	public $profile_errors = [
		'nik'=> [
			'required'      => 'NIK wajib diisi',
			'is_unique'     => 'NIK sudah terdaftar',
			'string'        => 'NIK hanya boleh berisi huruf, angka, spasi dan karakter lain',
		],
		'nama'=> [
			'required'  => 'Nama wajib diisi.'
		],
		'tgl_lahir'=> [
			'required'  => 'Tanggal Lahir wajib diisi.'
		],
		'alamat'=> [
			'required'  => 'Alamat wajib diisi.'
		],
		'jabatan'=> [
			'required'  => 'Jabatan wajib diisi.'
		],
		'kuota_cuti'=> [
			'required'  => 'Kuota Cuti wajib diisi.',
			'numeric' 	=> 'Kuota Cuti hanya boleh berisi angka'
		],
		'history_perjalanan'=> [
			'required'  => 'Histori Perjalanan wajib diisi.'
		]

	];

	// validasi Edit Data Profile
	public $editprofile = [
		'nik' => 'string|min_length[3]|max_length[35]',
		'nama' => 'required',
		'tgl_lahir' => 'required',
		'alamat' => 'required',
		'jabatan' => 'required',
		'kuota_cuti' => 'required|numeric',
		'history_perjalanan' => 'required',
	];
	 
	public $editprofile_errors = [
		'nik'=> [
			'string' => 'NIK hanya boleh berisi huruf, angka, spasi dan karakter lain',
			'min_length'    => 'Username minimal 3 karakter',
			'max_length'    => 'Username maksimal 35 karakter'
		],
		'nama'=> [
			'required'  => 'Nama wajib diisi.'
		],
		'tgl_lahir'=> [
			'required'  => 'Tanggal Lahir wajib diisi.'
		],
		'alamat'=> [
			'required'  => 'Alamat wajib diisi.'
		],
		'jabatan'=> [
			'required'  => 'Jabatan wajib diisi.'
		],
		'kuota_cuti'=> [
			'required'  => 'Kuota Cuti wajib diisi.',
			'numeric' 	=> 'Kuota Cuti hanya boleh berisi angka'
		],
		'history_perjalanan'=> [
			'required'  => 'Histori Perjalanan wajib diisi.'
		]

	];

	// validasi register
	public $authregister = [
		'nik'              => 'required|alpha_numeric_space|min_length[3]|max_length[35]',
		'username'          => 'required|alpha_numeric|is_unique[user.username]|min_length[8]|max_length[35]',
		'password'          => 'required|string|min_length[8]|max_length[35]',
		'confirm_password'  => 'required|string|matches[password]|min_length[8]|max_length[35]',
	];

	public $authregister_errors = [
		'nik'=> [
			'required'      => 'NIK wajib diisi',
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
}
