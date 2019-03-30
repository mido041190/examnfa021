<?php
/**
 * Fichier de classe de type Vue
 * pour l'affichage de l'entête
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXERCICE-MOOC
 */
 
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
<ol>
 <li id="1">Page 1</li>
 <li id="2">Page 2</li>
 <li id="3">Page 3</li>
</ol>
NOW;

    return;
    
  } // showHeader()
  
} // VHeader
?>