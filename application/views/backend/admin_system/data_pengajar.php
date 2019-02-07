<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Data Pengajar</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="text-right">
          <div class="pull-left panel-title">Data Pengajar</div>
          <a class="btn btn-success btn-add" href="<?php echo base_url('Admin_System/tambah_pengajar') ?>"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>id pengajar</th>
        			<th>nip</th>
        			<th>id mapel</th>
        			<th>nama mata pelajaran</th>
        			<th>id kelas</th>
        			<th>kelas yang di ajar</th>
              <th>edit</th>
        			<th>hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_pengajar as $u) { ?>
            <tr>
              <td><?php echo $u->id_pengajar ?></td>
        			<td><?php echo $u->nip ?></td>
              <td><?php echo $u->id_mapel ?></td>
        			<td><?php echo $u->nama_mapel ?></td>
              <td><?php echo $u->id_kelas ?></td>
        			<td><?php echo $u->kelas ?></td>

              <td class="text-center">
                <a href="<?php echo base_url('Admin_System/edit_pengajar/'.$u->id_pengajar); ?>">
                  <button class="btn btn-info btn-xs btn-edit" type="submit" data-original-title="Ubah" data-placement="top" data-toggle="tooltip"><i class="fa fa-edit"></i></button>
                </a>
              </td>
              <td class="text-center">
                <a href="<?php echo base_url('Admin_System/hapus_pengajar/'.$u->id_pengajar); ?>">
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
