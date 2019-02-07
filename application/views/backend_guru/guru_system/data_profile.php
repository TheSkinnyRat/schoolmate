<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Profile</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="text-right">
          <div class="pull-left panel-title">Data Guru</div>
					<fieldset disabled>
					<a class="btn btn-success btn-add" href="<?php echo base_url('Admin_System/tambah_berita') ?>"><i class="fa fa-user"></i></a>
					<fieldset>
					</div>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>id_guru</th>
        			<th>nip</th>
        			<th>password</th>
        			<th>nama</th>
              <th>tempat lahir</th>
              <th>tanggal lahir</th>
              <th>email</th>
              <th>nomer telepon</th>
              <th>jenis kelamin</th>
              <th>edit</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_profile as $u) {
    ?>
            <tr>
              <td><?php echo $u->id_guru ?></td>
        			<td><?php echo $u->nip ?></td>
              <td><?php echo $this->encrypt->decode($u->password) ?></td>
              <td><?php echo $u->nama ?></td>
              <td><?php echo $u->tempat_lahir ?></td>
        			<td><?php echo $u->tanggal_lahir ?></td>
              <td><?php echo $u->email ?></td>
              <td><?php echo $u->no_tlp ?></td>
        			<td><?php echo $u->jenis_kelamin ?></td>

              <td class="text-center">
                <a href="<?php echo base_url('Guru_System/edit_profile/'.$u->id_guru); ?>">
                  <button class="btn btn-info btn-xs btn-edit" type="submit" data-original-title="Ubah" data-placement="top" data-toggle="tooltip"><i class="fa fa-edit"></i></button>
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
