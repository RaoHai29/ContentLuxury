<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

extract($_POST);

$from = "alex@contentluxury.com";

$to = ["alex@contentluxury.com", "alexmillervp@gmail.com"];

$subject = "Order Email";
$message = "Hello, <br> We received an order. <br>";

$message .= "<br>Total number of posts: ".$num_of_posts;
$message .= "<br>Total words: ".$word_count;
$message .= "<br>Quality stast: ".$quality;
$message .= "<br>Published: ".$is_publishing;
$message .= "<br>Urgent: ".$is_urgent;
$message .= "<br>Subscribed: ".$is_subscribed;
$message .= "<br>Total cost: ".$total_cost;


// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/HTML; charset=iso-8859-1';
  
foreach($to as $mail) {

    // Additional headers
    $headers[] = 'To: Content Luxury <'.$mail.'>';
    $headers[] = 'From: Content Luxury <'.$from.'>';

    $mail = mail($mail, $subject, $message, implode("\r\n", $headers)); 
}



if($mail) {
    $response = json_encode([
        "status"    => true,
        "message"   => "Email sent successfully.",
    ]);
} else {
    $response = json_encode([
        "status"    => false,
        "message"   => "Something went wrong, please contact support.",
    ]);
}


print_r($response);
