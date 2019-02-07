<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Form Data Posting Admin</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Form Data Posting Admin</h3>
	</div>
	<form class="form-horizontal" method="POST" id="barang_form" action="<?php echo base_url().'Admin_System/tambah_posting_admin_add'; ?>">
		<input type="hidden" name="id" value="<?php echo $session_userdata['id'] ?>">
		<input type="hidden" name="tgl_post" value="<?php echo date('d-m-Y'); ?>">
		<input type="hidden" name="nama" value="<?php echo $session_userdata['nama'] ?>">
		<div class="panel-body">
			<!-- <div class="alert alert-success hidden"><strong>Berhasil! </strong><span></span></div>
					<div class="alert alert-warning hidden"><strong>Memproses! </strong><span>Mohon tunggu, system sedang bekerja.</span></div>
					<div class="alert alert-danger hidden"><strong>Gagal! </strong><span></span></div> -->

			<!--				-------------------------------------------------------------------------------------------------------->
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Nama</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" class="form-control" value="<?php echo $session_userdata['nama'] ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Judul Post</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="judul_post" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Isi Post</label>
				<div class="col-md-2 col-xs-12">
					<input type="text" name="isi_post" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 col-xs-12 control-label">Target</label>
				<div class="col-md-2 col-xs-12">
					<select class="form-control" name="status">
						<option value="1">Murid</option>
						<option value="2">Guru</option>
						<option value="3">Murid & Guru</option>
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
