<?php

class MThemes
{
  /**
   * Connexion à la Base de Données
   * @var object $conn
   */
  private $conn;

  /**
   * Clef primaire de la table THEMES
   * @var int identifiant du thème
   */
  private $id_theme;
  
  /**
   * Tableau de gestion de données (insert ou update)
   * @var array tableau des données
   */
  private $value;
  
  /**
   * Constructeur de la class MThemes
   * Instancie le membre privé $conn
   * @access public
   * @param int identifiant du thème
   *        
   * @return none
   */
  public function __construct($_id_theme = null)
  {
    // Connexion à la Base de Données
    $this->conn = new PDO(DATABASE, LOGIN, PASSWORD);

    // Instanciation du membre $id_theme
    $this->id_theme = $_id_theme;
    
    return;
 
  } // __construct()
  
  /**
   * Destructeur de la class MThemes
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
   * Récupère plusieurs tuples de la table THEMES
   * @access public
   *
   * @return array tuples de la table THEMES
   */
  public function SelectAll()
  {
	$query = 'select ID_THEME, THEME
              from THEMES
   		      order by THEME';

	$result = $this->conn->prepare($query);

	$result->execute() or die ($this->Error($result));
  
    return $result->fetchAll();
   
  } // SelectAll()

  /**
   * Insère les données d'un tuple dans la table THEMES
   * @access private
   *
   * @return array tuple de la table THEMES
   */
  public function Insert()
  {
  	$query = 'insert into THEMES (THEME)
              values(:THEME)';
 
  	$result = $this->conn->prepare($query);
  
  	$result->bindValue(':THEME', $this->value['THEME'], PDO::PARAM_STR);
  
  	$result->execute() or die ($this->Error($result));
  	
  	return;
  
  } // Insert()

  /**
   * Modifie les données d'un tuple dans la table THEMES
   * @access private
   *
   * @return array tuple de la table THEMES
   */
  public function Update()
  {
  	$query = 'update THEMES
    		  set THEME = :THEME
    		  where ID_THEME = :ID_THEME';
  
  	$result = $this->conn->prepare($query);
  
  	$result->bindValue(':ID_THEME', $this->id_theme, PDO::PARAM_INT);
  	$result->bindValue(':THEME', $this->value['THEME'], PDO::PARAM_STR);
  
  	$result->execute() or die ($this->Error($result));
  	
  	return;
  
  } // Update()

  /**
   * Supprime un tuple de la table THEMES
   * @access private
   *
   * @return array tuple de la table THEMES
   */
  public function Delete()
  {
  	$query = 'delete from THEMES
              where ID_THEME = :ID_THEME';
  
  	$result = $this->conn->prepare($query);
  
  	$result->bindValue(':ID_THEME', $this->id_theme, PDO::PARAM_INT);
  
  	$result->execute() or die ($this->Error($result));
  	
  	return;
  	 
  } // Delete()
  
  /**
   * Récupère les erreurs SQL
   * @access private
   * @param statement résultat de la préparation
   *
   * @return none;
   */
  private function ErrorSQL($result)
  {
  	// Récupère le tableau des erreurs
  	$error = $result->errorInfo();
  	 
  	echo 'TYPE_ERROR = ' . $error[0] . '<br />';
  	echo 'CODE_ERROR = ' . $error[1] . '<br />';
  	echo 'MSG_ERROR = ' . $error[2] . '<br />';
  
  	return;
  
  } // ErrorSQL($result)
  
} // MThemes
?>