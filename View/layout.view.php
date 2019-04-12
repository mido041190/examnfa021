<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?=$content['title']?></title>
<link rel="stylesheet" href="../Css/app.css">
<link rel="stylesheet" href="../Css/menu.css">
<link rel="stylesheet" href="../Css/form-modif.css">
<link rel="stylesheet" href="../Css/fiches.css">
<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
<link rel="stylesheet" href="../Css/contact.css">

</head>

<?php

global $content;
$vmenu = new VMenu();
$vcontent = new $content['class']();
?>


<body>

 <nav>
  <?php $vmenu->showMenu() ?> 
 </nav>

 <div id="content">
  <?php $vcontent->{$content['method']}($content['arg']) ?>
 </div><!-- id="content" -->
  
<hr>  


<div class="grid-x grid-padding-x align-center-middle text-center" >
  <div class="cell small-12 medium-4 large-4">
  


	<div class="map-responsive">
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44842.82930008711!2d4.914948991929433!3d45.37551599276038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5250bf95b336d%3A0xc3e72e02dbaeabd4!2s38270+Bellegarde-Poussieu!5e0!3m2!1sfr!2sfr!4v1549871328200" width="600" height="260" style="border:0" allowfullscreen></iframe>
	</div>

  </div>
  <div class="cell small-12 medium-4 large-4 " >
  	<div class="media-object">

  
  				<div class="media-object-section ">
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
    </div>

  </div>


<hr>


<footer>
  <div class="row column text-center">
  <p>SUZANNE Xavier . Examen NFA021 : CATCLINIC </p>

</div>
</footer>

<script src="../node_modules/jquery/dist/jquery.js"></script>
<script src="../node_modules/what-input/dist/what-input.js"></script>
<script src="../node_modules/foundation-sites/dist/js/foundation.js"></script>
<script src="../js/app.js"></script>
<script src="../Js/exercice.js"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>$(document).foundation();</script>
</body>
</html>
