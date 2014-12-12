<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Konten Web</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_add_user(form) {
	var minchar = 6;
	var pola_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	if (form.us_name.value == "")
	{
		alert("Silahkan isi nama Anda!");
		form.us_name.focus();
    	return false;
	}
	
<!-- Validasi khusus untuk username -->
	if (form.us_nickname.value == "")
	{
		alert("Username harus diisi!");
		form.us_nickname.focus();
    	return false;
	}
	else if (form.nickname.value.length < minchar)
	{
		alert("Username minimal 6 karakter!");
		form.us_nickname.focus();
    	return false;
	}

<!-- Validasi khusus untuk password -->
	// Jika password kosong
	if (form.us_password.value == "")
	{
		alert("Password harus diisi!");
		form.us_password.focus();
    	return false;
	}
	else if (form.us_password.value.length < minchar)
	{
		alert("Password minimal 6 karakter!");
		form.us_password.focus();
    	return false;
	}
	// Jika ulangi password kosong
	else if (form.us_re_password.value == "")
	{
		alert("Ketik ulang password Anda!");
		form.us_password.focus();
    	return false;
	}
	// Jika password dan ulangi passwrd tidak sama
	else if (form.us_re_password.value != form.us_re_password.value)
	{
		alert("Maaf, password tidak sama!");
		form.us_password.focus();
    	return false;
	}

<!-- Validasi khusus untuk email -->
	if (form.us_email.value == "0")
	{
		alert("Email harus diisi!");
		form.us_email.focus();
    	return false;
	}
	else if (!pola_email.test(form.us_email.value))
	{
		alert("Penulisan email tidak valid!");
		form.us_email.focus();
    	return false;
	}
	
<!-- Validasi khusus untuk level user -->
	if (form.us_user_level.value == "")
	{
		alert("User level belum dipilih!");
		form.us_user_level.focus();
    	return false;
	}
	
<!-- Validasi khusus untuk status -->
	if (form.us_status.value == "")
	{
		alert("Status user belum dipilih!");
		form.us_status.focus();
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
            <legend><h2 class="menu" style="margin: 0 10px;">TAMBAH USER BARU</h2></legend>

            <form action="process/add-user.php" class="fArticle" method="post" onSubmit="return validasi_add_user(this)">
			<!-- Kolom Form sebelah kiri -->
            <div class="left-form">
            	<!-- Tombol Simpan dan Batal -->
            	<div class="row">
                	<input type="submit" name="add_user" value="Simpan">
                    <a href="manage-user.php" class="btn-link"><input type="button" value="Batal"></a>
                </div>
            	<div class="row-space"></div>
            	<div class="row">
                	<div class="field-title">Nama *</div>
                    <div class="field-input"><input type="text" name="us_name" autocomplete="off"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Username *</div>
                    <div class="field-input"><input type="text" name="us_nickname" autocomplete="off" maxlength="20"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Password *</div>
                    <div class="field-input"><input type="password" name="us_password" maxlength="20"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Ulangi Password *</div>
                    <div class="field-input"><input type="password" name="us_re_password" maxlength="20"></div>
                </div>
            	<div class="row">
                	<div class="field-title">Email *</div>
                    <div class="field-input"><input type="text" name="us_email" autocomplete="off"></div>
                </div>
            	<div class="row">
                	<div class="field-title">User Level *</div>
                    <div class="field-input">
                    	<select name="us_user_level">
                        	<option value="0">- Pilih -</option>
                        <?php
							$sqlLevel = mysql_query("SELECT * FROM cw_user_level") or die(mysql_error());
							while( $level = mysql_fetch_array($sqlLevel) )
							{
								echo "<option value='$level[level_id]'>$level[level_name]</option>";
							}
                        ?>
                        </select>
                    </div>
                </div>
            	<div class="row">
                	<div class="field-title">Status *</div>
                    <div class="field-input">
                    	<select name="us_status">
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