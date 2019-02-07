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
	<form class="form-horizontal" method="POST" id="barang_form" action="<?php echo base_url().'Guru_System/tambah_tugas_add'; ?>" enctype="multipart/form-data">
		<div class="panel-body">
			<!-- <div class="alert alert-success hidden"><strong>Berhasil! </strong><span></span></div>
					<div class="alert alert-warning hidden"><strong>Memproses! </strong><span>Mohon tunggu, system sedang bekerja.</span></div>
					<div class="alert alert-danger hidden"><strong>Gagal! </strong><span></span></div> -->

			<!--				-------------------------------------------------------------------------------------------------------->

			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nama</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="nama" value="<?php echo $session_userdata['nama']; ?>" class="form-control" readonly>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Judul Tugas</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="judul_tugas" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Isi Tugas</label>
				<div class="col-md-2 col-xs-12">
					<input type="file" name="isi_tugas" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">waktu mulai </label>
				<div class="col-md-3 col-xs-12">
					<input type="datetime-local" name="waktu_mulai" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">waktu selesai</label>
				<div class="col-md-3 col-xs-12">
					<input type="datetime-local" name="waktu_selesai" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Mata Pelanajaran / Kelas</label>
				<div class="col-md-3 col-xs-12">
					<?php if($data_tugas != null) { ?>
						<select class="form-control" name="id_pengajar">
						<?php foreach ($data_tugas as $a) { ?>
								<option value="<?php echo $a->id_pengajar ?>"><?php echo $a->nama_mapel; ?> / <?php echo $a->kelas; ?></option>
										<?php
						} ?>
						</select>
					<?php	} else echo "<i class='fa fa-times text-danger'> Anda Tidak Mengajar! </i>" ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Status</label>
				<div class="col-md-4 col-xs-12">
					<select name="status" class="form-control">
						<?php
                                                foreach ($status_tugas as $c) {
                                                    ?>
					<option value="<?php echo $c->status ?>"><?php echo $c->isi ?></option>
					<?php
                                                } ?>
							</select>
				</div>
			</div>

		</div>
		<div class="panel-footer text-right">
			<button class="btn btn-default" type="reset">Reset</button>
			<?php if($data_tugas != null) { ?>
				<button class="btn btn-primary" type="submit">Simpan</button>
			<?php } else echo "<i class='fa fa-times text-danger'> Anda Tidak Mengajar! </i>" ?>
		</div>

	</form>
</div>
