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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/sweetalert.css">
  </head>

  <body>
 <?php foreach($data_member as $data):?>
    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="<?=base_url()?>index.php/Controller/V_beranda">Beranda</a>
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

      <div class="blog-header">
        <h1 class="blog-title"></h1>
        <p class="lead blog-description"></p>
      </div>

      <div class="row">
        <div class="container" style="margin-top: 100px">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
          <a href="<?=base_url()?>index.php/C_member/ubahProfil/<?=$data->username_member?>" 
          data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>
      </div>
      </br></br>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Profil Member</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo base_url()?>img/gambar/<?=$data->foto_member?>"  class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     <tr>
                       <td>Nama : </td>
                       <td><?php echo $data->nama_member?></td>
                     </tr>
                     <tr>
                     </tr>
                     <tr>
                       <td>Tempat, Tanggal Lahir : </td>
                       <td><?php echo $data->TTL_member?></td>
                     </tr>
                     <tr>
                       <td>Jenis Kelamin : </td>
                       <td><?php echo $data->jenisKelamin_member?></td>
                     </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div><!-- /.row -->
          <?php echo "Topik yang dibuat"?>
           <hr></hr>
            <?php foreach($data_topik as $topik):?>
              <?php echo "Tanggal : ".$topik->tanggal_topik."</br>";?>
              <?php echo "Judul Topik : ".$topik->judul_topik."</br>"?>
              <?php echo "Isi Topik : ".$topik->isi_topik."</br>"?>
              <?php echo "User : ".$topik->username_topik."</br>"?>
              <a href ="Ubahtopik/<?=$topik->id_topik?>">Ubah Topik</a>
              <a href = "Hapustopik/<?=$topik->id_topik?>" class="delete-link"> Hapus Topik</a>
              <hr></hr>
              <?php endforeach;?>
    </div><!-- /.container -->
    </br></br></br></br></br></br></br></br></br></br></br>
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
    <?php endforeach;?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="<?php echo base_url()?>assets/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/qunit/qunit-2.0.1.js"></script>
<script>
jQuery(document).ready(function($){
$('.delete-link').on('click',function(){
var getLink = $(this).attr('href');
swal({
title: 'Alert',
text: 'Hapus Data?',
html: true,
confirmButtonColor: '#d9534f',
showCancelButton: true,
},function(){
window.location.href = getLink
});
return false;
});
});
</script>
  </body>
</html>