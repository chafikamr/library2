<?php
require 'config.php';
$page = 'contact';
require 'PHPMailerAutoload.php';
require 'cridential.php';
require 'header.php';
if (isset($_POST['submit'])){



session_start();
$_SESSION["emailsender"] = null;

$mail = new PHPMailer;

$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = mm_mail;                 // SMTP username
$mail->Password = pp_pass;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($_POST['mail'], 'Mailer');
$mail->addAddress('hhh@gmail.com', 'Joe User');     // Add a recipient
              // Name is optional
$mail->addReplyTo(mm_mail, 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// Content
    $mail->isHTML(true);                                  // Set email format to HTML
    // $mail->Subject = $_POST['mail'];
    $mail->Body    = $_POST['msg'];
    $mail->AltBody = $_POST['name'];

    if($mail->send()==true){ 

echo '
  <div class="container ">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> your message has been asent successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  </div>
    ';




    }else{echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";}
    



// $to      = 'chafikmar1999@gmail.com';
// $subject = 'the subject';
// $message = 'hello';
// $headers = 'From: webmaster@example.com' . "\r\n" .
//     'Reply-To: webmaster@example.com' . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

// mail($to, $subject, $message, $headers);




}



?> 














<form action="" method="POST" style=" width: 300px;
  box-sizing : border-box; margin: auto;margin-top: 100px;">
  <label style="  display:block;
  margin-bottom: 6px;">
    name
  </label>
  <input type="text" name="name" style="  display:block;
  margin-bottom: 6px;padding: 5px;
  width:100%;
  outline:none;
  border: none;
  background-color:#f4F4F4;
  resize:none;" >
  <label style="  display:block;
  margin-bottom: 6px;">
    Email
  </label>
  <input type="text" name="mail" style="  display:block;
  margin-bottom: 6px;padding: 5px;
  width:100%;
  outline:none;
  border: none;
  background-color:#f4F4F4;
  resize:none;" >
  <label style="  display:block;
  margin-bottom: 6px;padding: 5px;
;">
    Message
  </label>
  <textarea style=" display:block;
  margin-bottom: 6px;padding: 5px;
  width:100%;
  outline:none;
  border: none;
  background-color:#f4F4F4;
  resize:none; height:40px" name="msg"></textarea>
  <input type="submit" name="submit" style="  display:inline-block;
  float: right ;
  border: none;
  outline : none;
  color:white;
  background-color: #6001FF;
  padding:5px 10px;
  ">
  
</form>