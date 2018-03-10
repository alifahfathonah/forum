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
          <a class="blog-nav-item active" href="<?=base_url()?>Controller/V_dokter">Beranda</a>
          <a class="blog-nav-item" href="<?=base_url()?>C_member/profil_dokter">Lihat Profil</a>
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
              <div class="col-md-4">
                   <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">  Kategori  
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="<?=base_url()?>kategori/0">Mamalia</a></li>
                        <li><a href="<?=base_url()?>kategori/1">Unggas</a></li>
                        <li><a href="<?=base_url()?>kategori/2">Reptil</a></li>
                        <li><a href="<?=base_url()?>kategori/3">Ikan</a></li>
                        <li><a href="<?=base_url()?>kategori/4">Serangga</a></li>
                      </ul>
                    </div> 
              </div>
          </div>
          <br>
      <div class="row">
        <div class="col-sm-8">
           <ul class="media-list">   
               <?php foreach($query as $row):?>
               <li class="media">
                <a class="pull-left" href="#">
                <img class="media-object" src="<?php echo base_url()?>img/gambar/<?=$row->foto_member?>" height="64" width="64">
                </a>
                <div class="media-body">
                <h2>Judul : <?php echo $row->judul_topik?></h2>
                <p><?php echo $row->isi_topik?></p>
                <small><?php echo strftime('%Y/%m/%d',strtotime($row->tanggal_topik))?></small>
                <?php echo "By : ".$row->username_member?></br>
                 <a href ="tampilKomentar2/<?=$row->id_topik?>">Komentar</a>
                 </li></br>
                <?php endforeach;?>
              </ul>
            </div>
      </div><!-- /.row -->

    </div><!-- /.container -->

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