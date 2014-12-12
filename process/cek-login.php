<?php
	include("../inc/connection.php");
	
	date_default_timezone_set("Asia/Bangkok");
	$datetime = date('Y-m-d H:i:s', time());

	# Menerima data input
	$nick = $_POST['nickname'];
	$pass = $_POST['password'];
	$pass2 = md5($_POST['password']);
	
	# Mencegah SQL Injection
	$nickname = mysql_real_escape_string($nick);
	$password = mysql_real_escape_string($pass2);
	
	# Mencocokan data input dengan database
	$sqlUser = mysql_query("SELECT * FROM cw_users WHERE nickname = '$nickname' AND password = '$password'") or die(mysql_error());
	$data = mysql_fetch_array($sqlUser);
	# Jika data cocok
	if( mysql_num_rows($sqlUser) == 1 )
	{
		# Jika status user tidak aktif
		if($data['status'] == "0")
		{
			echo "<script>alert('Maaf, akun Anda belum aktif');</script>";
			echo "<script>window.location = '../index.php'; </script>";
		}
		# Jika status user aktif
		elseif($data['status'] == "1")
			{
				session_start();
				$_SESSION['nickname']	= $nickname;			# Sesi login berdasarkan Username
				$_SESSION['user_id']	= $data['user_id'];		# Sesi login berdasarkan User ID
				$_SESSION['name']		= $data['name'];		# Sesi login berdasarkan Nama User
				$_SESSION['level']		= $data['level_id'];	# Sesi login berdasarkan Level User
				
				# Update tanggal login di tabel user
				$sqlUpdateLogin = mysql_query("UPDATE cw_users SET date_visited= '$datetime' WHERE nickname = '$_SESSION[nickname]'") or die(mysql_error());
				
				# Diarahkan ke halaman dashboard atau beranda
				header('location:../dashboard.php');
			}
	}
	else
		{
			# Jika data tidak cocok
			echo "<script>alert('Maaf, username atau password salah');</script>";
			echo "<script>window.location = '../index.php';</script>";
		}
?>