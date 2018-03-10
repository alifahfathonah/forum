<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url()?>assets2/docs/favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets2/docs/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url()?>assets2/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets2/docs/examples/blog/blog.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url()?>assets2/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="<?=base_url()?>Controller/V_beranda">Beranda</a>
          <a class="blog-nav-item" href="<?=base_url()?>C_topik/getViewBuatTopik">Buat Topik</a>
          <a class="blog-nav-item" href="<?=base_url()?>C_Member/getViewProfil">Lihat Profil</a>
          <a class="blog-nav-item" href="<?=base_url()?>C_topik/notif">Notification
          <?php
            $i=0;
            foreach($notif as $value){
              $user = $this->session->userdata('username_member');
            if($value->username_topik == $user){
             $i++;
            }
          }
          echo $i;
          ?>  
          </a>
          <a class="blog-nav-item" href="<?=base_url()?>Controller/logout">Logout</a>
        </nav>
      </div>
    </div>

    <div class="container">
      <?php echo $this->session->flashdata('warning')?>
      <div class="blog-header">
        <h1 class="blog-title"></h1>
        <p class="lead blog-description"></p>
      </div>

      <div class="row" style="margin-top: 100px">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form action="<?=base_url()?>C_member/updateProfil/<?=$edit_data->username_member?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama : </label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama" name="nama_member" value="<?php echo $edit_data->nama_member?>" required>
            </div>
            <div class="form-group">
              <label >Tempat,Tanggal Lahir</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Gresik,23 September 1995" name="TTL_member" value="<?php echo $edit_data->TTL_member?>"  required>
            </div>
            <div class="form-group">
            <label>Jenis Kelamin</label>
              <select name="jenisKelamin_member" class="form-control">
                <option></option>
                <option  value="Female">Female</option>
                <option  value="Male">Male</option>
              </select>
            </div>
             <div class="form-group">
              <label for="exampleInputFile">Upload Foto</label>
              <input type="file" id="exampleInputFile" name="foto_member" value="">
                <p class="help-block">Format Foto PNG|JPEG</p>
            </div>
            <hr/>
            <div class="form-group">
            <button type="submit" class="btn btn-default">post</button>
            </div>
      </form>
      </div>
      <div class="col-md-4"></div>
      </div><!-- /.row -->

    </div><!-- /.container -->
    </br></br></br></br></br>
    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url()?>assets2/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url()?>assets2/docs/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url()?>assets2/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
