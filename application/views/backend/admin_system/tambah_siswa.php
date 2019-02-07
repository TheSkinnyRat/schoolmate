<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Form Data Siswa</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Form Data Siswa</h3>
	</div>
	<form class="form-horizontal" method="POST" id="barang_form" action="<?php echo base_url().'Admin_System/tambah_siswa_add'; ?>">
		<div class="panel-body">
			<!-- <div class="alert alert-success hidden"><strong>Berhasil! </strong><span></span></div>
					<div class="alert alert-warning hidden"><strong>Memproses! </strong><span>Mohon tunggu, system sedang bekerja.</span></div>
					<div class="alert alert-danger hidden"><strong>Gagal! </strong><span></span></div> -->

			<!--				-------------------------------------------------------------------------------------------------------->
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nis</label>
				<div class="col-md-2 col-xs-12">
					<input type="number" name="nis" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">password</label>
				<div class="col-md-2 col-xs-12">
					<input type="password" name="password" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nama</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">tempat lahir</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="tempat_lahir" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">tanggal lahir</label>
				<div class="col-md-2 col-xs-12">
					<input type="date" name="tanggal_lahir" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">email</label>
				<div class="col-md-2 col-xs-12">
					<input type="email" name="email" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">nomer telephone</label>
				<div class="col-md-2 col-xs-12">
					<input type="number" name="no_tlp" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">jenis kelamin</label>
				<div class="col-md-2 col-xs-12 radio">
					<label><input type="radio" name="jenis_kelamin" value="L" required>Laki-laki</label>
					<label><input type="radio" name="jenis_kelamin" value="P" required>Perempuan</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">kelas</label>
				<div class="col-md-2 col-xs-12">
					<select class="form-control" name="id_kelas">
						<?php foreach ($data_kelas as $a) { ?>
						<option value="<?php echo $a->id_kelas ?>">
							<?php echo $a->kelas ?>
						</option>
						<?php } ?>
					</select>
				</div>
			</div>

		</div>
		<div class="panel-footer text-right">
			<button class="btn btn-default" type="reset">Reset</button>
			<button class="btn btn-primary" type="submit">Simpan</button>
		</div>
	</form>
</div>
