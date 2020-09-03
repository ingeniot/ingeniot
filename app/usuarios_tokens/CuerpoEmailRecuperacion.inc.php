<?php
ob_start();
?>
<table width="100%" cellpadding="0" cellspacing="0"
style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;margin:0">
	<tbody>
		<tr style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;margin:0">
		<td style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;color:#348eda;box-sizing:border-box;font-size:14px;vertical-align:top;margin:0;padding:0 0 20px" valign="top">
			<h2>Recuperá tu clave <span class="il">IngenIoT</span>
			</h2>
		</td>
	</tr>
	<tr style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;margin:0">
		<td style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;margin:0;padding:0 0 20px" valign="top">
			Para poder recuperar la clave, hacé click sobre el siguiente botón.
		</td>
	</tr>
	<tr style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;margin:0">
		<td style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;margin:0;padding:0 0 20px" valign="top">
			Necesitamos enviarte información crítica sobre tu servicio y es importante que tengamos una dirección de correo electrónico precisa.
		</td>
	</tr>
	<tr style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;margin:0">
		<td style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;margin:0;padding:0 0 20px" valign="top">
			<a href=<?="https://ingeniot.tk/resetear_clave/".$token?>
				style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;color:#fff;text-decoration:none;line-height:2em;font-weight:bold;text-align:center;display:inline-block;border-radius:5px;text-transform:capitalize;background-color:#348eda;margin:0;border-color:#348eda;border-style:solid;border-width:10px 20px"
				target="_blank">Recuperá tu clave</a>
			</td>
			<!--								<td style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;margin:0;padding:0 0 20px" valign="top">
			<a href="http://ingeniot.ml:8080/api/noauth/activate?activateToken=T5mYyOs22BR2dPRweBHNvVVtviUSJz"
			style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;color:#fff;text-decoration:none;line-height:2em;font-weight:bold;text-align:center;display:inline-block;border-radius:5px;text-transform:capitalize;background-color:#348eda;margin:0;border-color:#348eda;border-style:solid;border-width:10px 20px"
			target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://ingeniot.ml:8080/api/noauth/activate?activateToken%3DT5mYyOs22BR2dPRweBHNvVVtviUSJz&amp;source=gmail&amp;ust=1595196343991000&amp;usg=AFQjCNGD0xUAvo_H8komoCZ_4tA4DSyJvg">Activate tu cuenta</a>
		</td>  -->
	</tr>
	<tr style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;margin:0">
		<td style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;vertical-align:top;margin:0;padding:0 0 20px" valign="top">
			Este correo fue enviado a
			<a href="<?="mailto:".$email?>"  style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:12px;color:#999;text-decoration:underline;margin:0"
			target="_blank"><?=$email?></a> por
			<span class="il">IngenIoT</span>
		</td>
	</tr>
</tbody>
</table>
<?php
$cuerpo = ob_get_contents();
ob_end_clean();
?>
