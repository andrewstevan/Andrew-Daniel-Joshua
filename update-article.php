<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Konten Web</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_edit_artikel(form) {
	if (form.ar_title.value == "")
	{
		alert("Judul Artikel harus diisi!");
		form.ar_title.focus();
    	return false;
	}
	if (form.ar_desc.value == "")
	{
		alert("Konten harus diisi!");
		form.ar_desc.focus();
    	return false;
	}
	if (form.ar_category.value == "0")
	{
		alert("Anda belum memilih Kategori Artikel!");
		form.ar_category.focus();
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
            $sqlUpdate = mysql_query("SELECT * FROM cw_articles WHERE article_id = '$id'") or die(mysql_error());
            $update = mysql_fetch_array($sqlUpdate);
        ?>
        <fieldset>
            <legend><h2 class="menu" style="margin: 0 10px;">UBAH ARTIKEL</h2></legend>

            <form action="process/edit-article.php?id=<?php echo $update['article_id']; ?>" class="fArticle" method="post" enctype="multipart/form-data" onSubmit="return validasi_edit_artikel(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="update_article" value="Update">
                    <a href="manage-article.php" class="btn-link"><input type="button" value="Batal"></a>
                </div>
            	<div class="row">
                	<div class="field-title">Judul Artikel *</div>
                    <div class="field-input"><input type="text" name="ar_title" autocomplete="off" value="<?php echo $update['title']; ?>"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Isi Artikel *</div>
                    <div class="field-input"><textarea name="ar_desc"><?php echo $update['description']; ?></textarea></div>
                </div>
            	<div class="row">
                	<div class="field-title">Gambar *</div>
                    <div class="field-input">
                    	<img style="margin-bottom: 10px;" src="<?php echo $update['directory'].$update['image']; ?>" width="100" height="70">
                        <div style="margin-left: 0;"><input type="file" name="ar_image"></div>
                    </div>
                </div>
            	<div class="row">
                	<div class="field-title">Kategori *</div>
                    <div class="field-input">
                    	<select name="ar_category">
                        	<option value="0">- Pilih -</option>
                        <?php
							$sqlCategory = mysql_query("SELECT * FROM cw_category WHERE status = '1'") or die(mysql_error());
							while( $cat = mysql_fetch_array($sqlCategory) )
							{
								if($cat['category_id'] == $update['category'])
								{
									$selected = 'selected';
								}
								else
									{
										$selected = '';
									}
								echo "<option value='$cat[category_id]' $selected>$cat[category_name]</option>";
							}
                        ?>
                        </select>
                    </div>
                </div>
            	<div class="row">
                	<div class="field-title">Status</div>
                    <div class="field-input">
                    	<select name="ar_status">
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