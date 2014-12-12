<?php
	include("../inc/auth.php");
	include("../inc/connection.php");
	
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}

	$sqlSelect = mysql_query("SELECT * FROM cw_articles WHERE article_id = '$id'");
	if( mysql_num_rows($sqlSelect)>0 )
	{
		$data = mysql_fetch_array($sqlSelect);
		# Menghapus foto dari folder
		unlink('../'.$data['directory'].$data['image']);
	}
	
	# Menghapus isi dari database
	$sqlDelete = mysql_query("DELETE FROM cw_articles WHERE article_id = '$id'") or die(mysql_error());
	header("location:../manage-article.php?article=deleted");
?>