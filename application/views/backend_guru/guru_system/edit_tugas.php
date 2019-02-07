<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Form Data Tugas</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Form Data Tugas</h3>
	</div>
	<form class="form-horizontal" method="POST" id="barang_form" action="<?php echo base_url().'Guru_System/edit_tugas_add'; ?>" enctype="multipart/form-data">
		<input type="hidden" name="id_tugas" value="<?php echo $data_tugas->id_tugas ?>">
		<input type="hidden" name="id_pengajar" value="<?php echo $data_tugas->id_pengajar ?>">
		<div class="panel-body">
			<!-- <div class="alert alert-success hidden"><strong>Berhasil! </strong><span></span></div>
					<div class="alert alert-warning hidden"><strong>Memproses! </strong><span>Mohon tunggu, system sedang bekerja.</span></div>
					<div class="alert alert-danger hidden"><strong>Gagal! </strong><span></span></div> -->

			<!--				-------------------------------------------------------------------------------------------------------->
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nama</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="nama" class="form-control" value="<?php echo $session_userdata['nama'] ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Judul tugas</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="judul_tugas" class="form-control" value="<?php echo $data_tugas->judul_tugas ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">masukan file tugas</label>
				<div class="col-md-2 col-xs-12">
					<input type="file" name="isi_tugas" value="<?php echo $data_tugas->isi_tugas ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">waktu mulai</label>
				<div class="col-md-3 col-xs-12">
					<input type="text" name="waktu_mulai" class="form-control" value="<?php echo $data_tugas->waktu_mulai ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">waktu selesai</label>
				<div class="col-md-3 col-xs-12">
					<input type="text" name="waktu_selesai" class="form-control" value="<?php echo $data_tugas->waktu_selesai ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Status</label>
				<div class="col-md-4 col-xs-12">
					<select name="status" class="form-control">
						<?php foreach ($status_tugas as $b) {
    if ($u->status == $b->status) {
        ?>

						<option value="<?php echo $u->status ?>" selected><?php echo $b->isi ?></option>
	<?php
    } else {
        ?>
								<option value="<?php echo $b->status ?>"><?php echo $b->isi ?></option>

							<?php
    }
} ?>
					</select>
				</div>
			</div>

		<div class="panel-footer text-right">
			<button class="btn btn-default" type="reset">Reset</button>
			<button class="btn btn-primary" type="submit">Simpan</button>
		</div>
	</form>
</div>
