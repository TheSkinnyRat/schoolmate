<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Form Data Pengajar</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Form Data Pengajar</h3>
	</div>
	<form class="form-horizontal" method="POST" id="barang_form" action="<?php echo base_url().'Admin_System/tambah_pengajar_add'; ?>">
		<div class="panel-body">
			<!-- <div class="alert alert-success hidden"><strong>Berhasil! </strong><span></span></div>
					<div class="alert alert-warning hidden"><strong>Memproses! </strong><span>Mohon tunggu, system sedang bekerja.</span></div>
					<div class="alert alert-danger hidden"><strong>Gagal! </strong><span></span></div> -->

			<!--				-------------------------------------------------------------------------------------------------------->
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nama Guru</label>
				<div class="col-md-2 col-xs-12">
					<select class="form-control" name="nip">
						<?php foreach ($data_guru as $a) { ?>
						<option value="<?php echo $a->nip ?>">
							<?php echo $a->nama ?>
						</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nama Mapel</label>
				<div class="col-md-2 col-xs-12">
					<select class="form-control" name="id_mapel">
						<?php foreach ($data_mapel as $b) { ?>
						<option value="<?php echo $b->id_mapel ?>">
							<?php echo $b->nama_mapel ?>
						</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Kelas Yang Diajar</label>
				<div class="col-md-2 col-xs-12">
					<select class="form-control" name="id_kelas">
						<?php foreach ($data_kelas as $c) { ?>
						<option value="<?php echo $c->id_kelas ?>">
							<?php echo $c->kelas ?>
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
