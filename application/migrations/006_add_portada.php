<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_portada extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_column('paginas',  array(
							'portada' => array(
									'type' => 'VARCHAR',
									'constraint' => '250',
							),
					)
			);
	}

	public function down()
	{
		$this->dbforge->drop_column('paginas','portada');
	}
}
