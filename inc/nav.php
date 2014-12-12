<?php
	if($_SESSION['level'] == 1)
	{
?>
        <ul id="nav">
            <li><a href="dashboard.php" title="Halaman Administrator"><span class="menu">Beranda</span></a></li>
            <li><span class="menu">Konten Web</span>
                <ul>
                    <li><img class="icon" src="images/icon-new-article.png"><a href="add-new-article.php" title="Tambah Artikel Baru">Tambah Artikel</a></li>
                    <li><img class="icon" src="images/icon-manage-article.png"><a href="manage-article.php" title="Kelola Artikel">Kelola Artikel</a></li>
                    <li><img class="icon" src="images/icon-category-article.png"><a href="category-article.php" title="Kategori Artikel">Kategori Artikel</a></li>
                </ul>
            </li>
            <li><span class="menu">Profil User</span>
                <ul>
                    <li><img class="icon" src="images/icon-add-user.png"><a href="add-new-user.php" title="Tambah User Baru">Tambah User</a></li>
                    <li><img class="icon" src="images/icon-manage-user.png"><a href="manage-user.php" title="Kelola User">Kelola User</a></li>
                    <li><img class="icon" src="images/icon-manage-user-level.png"><a href="user-level.php" title="User Level">User Level</a></li>
                </ul>
            </li>
            <li><span class="menu">Konfigurasi</span>
                <ul>
                    <li><img class="icon" src="images/icon-about-us.png"><a href="about-us.php" title="Tentang Kami">Tentang Kami</a></li>
                    <li><img class="icon" src="images/icon-contact-us.png"><a href="contact-us.php" title="Kontak Kami">Kontak Kami</a></li>
                    <li><img class="icon" src="images/icon-image-logo.png"><a href="image-logo.php" title="Logo Web">Logo Website</a></li>
                </ul>
            </li>
        </ul>
<?php
	}
	elseif($_SESSION['level'] == 2)
	{
?>
        <ul id="nav">
            <li><a href="dashboard.php" title="Halaman Administrator"><span class="menu">Beranda</span></a></li>
            <li><span class="menu">Konten Web</span>
                <ul>
                    <li><img class="icon" src="images/icon-new-article.png"><a href="add-new-article.php" title="Tambah Artikel Baru">Tambah Artikel</a></li>
                    <li><img class="icon" src="images/icon-manage-article.png"><a href="manage-article.php" title="Kelola Artikel">Kelola Artikel</a></li>
                </ul>
            </li>
            <li><span class="menu">Profil User</span>
                <ul>
                    <li><img class="icon" src="images/icon-add-user.png"><a href="add-new-user.php" title="Tambah User Baru">Tambah User</a></li>
                    <li><img class="icon" src="images/icon-manage-user.png"><a href="manage-user.php" title="Kelola User">Kelola User</a></li>
                </ul>
            </li>
            <li><span class="menu">Konfigurasi</span>
                <ul>
                    <li><img class="icon" src="images/icon-about-us.png"><a href="about-us.php" title="Tentang Kami">Tentang Kami</a></li>
                    <li><img class="icon" src="images/icon-contact-us.png"><a href="contact-us.php" title="Kontak Kami">Kontak Kami</a></li>
                    <li><img class="icon" src="images/icon-image-logo.png"><a href="image-logo.php" title="Logo Web">Logo Website</a></li>
                </ul>
            </li>
        </ul>
<?php
	}
	elseif($_SESSION['level'] == 3)
	{
?>
        <ul id="nav">
            <li><a href="dashboard.php" title="Halaman Administrator"><span class="menu">Beranda</span></a></li>
            <li><span class="menu">Konten Web</span>
                <ul>
                    <li><img class="icon" src="images/icon-new-article.png"><a href="add-new-article.php" title="Tambah Artikel Baru">Tambah Artikel</a></li>
                    <li><img class="icon" src="images/icon-manage-article.png"><a href="manage-article.php" title="Kelola Artikel">Kelola Artikel</a></li>
                </ul>
            </li>
            <li><span class="menu">Konfigurasi</span>
                <ul>
                    <li><img class="icon" src="images/icon-about-us.png"><a href="about-us.php" title="Tentang Kami">Tentang Kami</a></li>
                    <li><img class="icon" src="images/icon-contact-us.png"><a href="contact-us.php" title="Kontak Kami">Kontak Kami</a></li>
                    <li><img class="icon" src="images/icon-image-logo.png"><a href="image-logo.php" title="Logo Web">Logo Website</a></li>
                </ul>
            </li>
        </ul>
<?php
	}
?>