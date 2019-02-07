<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Profile</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Profile</h3>
	</div>
	<form class="form-horizontal" method="POST" id="barang_form" action="<?php echo base_url(). 'Siswa_System/edit_profile_add'; ?>" enctype="multipart/form-data">
		<input type="hidden" name="id_siswa" value="<?php echo $data_profile->id_siswa?> ">
		<div class="panel-body">
		<!--				-------------------------------------------------------------------------------------------------------->
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nis</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="nis" class="form-control" value="<?php echo $data_profile->nis ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Password</label>
				<div class="col-md-2 col-xs-12">
					<input type="password" name="password" class="form-control" value="<?php echo $this->encrypt->decode($data_profile->password) ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nama</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="nama" class="form-control" value="<?php echo $data_profile->nama ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Tempat Lahir</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data_profile->tempat_lahir ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Tanggal Lahir</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $data_profile->tanggal_lahir ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Email</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="email" class="form-control" value="<?php echo $data_profile->email ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">No Telp</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="no_tlp" class="form-control" value="<?php echo $data_profile->no_tlp ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Jenis Kelamin</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $data_profile->jenis_kelamin ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">jenis kelamin</label>
				<div class="col-md-2 col-xs-12 radio">
					<label><input type="radio" name="jenis_kelamin" value="L" <?php if ($data_profile->jenis_kelamin == 'L') echo 'checked' ?> required>Laki-laki</label>
					<label><input type="radio" name="jenis_kelamin" value="P" <?php if ($data_profile->jenis_kelamin == 'P') echo 'checked' ?> required>Perempuan</label>
				</div>
			</div>

		</div>
		<div class="panel-footer text-right">
			<button type="submit" class="btn btn-primary btn-add">Simpan</a>
		</div>
	</form>
</div>
