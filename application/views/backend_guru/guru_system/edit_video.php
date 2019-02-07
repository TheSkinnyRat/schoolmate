<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Form Data Video</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Form Data Video</h3>
	</div>
	<form class="form-horizontal" method="POST" id="barang_form" action="<?php echo base_url().'Guru_System/edit_video_add'; ?>" enctype="multipart/form-data">
		<input type="hidden" name="id_video" value="<?php echo $data_video->id_video ?>">
		<input type="hidden" name="id_pengajar" value="<?php echo $data_video->id_pengajar ?>">
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
				<label class="col-md-4 col-xs-12 control-label">Judul video</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="judul_video" class="form-control" value="<?php echo $data_video->judul_video ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">masukan file video</label>
				<div class="col-md-2 col-xs-12">
					<input type="file" name="isi_video" value="<?php echo $data_video->isi_video ?>">
				</div>
			</div>

		<div class="panel-footer text-right">
			<button class="btn btn-default" type="reset">Reset</button>
			<button class="btn btn-primary" type="submit">Simpan</button>
		</div>
	</form>
</div>
