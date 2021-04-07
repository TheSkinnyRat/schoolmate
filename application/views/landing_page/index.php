
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>School-Mate</title>
  <!-- BOOTSTRAP CORE STYLE CSS -->
  <link href="<?php echo base_url('assets/landing_page_assets/css/bootstrap.css'); ?>" rel="stylesheet" />
  <!-- FONT AWESOME CSS -->
  <link href="<?php echo base_url('assets/landing_page_assets/css/font-awesome.min.css'); ?>" rel="stylesheet" />
  <!-- FLEXSLIDER CSS -->
  <link href="<?php echo base_url('assets/landing_page_assets/css/flexslider.css'); ?>" rel="stylesheet" />
  <!-- CUSTOM STYLE CSS -->
  <link href="<?php echo base_url('assets/landing_page_assets/css/style.css'); ?>" rel="stylesheet" />
  <!-- Google	Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#home"><img class="logo-custom" src="<?php echo base_url('assets/landing_page_assets/img/schoolmate-logo.png'); ?>" alt="" /></a>
      </div>
      <div class="navbar-collapse collapse move-me">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#home">HOME</a></li>
          <li><a href="#features-sec">FEATURES</a></li>
          <li><a href="<?php echo base_url('Guru'); ?>"><?php echo $logged_guru; ?></a></li>
          <li><a href="<?php echo base_url('Siswa'); ?>"><?php echo $logged_siswa; ?></a></li>
        </ul>
      </div>

    </div>
  </div>
  <!--NAVBAR SECTION END-->
  <div class="home-sec" id="home">
    <div class="overlay">
      <div class="container">
        <div class="row text-center ">

          <div class="col-lg-12  col-md-12 col-sm-12">

            <div class="flexslider set-flexi" id="main-section">
              <ul class="slides move-me">
                <!-- Slider 01 -->
                <li>
                  <h3>Schooling Website</h3>
                  <h1>Community Hub</h1>
                  <a href="<?php echo base_url('Guru'); ?>" class="btn btn-info btn-lg">
                    <?php echo $logged_guru; ?>
                  </a>
                  <a href="<?php echo base_url('Siswa'); ?>" class="btn btn-success btn-lg">
                    <?php echo $logged_siswa ?>
                  </a>
                </li>
                <!-- End Slider 01 -->

                <!-- Slider 02 -->
                <li>
                  <h3>Schooling Website</h3>
                  <h1>Do the task</h1>
                  <a href="<?php echo base_url('Guru'); ?>" class="btn btn-primary btn-lg">
                    <?php echo $logged_guru; ?>
                  </a>
                  <a href="<?php echo base_url('Siswa'); ?>" class="btn btn-danger btn-lg">
                    <?php echo $logged_siswa ?>
                  </a>
                </li>
                <!-- End Slider 02 -->

                <!-- Slider 03 -->
                <li>
                  <h3>Schooling Website</h3>
                  <h1>Watch the video</h1>
                  <a href="<?php echo base_url('Guru'); ?>" class="btn btn-default btn-lg">
                    <?php echo $logged_guru; ?>
                  </a>
                  <a href="<?php echo base_url('Siswa'); ?>" class="btn btn-info btn-lg">
                    <?php echo $logged_siswa ?>
                  </a>
                </li>
                <!-- End Slider 03 -->
              </ul>
            </div>




          </div>

        </div>
      </div>
    </div>

  </div>
  <!--HOME SECTION END-->
  <div class="tag-line">
    <div class="container">
      <div class="row  text-center">

        <div class="col-lg-12  col-md-12 col-sm-12">

          <h2 data-scroll-reveal="enter from the bottom after 0.1s"><i class="fa fa-graduation-cap"></i> WELCOME TO SCHOOL-MATE <i class="fa fa-graduation-cap"></i> </h2>
        </div>
      </div>
    </div>

  </div>
  <!--HOME SECTION TAG LINE END-->
  <div id="features-sec" class="container set-pad">
    <div class="row text-center">
      <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
        <h1 data-scroll-reveal="enter from the bottom after 0.2s" class="header-line">FEATURE LIST </h1>
        <p data-scroll-reveal="enter from the bottom after 0.3s">
          Berikut ini adalah beberapa fitur yang tersedia. Dan masih banyak fitur lainnya.
        </p>
      </div>

    </div>
    <!--/.HEADER LINE END-->


    <div class="row">


      <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.4s">
        <div class="about-div">
          <i class="fa fa-users fa-4x icon-round-border"></i>
          <h3>Community Hub</h3>
          <hr />
          <hr />
          <p>
            Dalam website ini anda dapat berkomunikasi dengan guru maupun siswa,
          </p>
          <a href="#home" class="btn btn-info btn-set">LOGIN</a>
        </div>
      </div>
      <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.5s">
        <div class="about-div">
          <i class="fa fa-tasks fa-4x icon-round-border"></i>
          <h3>Do the task</h3>
          <hr />
          <hr />
          <p>
            Dalam website ini anda dapat mengerjakan maupun mengirim tugas.

          </p>
          <a href="#home" class="btn btn-info btn-set">LOGIN SEKARANG</a>
        </div>
      </div>
      <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.6s">
        <div class="about-div">
          <i class="fa fa-video-camera fa-4x icon-round-border"></i>
          <h3>WATCH THE VIDEO</h3>
          <hr />
          <hr />
          <p>
            Dalam website ini anda dapat menonton video yang di share oleh guru atau admin.
          </p>
          <a href="#home" class="btn btn-info btn-set">LOGIN SEKARANG JUGA</a>
        </div>
      </div>


    </div>
  </div>
  <!-- FEATURES SECTION END-->

    <div id="footer">
      <div class="text-center">
        &copy; Schoolmate Project 2017
      <!-- <?php echo $sql_query; ?>
 -->    </div>
    </div>
    <!-- FOOTER SECTION END-->

    <!--  Jquery Core Script -->
    <script src="<?php echo base_url('assets/landing_page_assets/js/jquery-1.10.2.js'); ?>"></script>
    <!--  Core Bootstrap Script -->
    <script src="<?php echo base_url('assets/landing_page_assets/js/bootstrap.js'); ?>"></script>
    <!--  Flexslider Scripts -->
    <script src="<?php echo base_url('assets/landing_page_assets/js/jquery.flexslider.js'); ?>"></script>
    <!--  Scrolling Reveal Script -->
    <script src="<?php echo base_url('assets/landing_page_assets/js/scrollReveal.js'); ?>"></script>
    <!--  Scroll Scripts -->
    <script src="<?php echo base_url('assets/landing_page_assets/js/jquery.easing.min.js'); ?>"></script>
    <!--  Custom Scripts -->
    <script src="<?php echo base_url('assets/landing_page_assets/js/custom.js'); ?>"></script>
</body>

</html>
