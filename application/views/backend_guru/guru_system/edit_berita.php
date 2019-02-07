<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Form Data Berita</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Form Data Berita</h3>
	</div>
	<form class="form-horizontal" method="POST" id="barang_form" action="<?php echo base_url().'Guru_System/edit_berita_add'; ?>">
		<input type="hidden" name="id_berita" value="<?php echo $data_edit_berita->id_berita ?>">
		<input type="hidden" name="id_pengajar" value="<?php echo $data_edit_berita->id_pengajar ?>">
		<div class="panel-body">
			<!-- <div class="alert alert-success hidden"><strong>Berhasil! </strong><span></span></div>
					<div class="alert alert-warning hidden"><strong>Memproses! </strong><span>Mohon tunggu, system sedang bekerja.</span></div>
					<div class="alert alert-danger hidden"><strong>Gagal! </strong><span></span></div> -->

			<!--				-------------------------------------------------------------------------------------------------------->
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Judul Post</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="judul_post" class="form-control" value="<?php echo $data_edit_berita->judul_post ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Isi post</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="isi_post" class="form-control" value="<?php echo $data_edit_berita->isi_post ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Mata Pelanajaran / Kelas</label>
				<div class="col-md-3 col-xs-12">
					<?php if($data_berita != null) { ?>
						<select class="form-control" name="id_pengajar">
						<?php foreach ($data_berita as $a) { ?>
								<option value="<?php echo $a->id_pengajar ?>" <?php if($data_edit_berita->id_pengajar == $a->id_pengajar) echo "selected"; ?>><?php echo $a->nama_mapel; ?> / <?php echo $a->kelas; ?></option>
										<?php
						} ?>
						</select>
					<?php	} else echo "<i class='fa fa-times text-danger'> Anda Tidak Mengajar! </i>" ?>
				</div>
			</div>

		<div class="panel-footer text-right">
			<button class="btn btn-default" type="reset">Reset</button>
			<button class="btn btn-primary" type="submit">Simpan</button>
		</div>
	</form>
</div>
