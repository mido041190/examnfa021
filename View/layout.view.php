<?php
/**
 * Fichier de mise en page
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXAM-CNAM
 */

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
</head>

<body>

 <nav>
  <?php $vmenu->showMenu() ?>
 </nav>

 <div id="content">
  <?php $vcontent->{$content['method']}($content['arg']) ?>
 </div><!-- id="content" -->
  
</body>
</html>
