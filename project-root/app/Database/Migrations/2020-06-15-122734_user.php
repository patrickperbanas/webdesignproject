<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'nik' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'role' => [
				'type'           => 'INT',
				'constraint'     => '100',
			],
		]);
		$this->forge->addKey('user_id', TRUE);
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
