<!DOCTYPE html>
<html>
<head>
	<title>HOME GURU</title>
</head>
<body>
	<center>
	<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $session_userdata['nama'] ; ?></h2>

</center>
	<a href="<?php echo base_url('guru/do_logout'); ?>">Logout</a>

			<center><a href="<?php echo base_url('Guru_System/data_berita'); ?>">data berita</a>
							<a href="<?php echo base_url('Guru_System/data_tugas'); ?>">data tugas</a>
							<a href="<?php echo base_url('Guru_System/data_video'); ?>">data video</a>
							<a href="<?php echo base_url('Guru_System/data_kirim_tugas'); ?>">data tugas siswa</a>
							<a href="<?php echo base_url('Guru_System/data_posting_admin'); ?>">data_berita_admin</a>	
							<a href="<?php echo base_url('Guru_System/data_profile'); ?>">profile</a>
			</center>


</body>
</html>
