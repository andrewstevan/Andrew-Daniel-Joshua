<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	date_default_timezone_set("Asia/Bangkok");
	$datetime = date('Y-m-d H:i:s', time());

	if(isset($_POST['update_article']))
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
		}
		# Menerima data input
		$title		= $_POST['ar_title'];
		$desc		= $_POST['ar_desc'];
		$category	= $_POST['ar_category'];
		$status		= $_POST['ar_status'];
		
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
		
		# Jika edit tanpa mengganti foto yang baru
		if(empty($fileTmp))
		{
			$sqlUpdate = mysql_query("UPDATE cw_articles SET title = '$title', description = '$desc', category = '$category', date_modified = '$datetime',
								status = '$status' WHERE article_id = '$id' AND author = '$_SESSION[name]'") or die(mysql_error());
		
			header('location:../manage-article.php?article=updated');
		}
			# Jika edit mengganti foto yang baru
			elseif(!empty($fileTmp))
			{
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
				$sqlSelect = mysql_query("SELECT * FROM cw_articles WHERE article_id = '$id'");
				if( mysql_num_rows($sqlSelect)>0 )
				{
					$data = mysql_fetch_array($sqlSelect);
					# Menghapus foto dari folder
					unlink('../'.$data['directory'].$data['image']);
				}
						
				# Memindahkan foto yang baru ke dalam folder
				move_uploaded_file($fileTmp, $folderName.$image);
				
				$sqlUpdate = mysql_query("UPDATE cw_articles SET title = '$title', description = '$desc', image = '$image', date_created = '$datetime',
									status = '$status' WHERE author = '$_SESSION[name]'") or die(mysql_error());
			
				header('location:../manage-article.php?article=updated');
			}
	}	# End of submit
?>