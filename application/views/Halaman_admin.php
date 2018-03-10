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

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
           <a class="blog-nav-item active" href="<?=base_url()?>C_member/Halaman_admin">Lihat Topik</a>
           <a class="blog-nav-item" href="<?=base_url()?>C_member/Tambah_dokter">Tambah Dokter</a>
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
              <div class="col-md-4">
                   <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">  Kategori  
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="<?=base_url()?>C_member/tampil_kategori/0">Mamalia</a></li>
                        <li><a href="<?=base_url()?>C_member/tampil_kategori/1">Unggas</a></li>
                        <li><a href="<?=base_url()?>C_member/tampil_kategori/2">Reptil</a></li>
                        <li><a href="<?=base_url()?>C_member/tampil_kategori/3">Ikan</a></li>
                        <li><a href="<?=base_url()?>C_member/tampil_kategori/4">Serangga</a></li>
                      </ul>
                    </div> 
              </div>
          </div>
        <br>
      <div class="row" style="width: 500px">
      <div class="col-md-4"></div>
      <div class="col-md-4">
      <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Topik</th>
                  <th>Judul Topik</th>
                  <th>Isi Topik</th>
                  <th>Tanggal Topik</th>
                  <th>Id Kategori</th>
                  <th>Status</th>
                  <th>Hapus Topik</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                <?php foreach($admin_topik as $get_data):?>
                <tr>
                <td><?php echo $i++?></td>
                <td><?php echo $get_data->id_topik?></td>
                <td><?php echo $get_data->judul_topik?></td>
                <td><?php echo $get_data->isi_topik?></td>
                <td><?php echo $get_data->tanggal_topik?></td>
                <td><?php echo $get_data->id_kategori?></td>
                <td><?php echo $get_data->username_topik?></td>
                <td><a href="topik_tidakpantas/<?=$get_data->id_topik?>" type="button" 
                class="btn btn-warning"">remove post</a></td>
                </tr>
              <?php endforeach;?>
                 
                </tbody>
                <tfoot>
                </tfoot>
              </table>
      </div>
      <div class="col-md-4"></div>
      </div><!-- /.row -->

    </div><!-- /.container -->
    </br></br></br></br></br>
    <footer class="blog-footer" style="margin-top: 100px">
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
    <!--Scripts-->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="<?php echo base_url()?>assets/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/qunit/qunit-2.0.1.js"></script>
<script>
jQuery(document).ready(function($){
$('.btn-warning').on('click',function(){
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
