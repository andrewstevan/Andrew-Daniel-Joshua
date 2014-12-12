<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_POST['add_image_logo']))
	{
		# Proses upload foto
		$fileTmp  =	$_FILES['il_image']['tmp_name'];
		$fileName = $_FILES['il_image']['name'];
		$fileType = $_FILES['il_image']['type'];
		$fileSize = $_FILES['il_image']['size'];
		
		# Folder penyimpanan foto
		$folderName = "../Upload/";
		$_MAX_FILE_SIZE = 10000000;		# Maks. 1 MB
		$images = array('image/jpg','image/jpeg','image/png','image/gif');	# Format foto yang diizinkan
		
		# Penamaan baru utk foto yang di upload	
		$dt = date("YmdHis");
		$image = $dt."-".$fileName;
		
		# Validasi tipe gambar yang diupload
		if(!in_array($fileType, $images))
		{
			echo "<script>alert('Maaf, format gambar tidak diketahui');</script>";
			echo "<script>window.location = '../add-new-article.php'; </script>";
		}
		
		# Validasi ukuran file gambar
		if($fileSize > $_MAX_FILE_SIZE)
		{
			echo "<script>alert('Maaf, ukuran file melebihi 1 MB');</script>";
			echo "<script>window.location = '../add-new-article.php'; </script>";
		}
			
		# Memindahkan foto ke dalam folder
		move_uploaded_file($fileTmp, $folderName.$image);
		
		$sqlInsert = mysql_query("INSERT INTO cw_image_logo SET logo_name = '$image', directory = '".substr($folderName, 3)."'") or die(mysql_error());
	
		header('location:../image-logo.php?image=added');
	}	# End of submit
?>