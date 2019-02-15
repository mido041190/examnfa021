
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="../Css/app.css">
</head>

<?php
class VDocuments
{
  /**
   * Constructeur
   */ 
  public function __construct() {}

  /**
   * Destructeur
   */ 
  public function __destruct() {}

  /**
   * Affichage des documents
   * @param array données des documents
   *
   * @return none
   */
  public function showDocuments($_data)
  { 
   	// Boucle sur les tuples racines de la table CONTACTS
    $tr = '';
    foreach ($_data as $val)
    {
      if (!isset($_SESSION['ADMIN_DOC']))
      {
        // Concaténation avec l'ancre et le titre de la catégorie
        $tr .= '<tr><td><a href="../Php/index.php?EX=pdf&amp;FICHIER='.$val['FICHIER'].'" target="_blank">'.$val['TITRE'].'</a></td><td>'.$val['AUTEUR'].'</td><td>'.$val['FICHIER'].'</td></tr>';
      }
      else
      {
      	// Concaténation avec l'ancre et le titre de la catégorie
      	$tr .= '<tr><td><a href="../Php/index.php?EX=form&amp;ID_DOC='.$val['ID_DOC'].'">'.$val['TITRE'].'</a></td><td>'.$val['AUTEUR'].'</td><td>'.$val['FICHIER'].'</td></tr>';
      }
    }
    
    $nouveau = isset($_SESSION['ADMIN_DOC']) ? '<p class="nouveau"><a href="../Php/index.php?EX=form"><button>NOUVEAU DOCUMENT</button></a></p>' : '';   
           
    echo <<<HERE
<h2 class="theme">{$_SESSION['THEME']}</h2>
<table class="hover" id="table_documents" >
 <thead>
  <tr>
   <th>Titre</th><th>Auteur</th><th>Fichier</th>
  </tr>
 </thead>
 <tbody>
  $tr
 </tbody>
</table>
  		
$nouveau
  		
<div id="admin"><a href="../Php/index.php?EX=admin"></a></div>
HERE;
   
  } // showDocuments($_data)
    
  
  /**
   * Affichage du formulaire des documents
   * @param array données du formulaire
   *
   * @return none
   */
  public function formDocument($_data)
  {
  	$data_themes = isset($_data['THEMES']) ? $_data['THEMES'] : '';

  	$data_doc = isset($_data['DOCUMENTS']) ? $_data['DOCUMENTS'] : '';
  	 
  	$mthemes = new MThemes();
  	$themes = $mthemes->SelectAll();

  	$selected = '';
  	$options = '';
  	foreach ($themes as $val1)
  	{
  	  if ($data_themes)
  	  {
  	    foreach ($data_themes as $val2)
  	    {
  	      $selected = (isset($val2['ID_THEME']) && $val1['ID_THEME'] == $val2['ID_THEME']) ? 'selected="selected"' : '';
  	    
  	      if ($selected) break;
  	    }
  	  }

  	  $options .= '<option '.$selected.' value="'.$val1['ID_THEME'].'">'.$val1['THEME'].'</option>';
  	  	
  	  $delete = $data_doc ? '<p class="delete"><a href="../Php/index.php?EX=delete&amp;ID_DOC='.$data_doc['ID_DOC'].'&amp;FICHIER_OLD='.$data_doc['FICHIER'].'"><button>Supprimer</button></a></p>' : '';
  	}

  	if ($data_doc)
  	{
  	  $titre = $data_doc['TITRE'];
 	  $auteur = $data_doc['AUTEUR'];
 	  $fichier = ($data_doc['FICHIER']) ? 'Fichier : ' . $data_doc['FICHIER'] : 'Fichier';
 	  $fichier_old = ($data_doc['FICHIER']) ? $data_doc['FICHIER'] : '';
 	  $ex = 'update&amp;ID_DOC='.$data_doc['ID_DOC'];
  	}
  	else
  	{
  	  $titre = '';
  	  $auteur = '';
  	  $fichier = 'Fichier';
  	  $fichier_old = '';
 	  $ex = 'insert';
  	}
  	
  	echo <<<HERE
<form action="../Php/index.php?EX=$ex" method="post" enctype="multipart/form-data">
 <fieldset>
  <legend>Formulaire</legend>
  <p>
   <label for="titre">Titre</label>
   <input id="titre" name="TITRE" value="$titre" size="15" maxlength="50" />
  </p>
  <p>
   <label for="auteur">Auteur</label>
   <input id="auteur" name="AUTEUR" value="$auteur" size="15" maxlength="50" />
  </p>
  <p>
   <label for="themes">Thèmes</label>
   <select id="themes" name="ID_THEME[]" multiple="multiple">
    $options
   </select>
  </p>
  <p class="fichier">
   <label for="fichier">$fichier</label><br />
   <input type="hidden" name="FICHIER_OLD" value="$fichier_old" />
   <input id="fichier" type="file" name="FICHIER" value="" size="15" maxlength="40" />
  </p>
  <p class="submit">
   <input type="submit" value="Ok" />
  </p>
 </fieldset>
</form>
$delete
HERE;
  	
  	return;

  } // formDocument($_data)
  	
} // VDocuments
?>
