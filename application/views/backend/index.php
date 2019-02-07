<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/backend_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>assets/backend_assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/backend_assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url() ?>assets/backend_assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/backend_assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url() ?>assets/backend_assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url() ?>assets/backend_assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Selamat Datang, <?php echo $session_userdata['nama'] ?> <i class='fa fa-check-circle'></i></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->

                <!-- /.dropdown -->

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('admin/do_logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                          <a href="<?php echo base_url() ?>"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>

                        <li>
                          <a href="<?php echo base_url('Admin_System') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                          <a href="#"><i class="fa fa-users fa-fw"></i> Data Siswa<span class="fa arrow"></span></a></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="<?php echo base_url('Admin_System/data_siswa') ?>"><i class="fa fa-eye fa-fw"></i> Lihat Data Siswa</a>
                              </li>
                              <li>
                                <a href="<?php echo base_url('Admin_System/tambah_siswa') ?>"><i class="fa fa-plus fa-fw"></i> Form Data Siswa</a>
                              </li>
                            </ul>
                        </li>

                        <li>
                          <a href="#"><i class="fa fa-users fa-fw"></i> Data Guru<span class="fa arrow"></span></a></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="<?php echo base_url('Admin_System/data_guru') ?>"><i class="fa fa-eye fa-fw"></i> Lihat Data Guru</a>
                              </li>
                              <li>
                                <a href="<?php echo base_url('Admin_System/tambah_guru') ?>"><i class="fa fa-plus fa-fw"></i> Form Data Guru</a>
                              </li>
                            </ul>
                        </li>

                        <li>
                          <a href="#"><i class="fa fa-users fa-fw"></i> Data Pengajar<span class="fa arrow"></span></a></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="<?php echo base_url('Admin_System/data_pengajar') ?>"><i class="fa fa-eye fa-fw"></i> Lihat Data Pengajar</a>
                              </li>
                              <li>
                                <a href="<?php echo base_url('Admin_System/tambah_pengajar') ?>"><i class="fa fa-plus fa-fw"></i> Form Data Pengajar</a>
                              </li>
                            </ul>
                        </li>

                        <li>
                          <a href="#"><i class="fa fa-users fa-fw"></i> Data Mapel<span class="fa arrow"></span></a></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="<?php echo base_url('Admin_System/data_mapel') ?>"><i class="fa fa-eye fa-fw"></i> Lihat Data Mapel</a>
                              </li>
                              <li>
                                <a href="<?php echo base_url('Admin_System/tambah_mapel') ?>"><i class="fa fa-plus fa-fw"></i> Form Data Mapel</a>
                              </li>
                            </ul>
                        </li>

                        <li>
                          <a href="#"><i class="fa fa-users fa-fw"></i> Data Kelas<span class="fa arrow"></span></a></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="<?php echo base_url('Admin_System/data_kelas') ?>"><i class="fa fa-eye fa-fw"></i> Lihat Data Kelas</a>
                              </li>
                              <li>
                                <a href="<?php echo base_url('Admin_System/tambah_kelas') ?>"><i class="fa fa-plus fa-fw"></i> Form Data Kelas</a>
                              </li>
                            </ul>
                        </li>

                        <li>
                          <a href="#"><i class="fa fa-users fa-fw"></i> Data Posting guru<span class="fa arrow"></span></a></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="<?php echo base_url('Admin_System/data_berita') ?>"><i class="fa fa-eye fa-fw"></i> Lihat Data Posting Guru</a>
                              </li>
                              <!-- <li>
                                <a href="<?php echo base_url('Admin_System/tambah_berita') ?>"><i class="fa fa-plus fa-fw"></i> Form Data Berita</a>
                              </li> -->
                            </ul>
                        </li>

                        <li>
                          <a href="#"><i class="fa fa-users fa-fw"></i> Data Posting Admin<span class="fa arrow"></span></a></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="<?php echo base_url('Admin_System/data_posting_admin') ?>"><i class="fa fa-eye fa-fw"></i> Lihat Data Posting Admin</a>
                              </li>
                              <li>
                                <a href="<?php echo base_url('Admin_System/tambah_posting_admin') ?>"><i class="fa fa-plus fa-fw"></i> Form Data Posting Admin</a>
                              </li>
                            </ul>
                        </li>

                        <li>
                          <a href="#"><i class="fa fa-users fa-fw"></i> Data video <span class="fa arrow"></span></a></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="<?php echo base_url('Admin_System/data_video') ?>"><i class="fa fa-eye fa-fw"></i> Lihat Data video</a>
                              </li>
                              <!-- <li>
                                <a href="<?php echo base_url('Admin_System/tambah_berita') ?>"><i class="fa fa-plus fa-fw"></i> Form Data Berita</a>
                              </li> -->
                            </ul>
                        </li>

                        <li>
                          <a href="#"><i class="fa fa-users fa-fw"></i> Data Tugas guru<span class="fa arrow"></span></a></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="<?php echo base_url('Admin_System/data_tugas') ?>"><i class="fa fa-eye fa-fw"></i> Lihat Data video</a>
                              </li>
                              <!-- <li>
                                <a href="<?php echo base_url('Admin_System/tambah_berita') ?>"><i class="fa fa-plus fa-fw"></i> Form Data Berita</a>
                              </li> -->
                            </ul>
                        </li>

                        <li>
                          <a href="<?php echo base_url('Admin_System/posting') ?>"><i class="fa fa-newspaper-o fa-fw"></i> Postingan Admin</a>
                        </li>

                        <li>
                          <a href="<?php echo base_url('Admin/do_logout') ?>" class="text-danger"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?php echo $content ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/backend_assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/backend_assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/backend_assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url() ?>assets/backend_assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend_assets/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend_assets/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>assets/backend_assets/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url() ?>assets/backend_assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend_assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend_assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Validation Plugin -->
    <script src="<?php echo base_url() ?>assets/backend_assets/vendor/jquery-validation/jquery.validate.js"></script>

    <!-- WARNING: DATA TABLES SCRIPT -->
    <script>
      $(document).ready(function() {
        $('#dataTables-example').DataTable({
          responsive: true
        });
      });
    </script>

    <!-- WARNING VALIDATE SCRIPT  -->


</body>

</html>
