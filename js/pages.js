/**
 * Fichier Javascript de l'application
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXERCICE-MOOC
 */

/**
 * Modifie le contenu de l'élément <div id="content">
 * 
 */
function pages()
{
  // this.id (valeur de l'attribut id de l'élément déclenchant)
  // contient l'identifiant de la page
  // et déclenche la fonction callback initPages
  changeContent('content', '../Php/index.php', 'EX=page&ID_PAGE=' + this.id, 'initPages()');
  
  return;
  
} // pages()

/** 
 * Initialise un écouteur sur l'élément <h1>
 *  
 * @return none
 */ 
function initPages()
{
  //Récupère l'élément <h1>
  var click_h1 = document.querySelector('h1');
  //Pour l'élément <h1>
  //on associe un événement click
  //avec comme fonction associée textInput
  Listener(click_h1, 'click', textInput);
  
  //Récupère les éléments <h2>
  var click_h2 = document.querySelectorAll('h2');
  // Nombre d'éléments <h2>
  var nb_click_h2 = click_h2.length;
  // Boucle sur les éléments <h2>
  for (var i = 0; i < nb_click_h2; ++i)
  {
	//Pour l'élément <h2>
	//on associe un événement click
	//avec comme fonction associée textInput
	Listener(click_h2[i], 'click', textInput);
  }
  
  //Récupère les éléments <p>
  var click_p = document.querySelectorAll('p');
  // Nombre d'éléments <p>
  var nb_click_p = click_p.length;
  // Boucle sur les éléments <p>
  for (var i = 0; i < nb_click_p; ++i)
  {
	//Pour l'élément <p>
	//on associe un événement click
	//avec comme fonction associée textTextarea
	Listener(click_p[i], 'click', textTextarea);
  }
 
  return;
  
} // initPages()

/** 
 * Remplace le contenu texte par élément input
 * dont l'attribut value contient le texte
 *  
 * @return none
 */ 
function textInput()
{  
  // Supprime l'écouteur sur l'élément cliqué
  Remove(this, 'click', textInput);
  
  // Récupère le texte de l'élément cliqué
  var text = this.innerHTML;
 
  // Récupère la largeur approximative du texte
  var width_text = text.length*10 + 'px';
  
  // Crée un élément <input>
  var input = document.createElement('input');
  
  // Met le contenu de l'attribut value 
  // avec le texte de l'élément cliqué
  input.value = text;  
  
  // Modifie la largeur de l'élément <input>
  // suivant celle du texte
  input.style.width = width_text;
 
  // Vide le contenu de l'élément cliqué
  this.innerHTML = '';
  
  // Ajoute à l'élément cliqué
  // l'élément <input>
  this.appendChild(input);
  
  // Met le focus dans l'élément <input>
  input.focus();
  
  // Pour l'élément <input>
  // on associe un événement blur
  // avec comme fonction associée changeText
  Listener(input, 'blur', changeText);

  return;
	
} // textInput()

/** 
 * Remplace le contenu texte par l'élément textarea
 * dont le contenu contient le texte
 *  
 * @return none
 */ 
function textTextarea()
{  
  // Supprime l'écouteur sur l'élément cliqué
  Remove(this, 'click', textTextarea);
  
  // Récupère le texte de l'élément cliqué
  var text = this.innerHTML;
 
  // Récupère la largeur approximative du texte
  var width_text = document.getElementById('content').offsetWidth + 'px';
  
  // Crée un élément <textarea>
  var textarea = document.createElement('textarea');
  
  // Remplace le contenu de l'élément <textarea> 
  // avec le texte de l'élément cliqué
  textarea.innerHTML = text;  
  
  // Modifie la largeur de l'élément <textarea>
  // suivant celle du texte
  textarea.style.width = width_text;
 
  // Vide le contenu de l'élément cliqué
  this.innerHTML = '';
  
  // Ajoute à l'élément cliqué
  // l'élément <textarea>
  this.appendChild(textarea);
  
  // Met le focus dans l'élément <input>
  textarea.focus();
 
  // Pour l'élément <textarea>
  // on associe un événement blur
  // avec comme fonction associée changeText
  Listener(textarea, 'blur', changeText);

  return;
	
} // textTextarea()

/** 
 * Remplace l'élément input
 * par le texte contenu dans le membre TEXT
 * de l'objet renvoyé par la fonction actionParam
 *  
 * @return none
 */ 
function changeText()
{
  // Récupère la value de l'élément <input>
  var text = this.value;
  
  // Récupère la valeur de l'id de l'élément <h1>
  // et extrait l'identifiant de la page
  var id_page = document.querySelector('h1').id.substr(3);
  
  // Récupère le parent de l'input
  var parent = this.parentNode;
  
  // Récupère le tagname du parent 
  var tagname = parent.tagName;

  switch (tagname)
  {
    case 'H1' : // Instancie les paramètres
	            var param = 'EX=change&TAG=H1&ID_PAGE=' + id_page + '&TITRE=' + encodeURIComponent(text);
	            break;
    case 'H2' : // Récupère l'identifiant de <h2>
    	        // et extrait l'identifiant du sous-titre
    	        var id_sous_titre = parent.id.substr(3);
    	        // Instancie les paramètres
                var param = 'EX=change&TAG=H2&ID_PAGE=' + id_page + '&ID_SOUS_TITRE=' + id_sous_titre + '&SOUS_TITRE=' + encodeURIComponent(text);
                break;
    case 'P'  : // Récupère l'identifiant de <p>
                // et extrait l'identifiant du paragraphe
                var id_paragraphe = parent.id.substr(2);
                // Instancie les paramètres
                var param = 'EX=change&TAG=P&ID_PAGE=' + id_page + '&ID_PARAGRAPHE=' + id_paragraphe + '&PARAGRAPHE=' + encodeURIComponent(text);
                break;
  }

  // Instancie objet renvoyé par la fonction actionParam
  var rep = actionParam('../Php/index.php', param);

  // Modifie le contenu de l'élément <h1> 
  // avec le membre TEXT de l'objet renvoyé par la fonction actionParam
  parent.innerHTML = rep.TEXT;

  //Teste si id contient la deuxième expression régulière 
  // Si c'est le cas c'est un élément <p>
  // Sinon c'est un élément <h1> ou <h2>
  if ('P' == tagname)
  {
    // Pour l'élément <p>
    // on associe un événement click
    // avec comme fonction associée textTextarea
    Listener(parent, 'click', textTextarea);
  }
  else
  {
	// Pour l'élément <h1> ou <h2>
	// on associe un événement click
	// avec comme fonction associée textInput
	Listener(parent, 'click', textInput);
  }
  
  return;
  
} // changeText()