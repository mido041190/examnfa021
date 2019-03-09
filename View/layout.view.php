<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="../Css/app.css">
</head>

<?php

global $content;
$vmenu = new VMenu();
$vcontent = new $content['class']();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
 <meta charset="utf-8" />
 <title><?=$content['title']?></title>
 <link rel="stylesheet" type="text/css" href="../Css/app.css" />
 <link rel="stylesheet" type="text/css" href="../Css/menu.css" />
</head>

<body>

 <nav>
  <?php $vmenu->showMenu() ?> 
 </nav>

 <div id="content">
  <?php $vcontent->{$content['method']}($content['arg']) ?>
 </div><!-- id="content" -->
  
<hr>  

<!-- 
<div class="grid-container">
  <div class="grid-x grid-padding-x small-up-2 medium-up-3">
    <div class="cell">
      <div class="card">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44842.82930008711!2d4.914948991929433!3d45.37551599276038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5250bf95b336d%3A0xc3e72e02dbaeabd4!2s38270+Bellegarde-Poussieu!5e0!3m2!1sfr!2sfr!4v1549871328200" width="600" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="card-section">
        <h4>Adresse</h4>
          <p>route des chats noirs, 38270 Jarcieu</p>
          <h4>Téléphone</h4>
          <p>04 21 23 06 66</p>
           <h4>Horaires</h4>
            <p>Du Lundi au Vendredi de 8h30 à 19h30</p>
            <p>Le Samedi de 8h30 à 18h00</p>
            <p>Le Dimanche de 10h00 à 12h00</p>
            <p>Les Urgences sont assurées 24h/24 et 7j/7 après appel téléphonique.</p>
        </div>
      </div>
     </div>
  </div>
</div>-->
<div class="map-responsive">
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44842.82930008711!2d4.914948991929433!3d45.37551599276038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5250bf95b336d%3A0xc3e72e02dbaeabd4!2s38270+Bellegarde-Poussieu!5e0!3m2!1sfr!2sfr!4v1549871328200" width="600" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<hr>


<div class="media-object">

  <div class="media-object-section"> 
  </div>
  
  <div class="media-object-section main-section">
    <h3>Adresse</h3>
          <p>route des chats noirs, 38270 Jarcieu</p>
          <h3>Téléphone</h3>
          <p>04 21 23 06 66</p>
           <h3>Horaires</h3>
            <p>Du Lundi au Vendredi de 8h30 à 19h30</p>
            <p>Le Samedi de 8h30 à 18h00</p>
            <p>Le Dimanche de 10h00 à 12h00</p>
            <p>Les Urgences sont assurées 24h/24 et 7j/7 après appel téléphonique.</p>
  </div>

  
</div>


<hr>

<footer>
  <div class="row column text-center">
  <p>SUZANNE Xavier . Examen NFA021 : CATCLINIC <img src= "../Img/logocatclinicweb.png" height="15%" width="15%"></p>

</div>
</footer>

<script src="../Js/exercice.js"></script>
</body>
</html>
