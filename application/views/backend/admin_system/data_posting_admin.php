<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Data Posting Admin</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="text-right">
          <div class="pull-left panel-title">Data Posting Admin</div>
          <a class="btn btn-success btn-add" href="<?php echo base_url('Admin_System/tambah_posting_admin') ?>"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>id posting</th>
        			<th>id_pengajar</th>
              <th>Nama</th>
              <th>judul post</th>
              <th>isi post</th>
              <th>tanggal posting</th>
        			<th>status</th>
              <th>target</th>
              <th>edit</th>
              <th>hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_posting_admin as $u) { ?>
            <tr>
              <td><?php echo $u->id_posting ?></td>
        			<td><?php echo $u->id ?></td>
          	  <td><?php echo $u->nama ?></td>
          		<td><?php echo $u->judul_post ?></td>
            	<td><?php echo $u->isi_post ?></td>
            	<td><?php echo $u->tgl_post ?></td>
              <td><?php echo $u->status ?></td>
              <td><?php echo $u->target ?></td>

              <td class="text-center">
                <a href="<?php echo base_url('Admin_System/edit_posting_admin/'.$u->id_posting); ?>">
                  <button class="btn btn-info btn-xs btn-edit" type="submit" data-original-title="Ubah" data-placement="top" data-toggle="tooltip"><i class="fa fa-edit"></i></button>
                </a>
              </td>
              <td class="text-center">
                <a href="<?php echo base_url('Admin_System/hapus_posting_admin/'.$u->id_posting); ?>">
                  <button class="btn btn-danger btn-xs btn-delete" type="submit" data-original-title="delete" data-placement="top" data-toggle="tooltip"><i class="fa fa-trash-o"></i></button>
                </a>
              </td>

            </tr>
            <?php } ?>

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
