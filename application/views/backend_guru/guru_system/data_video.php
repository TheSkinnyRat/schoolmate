<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Data Video</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="text-right">
          <div class="pull-left panel-title">Data Video</div>
          <fieldset>
          <a class="btn btn-success btn-add" href="<?php echo base_url('Guru_System/tambah_video') ?>"><i class="fa fa-plus"></i> Tambah Data</a>
          <fieldset>
        </div>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
						<tr>
      			<th>Nama</th>
      			<th>judul video</th>
      			<th>isi video</th>
      			<th>tgl video</th>
		  			<th>nama mapel</th>
            <th>download</th>
            <th>edit</th>
            <th>hapus</th>

  					</tr>
          </thead>
          <tbody>
						<?php
            foreach ($data_video as $u) {
                ?>
							<tr>
						<td><?php echo $u->nama ?></td>
  					<td><?php echo $u->judul_video ?></td>
						<td><video width="75%" height="auto" src="<?php echo base_url('Video/'.$u->isi_video); ?>" controls>

						</video> </td>
      			<td><?php echo $u->tgl_video ?></td>
						<td><?php echo $u->nama_mapel ?></td>
						<td class="text-center">
							<a href="<?php echo base_url('Guru_System/download_video/'.$u->id_video); ?>">
								<button class="btn btn-info btn-xs btn-edit" type="submit" data-original-title="Ubah" data-placement="top" data-toggle="tooltip"><i class="fa fa-download"></i></button>
							</a>
						</td>
						<td class="text-center">
							<a href="<?php echo base_url('Guru_System/edit_video/'.$u->id_video); ?>">
								<button class="btn btn-info btn-xs btn-edit" type="submit" data-original-title="Ubah" data-placement="top" data-toggle="tooltip"><i class="fa fa-edit"></i></button>
							</a>
						</td>
						<td class="text-center">
							<a href="<?php echo base_url('Guru_System/hapus_video/'.$u->id_video); ?>">
								<button class="btn btn-danger btn-xs btn-delete" type="submit" data-original-title="delete" data-placement="top" data-toggle="tooltip"><i class="fa fa-trash-o"></i></button>
							</a>
						</td>

            </tr>
            <?php
            } ?>

          </tbody>
        </table>
        <!-- /.table-responsive -->
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>
