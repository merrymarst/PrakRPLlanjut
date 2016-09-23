<?php
//-apabila tombol submit di set atau ditekan
//-maka akan malakukan aksi didalam isset tersebut.
if(isset($_POST['submit'])){
	//- deklarasi variable POST
	$idKelas = $_POST['idKelas'];
	$namaKelas = $_POST['namaKelas'];
	$harga = $_POST['harga'];
	//mengecek berapa jumlah data yang dipilih dalam query
	$cek = mysql_num_rows(mysql_query("SELECT * FROM kelas WHERE idKelas = '$idKelas'"));
	//untuk mengecek apakah jumlah banyaknya data yang dipilih(SELECT) = 0
	//jika jumlahnya = 0 maka akan melakukan INSERT data, 
	if($cek==0){
		//membuat variable table, field, dan where yang akan digunakan untuk fungsi
		//query database antara insert data atau update data,
		//sehingga tidak perlu melakukan penulisan berulang ulang
		$table = "INSERT INTO kelas SET"; //tabel yang akan diinsertkan
		$field= "namaKelas = '$namaKelas',
				   harga = '$harga'";	// field yang akan diinsertkan dengan nilai POST
		$where = "";	// variable WHERE diisi nilai kosong
	}else{ //jika tidak maka akan melakukan UPDATE data
		$table = "UPDATE kelas SET";	//tabel yang akan diupdate
		$field= "namaKelas = '$namaKelas',
				 harga = '$harga'";	//nilai field yang akan diupdate
		$where = "WHERE idKelas = '$idKelas'"; //dimana IDfield = idfield POST
	}
	//Query yang akan dijalankan dengan memanggil variale (table, field, where)
	mysql_query("$table $field $where")or die ('Error!!'.mysql_error());
	//halaman akan diarahkan ke page='kelas'
	echo "<script>window.location.href='?page=kelas';</script>";
	exit;
}
//jika variable get di set atau sedang berjalan maka akan melakukan aksi...
if(isset($_GET['delidKelas'])){
	//Query yang dijalankan yaitu menghapus dari table kelas dimana idKelas = nilai dari GET[idKelas]
	mysql_query("DELETE FROM kelas WHERE idKelas = '$_GET[delidKelas]'");
	//akan muncul pesan alert "Data terhapus" halaman akan diarahkan pada page=kelas
	echo"<script>
		alert('Data terhapus');
		window.location.href='?page=kelas';
		</script>";
}
//untuk menyimpan nilai query database kedalam array
$tampil = mysql_fetch_array(mysql_query("SELECT * FROM kelas WHERE idKelas = '$_GET[idKelas]'"));
?>
<!--
value langsung diset kedalam textfield
dengan mengambil nilai dari array $tampil
-->
<form method="POST">
<table align="center">
	<tr>
		<td><input type="hidden" name="idKelas" value="<?=$tampil['idKelas']?>" readonly /></td>
	</tr>
	<tr>
		<td>Nama Kelas</td>
		<td>:</td>
		<td><input type="text" class="form-control" name="namaKelas" value="<?php echo $tampil['namaKelas']; ?>" required/></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td><input type="text" class="form-control" name="harga" value="<?php echo $tampil['harga']; ?>" required/></td>
	</tr>
	<tr>
		<td colspan=3 align='center'>
        <!--tombol simpan dengan type submit 
        yang akan mengirimkan nilai melalui method POST-->
        <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Simpan"/> 
        <a href="?page=kelas"><input type="button" class="btn btn-warning btn-sm" name="batal" value="Batal"/></a><!--tombol batal-->
        </td>
	</tr>
</table>
</form>
<?php
//MEMBUAT LIST/DAFTAR data kelas dalam table
//membuat variable $select yang berisi query menampilkan kelas
$select = 'SELECT * FROM kelas ORDER BY idKelas ASC';
//menjalankan query variable $select jika terjadi error akan muncul pesan Error load data
$resultselect= mysql_query($select)or die ('Error load data : '.mysql_error());
//mengecek jumlah query $resultselect
//jika jumlahnya 0 maka data tidak tersedia
if(mysql_num_rows($resultselect)==0){
	echo"<center>Data tidak tersedia!</center>";
}else{
//jika tidak tampilkan dalam bentuk table
echo "<table class='table table-striped table-bordered table-condensed bootstrap-datatable datatable' cellspacing='0' cellpadding='0' width='50%' align ='center' border ='1'>
<tr>
	<th bgcolor='silver'>No</th>
	<th bgcolor='silver'>Nama Kelas</th>
	<th bgcolor='silver'>Harga</th>
	<th bgcolor='silver'></th>
</tr>";
$no=0; //memberi nilai awal pada $no = 0
//WHILE sebagai perulangan data dengan nama variable $row
//menyimpan nilai dalam bentuk array pada variable $row
while($row = mysql_fetch_array($resultselect)){
extract($row); // mengekstrak $row dan menyimpan dalam bentuk variable
//menampilkan isi baris yang akan diulang sebanyak data yang ada pada query diatas ($select)
echo "<tr>
	<td align='center'>".$no=1+$no."</td>
	<td>".$namaKelas."</td>
	<td align='right'>Rp. ".number_format($harga,2,',','.')."</td>
	<td align='center'><a href='?page=kelas&idKelas=$idKelas' class='btn btn-info btn-sm'>Edit</a>
	<a href='?page=kelas&delidKelas=$idKelas' class='btn btn-danger btn-sm'>Hapus</a></td>
</tr>";
}
echo"</table>";
}
?>
