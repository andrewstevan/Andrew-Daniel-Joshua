<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Konten Web</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_add_kategori(form) {
	if (form.ct_title.value == "")
	{
		alert("Judul Kategori harus diisi!");
		form.ct_title.focus();
    	return false;
	}
	return true;
}
</script>
</head>

<body>
<div id="container">
	<!-- Header -->
    <div id="header" class="column"><?php include("inc/header.php"); ?></div>
    
    <!-- Body -->
    <div id="body" class="column">
    
    	<!-- Navigation -->
        <div id="left-column" class="column"><?php include("inc/nav.php"); ?></div>
        
        <!-- Content -->
        <div id="content" class="column">
        <fieldset>
            <legend><h2 class="menu" style="margin: 0 10px;">KATEGORI ARTIKEL</h2></legend>
            
            <div class="row"><a href="add-new-category.php"><input type="button" name="add_category" value="Tambah"></a></div>
            
		<?php
            if(isset($_GET['category']))
            {
				if($_GET['category'] == "added")
				{
					echo "<p class='msg done'>Kategori baru berhasil ditambahkan.</p>";
				}
                elseif($_GET['category'] == "updated")
                {
                    echo "<p class='msg done'>Kategori berhasil diubah.</p>";
                }
				elseif($_GET['category'] == "deleted")
				{
					echo "<p class='msg done'>Kategori berhasil dihapus.</p>";
				}
            }
		?>
            <table class="data-list">
            <thead>
              <th>No.</th>
              <th>ID</th>
              <th>Status</th>
              <th>Kategori</th>
              <th>Keterangan</th>
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
                    
                $sqlCategory = mysql_query("SELECT * FROM cw_category ORDER BY category_id ASC LIMIT $offset, $limit");
                if( mysql_num_rows($sqlCategory)>0 )
                {
                    $no = 1;
                    while( $category = mysql_fetch_array($sqlCategory) )
                    {
            ?>
                    <tr valign="top">
                      <td align="center"><?php echo $no; ?></td>
                      <td align="center"><?php echo $category['id']; ?></td>
                      <td align="center">
					  	<?php
                      		if($category['status'] == 0)
							{
								echo "<img src='images/icon-error.png' width='14' height='14'>";
							}
							else
								{
									echo "<img src='images/icon-success.png' width='16' height='14'>";
								}
						?>
                      </td>
                      <td><a href="update-category.php?id=<?php echo $category['id']; ?>"><span class="info"><?php echo $category['category_name']; ?></span></a></td>
                      <td>
					  	<?php
                        	if($category['note'] != '')
							{
								echo substr($category['note'], 0, 80)." ...";
							}
							else
								{
									echo "-";
								}
						?>
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
                      <td colspan="6">Tidak ada kategori</td>
                    </tr>
            <?php
                    }
            ?>
            </table>
            <br />
            <div>
            <?php
                $sql_paging = mysql_query("SELECT * FROM cw_category");
                $data = mysql_num_rows($sql_paging);
                $total_page = ceil($data / $limit);
            
                echo "Halaman ke :";
                for($i = 1; $i <= $total_page; $i++)
                if($i != $page)
                {
                    echo "<a href=category-article.php?page=$i> $i </a> &nbsp;";
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