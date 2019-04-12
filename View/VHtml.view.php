

<?php

 
/**
 * Classe pour l'affichage des fichiers html ou html.php
 */
class VHtml
{
  /**
   * Constructeur de la classe VHtml
   * @access public
   *        
   * @return none
   */
  public function __construct(){}
  
  /**
   * Destructeur de la classe VHtml
   * @access public
   *        
   * @return none
   */
  public function __destruct(){}
  
  /**
   * Affichage du fichier html ou html.php
   * @access public
   * @param string fichier html ou html.php à afficher
   *
   * @return none
   */
  public function showHtml($_html)
  {
    // Affichage du fichier $_html s'il existe
    // sinon affichage du fichier unknown.html
    ($_html || file_exists($_html)) ? include($_html) : include('../Html/unknown.html');
    
    return;
    
  } // showHtml($_html)
  
} // VHtml
?>