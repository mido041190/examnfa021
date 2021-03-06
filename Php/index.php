

<?php

 
// Inclusion des constantes et des fonctions de l'application
// en particulier l'Autoload
require('../Inc/require.inc.php');

// Crée une session nommée
session_name('EXAMEN');
session_start();

// variable de contrôle
$EX = isset($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home';

// Contrôleur
switch($EX)
{
  case 'home'         : home();         break;
  case 'conseils'     : conseils();     break;
  case 'specialites'  : specialites();  break;
  case 'equipe'       : equipe();       break;
  case 'contact'      : contact();      break;
  case 'page'         : page();         exit;
  case 'change'       : change();       exit;
  case 'connexionged' : connexionged(); break;
  case 'admin_themes' : admin_themes(); break;
  case 'form_theme'   : form_theme();   break;
  case 'insert_theme' : insert_theme(); break;
  case 'update_theme' : update_theme(); break;
  case 'delete_theme' : delete_theme(); break;
  case 'form_fond'    : form_fond();    break;
  case 'upload_fond'  : upload_fond();  break;
  case 'document'     : document();     break;
  case 'pdf'          : pdf();          break;
  case 'admin'        : admin();        break;
  case 'deconnect'    : deconnect();    break;
  case 'form'         : form();         break;
  case 'insert'       : insert();       break;
  case 'update'       : update();       break;
  case 'delete'       : delete();       break;
  
}

// Mise en page
require('../View/layout.view.php');

/**
 * Affichage de la page d'accueil
 *
 * @return none
 */
function home()
{
  global $content;
	
  $content['title'] = 'Accueil';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';
  $content['arg'] = '../Html/home.html';
  
  return;

} // home()
/**
 * Affichage de la page conseils
 * @return none
 */
function conseils()
{
  global $content;
  
  $content['title'] = 'Conseils';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';
  $content['arg'] = '../Html/conseils.php';
  
  return;


} // home()

/**
 * Affichage de la page spécialités
 * @return none
 */
function specialites()
{
  global $content;
  
  $content['title'] = 'Specialites';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';
  $content['arg'] = '../Html/specialites.html';
  
  return;

} // home()

/**
 * Affichage de la page equipe
 * @return none
 */
function equipe()
{
  global $content;
  
  $content['title'] = 'Equipe';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';
  $content['arg'] = '../Html/equipe.html';
  
  return;

} // home()

/**
 * Affichage de la page equipe
 * @return none
 */
function contact()
{
  global $content;
  
  $content['title'] = 'Contact';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';
  $content['arg'] = '../Html/contact.html';
  
  return;

} // home()

/**
 *  Affichage des pages
 *  
 *  @return none
 */
function page()
{
  // Aiguille suivant le numéro de page
  switch($_POST['ID_PAGE'])
  {
    case 1 : $html = '../Upload/alamaison.html';
             break;
    case 2 : $html = '../Upload/comportement.html';
             break;
    case 3 : $html = '../Upload/conseils.html';
             break;
    case 4 : $html = '../Upload/griffoir.html';
             break;
    case 5 : $html = '../Upload/maladies.html';
             break;
    case 6 : $html = '../Upload/medicaments.html';
             break;   
  }
  
  // Affiche la page
  $vhtml = new VHtml();
  $vhtml->showHtml($html);
  
  return;
  
} // page()

/**
 * Modification du texte dans la page
 * 
 * @return none
 */
function change()
{
  // Aiguille suivant le numéro de page
  switch($_POST['ID_PAGE'])
  {
    case 1 : $html = '../Upload/alamaison.html';
             break;
    case 2 : $html = '../Upload/comportement.html';
             break;
    case 3 : $html = '../Upload/conseils.html';
             break;
    case 4 : $html = '../Upload/griffoir.html';
             break;
    case 5 : $html = '../Upload/maladies.html';
             break;
    case 6 : $html = '../Upload/medicaments.html';
             break;        
  }
  
  // Appelle la classe MPages avec le fichier
  $mpages = new MPages($html);
  // Instancie le membre $value avec les valeurs des paramètres
  $mpages->SetValue($_POST);
  
  // Aiguillage suivant le tag
  switch ($_POST['TAG'])
  {
    case 'H1' : // Modifie le titre dans le fichier
              $mpages->UpdateTitre();
              // Récupère le texte modifié
              $value['TEXT'] = $_POST['TITRE'];
              break;
    case 'H2' : // Modifie le titre dans le fichier
              $mpages->UpdateSousTitre();
              // Récupère le texte modifié
              $value['TEXT'] = $_POST['SOUS_TITRE'];
              break;
    case 'P'  : // Modifie le titre dans le fichier
                $mpages->UpdateParagraphe();
                // Récupère le texte modifié
                $value['TEXT'] = $_POST['PARAGRAPHE'];
                break;
  }
     
  // Retourne le texte modifié 
  echo json_encode($value);
  
  return;
  
} // change()

/**
 * Affichage de la page connexionged
 * @return none
 */
function connexionged()
{
  global $content;
  
  $content['title'] = 'Espace membre';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';
  $content['arg'] = '../Html/connexionged.php';
  
  return;

} // home()

/**
 * Affichage de la page d'accueil 
 * en mode administration des thèmes
 *
 * @return none
 */
function admin_themes()
{
  unset($_SESSION['ADMIN_DOC']);
  
  $_SESSION['ADMIN_THEMES'] = true;

  home();

  return;

} // admin_themes()

/**
 * Formulaire des thèmes
 *
 * @return none
 */
function form_theme()
{
  $data = isset($_GET['ID_THEME']) ? $_GET : '';
	
  global $content;

  $content['title'] = 'Nouveau Thème';
  $content['class'] = 'VMenu';
  $content['method'] = 'formTheme';
  $content['arg'] = $data;

  return;

} // form_theme()

/**
 * Insertion d'un thème
 *
 * @return none
 */
function insert_theme()
{
  $mcontacts = new MThemes();
  $mcontacts->SetValue($_POST);
  $mcontacts->Insert();

  home();

  return;

} // insert_theme()

/**
 * Mise à jour d'un thème
 *
 * @return none
 */
function update_theme()
{
	$mcontacts = new MThemes($_GET['ID_THEME']);
	$mcontacts->SetValue($_POST);
	$mcontacts->Update();

	home();

	return;

} // update_theme()

/**
 * Suppression d'un thème
 *
 * @return none
 */
function delete_theme()
{
	$mcontacts = new MThemes($_GET['ID_THEME']);
	$mcontacts->Delete();

	home();

	return;

} // delete_theme()

/**
 * Formulaire pour l'image de fond
 *
 * @return none
 */
function form_fond()
{
	global $content;

	$content['title'] = 'Nouveau Fond';
	$content['class'] = 'VMenu';
	$content['method'] = 'formFond';
	$content['arg'] = '';

	return;

} // form_fond()

/**
 * Upload de l'image de fond
 *
 * @return none
 */
function upload_fond()
{
  if ($_FILES['FOND']['type'] != 'image/png')
  {
    global $content;
	
	$content['title'] = 'Fichier interdit';
	$content['class'] = 'VHtml';
	$content['method'] = 'showHtml';
	$content['arg'] = '../Html/forbidden.html';
	
	return;
  }
	
  move_uploaded_file($_FILES['FOND']['tmp_name'], IMG . 'fond.png');

  home();
  
  return;

} // upload_fond()

/**
 * Affichage de la liste de documents par thème
 * @param int identifiant du thème
 *
 * @return none
 */
function document($id_theme = null)
{
	$_SESSION['ID_THEME'] = isset($_GET['ID_THEME']) ? $_GET['ID_THEME'] : $id_theme;
	$_SESSION['THEME'] = isset($_GET['THEME']) ? $_GET['THEME'] : $_SESSION['THEME'];

	$value['ID_THEME'] = $_SESSION['ID_THEME'];
	$mdocuments = new MDocuments();
	$mdocuments->SetValue($value);
	$data = $mdocuments->SelectAll();

	global $content;

	$content['title'] = 'Liste des documents';
	$content['class'] = 'VDocuments';
	$content['method'] = 'showDocuments';
	$content['arg'] = $data;

	return;

} // document()

/**
 * Récupération du fichier pdf
 *
 * @return none
 */
function pdf()
{
  $file = '../Upload/' . $_GET['FICHIER'];
  
  
  if (file_exists($file)) 
  {
    $document = file_get_contents($file);
    echo $document;
        
    exit;
  }

 
  else
  {
    global $content;
    
    $content['title'] = 'Fichier inconnu';
    $content['class'] = 'VHtml';
    $content['method'] = 'showHtml';
    $content['arg'] = '../Html/unknown.html';
  }	  
	
  return;

} // pdf()

/**
 * Affichage de la page d'accueil 
 * en mode administration des documents
 *
 * @return none
 */
function admin()
{
 
  unset($_SESSION['ADMIN_THEMES']);
  
  $_SESSION['ADMIN_DOC'] = true; 
  
  home();

  return;

} // admin()

/**
 * Déconnexion
 *
 * @return none
 */
function deconnect()
{
  session_unset();

  home();

  return;

} // deconnect()

/**
 * Affichage du formulaire document
 *
 * @return none
 */
function form()
{
  if (isset($_GET['ID_DOC']))
  {
    $mdocuments = new MDocuments($_GET['ID_DOC']);
    $data['DOCUMENTS'] = $mdocuments->Select();
    
    $data['THEMES'] = $mdocuments->SelectThemesDocuments();
  }
  else
  {
  	$data['THEMES'][0]['ID_THEME'] = $_SESSION['ID_THEME'];
  }
  
  global $content;
	
  $content['title'] = 'Nouveau document';
  $content['class'] = 'VDocuments';
  $content['method'] = 'formDocument';
  $content['arg'] = $data;
  
  return;

} // form()

/**
 * Insertion d'un document
 *
 * @return none
 */
function insert()
{
  if ($_FILES['FICHIER']['name'])
  {
  	$file_new = upload($_FILES['FICHIER']);
  	
  	move_file($file_new);
   	
   	$value['FICHIER'] = $file_new;
  }
  else
  {
  	$value['FICHIER'] = '';
  }
  
  $value['TITRE'] = $_POST['TITRE'];
  
  	 
  $mdocuments = new MDocuments();
  $mdocuments->SetValue($value);
  $id_doc = $mdocuments->Insert();
  
  $val['ID_DOC'] = $id_doc;
  
  foreach ($_POST['ID_THEME'] as $v)
  {
  	$val['ID_THEME'] = $v;  	 
    
    $mdocuments->SetValue($val);
    $mdocuments->InsertThemesDocuments();
  }
  
  document($_SESSION['ID_THEME']);

  return;

} // insert()

/**
 * Mise à jour d'un document
 *
 * @return none
 */
function update()
{
  if ($_FILES['FICHIER']['name'])
  {
  	$file_new = upload($_FILES['FICHIER']);
  	
  	move_file($file_new);
   	
   	$value['FICHIER'] = $file_new;
  }
  else
  {
  	$value['FICHIER'] = '';
  }

  if ($_POST['FICHIER_OLD']) unlink(UPLOAD . $_POST['FICHIER_OLD']);

  $value['TITRE'] = $_POST['TITRE'];
  
  
  $mdocuments = new MDocuments($_GET['ID_DOC']);
  $mdocuments->SetValue($value);
  $mdocuments->Update();
  $mdocuments->DeleteThemesDocuments();
  
  foreach ($_POST['ID_THEME'] as $v)
  {
  	$val['ID_THEME'] = $v;
  
  	$mdocuments->SetValue($val);
  	$mdocuments->InsertThemesDocuments();
  }
  
  document($_SESSION['ID_THEME']);
  
  return;

} // update()

/**
 * Upload d'un fichier pdf
 * @param string fichier à télécharger
 *
 * @return none
 */
function move_file($file)
{
  if ($_FILES['FICHIER']['type'] != 'application/pdf')
  {
    global $content;
	
	$content['title'] = 'Fichier interdit';
	$content['class'] = 'VHtml';
	$content['method'] = 'showHtml';
	$content['arg'] = '../Html/forbidden.html';
	
	return;
  }
	
  move_uploaded_file($_FILES['FICHIER']['tmp_name'], UPLOAD . $file);
  
  return;
	
} // move_file()

/**
 * Suppression d'un document
 *
 * @return none
 */
function delete()
{
  $mdocuments = new MDocuments($_GET['ID_DOC']);
  $mdocuments->Delete();
  $mdocuments->DeleteThemesDocuments();
  echo "<!--";
  if ($_GET['FICHIER_OLD']) unlink(UPLOAD . $_GET['FICHIER_OLD']);
  
  document($_SESSION['ID_THEME']);
  echo "-->";
  return;

} // delete()



?>