<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Beranda</title>
<link rel="stylesheet" type="text/css" href="css/style-admin.css">
</head>

<body>
<div id="container">
	<!-- Header -->
    <div id="header" class="column"><?php include("inc/header.php"); ?></div>
    
    <!-- Body -->
    <div id="body" class="column">
    
    	<!-- Menu -->
        <div id="left-column" class="column"><?php include("inc/nav.php"); ?></div>
        
        <!-- Isi / Konten -->
        <div id="content" class="column">
        <fieldset>
            <legend><h2 class="menu" style="margin: 0 10px;">Beranda</h2></legend>
            
		<?php
            if(isset($_GET['password']))
            {
				if($_GET['password'] == "updated")
				{
                    echo "<p class='msg done'>Password berhasil diubah.</p>";
                }
            }
		?>
            
            <!-- Informasi Login User -->
            <div class="half-column">
            	<ul class="half-column-title">
                	<li><span class="menu">User Login</span></li>
                    <li>
                    	<div class="half-column-left"><span class="info"><?php echo $_SESSION['name']; ?></span></div>
                    	<div class="half-column-right">
                        <?php
							# Menampilkan data terakhir login
							$sqlUser = mysql_query("SELECT date_visited FROM cw_users WHERE nickname = '$_SESSION[nickname]'") or die(mysql_error());
							$user = mysql_fetch_array($sqlUser);
							echo $date_visited = substr($user['date_visited'], 0, 10);
                        ?>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Informasi Artikel Terbaru -->
            <div class="half-column">
            	<ul class="half-column-title">
                	<li><span class="menu">Artikel Terbaru</span></li>
					<?php
                        $sqlArticle = mysql_query("SELECT * FROM cw_articles ORDER BY date_created DESC LIMIT 5") or die(mysql_error());
						if( mysql_num_rows($sqlArticle)>0 )
						{
							while( $article = mysql_fetch_array($sqlArticle) )
							{
					?>
                    <li>
                    	<div class="half-column-left"><span class="info"><?php echo $article['title']; ?></span> - <small><?php echo $_SESSION['name']; ?></small></div>
                    	<div class="half-column-right"><?php echo substr($article['date_created'], 0, 10); ?></div>
                    </li>
                    <?php
							}
						}
						else
							{
					?>
                    <li>
                    	<div class="half-column-left"><span class="info"><?php echo "-"; ?></span></div>
                    	<div class="half-column-right"><?php echo "-"; ?></div>
                    </li>
                    <?php
							}
					?>
                </ul>
            </div>

            <!-- Informasi Umum -->
            <div class="half-column">
            	<ul class="half-column-title">
                	<li><span class="menu">Informasi Umum</span></li>
                    <li>
                    	<div class="half-column-left"><span class='info'>Jumlah User</span></div>
                    	<div class="half-column-right">
						<?php
							$sqlTotalUser = mysql_query("SELECT * FROM cw_users") or die(mysql_error());
							echo $totalUser = mysql_num_rows($sqlTotalUser)." user";
						?>
						</div>
                    </li>
                    <li>
                    	<div class="half-column-left"><span class="info">Jumlah Artikel</span></div>
                    	<div class="half-column-right">
						<?php
                        	$sqlTotalArticle = mysql_query("SELECT * FROM cw_articles") or die(mysql_error());
							echo $totalArticle = mysql_num_rows($sqlTotalArticle)." artikel";
						?>
						</div>
                    </li>
                </ul>
            </div>

        </fieldset>
        </div>
        
    </div>
    
    <!-- Footer -->
    <div id="footer" class="column"><?php include("inc/footer.php"); ?></div>
</div>
</body>
</html>