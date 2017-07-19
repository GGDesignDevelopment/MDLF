<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tel_mail extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_column('config',  array(
							'telefono' => array(
									'type' => 'VARCHAR',
									'constraint' => '20',
							),
							'email' => array(
									'type' => 'VARCHAR',
									'constraint' => '100',
							),
					)
			);
	}

	public function down()
	{
		$this->dbforge->drop_column('config','telefono');
		$this->dbforge->drop_column('config','email');
	}
}
