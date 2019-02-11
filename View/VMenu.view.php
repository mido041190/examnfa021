<?php
/**
 * Affichage du menu
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXAM-CNAM
 *
 */
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
  	}

  	if (isset($_SESSION['ADMIN_DOC']) || isset($_SESSION['ADMIN_THEMES']))
  	{
  	  $li .= '<li><a '.$class.' href="../Php/index.php?EX=deconnect">DECONNEXION</a></li>';
  	}
  	
  	$nouveau = isset($_SESSION['ADMIN_THEMES']) ? '<p class="nouveau"><a href="../Php/index.php?EX=form_theme"><button>NOUVEAU THEME</button></a></p>' : '';	 
  	$nouveau_fond = isset($_SESSION['ADMIN_THEMES']) ? '<p class="nouveau"><a href="../Php/index.php?EX=form_fond"><button>NOUVEAU FOND</button></a></p>' : '';
  	 
  	echo <<<HERE
    <div class="top-bar">  
  	<ol class="menu align-center">
  	 $li
  	</ol>
    <div  id="admin_themes"><a class="button" href="../Php/index.php?EX=admin_themes">Admin</a></div>
    </div>
  	
  	$nouveau
  	$nouveau_fond
  			
    
   
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
