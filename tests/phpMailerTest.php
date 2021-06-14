<?php

require "src/autoload.php";

use PHPUnit\Framework\TestCase;
use App\controllers\FrontController;
use App\controllers\ProjectController;
use App\model\orm\SuperOrm;
use App\model\database\table\handlers\RowHandler;
use App\model\entities\Repository;
use App\model\entities\Entity;

require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




class phpMailerTest extends TestCase
{
 
    /**
     * @test
     */

     public function canIsendMail()
     {

        $phpMailer = new PHPMailer();

        $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'middleweightsoul@gmail.com';                     //SMTP username
    $mail->Password   = 'hackinglife94';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('middleweightsoul@gmail.com', 'Mailer');
    $mail->addAddress('michael.mangajocky@gmail.com', 'Joe User');     //Add a recipient
    $mail->addAddress('micki-style@hotmail.fr');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
    echo 'Message has been sent';

   } catch (Exception $e) {

    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

  }


  }


}
