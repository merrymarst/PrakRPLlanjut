<?php
// untuk memulai session pada fungsi login
//session_start();

if(isset($_POST['submit'])){ //jika tombol submit di set atau dijalankan maka melakukan aksi
	//deklarasi variable POST
	$namaPemesan = $_POST['namaPemesan'];
	$alamat = $_POST['alamat'];
	$noTelp = $_POST['noTelp'];
	$dewasa = $_POST['dewasa'];
	$anak = $_POST['anak'];
	//---------------------------------------
	//deklarasi variable $table, $field yang akan digunakan untuk fungsi insert data
		$table = "INSERT INTO pesan SET";
		$field= "namaPemesan = '$namaPemesan',
				 alamat = '$alamat',
				 noTelp = '$noTelp',
				 dewasa = '$dewasa',
				 anak = '$anak',
				 idKA = '$_GET[getidKA]'
				 ";
	//melakukan query dari variable $table dan $field
	mysql_query("$table $field")or die ('Error!!'.mysql_error());
	//memilih id Maximal atau id yang terbesar dari idPesan yang terdapat pada table pesan
	//fungsi ini untuk mengambil data yang terakhir di inputkan/dipilih
	$max = mysql_fetch_array(mysql_query("SELECT max(idPesan) as idPesan FROM pesan"));
	//kemudian halaman akan diarahkan pada detail Pemesanan
	echo "<script>window.location.href='detailPesan.php?getidKA=$_GET[getidKA]&getidPesan=$max[idPesan]';</script>";
	exit;
}

//------------------------------------------------------------------
//jika POST dengan value pilih di set maka halam akan diarahkan pada halaman itu sendiri dengan membawa nilai GET idKA yang bernilai pada POST[pilih]
if(isset($_REQUEST['pilih'])){
	echo"<script>
		window.location.href='?getidKA=$_POST[pilih]';
		</script>";
}
//------------------------------------------------------------------
if(isset($_REQUEST['getidKA'])){ //jika variable getidKA diset pada GET maka akan tampil detail dari pesanan kereta yang dipilih
//untuk menampilkan detailKereta yang dipilih
$tampil = mysql_fetch_array(mysql_query("SELECT * FROM kereta WHERE idKA = '$_GET[getidKA]'"));
?>

<center><h4>&raquo; Form Registrasi &laquo;</h4>
Silahkan Masukkan biodata diri anda dengan benar!</center>
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
<!----------------------------------------Membuat tampilan form registrasi pemesanan---------------------------------------------------->
<table align="center">
<tr>
		<td>Nama Pemesan</td>
		<td>:</td>
		<td><input type="text" name="namaPemesan" class="form-control" required/></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><input type="text" name="alamat" size="40" class="form-control" required/></td>
	</tr>
    <tr>
		<td>No Telp<br><sub><font color="#000099">*Bisa dihubungi saat ini</font></sub></td>
		<td>:</td>
		<td><input type="text" name="noTelp" class="form-control" required/></td>
	</tr>
    <tr>
		<td>Dewasa</td>
		<td>:</td>
		<td><input type="number" name="dewasa" class="form-control" style="width:50px;" required/></td>
	</tr>
    <tr>
		<td>Anak</td>
		<td>:</td>
		<td><input type="number" name="anak" class="form-control" style="width:50px;" required/></td>
	</tr>
    <tr>
		<td colspan=3 align='center'><input type="submit" name="submit" value="Simpan" class='btn btn-primary btn-sm'/>
        <a href="?"><input type="button" name="batal" value="Batal" class='btn btn-warning btn-sm'/></a></td>
	</tr>
</table>
</form>

<?php
//-------------------------------------------------------------------------------
//jika tidak di set variable getidKA atau belum dipilih maka akan tampil beberapa data kereta dengan pemilihan meggunakan radio button
}else{
echo"*) Silahkan pilih Jadwal Pertandingan Yang Akan Anda Saksikan ";
		
echo"<form method='post' action=''>";
$select = 'SELECT * FROM kereta ORDER BY idKA ASC';
$resultselect= mysql_query($select)or die ('Error load data : '.mysql_error());
if(mysql_num_rows($resultselect)==0){
	echo"<center>Data tidak tersedia!</center>";
}else{
echo "<center><table class='table table-striped table-bordered table-condensed bootstrap-datatable datatable' cellspacing='0' cellpadding='0' width='80%' align ='center' border ='1'>
<tr>
	<th bgcolor='silver'></th>
	<th bgcolor='silver'>Nama Club</th>
	<th bgcolor='silver'>Jadwal Kick Off</th>
	<th bgcolor='silver'>Jadwal Full Time</th>
	<th bgcolor='silver'>Harga (Kelas)</th>
</tr>";
$no=0;
while($row = mysql_fetch_array($resultselect)){
extract($row);
$lihat=mysql_fetch_array(mysql_query("SELECT * FROM kelas WHERE idKelas = '$idKelas'"));
echo "<tr align='center'>
	<td><input name='pilih' onChange='this.form.submit()' type='radio' value='".$idKA."'><sub>".$no=1+$no."</sub></td>
	<td>".$namaKA."</td>
	<td>".$tanggalBerangkat." - ".$jamBerangkat."</td>
	<td>".$tanggalBerangkat." -".$jamTiba."</td>
	<td>".$lihat['namaKelas']." - ".number_format($lihat['harga'],0,',','.')."</td>
</tr>";
}
echo"</table></center>";
}
echo"</form>

";
}?>
