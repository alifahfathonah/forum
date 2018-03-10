<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
    rel="stylesheet" type="text/css">
  </head>
  
  <body>
      <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>Heni</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
              <a href="#">Beranda</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  <div class="section">
      <div class="container">
        <?php echo $this->session->flashdata('warning')?>        
        <div class="row">
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
            <div class="col-md-8">
               <ul class="media-list">     
                <?php foreach($query as $row):?>
                <li class="media">
                <a class="pull-left" href="#"><img class="media-object" src="<?php echo base_url()?>img/gambar/<?=$row->foto_member?>" height="64" width="64"></a>
                <div class="media-body">
                <h4 class="media-heading"><?php echo $row->judul_topik?></h4>
                <p><?php echo $row->isi_topik?></p>
                <small><?php echo strftime('%Y/%m/%d',strtotime($row->tanggal_topik))?></small>
                </div></li>
                <?php endforeach;?>  
                </ul>
            </div>
          <div class="col-md-4">
            <form role="form" action="<?php base_url()?>Controller/getDatalogin" method="POST">
              <div class="form-group">
                <label class="control-label" for="exampleInputEmail1">Username</label>
                <input class="form-control" id="exampleInputEmail1"
                placeholder="Username" type="text" name="username_member" value="" required="Please fill out this field">
              </div>
              <div class="form-group">
                <label class="control-label" for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1"
                placeholder="Password" type="password" name="password_member" value="" required="Please fill out this field">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
              <a href = "<?php base_url()?>Controller/V_BuatAkun" style="float: right;" type="submit" class="btn btn-success">Buat Akun</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>