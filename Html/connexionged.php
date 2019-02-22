<?php
include('../Sql/bddged.php');
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="../Css/app.css">
<link rel="stylesheet" href="../Css/contact.css">
</head>

<?php
//Si lutilisateur est connecte, on le deconnecte
if(isset($_SESSION['username']))
{
	//On le deconnecte en supprimant simplement les sessions username et userid
	unset($_SESSION['username'], $_SESSION['userid']);
?>

<div class="message">Vous avez bien été déconnecté.<br />
<li class="menu-text"><a class="button" href="../Php/index.php">CatClinic</a></li>

<?php

$link = mysqli_connect('localhost', 'root', '', 'coefcash');

}
else
{
	$ousername = '';
	//On verifie si le formulaire a ete envoye
	if(isset($_POST['username'], $_POST['password']))
	{
		//On echappe les variables pour pouvoir les mettre dans des requetes SQL
		if(get_magic_quotes_gpc())
		{
			$ousername = stripslashes($_POST['username']);
			$username = mysqli_real_escape_string($link, stripslashes($_POST['username']));
			$password = stripslashes($_POST['password']);
		}
		else
			$link = mysqli_connect('localhost', 'root', '', 'coefcash');
		{
			
			$username = mysqli_real_escape_string($link, $_POST['username']);
			$password = $_POST['password'];
		}
		//On recupere le mot de passe de lutilisateur
		$req = mysqli_query($link, 'SELECT password,id from users where username="'.$username.'"');

		$dn = mysqli_fetch_array($req, MYSQLI_BOTH);
		
		
		
		//On le compare a celui quil a entre et on verifie si le membre existe
		if($dn['password']==$password and mysqli_num_rows($req)>0)
		{
			//Si le mot de passe es bon, on ne vas pas afficher le formulaire
			$form = false;
			//On enregistre son pseudo dans la session username et son identifiant dans la session userid
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['userid'] = $dn['id'];
?>

<div class="message">Vous avez bien été connecté. Vous pouvez accéder à votre espace membre.<br />
<div  id="admin"><a class="button" href="../Php/index.php?EX=admin">Admin</a></div>

<?php
		}
		else
		{
			//Sinon, on indique que la combinaison nest pas bonne
			$form = true;
			$message = 'La combinaison que vous avez entrée n\'est pas bonne.';
		}
	}
	else
	{
		$form = true;
	}
	if($form)
	{
		//On affiche un message sil y a lieu
	if(isset($message))
	{
		echo '<div class="message">'.$message.'</div>';
	}
	//On affiche le formulaire
?>

<div class="membrecontent">
    <form class="callout text-center" action="../Html/connexionged.php" method="post">
        <h2>Veuillez entrer vos identifiants pour vous connecter:</h2>
        <div class="floated-label-wrapper">
            <label for="username">Nom d'utilisateur</label><input type="text" name="username" id="username" placeholder="Nom" value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>" />
        </div>
        <div class="floated-label-wrapper">
            <label for="password">Mot de passe</label><input type="password" name="password" id="password" placeholder="Password" />
            <input class="button expanded" type="submit" value="Connexion" />
		</div>
    </form>
</div>
<?php
	}
}
?>
	
	</body>
</html>