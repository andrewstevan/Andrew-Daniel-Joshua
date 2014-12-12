<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_POST['add_category']))
	{
		# Menerima data input
		$cat_id		= $_POST['ct_id'];
		$cat_name	= $_POST['ct_title'];
		$cat_note	= $_POST['ct_note'];
		$status		= $_POST['ct_status'];
		
		if($status == "")
		{
			$status2 = 1;
		}
		
		# Menyimpan ke dalam database
		$sqlInsert = mysql_query("INSERT INTO cw_category SET category_id = '$cat_id', category_name = '$cat_name', note = '$cat_note', status = '$status2'") or die(mysql_error());
	
		header('location:../category-article.php?category=added');
	}	# End of submit
?>