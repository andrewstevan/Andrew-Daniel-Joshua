<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Konten Web</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_add_artikel(form) {
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
	if (form.ar_image.value == "")
	{
		alert("Gambar harus diunggah!");
		form.ar_image.focus();
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
        <fieldset>
            <legend><h2 class="menu" style="margin: 0 10px;">TAMBAH ARTIKEL BARU</h2></legend>

            <form action="process/add-article.php" class="fArticle" method="post" enctype="multipart/form-data" onSubmit="return validasi_add_artikel(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="add_article" value="Simpan">
                    <a href="manage-article.php" class="btn-link"><input type="button" value="Batal"></a>
                </div>
            	<div class="row">
                	<div class="field-title">Judul Artikel *</div>
                    <div class="field-input"><input type="text" name="ar_title" autocomplete="off"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Isi Artikel *</div>
                    <div class="field-input"><textarea name="ar_desc"></textarea></div>
                </div>
            	<div class="row">
                	<div class="field-title">Gambar *</div>
                    <div class="field-input"><input type="file" name="ar_image"></div>
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
								echo "<option value='$cat[category_id]'>$cat[category_name]</option>";
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
								echo "<option value='$status[status_id]'>$status[status_name]</option>";
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