<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profil User</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_add_level(form) {
	if (form.ul_name.value == "")
	{
		alert("Nama Level harus diisi!");
		form.ul_name.focus();
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
            <legend><h2 class="menu" style="margin: 0 10px;">TAMBAH USER LEVEL</h2></legend>
            
            <form action="process/add-level.php" class="fArticle" method="post" onSubmit="return validasi_add_level(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="add_level" value="Simpan">
                    <a href="user-level.php" class="btn-link"><input type="button" value="Batal"></a>
                </div>
            	<div class="row">
                	<div class="field-title">Kode Level</div>
                    <div class="field-input">
                    <?php
						$sqlSelect = mysql_query("SELECT max(level_id) as no_level FROM cw_user_level") or die(mysql_error());
						$level = mysql_fetch_array($sqlSelect);
                   	?>
                    	<input type="text" name="ul_id" class="readonly" readonly value="<?php echo $level['no_level'] + 1; ?>">
                    </div>
                </div>
            	<div class="row">
                	<div class="field-title">Nama Level *</div>
                    <div class="field-input"><input type="text" name="ul_name" autocomplete="off"></div>
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