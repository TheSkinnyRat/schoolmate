<!DOCTYPE html>
<html>
<head>
	<title>DATA KELAS</title>
</head>
<body>
	<center>
		<a href="<?php echo base_url('Admin_System'); ?>">Home</a>
		<a href="<?php echo base_url('Admin_System/tambah_kelas'); ?>">tambah kelas</a>
	</center>

    <h1><center>DATA KELAS</center></h1>
    <table style="margin:20px auto;" border="1">
		<tr>
			<th>id kelas</th>
			<th>nama kelas</th>
			<th>action</th>

  	</tr>
		<?php
        foreach ($data_kelas as $u) {
            ?>
		<tr>
			<td><?php echo $u->id_kelas ?></td>
			<td><?php echo $u->kelas ?></td>


			<td>
			      <?php echo anchor('Admin_System/edit_kelas/'.$u->id_kelas, 'Edit'); ?>
                  <?php echo anchor('Admin_System/hapus_kelas/'.$u->id_kelas, 'Hapus'); ?>
			</td>
		</tr>
        <?php
        } ?>
        </table>

</body>
</html>
