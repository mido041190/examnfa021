<?php

class MPages
{
  /**
   * Chemin du fichier
   * @var string $file
   */
  private $file;

  /**
   * Tableau de gestion de données
   * @var array $value
   */
  private $value;
  
	/**
   * Constructeur de la classe
   * @access public
   * @param string nom du fichier
   *        
   * @return none
   */
  public function __construct($_file)
  {
  	$this->file = '../Html/' . $_file;

  	return;
  	
  } // __construct($_file)
  
  /**
   * Destructeur de la classe
   * @access public
   *        
   * @return none
   */
  public function __destruct() {}

  /**
   * Instancie le membre $value
   * @access public
   * @param array tableau des données
   * 
   * @return none
   */
  public function SetValue($_value)
  {
  	$this->value = $_value;

  	return;
  
  } // SetValue($_value)
 
  /**
   * Mise à jour d'une ligne dans le fichier
   * correspondant au titre de niveau 1 <h1>
   * @access public
   *
   * @return array données des lignes
   */
  public function UpdateTitre()
  {
  	// Lit le fichier dans un tableau
  	$text = file($this->file);
  	
  	// Expression régulière
  	$pattern = '#>(.+)<#';
  	
  	// Chaîne de remplacement
  	$replace = '>'.$this->value['TITRE'].'<';
  	
  	// Recherche et remplace par expression régulière
  	$text[0] = preg_replace($pattern, $replace, $text[0]);
   	
  	// Ecrit la chaîne modifiée dans le fichier
  	file_put_contents($this->file, $text);
  
  	return;
  
  } // UpdateTitre()

  /**
   * Mise à jour d'une ligne dans le fichier
   * correspondant au titre de niveau 2 <h2>
   * @access public
   *
   * @return array données des lignes
   */
  public function UpdateSousTitre()
  {
  	// Lit le fichier dans un tableau
  	$text = file($this->file);
  	
  	// Nombre de lignes
  	$nb_text = count($text);
  	 
  	// Expression régulière
  	$pattern = '#>(.+)<#';
  	 
  	// Chaîne de remplacement
  	$replace = '>'.$this->value['SOUS_TITRE'].'<';
  	
  	// Expression régulière de l'identifiant de <h2>
  	$pat = '#h2-'.$this->value['ID_SOUS_TITRE'].'#';
   	
  	// Boucle sur les lignes
  	for ($i = 0;  $i < $nb_text; ++$i)
  	{
  	  // Vérifie si la ligne a l'expression régulière
  	  if (preg_match($pat, $text[$i]))
  	  {
  	    // Recherche et remplace par expression régulière
  	    $text[$i] = preg_replace($pattern, $replace, $text[$i]);
  	  }
  	}
  
  	// Ecrit la chaîne modifiée dans le fichier
  	file_put_contents($this->file, $text);
    
  	return;
  
  } // UpdateSousTitre()

  /**
   * Mise à jour d'une ligne dans le fichier
   * correspondant au paragraphe <p>
   * @access public
   *
   * @return array données des lignes
   */
  public function UpdateParagraphe()
  {
  	// Lit le fichier dans un tableau
  	$text = file($this->file);
  	 
  	// Nombre de lignes
  	$nb_text = count($text);
  
  	// Expression régulière
  	$pattern = '#>(.+)<#';
  
  	// Chaîne de remplacement
  	$replace = '>'.$this->value['PARAGRAPHE'].'<';
  	 
  	// Expression régulière de l'identifiant de <p>
  	$pat = '#p-'.$this->value['ID_PARAGRAPHE'].'#';
  
  	// Boucle sur les lignes
  	for ($i = 0;  $i < $nb_text; ++$i)
  	{
  	  // Vérifie si la ligne a l'expression régulière
  	  if (preg_match($pat, $text[$i]))
  	  {
  		// Recherche et remplace par expression régulière
  		$text[$i] = preg_replace($pattern, $replace, $text[$i]);
  	  }
  	}
  
  	// Ecrit la chaîne modifiée dans le fichier
  	file_put_contents($this->file, $text);

  	return;
  
  } // UpdateParagraphe()
  
} // MText
?>