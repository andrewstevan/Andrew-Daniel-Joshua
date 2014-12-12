<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	date_default_timezone_set("Asia/Bangkok");
	$datetime = date('Y-m-d H:i:s', time());

	if(isset($_POST['add_article']))
	{
		# Menerima data input
		$title		= $_POST['ar_title'];
		$desc		= $_POST['ar_desc'];
		$category	= $_POST['ar_category'];
		$status		= $_POST['ar_status'];
		
		if($status == "")
		{
			$status2 = 1;
		}
		# Proses upload foto
		$fileTmp  =	$_FILES['ar_image']['tmp_name'];
		$fileName = $_FILES['ar_image']['name'];
		$fileType = $_FILES['ar_image']['type'];
		$fileSize = $_FILES['ar_image']['size'];
		
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
		
		$sqlInsert = mysql_query("INSERT INTO cw_articles SET title = '$title', description = '$desc', directory = '".substr($folderName, 3)."', image = '$image',
							category = '$category', date_created = '$datetime', author = '$_SESSION[name]', status = '$status2'") or die(mysql_error());
	
		header('location:../manage-article.php?article=added');
	}	# End of submit
?>