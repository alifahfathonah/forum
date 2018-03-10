<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Buat Akun</title>
    <link  type="text/css" rel="stylesheet"  href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  </head>
  <body>
   <div class="row" style="margin-top: 100px">
   <?php echo $this->session->flashdata('warning')?>
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form action="<?=base_url()?>Controller/savedata" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama :</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama" name="nama_member" value="" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="irmaxxxxxxx@gmail.com" name="email_member" value="" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tempat,Tanggal Lahir</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Gresik,23 September 1995" name="TTL_member" value="" required>
            </div>
            <div class="form-group">
            <label>Jenis Kelamin</label>
              <select name="jenisKelamin_member" class="form-control">
                <option>Pilihan</option>
                <option  value="Female">Female</option>
                <option value="Male">Male</option>
              </select>
            </div>
             <div class="form-group">
              <label for="exampleInputFile">Upload Foto</label>
              <input type="file" id="exampleInputFile" name="foto_member" value="">
                <p class="help-block">Format Foto PNG|JPEG</p>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Username</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" name="username_member" value="" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_member" value="" required>
            </div>
            <hr/>
            <div class="form-group">
            <button type="submit" class="btn btn-default">create</button>
            </div>
      </form>
      </div>
      <div class="col-md-4"></div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  </body>
</html>