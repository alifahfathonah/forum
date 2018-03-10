<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

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
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <ul class="media-list">
                <?php 
                foreach($query as $row) {
                echo '<li class="media">';
                echo '<a class="pull-left" href="#"><img class="media-object" src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" height="64" width="64"></a>';
                echo '<div class="media-body">';
                echo '<h4 class="media-heading">'.$row->judul_topik.'</h4>';
                echo '<p>'.$row->isi_topik.'</p>';
                echo '<small>'.strftime('%Y/%m/%d',strtotime($row->tanggal_topik)).'</small>';
                echo '</div></li>';
                }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>
