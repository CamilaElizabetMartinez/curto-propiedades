<?php

	$permit = '';

	$pathRoot = '../';

	require_once($pathRoot . 'inc/common.php');

	require_once($pathRoot . 'lib/cls/cls.propiedad.php');

	require_once($pathRoot . 'lib/cls/cls.attach.php');

	//require_once($pathRoot . 'lib/cls/cls.sys_import.php');

	/*--------------------------------------------------------------------------------------------------------*/

	$cnt_nuevos = 0;
	$cnt_actualizados = 0;

	/*--------------------------------------------------------------------------------------------------------*/

	// Ordeno los archivos .xml del directorio para usar el ultimo:

	$arrayXMLs = array();

	if ($handle = opendir('xml')) {
		while (false !== ($file = readdir($handle))) {
			if(preg_match("/\.xml$/", $file)) 
				$arrayXMLs[]=$file;
		}
		closedir($handle);
	}
	sort($arrayXMLs);

	$last_xml_file = $arrayXMLs[count($arrayXMLs)-1];

	/*--------------------------------------------------------------------------------------------------------*/

	if(count($arrayXMLs)>0) {

		// chequeo que el archivo no se haya procesado ya:
		
		$filename_in_db = $dbh->single("select id from sys_import where filename=:filename", array("filename"=>$last_xml_file));

		if ($filename_in_db=='') {

			// Limpio la tabla propiedades y la tabla de imagenes de propiedades:

			$dbh->query("delete from propiedades");
			$dbh->query("delete from sys_attach where ref_table='propiedades'");

			$xml = simplexml_load_file('xml/'.$last_xml_file, 'SimpleXMLElement', LIBXML_NOCDATA);

			// Muevo el xml al directorio /ready:

			rename('xml/'.$last_xml_file, 'ready/'.$last_xml_file);

			foreach ($xml->propiedad as $prop) {

				$profit_id = $prop->id_propiedad;

				$arr_obj = array(
					'profit_id' => (string) $profit_id,
					'activo' => (string) 'S',
					'tipo_propiedad' => (string) syncTipoPropiedad($dbh, $prop->id_tipo_propiedad),
					'pais' => (string) $prop->nombre_pais,
					'provincia' => (string) ucwords(mb_strtolower($prop->nombre_provincia, 'UTF-8')),
					'localidad' => (string) ucwords(mb_strtolower($prop->nombre_localidad, 'UTF-8')),
					'zona' => (string) ucwords(mb_strtolower($prop->nombre_zona, 'UTF-8')),
					'orientacion' => (string) ucwords(mb_strtolower($prop->nombre_orientacion, 'UTF-8')),
					'ubicacion' => (string) ucwords(mb_strtolower($prop->nombre_ubicacion, 'UTF-8')),
					'loc_lat' => (string) $prop->latitud_propiedad,
					'loc_long' => (string) $prop->longitud_propiedad,
					'estado_en_profit' => (string) $prop->telefono_propiedad,
					'en_venta' => (string) syncAfirmaciones($prop->en_venta),
					'precio_venta' => (string) $prop->importe_venta,
					'moneda_venta_id' => (string) syncMoneda($dbh, $prop->id_moneda_venta),
					'en_alquiler' => (string) syncAfirmaciones($prop->en_alquiler),
					'precio_alquiler' => (string) $prop->importe_alquiler,
					'moneda_alquiler_id' => (string) syncMoneda($dbh, $prop->id_moneda_alquiler),
					'sup_cubierta' => (string) $prop->superficie_cubierta_propiedad,
					'sup_total' => (string) $prop->superficie_total_propiedad,
					'cant_habitaciones' => (string) $prop->numero_ambientes_propiedad,
					'cant_banos' => (string) $prop->cantidad_ba??os_propiedad,
					'cant_cocheras' => (string) $prop->id_cochera_propiedad,
					'antiguedad' => (string) $prop->antiguedad_propiedad,
					'titulo_es' => (string) ucwords(mb_strtolower($prop->nombre_localidad . ', '. $prop->calle .' '. $prop->numero_calle, 'UTF-8')),
					'descripcion_es' => (string) $prop->observaciones_propiedad,
					'titulo_en' => (string) ucwords(mb_strtolower($prop->nombre_localidad . ', '. $prop->calle .' '. $prop->numero_calle, 'UTF-8')),
					'descripcion_en' => (string) $prop->inventario_propiedad,
					'titulo_pt' => (string) ucwords(mb_strtolower($prop->nombre_localidad . ', '. $prop->calle .' '. $prop->numero_calle, 'UTF-8')),
					'descripcion_pt' => (string) $prop->dependencias_propiedad
				);

				$id_in_db = $dbh->single("select id from propiedades where profit_id=:profit_id", array("profit_id"=>$profit_id));

				if ($id_in_db!='') {
					//echo 'update<br>';
					$cnt_actualizados = $cnt_actualizados+1;
					$arr_obj['id'] = $id_in_db;
					$arr_obj['fecha_modificado'] = date('Y-m-d H:i:s');
					// Si actualizo le quito el nodo 'activo' para que no modifique el estado del registro en la db y se maneje desde el admin:
					unset($arr_obj['activo']);
					$obj = new clsPropiedad($arr_obj);
					$obj->save();
				} else {
					//echo 'nuevo<br>';
					$cnt_nuevos++;
					// Si es nuevo el registro estara siempre activo:
					$arr_obj['fecha_creado'] = date('Y-m-d H:i:s');
					$obj = new clsPropiedad($arr_obj);
					$obj->create();
				}

				$last_id = $dbh->single("select id from propiedades where profit_id=:profit_id", array("profit_id"=>$profit_id));

				foreach ($prop->multimedia_propiedad as $files) {

					foreach ($files->archivo as $file) {

						
						if ($file[0]->descripcion_tipo_archivo=='360') {
							$ref_attach_id = '2';
						}

						if ($file[0]->descripcion_tipo_archivo && $file[0]->descripcion_tipo_archivo!='360') {
							$ref_attach_id = '1';
						}

						// Chequeo si es una foto 360 y asigno el tipo de attach:
						$file_type = substr($file[0]->descripcion_archivo,0,4);

						if ($file_type=='360_' or $file_type=='360-') {
							$ref_attach_id = '2';
						} else {
							$ref_attach_id = '1';
						}

						$arr_attach = array(
							'ref_id' => $last_id,
							'ref_table' => 'propiedades',
							'ref_attach_id' => $ref_attach_id,
							'orden' => $file[0]->orden_archivo,
							'file' => $file[0]->nombre_archivo,
							'activo' => 'S'
						);

						$attach_in_db = $dbh->single("select id from sys_attach where file=':file' and ref_id=':ref_id' ", array("file"=>$file[0]->nombre_archivo, "ref_id"=>$last_id));

						if ($attach_in_db=='') {
							//echo 'nuevo imagen<br>';
							$attach = new clsAttach($arr_attach);
							$attach->create();
						} else {
							//echo 'actualizo imagen<br>';
							$arr_attach['id'] = $attach_in_db;
							$attach = new clsAttach($arr_attach);
							$attach->save();
						}

					}

				}

			}

			// una vez que actualizo las propiedades inactivo aquellas propiedades que no esten en alquiler o en venta:

			$dbh->query("update propiedades set activo = 'N' where en_venta = 'N' and en_alquiler = 'N'");

			$dbh->query("update propiedades set activo = 'N' where estado_en_profit = 'C' or estado_en_profit = 'CANCELADO'");

			// grabo en sys_import el nombre del ultimo xml importado:

			$dbh->query("insert into sys_import (filename, date) values ('". $last_xml_file ."',now())");
			//echo "insert into sys_import (filename, date) values ('". $last_xml_file ."',now())";

			echo nl2br('Fecha: '. date('Y/m/d h:i:sa') .' // Registros nuevos: '. $cnt_nuevos . ' Registros actualizados: '. $cnt_actualizados . "\n");

		} else {

			echo nl2br('Fecha: '. date('Y/m/d h:i:sa') .' // El archivo '. $last_xml_file . ' ya fue procesado.' . "\n");

		}

	} else {
		
		echo nl2br('Fecha: '. date('Y/m/d h:i:sa') .' // No se encontro xml' . "\n");

	}

	/*------------------------------------------------------------------------
	
	EQUIVALENCIAS:

	------------------------------------------------------------------------*/

	function syncAfirmaciones ($data) {
		if ($data=='SI') {
			return 'S';
		} else {
			return 'N';
		}
	}

	function syncTipoPropiedad ($cnn, $data) {
		$ret = $cnn->single("select id from sys_refs_childs where ref_id = 2 and ref_profit_id=:ref_profit_id", array("ref_profit_id"=>$data));
		return ($ret);
	}

	function syncMoneda ($cnn, $data) {
		$ret = $cnn->single("select id from sys_refs_childs where ref_id = 3 and ref_profit_id=:ref_profit_id", array("ref_profit_id"=>$data));
		return ($ret);
	}

?>