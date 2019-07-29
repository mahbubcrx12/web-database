<!DOCTYPE html>
<html>
<body>
<?php 
	include_once ('/classes/class.phpmailer.php');
	
$mail   =   new PHPMailer;
        define('GUSER', 'jasimpopi03032017@gmail.com');
        define('GPWD', 'quitlove');
        
     
         
   
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->isSMTP();                            
$mail->Host = 'smtp.gmail.com';             
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;                     
$mail->Username = GUSER;          
$mail->Password = GPWD; 
$mail->SMTPSecure = 'tls';                  
$mail->Port = 587;                          

$mail->setFrom('azadmahin9@gmail.com', 'testing');
//$mail->addReplyTo('info@example.com', 'testing');
$mail->addAddress('raju311286@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  

$bodyContent = '<h1>How to Send Email using PHP in Localhost by testing</h1>';
$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>testing</b></p>';

$mail->Subject = 'Email from Localhost by testing';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>



<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>