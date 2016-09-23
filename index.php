
       <?php
	   session_start();
	   //-memanggil koneksi sebagai penghubung ke database
	   include ("koneksi.php");
	   include "atas.php";
	if($_GET['page']==""){
		include "home.php";
	}elseif($_GET['page']=="login"){
		include"login.php";
	}elseif($_GET['page']=="kelas"){
		include"kelas.php";
	}elseif($_GET['page']=="kereta"){
		include"kereta.php";
	}elseif($_GET['page']=="datapesan"){
		include"dataPesan.php";
	}
	   
	   ?>
