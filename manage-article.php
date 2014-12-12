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
            <legend><h2 class="menu" style="margin: 0 10px;">ARTIKEL</h2></legend>
            
		<?php
            if(isset($_GET['article']))
            {
				if($_GET['article'] == "added")
				{
					echo "<p class='msg done'>Artikel baru berhasil ditambahkan.</p>";
				}
                elseif($_GET['article'] == "updated")
                {
                    echo "<p class='msg done'>Artikel berhasil diubah.</p>";
                }
				elseif($_GET['article'] == "deleted")
				{
					echo "<p class='msg done'>Artikel berhasil dihapus.</p>";
				}
            }
		?>
            <table class="data-list">
            <thead>
              <th>No.</th>
              <th>ID</th>
              <th>Status</th>
              <th>Judul Artikel</th>
              <th>Penulis</th>
              <th>Tanggal Dibuat</th>
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
                    
                $sqlArticle = mysql_query("SELECT * FROM cw_articles ORDER BY date_created DESC LIMIT $offset, $limit");
                if( mysql_num_rows($sqlArticle)>0 )
                {
                    $no = 1;
                    while( $article = mysql_fetch_array($sqlArticle) )
                    {
            ?>
                    <tr valign="top">
                      <td align="center"><?php echo $no; ?></td>
                      <td><?php echo $article['article_id']; ?></td>
                      <td align="center">
					  	<?php
                      		if($article['status'] == 0)
							{
								echo "<img src='images/icon-error.png' width='14' height='14'>";
							}
								else
								{
									echo "<img src='images/icon-success.png' width='16' height='14'>";
								}
						?>
                      </td>
                      <td><a href="update-article.php?id=<?php echo $article['article_id']; ?>"><span class="info"><?php echo $article['title']; ?></span></a></td>
                      <td><?php echo $article['author']; ?></td>
                      <td align="center"><?php echo $article['date_created']; ?></td>
                      <td align="center">
                        <a href="process/delete-article.php?id=<?php echo $article['article_id']; ?>" onclick="return confirm ('Yakin ingin menghapus artikel ini ?');">
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
                      <td colspan="7">Tidak ada artikel</td>
                    </tr>
            <?php
                    }
            ?>
            </table>
            <br />
            <div>
            <?php
                $sql_paging = mysql_query("SELECT * FROM cw_articles");
                $data = mysql_num_rows($sql_paging);
                $total_page = ceil($data / $limit);
            
                echo "Halaman ke :";
                for($i = 1; $i <= $total_page; $i++)
                if($i != $page)
                {
                    echo "<a href=manage-article.php?page=$i> $i </a> &nbsp;";
                }
                else
                    {
                        echo "<b> $i </b> &nbsp;";
                    }
                echo "<br /> Jumlah Data :" .$data;
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