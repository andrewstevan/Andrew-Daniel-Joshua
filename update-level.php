<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profil User</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_edit_level(form) {
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

<body><em></em>
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
            $sqlUpdate = mysql_query("SELECT * FROM cw_user_level WHERE id = '$id'") or die(mysql_error());
            $update = mysql_fetch_array($sqlUpdate);
        ?>
        <fieldset>
            <legend><h2 class="menu" style="margin: 0 10px;">UBAH USER LEVEL</h2></legend>
            
            <form action="process/edit-level.php?id=<?php echo $update['id']; ?>" class="fArticle" method="post" onSubmit="return validasi_edit_level(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="edit_level" value="Update">
                    <a href="user-level.php" class="btn-link"><input type="button" value="Batal"></a>
                </div>
            	<div class="row">
                	<div class="field-title">Kode Level</div>
                    <div class="field-input">
                    	<input type="text" class="readonly" readonly value="<?php echo $update['level_id']; ?>">
                    </div>
                </div>
            	<div class="row">
                	<div class="field-title">Nama Level *</div>
                    <div class="field-input"><input type="text" name="ul_name" autocomplete="off" value="<?php echo $update['level_name']; ?>"></div>
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