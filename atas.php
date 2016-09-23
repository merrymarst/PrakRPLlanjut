<!DOCTYPE html>
<!-- saved from url=(0032)http://bootswatch.com/spacelab/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Pemesanan Tiket Stadion Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta name="description" content="Ahmad Afandi, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/bootswatch.min.css">
    <!--<link id="bs-css" href="css/charisma-app.css" rel="stylesheet">-->
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <!--<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="js/charisma.js" type="text/javascript"></script>
    <script type="text/javascript" async src="js/ga.js"></script>--><script type="text/javascript">

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>
  <script type="text/javascript" async src="../js/bsa.js"></script><style type="text/css"></style>
  <link rel="shortcut icon" href="webicon.png"></head>
  <body style="">
    <script src="../js/bsa(1).js"></script>
    <!----------------------------------------------------------------->
	<?php
	if(isset($_SESSION['level'])=='admin'){
	?>
    <!----------------------------------------------------------------->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand">Pemesanan Tiket Stadion Online</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
              <a href="?page=kelas">Daftar Harga Kelas Stadion</a>
			</li>
			<li>
			  <a href="?page=kereta">Daftar Jadwal Pertandingan</a>
			</li>
			<li>
			  <a href="?page=datapesan">Data Pesanan Tiket</a>
            </li>
          </ul>
<!--tab Menu-->
          <ul class="nav navbar-nav navbar-right">
            <li><a href="log.php?op=out">Logout</a></li>
          </ul>

        </div>
      </div>
    </div>
		<?php
		}else{
		?>
		<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand">Pemesanan Tiket Stadion Online</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          
<!--tab Menu-->
          <ul class="nav navbar-nav navbar-right">
            <li><a href="?page=login">Login</a></li>
          </ul>

        </div>
      </div>
    </div>
		<?php
		}
		?>

    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-6">
          <table width="689">
			<tr height="10"><td></td></tr>
              <tr>
                <br><td width="96"><img src="img/logo-KA.png" width="88" height="88" alt="logo"></td>
                <td width="581"><h1>Selamat Datang </h1>
           		  <p class="lead"></p></td>
              </tr>
          </table>
          </div>
        </div>
      </div>
      <div class="bs-docs-section">
      <div class="bs-example table-responsive">
	  