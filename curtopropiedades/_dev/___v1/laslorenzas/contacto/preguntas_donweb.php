<?php
if(isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["consulta"]) ){
$to = "info@hugoromero.com.ar";
$subject = "Mensaje Enviado";
$contenido .= "Nombre: ".$_POST["nombre"]."\n";
$contenido .= "Email: ".$_POST["email"]."\n\n";
$contenido .= "Teléfono: ".$_POST["telefono"]."\n\n";
$contenido .= "Consulta: ".$_POST["consulta"]."\n\n";
$header = "From: ventas@curtopropiedades.com\nReply-To:".$_POST["email"]."\n";
$header .= "Mime-Version: 1.0\n";
$header .= "Content-Type: text/plain";
if(mail($to, $subject, $contenido ,$header)){
echo "Mail Enviado.";
	// header("Location: http://www.curtopropiedades.com/laslorenzas/index.html#Mensaje-Enviado");
}
}
?>