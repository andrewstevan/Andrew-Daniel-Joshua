<?php include("inc/connection.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script>
<!-- Mencegah inputan kosong -->
function validasi_login(form) {
	if (form.nickname.value == "")
	{
		alert("Username masih kosong!");
		form.nickname.focus();
    	return false;
	}
	if (form.password.value == "")
	{
		alert("Password masih kosong!");
		form.password.focus();
    	return false;
	}
}
</script>
</head>

<body>
<form action="process/cek-login.php" id="fLogin" method="post" onSubmit="return validasi_login(this)">
    <div id="container_1">
        <div class="row-space-1">
            <h3>Halaman Login</h3>
        </div>
        <div class="row-space"></div>
        <div class="row">
            <div class="icon-row"><img src="images/icon-user.png" width="12" height="12"></div>
            <input type="text" name="nickname" id="nickname" placeholder="Username" autocomplete="off" class="form-login" maxlength="20">
        </div>
        <div class="row">
            <div class="icon-row"><img src="images/icon-lock.png" width="12" height="12"></div>
            <input type="password" name="password" id="password" placeholder="Password" class="form-login" maxlength="20">
        </div>
        <div class="row-space"></div>
        <div class="row" style="float: right !important;">
            <input type="submit" name="login_btn" id="login_btn" class="button" value="Login">
        </div>
    </div>
</form>
</body>
</html>