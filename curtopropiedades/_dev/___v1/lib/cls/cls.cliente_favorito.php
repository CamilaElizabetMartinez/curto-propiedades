<?php

	Class clsClienteFavorito Extends crud {

		var $_key = 'id';
		var $_table = 'clientes_favoritos';
		var $_metadata = array(
			'title' => 'Propiedades favoritas',
			'title_single' => 'Propiedad favorita',
			'title_code' => 'clientes_favoritos',
			'form_page' => 'cliente_favoritos_form.php',
			'list_page' => 'cliente_favoritos_list.php'
		);

	}

?>