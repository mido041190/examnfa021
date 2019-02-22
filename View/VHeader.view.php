
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="../Css/app.css">
</head>

<?php

 
/**
 * Classe pour l'affichage de l'entête
 */
class VHeader
{
  /**
   * Constructeur de la classe
   * @access public
   *        
   * @return none
   */
  public function __construct(){}

  /**
   * Destructeur de la classe
   * @access public
   *
   * @return none
   */
  public function __destruct(){}

  /**
   * Affichage de l'entête
   * @access public
   *
   * @return none
   */
  public function showHeader()
  {
    echo <<<'NOW'
<div class="expanded button-group">
<ol>
 <a class="button"><li id="1">Modification</li></a>
 
</ol>
</div>
NOW;

    return;
    
  } // showHeader()
  
} // VHeader
?>

