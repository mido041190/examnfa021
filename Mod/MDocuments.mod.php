<?php
/**
 * Class de type Modèle gérant la table DOCUMENTS
 * 
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXAM-CNAM
 */
class MDocuments
{
  /**
   * Connexion à la Base de Données
   * @var object $conn
   */
  private $conn;

  /**
   * Clef primaire de la table DOCUMENTS
   * @var int identifiant du document
   */
  private $id_doc;
  
  /**
   * Tableau de gestion de données (insert ou update)
   * @var array tableau des données
   */
  private $value;
  
  /**
   * Constructeur de la class MDocuments
   * Instancie le membre privé $conn
   * @access public
   * @param int identifiant du document
   *        
   * @return none
   */
  public function __construct($_id_doc = null)
  {
    // Connexion à la Base de Données
    $this->conn = new PDO(DATABASE, LOGIN, PASSWORD);

    // Instanciation du membre $id_doc
    $this->id_doc = $_id_doc;
    
    return;
 
  } // __construct()
  
  /**
   * Destructeur de la class MDocuments
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
   * Récupère plusieurs tuples de la table DOCUMENTS
   * @access public
   *
   * @return array tuples de la table DOCUMENTS
   */
  public function SelectAll()
  {
  	$query = 'select D.ID_DOC, TITRE, AUTEUR, FICHIER
              from DOCUMENTS D, THEMES_DOCUMENTS TD
  			  where TD.ID_DOC = D.ID_DOC
  			  and TD.ID_THEME = :ID_THEME
   		      order by TITRE';

  	$result = $this->conn->prepare($query);

  	$result->bindValue(':ID_THEME', $this->value['ID_THEME'], PDO::PARAM_INT);
  	 
  	$result->execute() or die ($this->ErrorSQL($result));
  	
    return $result->fetchAll();
   
  } // SelectAll()
  
  /**
   * Récupère un tuple de la table DOCUMENTS
   * @access public
   *
   * @return array tuple de la table DOCUMENTS
   */
  public function Select()
  {
    $query = 'select ID_DOC, TITRE, AUTEUR, FICHIER
              from DOCUMENTS
              where ID_DOC = :ID_DOC';
  
    $result = $this->conn->prepare($query);

    $result->bindValue(':ID_DOC', $this->id_doc, PDO::PARAM_INT);
    
    $result->execute() or die ($this->ErrorSQL($result));
    
    return $result->fetch();
  
  } // Select()
   
  /**
   * Insère les données d'un tuple dans la table DOCUMENTS
   * @access public
   *
   * @return array tuple de la table DOCUMENTS
   */
  public function Insert()
  {
    $query = 'insert into DOCUMENTS (TITRE, AUTEUR, FICHIER)
              values(:TITRE, :AUTEUR, :FICHIER)';

    $result = $this->conn->prepare($query);
    
    $result->bindValue(':TITRE',$this->value['TITRE'], PDO::PARAM_STR);
    $result->bindValue(':AUTEUR',$this->value['AUTEUR'], PDO::PARAM_STR);
    $result->bindValue(':FICHIER',$this->value['FICHIER'], PDO::PARAM_STR);
     
    $result->execute() or die ($this->ErrorSQL($result));
    
    $this->id_doc = $this->conn->LastInsertId();
 
  	return $this->id_doc;
    
  } // Insert()

  /**
   * Modifie les données d'un tuple dans la table DOCUMENTS
   * @access public
   *
   * @return array tuple de la table DOCUMENTS
   */
  public function Update()
  {
    $query = 'update DOCUMENTS
    		  set TITRE = :TITRE,
    		      AUTEUR = :AUTEUR,
    		      FICHIER = :FICHIER
    		  where ID_DOC = :ID_DOC';

    $result = $this->conn->prepare($query);

    $result->bindValue(':ID_DOC', $this->id_doc, PDO::PARAM_INT);
    $result->bindValue(':TITRE', $this->value['TITRE'], PDO::PARAM_STR);
    $result->bindValue(':AUTEUR',$this->value['AUTEUR'], PDO::PARAM_STR);
    $result->bindValue(':FICHIER',$this->value['FICHIER'], PDO::PARAM_STR);
    
    $result->execute() or die ($this->ErrorSQL($result));
    
    return;
  
  } // Update()

  /**
   * Supprime un tuple de la table DOCUMENTS
   * @access public
   *
   * @return array tuple de la table DOCUMENTS
   */
  public function Delete()
  {
    $query = 'delete from DOCUMENTS
              where ID_DOC = :ID_DOC';
  
    $result = $this->conn->prepare($query);

    $result->bindValue(':ID_DOC', $this->id_doc, PDO::PARAM_INT);
    
    $result->execute() or die ($this->ErrorSQL($result));
    
    return;
       
  } // Delete()

  /**
   * Insère les données d'un tuple dans la table THEMES_DOCUMENTS
   * @access public
   *
   * @return array tuple de la table DOCUMENTS
   */
  public function InsertThemesDocuments()
  {
  	$query = 'insert into THEMES_DOCUMENTS (ID_DOC, ID_THEME)
              values(:ID_DOC, :ID_THEME)';
  
  	$result = $this->conn->prepare($query);
  
  	$result->bindValue(':ID_DOC',$this->id_doc, PDO::PARAM_INT);
  	$result->bindValue(':ID_THEME',$this->value['ID_THEME'], PDO::PARAM_INT);
   	 
  	$result->execute() or die ($this->ErrorSQL($result));
  	
  	return;
  
  } // InsertThemesDocuments()

  /**
   * Insère les données d'un tuple dans la table THEMES_DOCUMENTS
   * @access public
   *
   * @return array tuple de la table DOCUMENTS
   */
  public function DeleteThemesDocuments()
  {
  	$query = 'delete from THEMES_DOCUMENTS
  			  where ID_DOC = :ID_DOC';
  
  	$result = $this->conn->prepare($query);
  
  	$result->bindValue(':ID_DOC',$this->id_doc, PDO::PARAM_INT);
  	  	
  	$result->execute() or die ($this->ErrorSQL($result));
  	
  	return;
  
  } // DeleteThemesDocuments()

  /**
   * Insère les données d'un tuple dans la table THEMES_DOCUMENTS
   * @access public
   *
   * @return array tuple de la table DOCUMENTS
   */
  public function SelectThemesDocuments()
  {
  	$query = 'select ID_THEME
              from THEMES_DOCUMENTS
  			  where ID_DOC = :ID_DOC';
  
  	$result = $this->conn->prepare($query);

  	$result->bindValue(':ID_DOC',$this->id_doc, PDO::PARAM_INT);
   	 
  	$result->execute() or die ($this->ErrorSQL($result));
  	
  	return $result->fetchAll();
  
  } // SelectThemesDocuments()
  
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
  
} // MDocuments
?>