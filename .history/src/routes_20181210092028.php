<?php

use Slim\Http\Request;
use Slim\Http\Response;
require 'vendor/autoload.php'; // If you're using Composer (recommended)
require '../config.php';
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases


// Routes

$app->post('/api/email/send', function(Request $request, Response $response,$params){
    $email = new \SendGrid\Mail\Mail(); 
$email->setFrom("hatahila@gmail.com", "hatahila");
$email->setSubject("Invitation au reunion du comunaute Ingoro y'urukungo");
$email->addTo("h.hatangimbabazi@dmmhehe.com", "hatahila");
$email->addContent("text/plain", "Hello my frieng Programmer");
$email->addContent(
    "text/html", "<stron>This is e_mail example, use it as you want and enjoy it! Thank you sendGrind to develop such amazing e_mail!</strong>"
);
$sendgrid = new \SendGrid(HILAIRE_SENDGRID_API_KEY);
try {

    $response = $sendgrid->send($email);
    // print $response->statusCode() . "\n";
    // print_r($response->headers());
    // print $response->body() . "\n";
   // print_r( $sendgrid);
  print_r( $response);
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
});
