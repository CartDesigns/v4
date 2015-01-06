<!-- BEGIN: change_pass -->
	<div class="txtContentTitle">{LANG_CHANGE_PASS_TITLE}</div>
	<div class="boxContent">
	<!-- BEGIN: session_true -->
	
	<!-- BEGIN: no_error -->
	<p>{LANG_PASS_DESC}</p>
	<!-- END: no_error -->
	
	<!-- BEGIN: error -->
	<p class="txtError">{VAL_ERROR}</p>
	<!-- END: error -->
	
		<!-- BEGIN: form -->
		<form action="index.php?_a=changePass" target="_self" method="post">
			<table border="0" cellspacing="0" cellpadding="3" align="center">
				<tr>
					<td align="right"><strong>{TXT_OLD_PASS}</strong></td>
					<td><input name="oldPass" type="password" autocomplete="off" class="textbox" id="oldPass" maxlength="30" /></td>
				</tr>
				<tr>
					<td align="right"><strong>{TXT_NEW_PASS}</strong></td>
					<td><input name="newPass" type="password" autocomplete="off" class="textbox" id="newPass" maxlength="100" /></td>
				</tr>
				<tr>
					<td align="right"><strong>{TXT_NEW_PASS_CONF}</strong></td>
					<td><input name="newPassConf" type="password" autocomplete="off" class="textbox" id="newPassConf" maxlength="100" /></td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td><input name="submit" type="submit" value="{TXT_SUBMIT}" class="txtButton" /></td>
			  </tr>
		</table>
	</form>
	<!-- END: form -->
	<!-- END: session_true -->
	

</div>
<!-- END: change_pass -->