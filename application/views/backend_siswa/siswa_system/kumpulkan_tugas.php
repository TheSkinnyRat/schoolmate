<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Kumpulkan Tugas</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Kumpulkan Tugas</h3>
	</div>
	<form class="form-horizontal" method="POST" id="barang_form" action="<?php echo base_url(). 'Siswa_System/Kumpulkan_tugas_add'; ?>" enctype="multipart/form-data">
		<div class="panel-body">
			<input type="hidden" name="id_tugas" value="<?php echo $data_tugas->id_tugas?> ">
			<input type="hidden" name="id_siswa"  value="<?php echo $session_userdata['id_siswa'] ?>">
			<input type="hidden" name="waktu_upload"  value="<?php echo date('Y-m-d'); ?>">
			<input type="hidden" name="status"  value="<?php echo $data_tugas->status ?>">
			<input type="hidden" name="waktu_selesai"  value="<?php echo $data_tugas->waktu_selesai ?>">
			<input type="hidden" name="kelas"  value="<?php echo $data_siswa->kelas ?>">
			<input type="hidden" name="nama" value="<?php echo $session_userdata['nama'] ?>">
			<input type="hidden" name="judul_tugas" value="<?php echo $data_tugas->judul_tugas?> ">
		<!--				-------------------------------------------------------------------------------------------------------->
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nama Siswa</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $session_userdata['nama'] ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Judul Tugas</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $data_tugas->judul_tugas ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Input File</label>
				<div class="col-md-2 col-xs-12">
					<input type="file" name="isi_tugas" value="<?php echo $data_tugas->isi_tugas ?>" required>
				</div>
			</div>


		</div>
		<div class="panel-footer text-right">
			<button class="btn btn-default" type="reset">Reset</button>
			<button class="btn btn-primary" type="submit">Simpan</button>
		</div>
	</form>
</div>
