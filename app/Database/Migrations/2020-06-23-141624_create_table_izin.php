<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableIzin extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_izin'	=>[
			'type'	=> 'INT',
			'constraint'	=> 11,
			'unsigned'	=> TRUE,
			'auto_increment' => TRUE
			],
			'nik'	=>[
			'type'	=> 'INT',
			'constraint'	=> 50,
			],
			'izin_type'	=>[
			'type'	=> 'INT',
			'constraint'	=> 5,
			],
			'start_date'	=>[
			'type'	=> 'DATE',
			],
			'end_date'	=>[
			'type'	=> 'DATE',
			],
			'estimasi_biaya'	=>[
			'type'	=> 'DECIMAL',
			'constraint'	=> 18,2,
			],
			'status'	=>[
			'type'	=> 'VARCHAR',
			'constraint'	=> 20,
			],
			'history_perjalanan'	=>[
			'type'	=> 'VARCHAR',
			'constraint'	=> 100,
			],
		]);
		$this->forge->addKey('id_izin', TRUE);
		$this->forge->createTable('izin');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
