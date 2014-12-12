<?php
	session_start();
	if(!isset($_SESSION['nickname']) || empty($_SESSION['nickname']))
	{
		header("location:index.php");
	}
?>