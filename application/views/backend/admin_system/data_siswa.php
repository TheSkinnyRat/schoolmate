<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Data Siswa</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="text-right">
          <div class="pull-left panel-title">Data Siswa</div>
          <a class="btn btn-success btn-add" href="<?php echo base_url('Admin_System/tambah_siswa') ?>"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>ID Siswa</th>
              <th>nis</th>
              <th>password</th>
              <th>nama</th>
              <th>tempat lahir</th>
              <th>tanggal lahir</th>
              <th>email</th>
              <th>nomer telepon</th>
              <th>jenis kelamin</th>
              <th>id kelas</th>
              <th>nama kelas</th>
              <th>edit</th>
              <th>hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_siswa as $u) { ?>
            <tr>
              <td>
                <?php echo $u->id_siswa ?>
              </td>
              <td>
                <?php echo $u->nis ?>
              </td>
              <td>
                <?php echo $this->encrypt->decode($u->password) ?>
              </td>
              <td>
                <?php echo $u->nama ?>
              </td>
              <td>
                <?php echo $u->tempat_lahir ?>
              </td>
              <td>
                <?php echo $u->tanggal_lahir ?>
              </td>
              <td>
                <?php echo $u->email ?>
              </td>
              <td>
                <?php echo $u->no_tlp ?>
              </td>
              <td>
                <?php echo $u->jenis_kelamin ?>
              </td>
              <td>
                <?php echo $u->id_kelas ?>
              </td>
              <td>
                <?php echo $u->kelas ?>
              </td>

              <td class="text-center">
                <a href="<?php echo base_url('Admin_System/edit_siswa/'.$u->id_siswa); ?>">
                  <button class="btn btn-info btn-xs btn-edit" type="submit" data-original-title="Ubah" data-placement="top" data-toggle="tooltip"><i class="fa fa-edit"></i></button>
                </a>
              </td>
              <td class="text-center">
                <a href="<?php echo base_url('Admin_System/hapus_siswa/'.$u->id_siswa); ?>">
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
