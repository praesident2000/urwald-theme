<?php

if(isset($_POST['submit_btn'])){
    $email      = $_POST['email'];
    $salutation = $_POST['salutation'];
    $firstname  = $_POST['firstname'];
    $lastname   = $_POST['lastname'];
    $url  = 'https://api.campaign.episerver.net/http/form/wT5fE1bkfvgwSG0Xa3dAZ0P7SiFBF1lF/subscribe';
    $url .= '?bmRecipientId=' . urlencode(utf8_decode($email));
    $url .= '&bmOptInId=' . '285288455464';
    $url .= '&salutation=' . utf8_decode($salutation);
    $url .= '&firstname=' . utf8_decode($firstname);
    $url .= '&lastname=' . utf8_decode($lastname);
    $url .= '&origin=UrwaldpfadeApp&info_nl=Ja&helping_nl=Ja&actions_nl=Ja&trackingoptin=Ja';
    $result = @file_get_contents($url);
    $message = "Sie haben sich für den Newsletter registriert.";

    // pass results to twig context
    $context['message'] = $message;
    $context['result'] = $result;
}