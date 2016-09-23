<html>
<head>
	<title>Pemesanan Tiket Stadion Online</title>

<style type="text/css">
body{
	font-family:"Courier New", Courier, monospace;
}
table{
	font-size:12px;
}
.tr{
	border : 1px solid black;
	border-spacing : 1px;
	font-size:14px;
}
</style>

</head>
<body onLoad="window.print() ">
<?php
include ("koneksi.php");

if(isset($_REQUEST['batal'])){
	mysql_query("DELETE FROM pesan WHERE idPesan = '$_GET[getidPesan]'");
	echo"<script>
		alert('Registrasi dibatalkan');
		window.location.href='pesan.php';
		</script>";
}


//------------------------------------------------------------------

if(isset($_REQUEST['getidKA'])){
$tampil = mysql_fetch_array(mysql_query("SELECT * FROM kereta WHERE idKA = '$_GET[getidKA]'"));
?>
<center><h2>&raquo; Rinci Pemesanan Tiket! &laquo;</h2></center>
<form method="POST" action="">
<table border="0" align="center" width="70%" style="border : 1px solid black;border-spacing : 1px;">
  <tr>
    <th align="right">Nama Club</th>
    <th>:</th>
    <td><?=$tampil['namaKA']?></td>
    <th align="right"></th>
    <th></th>
    <td><?=$tampil['dari']?></th>
  </tr>
  <tr>
    <th align="right">Jadwal Kick Off</th>
    <th>:</th>
    <td><?=$tampil['tanggalBerangkat']." ".$tampil['jamBerangkat']?></td>
    <th align="right"></th>
    <th></th>
    <td><?=$tampil['ke']?></td>
  </tr>
  <tr>
    <th align="right">Jadwal Full Time</th>
    <th>:</th>
    <td><?=$tampil['tanggalBerangkat']." ".$tampil['jamTiba']?></td>
    <th align="right">Harga (Kelas)</th>
    <th>:</th>
    <td><?php
    $isikls=mysql_fetch_array(mysql_query("select * from kelas where idKelas='$tampil[idKelas]'"));
	echo $isikls['namaKelas']." - ".number_format($isikls['harga'],0,',','.');
	?></td>
  </tr>
</table>
<!-------------------------------------------------------------------------------------------->
<br>
<?php $lihatPesanan = mysql_fetch_assoc(mysql_query("SELECT * FROM pesan WHERE idPesan='$_GET[getidPesan]'"));?>
<table align="center" width="50%">
	<tr>
    	<td colspan="3">&raquo; <u>Data Diri</u></td>
    </tr>
	<tr>
		<td align="right">Nama Pemesan</td>
		<td>:</td>
		<td><?=$lihatPesanan['namaPemesan']?></td>
	</tr>
	<tr>
		<td align="right">Alamat</td>
		<td>:</td>
		<td><?=$lihatPesanan['alamat']?></td>
	</tr>
    <tr>
    	<td align="right">No Telp</td>
		<td>:</td>
		<td><?=$lihatPesanan['noTelp']?></td>
    </tr>
    <tr>
    	<td align="right">Dewasa</td>
		<td>:</td>
		<td><?=$lihatPesanan['dewasa']?></td>
    </tr>
    <tr>
    	<td align="right">Anak</td>
		<td>:</td>
		<td><?=$lihatPesanan['anak']?></td>
    </tr>
    <tr>
		<td align="right">Biaya</td>
		<td>:</td>
		<td><?=($lihatPesanan['dewasa']+$lihatPesanan['anak'])." * Rp. ".number_format($isikls['harga'],0,',','.')." = <b>Rp. ".
		number_format(($lihatPesanan['dewasa']+$lihatPesanan['anak'])*$isikls['harga'],0,',','.')."<b>"?></td>
	</tr>
    <tr>
    	<td colspan="3">&raquo; <u>Info!</u></td>
    </tr>
    <tr>
    	<td colspan="3">- Reservasi dapat dilakukan 1x24 jam sebelum pertandingan dimulai<br>
- Harga dan ketersediaan tempat duduk sewaktu waktu dapat berubah<br>
- Pastikan anda telah menerima konfirmasi pembayaran dari PT. Persib Indonesia untuk ditukarkan dengan tiket di Stadion online</u></td>
    </tr>
    <tr>
		<td colspan=6 align='right'>Pendaftar,<br><br><br></td>
	</tr>
    <tr>
		<td colspan=6 align='right'><?=$lihatPesanan['namaPemesan']?></td>
	</tr>
</table>
</form>
<?php }?>

</body>
</html>