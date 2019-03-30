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

<header>
 <?php $vheader->showHeader(); ?>
</header>

<script src="../Js/exercice.js"></script>
</body>
</html>