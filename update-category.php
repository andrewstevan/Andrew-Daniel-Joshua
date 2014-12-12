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
		<?php
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
			}
            $sqlUpdate = mysql_query("SELECT * FROM cw_category WHERE id = '$id'") or die(mysql_error());
            $update = mysql_fetch_array($sqlUpdate);
        ?>
        <fieldset>
            <legend><h2 class="menu" style="margin: 0 10px;">UBAH KATEGORI</h2></legend>
            
            <form action="process/edit-category.php?id=<?php echo $update['id']; ?>" class="fArticle" method="post" onSubmit="return validasi_add_kategori(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="update_category" value="Update">
                    <a href="manage-article.php" class="btn-link"><input type="button" value="Batal"></a>
                </div>
            	<div class="row">
                	<div class="field-title">Judul Kategori *</div>
                    <div class="field-input"><input type="text" name="ct_title" autocomplete="off" value="<?php echo $update['category_name']; ?>"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Keterangan</div>
                    <div class="field-input"><textarea name="ct_note"><?php echo $update['note']; ?></textarea></div>
                </div>
            	<div class="row">
                	<div class="field-title">Kode Kategori</div>
                    <div class="field-input"><input type="text" name="ct_id" value="<?php echo $update['category_id']; ?>" class="readonly" readonly></div>
                </div>
            	<div class="row">
                	<div class="field-title">Status</div>
                    <div class="field-input">
                    	<select name="ct_status">
                        	<option value="">- Pilih -</option>
                        <?php
							$sqlStatus = mysql_query("SELECT * FROM cw_status") or die(mysql_error());
							while( $status = mysql_fetch_array($sqlStatus) )
							{
								if($status['status_id'] == $update['status'])
								{
									$selected = 'selected';
								}
								else
									{
										$selected = '';
									}
								echo "<option value='$status[status_id]' $selected>$status[status_name]</option>";
							}
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            </form>
        </fieldset>
        </div>
        
    </div>
    
    <!-- Footer -->
    <div id="footer" class="column"><?php include("inc/footer.php"); ?></div>
</div>
</body>
</html>