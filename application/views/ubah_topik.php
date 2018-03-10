<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
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

      <div class="blog-header">
        <h1 class="blog-title"></h1>
        <p class="lead blog-description"></p>
      </div>

      <div class="row">
      <?php echo $this->session->flashdata('warning')?>
     <?php echo form_open('C_topik/update_topik'); ?>
     <?php echo form_hidden('id_topik',$id_topik); ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label for="judul_topik" class="control-label">Judul Topik</label>
                                </div>
                                <div class="col-sm-10">
                                    <?php echo form_input('judulTopik',$tampil_data->judul_topik,['class' => 'form-control', 'placeholder'
                                        ]);?>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <br>
                                        <label for="isi_topik" class="control-label">Topik</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <br>
                                        <?php echo form_textarea('isiTopik',$tampil_data->isi_topik,['class' => 'form-control',
                                            'placeholder' => 'Tulis topik mu','$tampil_data'=>'judul_topik'])?>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <br>
                                    <label for="kategori_topik" class="control-label">Kategori topik</label>
                                </div>
                                <div class="col-sm-10">
                                    <br>
                                    <?php echo form_dropdown('kategoriTopik', array('Mamalia',
                                        'Unggas', 'Reptil', 'Ikan', 'Serangga'), ['class' => 'form-control',]);?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <br><?php echo form_submit('submit','Post',['class' => 'btn btn-default']);?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close();?> 
      </div><!-- /.row -->

    </div><!-- /.container -->

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
  </body>
</html>
