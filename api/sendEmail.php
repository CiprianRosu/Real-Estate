<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
function sendEmail($activationKey,$email,$id){

	$sActivationKey=$activationKey;
	$sUserId = $id;

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function


	// Load Composer's autoloader
	require 'sendEmail/PHPMailer.php';
	require 'sendEmail/Exception.php';
	require 'sendEmail/SMTP.php';

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
	    $mail->isSMTP();                                            // Set mailer to use SMTP
	    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'keastuff2@gmail.com';                     // SMTP username
	    $mail->Password   = 'keastuff2019';                               // SMTP password
	    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
	    $mail->Port       = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('keastuff2@gmail.com', 'KEA VERIFY TEST');
	    $mail->addAddress($email, 'KEA KEA');     // Add a recipient

	    // $mail->addAddress('ellen@example.com');               // Name is optional
	    // $mail->addReplyTo('dummy@gmail.com', 'Information');
	    // $mail->addCC('cc@example.com');
	    // $mail->addBCC('bcc@example.com');

	    // Attachments
	    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    // Content
	    $mail->isHTML(true);
	                                      // Set email format to HTML
	    $sPath = "http://localhost/KEA/api/activateAccount.php?id=$sUserId&key=$sActivationKey";
	    $mail->Subject = 'Welcome - Verify your account';
	    $mail->Body    = 'Welcome, 
	    <a href="'.$sPath.'">
	      click here to verify your account
	    </a>
	    ';
	    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send(); // Send the email
	    echo 'Message has been sent';
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}