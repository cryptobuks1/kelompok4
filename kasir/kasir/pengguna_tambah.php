<form method="POST">
<h2>Tambah Pengguna</h2><hr>
	<table>
	
		<tr>
			<td>Username: </td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Nama Pengguna</td>
			<td><input type="text" name="nama_user"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Level</td>
			<td><select name="id_level"> <option>K001</option><option>W001</option><option>A001</option></select></td>
		</tr>
	</table>
	
<input type="submit" value="Tambahkan" name="submit2">
</form>
	<br>
<br><br>
<a href="?page=pengguna" target="_self">Kembali &raquo;</a>
<?php
include 'koneksi.php';
// var_dump($_POST);
if (isset($_POST['submit2'])) {

	try{
		$cek_id = $koneksi->query("SELECT * FROM user ORDER BY id_user DESC");
		$hasil = $cek_id->fetch_assoc();
		$id_user	= '00'.($hasil['id_user'] + 1);
		$username 	= $_POST['username'];
		$nama_user 			= $_POST['nama_user'];
		$password 	= $_POST['password'];
		$id_level 	= $_POST['id_level'];

		$query_simpan = $koneksi->prepare("INSERT INTO user (id_user, username, nama_user, password, id_level) VALUES (?,?,?,?,?)");
		$query_simpan->bind_param('sssss', $id_user, $username, $nama_user, $password, $id_level);
		$query_simpan->execute();
		$query_simpan->close();
		print "<script>alert('Berhasil menambah Pengguna');
		window.location = '?page=pengguna';
		</script>";
	}catch(Exception $e){
		echo $e->getMessage();
	}
}
?>