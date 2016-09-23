<?php
//jika $_GET['upidPesan'] di set atau dijalankan maka akan melakukan aksi didalamnya
if(isset($_GET['upidPesan'])){
	//jika $_GET['status'] bernilai "Y" maka
	if($_GET['status']=="Y"){
	//akan dijalankan query UPDATE pada table pesan yaitu pada field status diganti menjadi nilai "N" dimana idPesan yang dipilih yaitu yang sedang di set
		mysql_query("UPDATE pesan SET status = 'N' WHERE idPesan = '$_GET[upidPesan]'");
		//tampilan akan dikembalikan pada page=dataPesan
		echo"<script>
		alert('Data dibatalkan');
		window.location.href='?page=datapesan';
		</script>";
	}else{ //jika tidak "Y" atau nilai dari status yaitu "N" maka
	//akan dijalankan query UPDATE pada table pesan yaitu pada field status diganti menjadi nilai "Y" dimana idPesan yang dipilih yaitu yang sedang di set
		mysql_query("UPDATE pesan SET status = 'Y' WHERE idPesan = '$_GET[upidPesan]'");
		//tampilan akan dikembalikan pada page=dataPesan
		echo"<script>
		alert('Data disetujui');
		window.location.href='?page=datapesan';
		</script>";
	}
	
}
//membuat variable $select yang berisi data yang akan ditampilkan dengan memilih dari beberapa table yang dihubungkan melalui field yang sama
$select = "SELECT a.*, concat(b.namaKA,' - ',b.dari,' &raquo; ',b.ke,' - ',c.namaKelas) as idKA
FROM pesan a, kereta b, kelas c
WHERE a.idKA = b.idKA
AND b.idKelas = c.idKelas
ORDER BY idPesan DESC";
//membuat variable $resultselect untuk menjalankan query yang ada pada variable $select
$resultselect= mysql_query($select)or die ('Error load data : '.mysql_error());
if(mysql_num_rows($resultselect)==0){ //mengecek apakan jumlah data dari variable $resultselect adalah 0
	echo"<center>Data tidak tersedia!</center>";	//jika 0 maka akan muncul pesan data tidak tersedia
}else{	//jika tidak 0 atau ada data didalamnya maka akan ditampilkan isi dari query tersebut
echo "<table class='table table-striped table-bordered table-condensed bootstrap-datatable datatable' cellspacing='0' cellpadding='0' width='80%' align ='center' border ='1'>
<tr>
	<th bgcolor='silver'>No</th>
	<th bgcolor='silver'>Nama Pemesan</th>
	<th bgcolor='silver'>Alamat</th>
	<th bgcolor='silver'>No. Telp</th>
	<th bgcolor='silver'>Dewasa</th>
	<th bgcolor='silver'>Anak</th>
	<th bgcolor='silver'>Menonton Pertandingan</th>
	<th bgcolor='silver'></th>
</tr>";
$no=0;
while($row = mysql_fetch_array($resultselect)){
extract($row);
if($status=="Y"){$butt="Batalkan";}else{$butt="Setujui";} //menampilkan data jika $status bernilai Y maka yang akan ditampilkan variable $butt yaitu "Batalkan"
//jika tidak makan $butt bernilai "Setujui"
echo "<tr>
	<td align='center'>".$no=1+$no."</td>
	<td>".$namaPemesan."</td>
	<td>".$alamat."</td>
	<td>".$noTelp."</td>
	<td align='center'>".$dewasa."</td>
	<td align='center'>".$anak."</td>
	<td>".$idKA."</td>
	<td align='center'><a href='?page=datapesan&upidPesan=$idPesan&status=$status' class='btn btn-info btn-sm'>".$butt."</a></td>
</tr>";
}
echo"</table>";
}
?>
