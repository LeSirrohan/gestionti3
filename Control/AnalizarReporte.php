<?
	session_start();
	if (!session_is_registered('_nombre') && empty($_SESSION['_nombre']))
	{
		?><script> alert("Disculpe, debe iniciar sesion para acceder"); </script> <?
		echo '<script language="Javascript">top.location.reload()</script>';
	}
?>
<script type="text/javascript">
 window.open('../pdfphp/php-mysql2.php')
</script>
<link href="Estilos/Verdana.css" rel="stylesheet" type="text/css" />
<table width="550" border="0" align="center">
  <tr>
    <td><p align="center" class="big">&nbsp;</p>
        <p align="center" class="big">&nbsp;</p>
      <p align="center" class="big"><u>Mensaje</u></p>
      <p align="center" class="hoja1"></p></td>
  </tr>
  <tr>
    <td><div align="center" class="bodystyle"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="bodystyle">Impresión de reportes completado</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
  </tr>
</table>