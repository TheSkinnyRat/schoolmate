<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Postingan Admin</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-8">
    <?php foreach ($data_posting_admin as $u) { ?>
      <div class="panel panel-info">
      	<div class="panel-heading">
      		<div class="panel-title">
            <b><?php echo $u->judul_post ?></b>
          </div>
      	</div>
        <div class="panel-body">
          <small class="text-info">Diposting Oleh : <?php echo $u->nama ?> <i class='fa fa-check-circle'></i></small>
          <small class="text-info pull-right"><?php echo $u->tgl_post ?></small>
          <hr>
          <p class="lead"><?php echo $u->isi_post ?></p>
          <hr>
          <!-- WARNING START KOMENTAR -->
          <!-- <small class="text-muted">Komentar : </small>
          <blockquote class="blockquote">
            <h5>YUDA.</h5>
              <footer class="blockquote-footer"><cite title="Source Title">Webnya Bagus banget gila</cite></footer>
          </blockquote>
          <blockquote class="blockquote">
            <h5>Ridwan.</h5>
              <footer class="blockquote-footer"><cite title="Source Title">Siapa nih yang buat webnya bagus banget gila !!!</cite></footer>
          </blockquote> -->
          <!-- WARNING END KOMENTAR -->
        </div>
        <div class="panel-footer">
          <form action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Tulis Komentar..." disabled />
              <span class="input-group-btn">
                <button type="submit" class="btn btn-warning disabled"><i class="fa fa-send"></i></button>
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
