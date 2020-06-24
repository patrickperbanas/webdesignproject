<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProfile extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_profile'	=>[
			'type'	=> 'INT',
			'constraint'	=> 11,
			'unsigned'	=> TRUE,
			'auto_increment' => TRUE
			],
			'nik'	=>[
			'type'	=> 'INT',
			'constraint'	=> 50,
			],
			'nama'	=>[
			'type'	=> 'VARCHAR',
			'constraint'	=> 100,
			],
			'tgl_lahir'	=>[
			'type'	=> 'DATE',
			'constraint'	=>'',
			],
			'alamat'	=>[
			'type'	=> 'VARCHAR',
			'constraint'	=> 150,
			],
			'jabatan'	=>[
			'type'	=> 'VARCHAR',
			'constraint'	=> 30,
			],
			'kuota_cuti'	=>[
			'type'	=> 'INT',
			'constraint'	=> 10,
			],
			'history_perjalanan'	=>[
			'type'	=> 'VARCHAR',
			'constraint'	=> 100,
			],
		]);
		$this->forge->addKey('id_profile', TRUE);
		$this->forge->createTable('profile');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
