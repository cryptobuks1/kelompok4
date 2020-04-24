<form method="POST">
<h2>Tambah Pesanan</h2><hr>
	<table>
		<tr>
			<td>Nomor Barang</td>
			<td><input type="text" name="no_barang"></td>
		</tr>
		<tr>
			<td>ID User</td>
			<td>	<select name="id_user"><?php
							$userSql = "SELECT * from user";
							$userQry = mysqli_query($koneksi, $userSql)  or die ("Query user salah : ".mysql_error());
	
							foreach($userQry as $userRow) {

							$iduser = $userRow['id_user'];
							?>
							<option><?php echo $iduser; } ?></option>
					<select>
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td><textarea name="keterangan"></textarea></td>
		</tr>
		<tr>
			<td>Status Order</td>
			<td><select name="status_order">
					<option style="color:red;">Belum Dibayar</option>
					<option style="color: green;">Dibayar</option>
					</select></td>
		</tr>
	</table>
	<br>
<input type="submit" value="Tambahkan" name="submit">
<br><br>
<a href="?page=pesanan" target="_self">Kembali &raquo;</a>
<?php
include 'koneksi.php';
// var_dump($_POST);
if (isset($_POST['submit'])) {
	try{
		$cek_id = $koneksi->query("SELECT * FROM orders ORDER BY id_order DESC");
		$hasil = $cek_id->fetch_assoc();
		$id_order	= '00'.($hasil['id_order'] + 1);
		$tanggal = date('Y-m-d');
		$no_barang 			= $_POST['no_barang'];
		$id_user 	= $_POST['id_user'];			
		$keterangan	= $_POST['keterangan'];
		$status_order	= $_POST['status_order'];
        
		$query_simpan = $koneksi->prepare("INSERT INTO orders (id_order, tanggal, no_barang, id_user, keterangan, status_order) VALUES (?,?,?,?,?,?)");
		$query_simpan->bind_param('ssssss', $id_order, $tanggal, $no_barang, $id_user, $keterangan, $status_order);
		$query_simpan->execute();
		$query_simpan->close();
		//print "<script>alert('Berhasil menambah Transaksi')
		//window.location = '?page=transaksi';
		//</script>";
	}catch(Exception $e){
		echo $e->getMessage();
	}
}
?>