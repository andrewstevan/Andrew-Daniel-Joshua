<?php
	mysql_connect("localhost","root","") or die("Connection failed. ".mysql_error());
	mysql_select_db("db_cms_daniel") or die("Database not found. ".mysql_error());
?>