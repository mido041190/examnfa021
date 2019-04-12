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
<ul>
 <li id="1">A la maison</li>
 <li id="2">Comportement</li>
 <li id="3">Conseils</li>
 <li id="4">Griffoir</li>
 <li id="5">Maladies</li>
 <li id="6">Médicaments</li>
</ul>
NOW;

    return;
    
  } // showHeader()
  
} // VHeader
?>