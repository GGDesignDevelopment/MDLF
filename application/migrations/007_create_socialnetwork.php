<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Socialnetwork extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
				'id' => array(
						'type' => 'INT',
						'constraint' => 8,
						'unsigned' => TRUE,
						'auto_increment' => TRUE
				),
				'name' => array(
						'type' => 'VARCHAR',
						'constraint' => '50',
				),
				'icon' => array(
						'type' => 'VARCHAR',
						'constraint' => '50',
				),
				'url' => array(
						'type' => 'VARCHAR',
						'constraint' => '250',
				),
				'enabled' => array(
						'type' => 'VARCHAR',
						'constraint' => '1',
				),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('socialnetwork');
	}

	public function down()
	{
			$this->dbforge->drop_table('socialnetwork');
	}
}
