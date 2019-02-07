<!DOCTYPE html>
<html>
<head>
	<title>LOGIN GURU </title>
</head>
<body>
	<h1>LOGIN GURU
	<form action="<?php echo base_url('Guru/do_login'); ?>" method="post">
		<table>
			<tr>
				<td>nip</td>
				<td><input type="text" name="nip"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login"></td>
			</tr>
		</table>
	</form>
		<a href="<?php echo base_url('siswa'); ?>">login siswa</a>
</body>
</html>
