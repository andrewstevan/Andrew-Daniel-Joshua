<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}

	# Menghapus isi dari database
	$sqlDelete = mysql_query("DELETE FROM cw_category WHERE id = '$id'") or die(mysql_error());
	header("location:../category-article.php?category=deleted");
?>