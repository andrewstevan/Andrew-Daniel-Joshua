<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hubungi Kami</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_contact(form) {
	var pola_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

	if (form.cu_subject.value == "")
	{
		alert("Subject Email harus diisi!");
		form.cu_subject.focus();
    	return false;
	}

<!-- Validasi khusus untuk email -->
	if (form.cu_email.value == "0")
	{
		alert("Email harus diisi!");
		form.cu_email.focus();
    	return false;
	}
	else if (!pola_email.test(form.cu_email.value))
	{
		alert("Penulisan email tidak valid!");
		form.cu_email.focus();
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
            <legend><h2 class="menu" style="margin: 0 10px;">HUBUNGI KAMI</h2></legend>

			<?php
                if(isset($_GET['contact']))
                {
                    if($_GET['contact'] == "added")
                    {
                        echo "<p class='msg done'>Informasi kontak berhasil ditambahkan.</p>";
                    }
                    elseif($_GET['contact'] == "updated")
                    {
                        echo "<p class='msg done'>Informasi kontak berhasil diubah.</p>";
                    }
                }

				$sqlSelect = mysql_query("SELECT * FROM cw_contact_us") or die(mysql_error());
				$contact = mysql_fetch_array($sqlSelect);
				if( mysql_num_rows($sqlSelect) == 0 )
				{
            ?>
            <form action="process/add-contact-us.php" class="fArticle" method="post" onSubmit="return validasi_contact(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="add_contact_us" value="Simpan">
                    <input type="reset" value="Batal">
                </div>
            	<div class="row">
                	<div class="field-title">Email *</div>
                    <div class="field-input"><input type="text" name="cu_email" autocomplete="off"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Subyek *</div>
                    <div class="field-input"><input type="text" name="cu_subject" autocomplete="off"></div>
                </div>
            </div>
            </form>
            <?php
				}
				else
				{
			?>
            <form action="process/edit-contact-us.php?id=<?php echo $contact['contact_id']; ?>" class="fArticle" method="post" onSubmit="return validasi_contact(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="edit_contact_us" value="Update">
                    <input type="reset" value="Batal">
                </div>
            	<div class="row">
                	<div class="field-title">Email *</div>
                    <div class="field-input"><input type="text" name="cu_email" autocomplete="off" value="<?php echo $contact['contact_email']; ?>"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Subyek *</div>
                    <div class="field-input"><input type="text" name="cu_subject" autocomplete="off" value="<?php echo $contact['subject']; ?>"></div>
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