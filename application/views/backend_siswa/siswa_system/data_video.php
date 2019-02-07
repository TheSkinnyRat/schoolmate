<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Video</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-8">
    <?php foreach ($data_video as $u) { ?>
      <div class="panel panel-info">
      	<div class="panel-heading">
      		<div class="panel-title">
            <b><?php echo $u->judul_video ?></b>
          </div>
      	</div>
        <div class="panel-body">
          <small class="text-info">Diposting Oleh : <?php echo $u->nama ?> <i class='fa fa-check-circle'></i></small>
          <small class="text-info pull-right"><?php echo $u->tgl_video ?></small><br>
          <small class="text-info">Nama Mapel : <?php echo $u->nama_mapel ?></small><br>
          <hr>
          <p class="lead"><?php echo $u->isi_video ?></p>
          <video width="100%" height="100%" controls >
            <source src="<?php echo base_url('Video/'.$u->isi_video); ?>" type="video/mp4">
          </video><br>
          <a class="btn btn-success btn-add" href="<?php echo base_url('Siswa_System/download_video/'.$u->id_video); ?>"><i class="fa fa-download"></i> Download Video</a>
          <hr>
          <!-- WARNING START KOMENTAR -->
          <small class="text-muted">Komentar : </small>
          <?php foreach ($data_komentar as $a) {
                if ($u->id_video == $a->id_video) {?>
            <blockquote class="blockquote">
              <h5><?php echo $a->nama; ?></h5>
                <footer class="blockquote-footer"><cite title="Source Title"><?php echo $a->isi_komentar; ?></cite></footer>
              <?php if ($a->id_siswa==$session_userdata['id_siswa']) {
                echo anchor('Siswa_System/hapus_komentar_video/'.$a->id_komentar, '<h6><i class="fa fa-times"></i> Hapus Komentar</h6>');
              } ?>
            </blockquote>
          <?php } } ?>
          <!-- WARNING END KOMENTAR -->
        </div>
        <div class="panel-footer">
          <form action="<?php echo base_url(). 'Siswa_System/komentar_video_add'; ?>" method="post">
            <input type="hidden" name="id_video" value="<?php echo $u->id_video?>">
            <input type="hidden" name="nama" value="<?php echo $session_userdata['nama']?>">
            <input type="hidden" name="id_siswa" value="<?php echo $session_userdata['id_siswa']?>">

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
