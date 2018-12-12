<?php

use Slim\Http\Request;
use Slim\Http\Response;
require 'vendor/autoload.php'; // If you're using Composer (recommended)
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
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("h.hatangimbabazi@dmmhehe.com", "hatahila");
$email->addContent("text/plain", "Hello my frieng Programmer");
$email->addContent(
    "text/html", "<strong>This is a texting e_mail</strong>"
);
    $sendgrid = new \SendGrid(getenv("fL5NRi8DRDOymX657kUMQA.XEUnCpQTl0QGesbrHkeXGqS2HVMKWOOpEBOQqpQh7uw"));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
});
