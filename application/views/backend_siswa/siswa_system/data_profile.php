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
	<form class="form-horizontal" method="POST" id="barang_form" action="<?php echo base_url(). 'Siswa_System/Kumpulkan_tugas_add'; ?>" enctype="multipart/form-data">
		<div class="panel-body">
		<!--				-------------------------------------------------------------------------------------------------------->
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nis</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $data_profile->nis ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Password</label>
				<div class="col-md-2 col-xs-12">
					<input type="password" class="form-control" value="<?php echo $this->encrypt->decode($data_profile->password) ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nama</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $data_profile->nama ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Tempat Lahir</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $data_profile->tempat_lahir ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Tanggal Lahir</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $data_profile->tanggal_lahir ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Email</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $data_profile->email ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">No Telp</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $data_profile->no_tlp ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Jenis Kelamin</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $data_profile->jenis_kelamin ?>" disabled>
				</div>
			</div>
		</form>

		</div>
		<div class="panel-footer text-right">
			<a class="btn btn-primary btn-add" href="<?php echo base_url('Siswa_System/edit_profile/'.$data_profile->id_siswa); ?>">Edit</a>
		</div>
</div>
