<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_POST['add_image_logo']))
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
		}

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
		
		# Hapus terlebih dahulu foto yang ada didalam folder
		$sqlSelect = mysql_query("SELECT * FROM cw_image_logo WHERE logo_id = '$id'");
		if( mysql_num_rows($sqlSelect)>0 )
		{
			$data = mysql_fetch_array($sqlSelect);
			# Menghapus foto dari folder
			unlink('../'.$data['directory'].$data['logo_name']);
		}						
			
		# Memindahkan foto ke dalam folder
		move_uploaded_file($fileTmp, $folderName.$image);
		
		$sqlInsert = mysql_query("UDPATE cw_image_logo SET logo_name = '$image' WHERE logo_id = '$id'") or die(mysql_error());
	
		header('location:../image-logo.php?image=updated');
	}	# End of submit
?>