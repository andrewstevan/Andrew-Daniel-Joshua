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
            <legend><h2 class="menu" style="margin: 0 10px;">USER LEVEL</h2></legend>
            
            <div class="row"><a href="add-new-level.php"><input type="button" value="Tambah"></a></div>
            
		<?php
            if(isset($_GET['level']))
            {
				if($_GET['level'] == "added")
				{
					echo "<p class='msg done'>User Level baru berhasil ditambahkan.</p>";
				}
                elseif($_GET['level'] == "updated")
                {
                    echo "<p class='msg done'>User Level berhasil diubah.</p>";
                }
            }
		?>
            <table class="data-list">
            <thead>
              <th>No.</th>
              <th>Level</th>
              <th width="80%" align="left">Tipe Level</th>
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
                    
                $sqlLevel = mysql_query("SELECT * FROM cw_user_level ORDER BY level_id ASC LIMIT $offset, $limit");
                if( mysql_num_rows($sqlLevel)>0 )
                {
                    $no = 1;
                    while( $level = mysql_fetch_array($sqlLevel) )
                    {
            ?>
                    <tr valign="top">
                      <td align="center"><?php echo $no; ?></td>
                      <td align="center"><?php echo $level['level_id']; ?></td>
                      <td><a href="update-level.php?id=<?php echo $level['id']; ?>"><span class="info"><?php echo $level['level_name']; ?></span></a></td>
                    </tr>
            <?php
                    $no++;
                    }
                }
                else
                    {
            ?>
                    <tr>
                      <td colspan="3">Tidak ada User Level</td>
                    </tr>
            <?php
                    }
            ?>
            </table>
            <br />
            <div>
            <?php
                $sql_paging = mysql_query("SELECT * FROM cw_user_level");
                $data = mysql_num_rows($sql_paging);
                $total_page = ceil($data / $limit);
            
                echo "Halaman ke : ";
                for($i = 1; $i <= $total_page; $i++)
                if($i != $page)
                {
                    echo "<a href=user-level.php?page=$i> $i </a> &nbsp;";
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