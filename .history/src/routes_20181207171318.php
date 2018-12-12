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
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("hatahila@yahoo.fr", "hatahila");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("h.hatangimbabazi@dmmhehe.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);


// Routes

// $app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });
$app->get('/api/email/send', function(Request $request, Response $response,$params){
    $sendgrid = new \SendGrid(getenv('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'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
});
