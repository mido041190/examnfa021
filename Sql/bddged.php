<?php
echo '<!--';//On demarre les sessions
session_start();
echo '-->';

/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/

//On se connecte a la base de donnee
// mysql_connect('mysql:host=localhost;dbname=espace_membres', 'root', '');
// mysql_select_db('users');


$link = mysqli_connect('localhost', 'root', '', 'coefcash');

if (!$link) {
    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

//echo 'Succès... ' . mysqli_get_host_info($link) . "\n";

mysqli_close($link);


//Email du webmaster
$mail_webmaster = 'example@example.com';

//Adresse du dossier de la top site
$url_root = 'http://www.example.com/';

/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Nom du fichier de laccueil
$url_home = 'index.php';

//Nom du design
$design = 'default';
?>