<?php
/* $sendto is the email where form results are sent to */
// $sendto = "info@hugoromero.com.ar, cecilia@estudiosalto.com.ar, lucia@estudiosalto.com.ar";
$sendto = "info@hugoromero.com.ar";
// $sendto = "ventas@curtopropiedades.com";
$md = "Web Las Lorenzas";
$asunto = 'Nuevo mensaje desde la '.$md;
$subject = $_POST['email_hr'];
/* $ccto is the email where form results can be carbon copied to */
$ccto = "";
$report_errors = "NONE";
$NombreRemitente = $_POST['email_hr'];



$setokurl = "1";
$okurls = "http://www.laslorenzas.com.ar,http://www.laslorenzas.com.ar,192.168.0.195";
/* --- I F   S E T   O K   U R L   = 1  ----- */
if ($setokurl == "1") {
    $found_url = "0";
    $referer = $_SERVER["HTTP_REFERER"];
    $referer = str_replace("://", "[CS]", $referer);
    $referer_sp = explode("/", $referer);
    $referer = "$referer_sp[0]";
    $referer .= "/";
    $referer = str_replace("[CS]", "://", $referer);
    $referer = strtolower($referer);

    $okurls = explode(",", $okurls);

    foreach ($okurls as $myokurls) {

        $myokurls = strtolower($myokurls);

        if ($referer == strtolower($myokurls)) {
            $found_url = "1";
        }
    }
    if ($found_url == "0") {
        $ERROR_action = "bad_okurl";
//  include("$PATH_error$PAGE_error");
    }
}
/* --- E N D   I F   S E T   O K   U R L   = 1  --- */
/* IF OLDER VERSION OF PHP CONVERT TO NEWER VARIABLES */
if (!$_POST) {
    $_POST = "$HTTP_POST_VARS";
}

if (!$_SERVER) {
    $_SERVER = "$HTTP_SERVER_VARS";
}
$year = date("Y");
$month = date("m");
$day = date("d");
$hour = date("h");
$min = date("i");
$tod = date("a");

$ip = $_SERVER["REMOTE_ADDR"];

$SEND_prnt .= '<table background="http://www.hugoromero.com.ar/laslorenzas/contacto/cabeza_contacto.jpg" width="810" height="164" align="center"><tr><td></td></tr></table><br/>';

$SEND_prnt .= "<table width='824' height='50' align='center' style='text-align:center; background-color:#f9f9f9;'><tr><td>El siguiete formulario ha sido enviado por  <strong>" . $_POST['nombre'] . "</strong>&nbsp;" . "el <strong style='color:#eb0404;'>$monthnameactual $day/$month/$year </strong>a las <strong>$hour:$min $tod</strong> \n</td></tr></table>";

$SEND_prnt .= "<table width='820' height='200' align='center''>";

$SEND_prnt .= "<table width='820' height='300' align='center' bgcolor='#f9f9f9' cellpading='10' cellspacing='8'>";

$SEND_prnt .= '
       <tr>
        <td height="25">
          <font color="#333333" size="2" face="Arial" style="padding-left:10px;">Nombre</font>
        </td>

        <td>
            <div style="padding:10px;width:96%;background-color:#fff;border: 1px solid #ddd;">'
        . $message = $_POST[nombre] .
        '</div>
        </td>
      </tr>
      <tr>
        <td height="25">
          <font color="#333333" size="2" face="Arial" style="padding-left:10px;">Email</font>
        </td>

        <td>
            <div style="padding:10px;width:96%;background-color:#fff;border: 1px solid #ddd;">'
        . $message = $_POST[email] .
        '</div>
        </td>
      </tr>
      <tr>
        <td height="25">
          <font color="#333333" size="2" face="Arial" style="padding-left:10px;">Teléfono</font>
        </td>

        <td>
            <div style="padding:10px;width:96%;background-color:#fff;border: 1px solid #ddd;">'
        . $message = $_POST[telefono] .
        '</div>
        </td>
      </tr>
      <tr>
        <td height="25">
          <font color="#333333" size="2" face="Arial" style="padding-left:10px;">Consulta</font>
        </td>

        <td>
            <div style="padding:10px;width:96%;background-color:#fff;border: 1px solid #ddd;">'
        . $message = $_POST[consulta] .
        '</div>
        </td>
      </tr>
     </br></br></br>
';
$SEND_prnt .= "</table>";
// $SEND_prnt .= '<table width="820" height="50" align="center" style="text-align:center; background-color:#f9f9f9; border:1px solid #d5d5d5;"><tr><td>
// <p style="color:#333; font-family:Georgia,' . "'Times New Roman'" . ', Times, serif; font-size:12px;">Este formulario fue dise&ntilde;ado y programado por <a href="http://hugooromero.com.ar/" style="color:#65af34; text-decoration:none;">Hugo Romero</a></p>

// </td></tr></table>';

/* send mail */

if (!$ccto) {
    $header = 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$header .= "From: $NombreRemitente <$SEND_email>\r\nReply-to: $SEND_email";<br />
    $header .= 'From:' . $_POST['email'];
} else {
    $header = 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $header .= "From:  <$SEND_email>\r\nReply-to: $SEND_email";
}
mail($sendto, $asunto, $SEND_prnt, $header);

/* END sendmail */
/* CHECK TO SEE IF FORM SPECIFYS A SUCCESS PAGE */
// if (!$_POST{"success_page"}) {

//     default_success("http://www.curtopropiedades.com/laslorenzas/index.html#Mensaje-Enviado");
// } else {
//     $successpage = $_POST{"success_page"};
//     header("Location: $successpage"); 
//     exit;
// }

header("Location: http://www.curtopropiedades.com/laslorenzas/index.html#Mensaje-Enviado");


//} /* END IF POSTED */  
?>