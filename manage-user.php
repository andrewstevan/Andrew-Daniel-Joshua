<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Konten Web</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
</head>

<body>
<div id="container">
	<!-- Header -->
    <div id="header" class="column"><?php include("inc/header.php"); ?>
    </div>
    
    <!-- Body -->
    <div id="body" class="column">
    
    	<!-- Navigation -->
        <div id="left-column" class="column"><?php include("inc/nav.php"); ?></div>
        
        <!-- Content -->
        <div id="content" class="column">
        <fieldset>
            <legend><h2 class="menu" style="margin: 0 10px;">USER</h2></legend>
            
		<?php
            if(isset($_GET['user']))
            {
				if($_GET['user'] == "added")
				{
					echo "<p class='msg done'>User baru berhasil ditambahkan.</p>";
				}
                elseif($_GET['user'] == "updated")
                {
                    echo "<p class='msg done'>User berhasil diubah.</p>";
                }
				elseif($_GET['user'] == "deleted")
				{
					echo "<p class='msg done'>User berhasil dihapus.</p>";
				}
            }
		?>
            <table class="data-list">
            <thead>
              <th>No.</th>
              <th>ID</th>
              <th>Status</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Level</th>
              <th>Tanggal Dibuat</th>
              <th>Terakhir Login</th>
              <th>Hapus</th>
            </thead>
			<?php
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                }
                
                $limit = 10;
                $offset = null;
                if(empty($page))
                {
                    $offset = 0;
                    $page = 1;
                }
                else
                    {
                        $offset = ($page - 1) * $limit;
                    }
				
				if($_SESSION['level'] == 1)
				{
                	$sqlUsers = mysql_query("SELECT * FROM cw_users ORDER BY user_id ASC LIMIT $offset, $limit");
				}
				elseif($_SESSION['level'] == 2)
					{
						$sqlUsers = mysql_query("SELECT * FROM cw_users WHERE level_id = '3' ORDER BY user_id ASC LIMIT $offset, $limit");
					}
					
                if( mysql_num_rows($sqlUsers)>0 )
                {
                    $no = 1;
                    while( $users = mysql_fetch_array($sqlUsers) )
                    {
            ?>
                    <tr valign="top">
                      <td align="center"><?php echo $no; ?></td>
                      <td><?php echo $users['user_id']; ?></td>
                      <td align="center">
					  	<?php
                      		if($users['status'] == 0)
							{
								echo "<img src='images/icon-error.png' width='14' height='14'>";
							}
								else
								{
									echo "<img src='images/icon-success.png' width='16' height='14'>";
								}
						?>
                      </td>
                      <td><a href="update-user.php?id=<?php echo $users['user_id']; ?>"><span class="info"><?php echo $users['name']; ?></span></td>
                      <td><a href="update-user.php?id=<?php echo $users['user_id']; ?>"><span class="info"><?php echo $users['nickname']; ?></span></td>
                      <td align="center">
					  	<?php
                        	if($users['level_id'] == 1)
							{
								echo "Super User";
							}
                        	elseif($users['level_id'] == 2)
							{
								echo "Admin";
							}
							elseif($users['level_id'] == 3)
								{
									echo "User";
								}
						?>
                      </td>
                      <td align="center"><?php echo $users['date_created']; ?></td>
                      <td align="center">
					  	<?php
                        	if($users['date_visited'] == '0000-00-00 00:00:00')
							{
								echo "Belum melakukan login";
							}
							else
								{
									echo $users['date_visited'];
								}
						?>
                      </td>
                      <td align="center">
                        <a href="process/delete-user.php?id=<?php echo $users['user_id']; ?>" onclick="return confirm ('Yakin ingin menghapus user ini ?');">
                        	<img src="images/icon-delete.png" width="11" height="14">
                        </a>
                      </td>
                    </tr>
            <?php
                    $no++;
                    }
                }
                else
                    {
            ?>
                    <tr>
                      <td colspan="8">Tidak ada user</td>
                    </tr>
            <?php
                    }
            ?>
            </table>
            <br />
            <div>
            <?php
                $sql_paging = mysql_query("SELECT * FROM cw_users");
                $data = mysql_num_rows($sql_paging);
                $total_page = ceil($data / $limit);
            
                echo "Halaman ke :";
                for($i = 1; $i <= $total_page; $i++)
                if($i != $page)
                {
                    echo "<a href=manage-user.php?page=$i> $i </a> &nbsp;";
                }
                else
                    {
                        echo "<b> $i </b> &nbsp;";
                    }
                echo "<br /> Jumlah Data : " .$data;
            ?>
            </div>
        </fieldset>
        </div>
        
    </div>
    
    <!-- Footer -->
    <div id="footer" class="column"><?php include("inc/footer.php"); ?></div>
</div>
</body>
</html>