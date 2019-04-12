


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
        $tr .= '<tr><td><a href="../Php/index.php?EX=pdf&amp;FICHIER='.$val['FICHIER'].'" target="_blank">'.$val['TITRE'].'</a></td>';
      }
      else
      {
      	// Concaténation avec l'ancre et le titre de la catégorie
      	$tr .= '<tr><td><a href="../Php/index.php?EX=form&amp;ID_DOC='.$val['ID_DOC'].'">'.$val['TITRE'].'</a></td>';
      }
    }
    
    $nouveau = isset($_SESSION['ADMIN_DOC']) ? '<div class="row column text-center">
    <p><a class="hollow button" href="../Php/index.php?EX=form"><button>NOUVEAU DOCUMENT</button></a></p>
    </div>' : '';   
           
    echo <<<HERE
    <div class="grid-x grid-padding-x align-center-middle text-center" >
    <div class="cell small-12 medium-4 large-4">
    <div class="tabfiches">
    <h2 class="theme">{$_SESSION['THEME']}</h2>
<table>
  <thead>
    <tr>
      
      
    </tr>
  </thead>
  
  <tbody>
<th width="200">Titre</th>
    $tr
  </tbody>
</table>
</div>
</div>
</div>

$nouveau
  		

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
  	  	
  	  $delete = $data_doc ? '<div class="row column text-center"><p class="hollow button"><a href="../Php/index.php?EX=delete&amp;ID_DOC='.$data_doc['ID_DOC'].'&amp;FICHIER_OLD='.$data_doc['FICHIER'].'"><button>Supprimer</button></a></p></div>' : '';
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
  <div class="titre1">Formulaire</div>
  <div class="formcontent">
  <p>
   <label class="form-control" for="titre">Titre</label>
   <input class="form-control" id="titre" name="TITRE" value="$titre" size="15" maxlength="50" />
  </p>
 
  <p>
   <label class="form-control" for="themes">Thèmes</label>
   <select class="form-control" id="themes" name="ID_THEME[]" multiple="multiple">
    $options
   </select>
  </p>

  <p class="fichier">
   <label class="form-control" for="fichier">$fichier</label>
   <input type="hidden" class="form-control" name="FICHIER_OLD" value="$fichier_old" />
   </p>
   <p>
   <input class="choisir" id="fichier" type="file" name="FICHIER" value="" size="15" maxlength="40" />
  </p>

  <p class="submit">
   <input class="form-submit" type="submit" value="Ok" />
  </p>

 </fieldset>
</form>
</div>
$delete

HERE;
  	
  	return;

  } // formDocument($_data)
  	
} // VDocuments
?>
