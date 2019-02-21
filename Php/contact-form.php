<?php

    $name = $_POST['nom'];
    $visitor_email = $_POST['email'];
    $message = $_POST['message'];
    $email_from = 'catclinic';
    $email_subject = "contact form catclinic";
    $email_body = "user name: $name.\n".
                  "user email: $visitor_email.\n".
                  "user message: $message.\n";
    $to = "mido.zan@gmail.com";
    $headers = "from: $email_from \r\n";
    $headers .= "reply to: $visitor_email \r\n";
    mail($to,$email_subject,$email_body,$headers);

    if(mail($to,$email_subject,$email_body,$headers)){

$_SESSION['message'] = "Votre émail a bien été envoye";

unset($_POST);

}else{

$_SESSION['erreur'] = "Un problème est survenu lors de l'envoi de votre émail.";

}

    ?>