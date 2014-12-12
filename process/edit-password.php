<?php
	include("../inc/auth.php");
	include("../inc/connection.php");

	if(isset($_POST['update_password']))
	{
		if(isset($_GET['nickname']))
		{
			$nickname = $_GET['nickname'];
		}
		
		# Menerima data input
		$old_pass	= $_POST['ch_old_password'];
		$new_pass	= $_POST['ch_new_password'];
		$re_pass	= $_POST['ch_re_password'];
				
		$pass2 = mysql_real_escape_string(md5($new_pass));

		if($old_pass != "")
		{
			$sqlSelect = mysql_query("SELECT * FROM cw_users WHERE nickname = '$nickname' AND password = '".md5($old_pass)."'") or die(mysql_error());
			$user = mysql_fetch_array($sqlSelect);
			if(md5($old_pass) == $user['password'])
			{
				$sqlUpdate = mysql_query("UPDATE cw_users SET password = '$pass2' WHERE nickname = '$nickname'") or die(mysql_error());
				header('location:../dashboard.php?password=updated');
			}
			else
				{
					echo "<script>alert('Maaf password lama tidak cocok');</script>";
					echo "<script>return false;</script>";
				}
		}
		
	}	# End of submit
?>