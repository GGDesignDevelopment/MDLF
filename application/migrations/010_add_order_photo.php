<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_order_photo extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_column('paginas_fotos',  array(
				'order' => array(
					'type' => 'INT',
					'constraint' => '3',
				),
			)
		);
	}

	public function down()
	{
		$this->dbforge->drop_column('paginas_fotos','order');
	}
}
