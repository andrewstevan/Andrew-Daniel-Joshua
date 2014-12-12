<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tentang Kami</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_about(form) {
	if (form.au_about_us.value == "")
	{
		alert("Judul Artikel harus diisi!");
		form.au_about_us.focus();
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
            <legend><h2 class="menu" style="margin: 0 10px;">TENTANG KAMI</h2></legend>

			<?php
                if(isset($_GET['message']))
                {
                    if($_GET['message'] == "added")
                    {
                        echo "<p class='msg done'>Tentang Kami berhasil ditambahkan.</p>";
                    }
                    elseif($_GET['message'] == "updated")
                    {
                        echo "<p class='msg done'>Tentang Kami berhasil diubah.</p>";
                    }
                }

				$sqlSelect = mysql_query("SELECT * FROM cw_about_us") or die(mysql_error());
				$about = mysql_fetch_array($sqlSelect);
				if( mysql_num_rows($sqlSelect) == 0 )
				{
            ?>
            <form action="process/add-about-us.php" class="fArticle" method="post" onSubmit="return validasi_about(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="add_about_us" value="Simpan">
                    <input type="reset" value="Batal">
                </div>
            	<div class="row">
                	<div class="field-title">Deskripsi *</div>
                    <div class="field-input"><textarea name="au_about_us"></textarea></div>
                </div>
            </div>
            </form>
            <?php
				}
				else
				{
			?>
            <form action="process/edit-about-us.php?id=<?php echo $about['about_id']; ?>" class="fArticle" method="post" onSubmit="return validasi_about(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="edit_about_us" value="Update">
                    <input type="reset" value="Batal">
                </div>
            	<div class="row">
                	<div class="field-title">Deskripsi *</div>
                    <div class="field-input"><textarea name="au_about_us"><?php echo $about['description']; ?></textarea></div>
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