<?php

	Class clsCliente Extends crud {

		var $_key = 'id';
		var $_table = 'clientes';
		var $_metadata = array(
			'title' => 'Miembros y suscriptores',
			'title_single' => 'Miembros y suscriptores',
			'title_code' => 'clientes',
			'form_page' => 'cliente_form.php',
			'list_page' => 'cliente_list.php'
		);

	}

?>