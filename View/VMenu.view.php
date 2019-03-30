<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="../Css/app.css">
<link rel="stylesheet" href="../Css/menu.css">
</head>

<?php

class VMenu
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
   * Affichage du menu
   *
   * @return none
   */
  public function showMenu()
  {
  	$class = isset($_SESSION['ADMIN_DOC']) ? 'class="admin"' : '';
  	$class = isset($_SESSION['ADMIN_THEMES']) ? 'class="admin_themes"' : $class;
  	 
   	$mthemes = new MThemes();
  	$data = $mthemes->SelectAll();

  	$li = '';
    $lie = '';
    $lii = '';
    $lio = '';
  	foreach ($data as $val)
  	{
      if (isset($_SESSION['ADMIN_THEMES']))
  	  {
  	    $href = '../Php/index.php?EX=form_theme&amp;ID_THEME='.$val['ID_THEME'].'&amp;THEME='.$val['THEME'];
  	  }
  	  else
  	  {
  	    $href = '../Php/index.php?EX=document&amp;ID_THEME='.$val['ID_THEME'].'&amp;THEME='.$val['THEME'];
  	  }
  	  
  	  $li .= '<li><a '.$class.' href="'.$href.'">'.$val['THEME'].'</a></li>';
      $lii = '<li><a href="../Php/index.php?EX=specialites">Spécialités</a></li>';
      $lio = '<li><a href="../Php/index.php?EX=equipe">Equipe</a></li>';
      $liu = '<li><a href="../Php/index.php?EX=connexionged">Membres</a></li>';
  	}

  	if (isset($_SESSION['ADMIN_DOC']) || isset($_SESSION['ADMIN_THEMES']))
  	{
  	  $li .= '<li><a '.$class.' href="../Php/index.php?EX=deconnect">DECONNEXION</a></li>';
      $lie = '<li><a href="../Php/index.php?EX=conseils">ModifFiches</a></li>';
  	}
  	 
     
    

  	/*$nouveau = isset($_SESSION['ADMIN_THEMES']) ? '<p class="nouveau"><a href="../Php/index.php?EX=form_theme"><button>NOUVEAU THEME</button></a></p>' : '';	 
  	$nouveau_fond = isset($_SESSION['ADMIN_THEMES']) ? '<p class="nouveau"><a href="../Php/index.php?EX=form_fond"><button>NOUVEAU FOND</button></a></p>' : '';
    $lie = isset($_SESSION['ADMIN_THEMES']) ? '<li><a href="../Php/index.php?EX=conseils">Conseils</a></li>';
*/
    

  	 
  	echo <<<HERE
    <div class="top-bar">
<div class="top-bar-left">
<ul class="menu">
<li class="menu-text"><a href="../Php/index.php"><img class="fitcat" src= "../Img/logocatclinicweb3.png" ></a></li>
</ul>
</div>
<div class="top-bar-right">
<ul class="menu">
$li
$lie
$lii
$lio     
$liu
 
</ul>
</div>
</div>
  
HERE;
  	 
  	return;
			  		  		
  } // showMenu ()


  /**
   * Affichage du formulaire des thèmes
   * @param array données du formulaire
   *
   * @return none
   */
  public function formTheme($_data)
  { 	 
    if ($_data)
    {
  	  $ex = 'update_theme&ID_THEME='.$_data['ID_THEME'];
      $theme = $_data['THEME'];
 	  $delete = '<p class="delete"><a href="../Php/index.php?EX=delete_theme&amp;ID_THEME='.$_data['ID_THEME'].'"><button>Supprimer</button></a></p>';
    }
    else
    {
  	  $ex = 'insert_theme';
      $theme = '';
 	  $delete = '';
    }
    
    echo <<<HERE
<form action="../Php/index.php?EX=$ex" method="post">
 <fieldset>
  <legend>Formulaire</legend>
  <p>
   <label for="theme">Thème</label>
   <input id="theme" name="THEME" value="$theme" size="15" maxlength="50" />
  </p>
  <p class="submit">
   <input type="submit" value="Ok" />
  </p>
 </fieldset>
</form>
$delete
HERE;
  	 
  	return;
  
  } // formTheme($_data)


  /**
   * Affichage du formulaire de l'image de fond
   *
   * @return none
   */
  public function formFond()
  {
  	echo <<<HERE
<form action="../Php/index.php?EX=upload_fond" method="post" enctype="multipart/form-data">
 <fieldset>
  <legend>Formulaire</legend>
  <p id="p_fond">
   <label for="fond">Nouveau Fond</label>
  </p>
  <p id="p_input_fond">
   <input id="fond" type="file" name="FOND" />
  </p>
  <p class="submit">
   <input type="submit" value="Ok" />
  </p>
 </fieldset>
</form>
HERE;
  
  	return;
  
  } // formFond()
  
} // VMenu

?>
