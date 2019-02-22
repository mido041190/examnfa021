<?php

global $content;
$vheader = new VHeader();
$vcontent = new $content['class']();
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="../Css/app.css">
</head>

<body>
	<div class="titrespe">
	<h2>Les spécialités de la clinique</h2>
</div>
<div class="tabspecialites">

<ol class="specialites">
		<p>-	Radiographie	</p>	
		<p>-	Echographie	(Abdominale	et échocardiographie)	</p>
		<p>-	Analyses sanguines : Biochimie et hématologie	</p>
		<p>-	Laboratoire	et	cytologie </p>	
		<p>-	Dentisterie	</p>
		<p>-	Chirurgie	</p>
		<p>-	Hospitalisation	</p>
		<p>-	Service	de	garde	24h/24	-	7j/7 </p>
</ol>




</div>

<header class="headerspe">
 <?php $vheader->showHeader(); ?>
</header>
<script src="../js/exercice.js"></script>
</body>
</html>