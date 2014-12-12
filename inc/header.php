<?php
	include("inc/auth.php");
	include("inc/connection.php");
?>

<div id="header-title">
<?php
	if($_SESSION['level'] == 1)
	{
		echo "<h2 style='line-height: 0;'>HALAMAN SUPER USER</h2>";
	}
	elseif($_SESSION['level'] == 2)
		{
			echo "<h2 style='line-height: 0;'>HALAMAN ADMINISTRATOR</h2>";
		}
		elseif($_SESSION['level'] == 3)
			{
				echo "<h2 style='line-height: 0;'>HALAMAN USER</h2>";
			}
?>
</div>
<div id="login-info">
	Hi, <a class="profile" href="change-password.php?nickname=<?php echo $_SESSION['nickname']; ?>"><b><?php echo $_SESSION['name']; ?></b></a> ! | 
	<a href="logout.php" title="Keluar"><span class="menu">Logout</span></a>
</div>
