<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_POST['update_category']))
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
		}

		# Menerima data input
		$cat_name	= $_POST['ct_title'];
		$cat_note	= $_POST['ct_note'];
		$status		= $_POST['ct_status'];
		
		# Menyimpan ke dalam database
		$sqlUpdate = mysql_query("UPDATE cw_category SET category_name = '$cat_name', note = '$cat_note', status = '$status' WHERE id = '$id'") or die(mysql_error());
	
		header('location:../category-article.php?category=updated');
	}	# End of submit
?>