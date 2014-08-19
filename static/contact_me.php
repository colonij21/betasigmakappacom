<?php

if($_POST) {
    $to_Email = "Colonij21@gmail.com"; //Replace with recipient email address
    $from_Email = "no-reply@betasigmakappa.com"; //From email address (eg: no-reply@YOUR-DOMAIN.com)
    $subject = 'YEAHH!! New message from a website user'; //Subject line for emails
    
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') { 
        //exit script outputting json data
        $output = json_encode(array('type'=>'error', 'text' => 'Request must come from Ajax'));
        die($output);
    }; 
    //check $_POST vars are set, exit if any missing
    if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userMessage"])) {
        $output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
        die($output);
    };
    //Sanitize input data using PHP filter_var().
    $user_Name        = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $user_Email       = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
    $user_Message     = filter_var($_POST["userMessage"], FILTER_SANITIZE_STRING);
    
    $mail_body 		  = $user_Message;
    $mail_body 		 .= "\r\n\r\nSender Name: ".$user_Name; //sender name
    $mail_body 		 .="\r\nSender Email: ".$user_Email; //sender email
    $mail_body 		 .="\r\n\r\n";
    
    //additional php validation
    // If length is less than 4 it will throw an HTTP error.
    if(strlen($user_Name)<4) {
        $output = json_encode(array('type'=>'error', 'text' => 'Name is too short or empty!'));
        die($output);
    }
	// check if email is valid
    if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) {
        $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
           die($output);
    } 
    //check emtpy message
    if(strlen($user_Message)<5) {
        $output = json_encode(array('type'=>'error', 'text' => 'Too short message! Please enter something.'));
        die($output);
    }
    
    
    //Mail headers for plain text mail
    $headers = 'From: '.$from_Email.'' . "\r\n" .
        'Reply-To: '.$user_Email.'' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    //send the mail
    $sentMail = @mail($to_Email, $subject, $mail_body, $headers);
    
    if(!$sentMail) //output success or failure messages
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        die($output);
    } else {
        $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_Name .' Thank you for your email'));
        die($output);
    }
}

?>