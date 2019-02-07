<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Tugas</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-8">
    <?php foreach ($data_tugas as $u) { ?>
      <div class="panel panel-info">
      	<div class="panel-heading">
      		<div class="panel-title">
            <b><?php echo $u->judul_tugas ?></b>
          </div>
      	</div>
        <div class="panel-body">
          <small class="text-info">Diposting Oleh : <?php echo $u->nama ?> <i class='fa fa-check-circle'></i></small><br>
          <small class="text-info">Kelas : <?php echo $u->kelas ?></small><br>
          <small class="text-info">Nama Mapel : <?php echo $u->nama_mapel ?></small><br>
          <small class="text-success">Waktu Mulai : <?php echo $u->waktu_mulai ?></small><br>
          <small class="text-danger">Waktu Selesai : <?php echo $u->waktu_selesai ?></small>
          <hr>
          <p class="lead"><?php echo $u->isi_tugas ?></p>
          <a class="btn btn-info btn-add" href="<?php echo base_url('Guru_System/download_tugas/'.$u->id_tugas); ?>"><i class="fa fa-download"></i> Unduh</a>
          <hr>
          <!-- WARNING START KOMENTAR -->
          <small class="text-muted">Komentar : </small>
          <?php foreach ($data_komentar as $a) {
                if ($u->id_tugas == $a->id_tugas) {?>
            <blockquote class="blockquote">
              <h5><?php echo $a->nama; ?></h5>
                <footer class="blockquote-footer"><cite title="Source Title"><?php echo $a->isi_komentar; ?></cite></footer>
              <?php if ($a->id_guru==$session_userdata['id_guru']) {
                echo anchor('Guru_System/hapus_komentar_tugas/'.$a->id_komentar, '<h6><i class="fa fa-times"></i> Hapus Komentar</h6>');
              } ?>
            </blockquote>
          <?php } } ?>
          <!-- WARNING END KOMENTAR -->
        </div>
        <div class="panel-footer">
          <form action="<?php echo base_url(). 'Guru_System/komentar_tugas_add'; ?>" method="post">
            <input type="hidden" name="id_tugas" value="<?php echo $u->id_tugas ?>">
            <input type="hidden" name="nama" value="<?php echo $session_userdata['nama']?>">
            <input type="hidden" name="id_guru" value="<?php echo $session_userdata['id_guru']?>">

            <div class="input-group">
              <input type="text" name="isi_komentar" class="form-control" placeholder="Tulis Komentar..." required />
              <span class="input-group-btn">
                <button type="submit" class="btn btn-warning"><i class="fa fa-send"></i></button>
              </span>
            </div>

          </form>
        </div>
      </div>
    <?php } ?>
  </div>
  <!-- /.col-lg-8 -->
  <div class="col-lg-4">
    <div class="panel panel-green">
      <div class="panel-heading">
        <i class="fa fa-bell fa-fw"></i> Notifications Panel
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="list-group">
          <a href="#" class="list-group-item disabled">
            <i class="fa fa-code fa-fw"></i> Notification is under construction
            <span class="pull-right text-muted small"><em class="hidden">0 minutes ago</em>
            </span>
          </a>
        </div>
        <!-- /.list-group -->
        <a href="#" class="btn btn-default btn-block disabled">View All Alerts</a>
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
