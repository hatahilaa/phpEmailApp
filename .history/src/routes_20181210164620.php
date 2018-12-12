<?php

use Slim\Http\Request;
use Slim\Http\Response;
require 'vendor/autoload.php'; // If you're using Composer (recommended)
require './config.php';
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
$email->setFrom("hatahila@gmail.com", "COMMUNAUTE DE L'EMMANUEL");
$email->setSubject("Invitation au reunion du comunaute Ingoro y'urukungo");
$email->addTo("h.hatangimbabazi@dmmhehe.com", "hatahila");
$email->addContent("text/plain", "Hello my frieng Programmer");
$email->addContent(
    "text/html", "<strong> Kominote ya Emmanuel yishimiye kubatumira mu mwiherero w'ingo uzabera Saint Fammille kuva ku wa gatanu mutarama kugera kuwa 10 2019<br/>
    Umwhiherero uzabera kuri paroisse y'umuryango mutagatifu. Nyagasani Yezu abane namwe!</strong>"
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


$app->post('/api/message/publish', function(Request $request, Response $response,$params){
    $options = array(
        'cluster' => CLUSTER,
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        KEY,
        SECRET,
        APP_ID,
        $options
      );
    
      $data['message'] = $request->message;
      return $pusher->trigger('my-channel', 'my-event', $data);
});

