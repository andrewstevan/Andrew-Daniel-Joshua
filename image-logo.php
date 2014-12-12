<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logo Website</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_logo(form) {
	if (form.il_image.value == "")
	{
		alert("Gambar harus diunggah!");
		form.il_image.focus();
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
            <legend><h2 class="menu" style="margin: 0 10px;">LOGO WEBSITE</h2></legend>

			<?php
                if(isset($_GET['image']))
                {
                    if($_GET['image'] == "added")
                    {
                        echo "<p class='msg done'>Gambar berhasil ditambahkan.</p>";
                    }
                    elseif($_GET['image'] == "updated")
                    {
                        echo "<p class='msg done'>Gambar berhasil diubah.</p>";
                    }
                }

				$sqlSelect = mysql_query("SELECT * FROM cw_image_logo") or die(mysql_error());
				$logo = mysql_fetch_array($sqlSelect);
				if( mysql_num_rows($sqlSelect) == 0 )
				{
            ?>
            <form action="process/add-image-logo.php" class="fArticle" enctype="multipart/form-data" method="post" onSubmit="return validasi_logo(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="add_image_logo" value="Simpan">
                    <input type="reset" value="Batal">
                </div>
            	<div class="row">
                	<div class="field-title">Gambar *</div>
                    <div class="field-input"><input type="file" name="il_image"></div>
                </div>
            </div>
            </form>
            <?php
				}
				else
				{
			?>
            <form action="process/edit-image-logo.php?id=<?php echo $logo['logo_id']; ?>" class="fArticle" enctype="multipart/form-data" method="post" onSubmit="return validasi_contact(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="edit_image_logo" value="Update">
                    <input type="reset" value="Batal">
                </div>
            	<div class="row">
                	<div class="field-title">Gambar *</div>
                    <div class="field-input">
                    	<img style="margin-bottom: 20px;" src="<?php echo $logo['directory'].$logo['logo_name']; ?>" width="100" height="70">
                        <div style="margin-left: 0;"><input type="file" name="il_image"></div>
                    </div>
                </div>
            </div>
            </form>
            <?php
				}
            ?>
        </fieldset>
        </div>
        
    </div>
    
    <!-- Footer -->
    <div id="footer" class="column"><?php include("inc/footer.php"); ?></div>
</div>
</body>
</html>