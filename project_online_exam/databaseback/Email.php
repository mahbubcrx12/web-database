<?php 

include_once ('class.phpmailer.php');
class Send_Email{


    public function send_Email($sender,$purpose,$senderPassword,$recipient,$subject,$bodyContent){

                echo $sender.$bodyContent.$recipient;
                $mail   =   new PHPMailer;
                        define('GUSER', $sender);
                        define('GPWD', $senderPassword);
                        echo GUSER;
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

                $mail->setFrom($sender, $purpose);
                //$mail->addReplyTo('info@example.com', 'testing');
                $mail->addAddress($recipient);   // Add a recipient


                $mail->isHTML(true);  

                

                $mail->Subject = $subject;
                $mail->Body    = $bodyContent;

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent';
                }
    }
}

 ?>