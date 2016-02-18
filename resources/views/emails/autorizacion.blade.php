<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
  <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
  <title>Autorización Solicitud</title>
  
  <style type="text/css">
body {
  margin: 0;
  padding: 0;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}

table {
  border-spacing: 0;
}

table td {
  border-collapse: collapse;
}

.ExternalClass {
  width: 100%;
}

.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
  line-height: 100%;
}

.ReadMsgBody {
  width: 100%;
  background-color: #ebebeb;
}

table {
  mso-table-lspace: 0pt;
  mso-table-rspace: 0pt;
}

img {
  -ms-interpolation-mode: bicubic;
}

.yshortcuts a {
  border-bottom: none !important;
}

@media screen and (max-width: 599px) {
  .force-row,
  .container {
    width: 100% !important;
    max-width: 100% !important;
  }
}
@media screen and (max-width: 400px) {
  .container-padding {
    padding-left: 12px !important;
    padding-right: 12px !important;
  }
}
.ios-footer a {
  color: #aaaaaa !important;
  text-decoration: underline;
}
</style>
</head>

<body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- 100% background wrapper (grey background) -->
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
  <tr>
    <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

      <br>

      <!-- 600px container (white background) -->
      <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px">
        <tr>
          <td class="container-padding header" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#DF4726;padding-left:24px;padding-right:24px">
            <div align="center">
            	<img alt="" src="http://www.institutodelcorazon.com.co/images/instituto/Historia.png">
            	<!-- img alt="" src="{{ asset('sximo/images/logoico.png')}}"-->
            </div>
          </td>
        </tr>
        <tr>
          <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff">
            <br>
<div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">{{ $nombre }}</div>
<br>

<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">
Hemos recibido la siguiente autorización.
<br><br>
</div>




<div class="subtitle" style="font-family:Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;color:#2469A0">
  Solicitud Autorizada
</div>

<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">
  <ol style="list-style-type:none">
  	<?php 
  		echo '<li>'.$servicio.'<br> <strong>Número Autorización</strong>: '.$autorizacion.' <br> <strong>Radicado</strong>: '.$radicado.'</li>';
  	
  	?>
  </ol>
<div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">
<?php if($ipsAsignada=='800107179'){ ?>
Nos estaremos comunicando en 24 horas para agendarle su cita.
<?php }else{ ?>
Debe presentarse en la oficina de autorizaciones del instituto del Corazón entre 8:00am y 1:00pm para recoger las autorizaciones de servicios que serán realizados en otra institución.
<?php } ?>
<br><br> 
Información sobre autorizaciones no se brinda telefónicamente si tiene alguna inquietud debe acercarse al área de autorizaciones del instituto del corazón en el horario Lunes a Viernes entre las 8am y la 1pm.<br>
Para sugerencias quejas o reclamos por favor escribir al correo electrónico calidad@institutodelcorazon.org.co
  <br><br>
Cordialmente, <br>
Área de autorizaciones<br>
autorizaciones@institutodelcorazon.org.co
</div>  
<br>
<div class="hr" style="height:1px;border-bottom:1px solid #cccccc">&nbsp;</div>
  <em><small>Última Actualización: {{ $fecha }}</small></em>
</div>

<br>
          </td>
        </tr>
        <tr>
          <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px">
            <br>
            <strong>Instituto del Corazón</strong><br>
            <span class="ios-footer">
              Circular 73 N° 39 – 37<br>
              Laureles - Medellín<br>
            </span>
            <a href="http://www.institutodelcorazon.com.co/" style="color:#aaaaaa">www.institutodelcorazon.com.co</a><br>

            <br><br>

          </td>
        </tr>
      </table>
<!--/600px container -->


    </td>
  </tr>
</table>
<!--/100% background wrapper-->

</body>
</html>