<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_edit_user(form) {
	var minchar = 6;

	if (form.ch_old_password.value == "")
	{
		alert("Masukkan password lama Anda!");
		form.ch_old_password.focus();
    	return false;
	}
	if (form.ch_new_password.value == "")
	{
		alert("Masukkan password baru Anda!");
		form.ch_new_password.focus();
    	return false;
	}
	if (form.ch_re_password.value == "")
	{
		alert("Ketik ulang password baru Anda!");
		form.ch_re_password.focus();
    	return false;
	}
	
	if (form.ch_old_password.value.length < minchar)
	{
		alert("Password minimal 6 karakter!");
		form.ch_old_password.focus();
    	return false;
	}
	if (form.ch_new_password.value.length < minchar)
	{
		alert("Password minimal 6 karakter!");
		form.ch_new_password.focus();
    	return false;
	}
	if (form.ch_re_password.value.length < minchar)
	{
		alert("Password minimal 6 karakter!");
		form.ch_re_password.focus();
    	return false;
	}
	
	// Jika password dan ulangi passwrd tidak sama
	else if (form.ch_new_password.value != form.ch_re_password.value)
	{
		alert("Maaf, password tidak sama!");
		form.ch_new_password.focus();
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
			if(isset($_GET['nickname']))
			{
				$nickname = $_GET['nickname'];
			}
			
            $sqlChange = mysql_query("SELECT * FROM cw_users WHERE nickname = '$nickname'") or die(mysql_error());
            $change = mysql_fetch_array($sqlChange);
        ?>
        <fieldset>
            <legend><h2 class="menu" style="margin: 0 10px;">UBAH PASSWORD</h2></legend>

            <form action="process/edit-password.php?nickname=<?php echo $change['nickname']; ?>" class="fArticle" method="post" onSubmit="return validasi_edit_user(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="update_password" value="Update">
                    <a href="manage-user.php" class="btn-link"><input type="button" value="Batal"></a>
                </div>
            	<div class="row">
                	<div class="field-title">Password Lama *</div>
                    <div class="field-input"><input type="password" name="ch_old_password" maxlength="20"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Password Baru *</div>
                    <div class="field-input"><input type="password" name="ch_new_password" maxlength="20"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Ulangi Password *</div>
                    <div class="field-input"><input type="password" name="ch_re_password" maxlength="20"></div>
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