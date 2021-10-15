<?php

	Class clsPropiedad Extends crud {

		var $_key = 'id';
		var $_table = 'propiedades';
		var $_metadata = array(
			'title' => 'Propiedades',
			'title_single' => 'Propiedad',
			'title_code' => 'propiedades',
			'form_page' => 'propiedad_form.php',
			'list_page' => 'propiedad_list.php'
		);

	}

?>