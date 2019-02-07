<!DOCTYPE html>
<html>
<head>
	<title>Edit Posting</title>
</head>
<body>
	<center>
		<h1>Edit Posting</h1>
		<h3>Edit Data</h3>
	</center>
	<?php foreach ($data_tugas as $u) {
    ?>
	<form action="<?php echo base_url(). 'Guru_System/komentar_tugas_add'; ?>" method="post">
		<table style="margin:20px auto;">
        	<td><input type="hidden" name="id_tugas" value="<?php echo $u->id_tugas?> "></td>
					<td><input type="hidden" name="nama" value="<?php echo $session_userdata['nama']?> "></td>
					<td><input type="hidden" name="id_guru" value="<?php echo $session_userdata['id_guru']?> "></td>	

            <tr>
            <td>isi komentar</td>
				<td><input type="text" name="isi_komentar"></td>
            </tr>

				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php
} ?>
</body>
</html>
