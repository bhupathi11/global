<?php
require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/PHPMailerAutoload.php');
require_once('phpmailer/class.smtp.php');

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'localhost';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'info@globalb2bservices.com';
$mail->Password = 'siva12345';


$mail->setFrom('info@globalb2bservices.com', 'Support');
$mail->addReplyTo('info@globalb2bservices.com', 'Support');
$mail->addAddress('info@globalb2bservices.com', ''. $_POST['home_name']);

$mail->isHTML(true);
$mail->Subject = 'Enquiry from ' . $_POST['home_name'];

$mail->Body = '
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>GlobalB2BServices</title>
  </head>
  <body>
    <section>
      <div class="container">
        <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Name: '. $_POST['home_name'] .'</li>
          <li class="list-group-item">Email: '. $_POST['home_email'] .'</li>
          <li class="list-group-item">Contact: '. $_POST['home_phone'] .'</li>
          <li class="list-group-item">Company: '. $_POST['home_company'] .'</li>
          <li class="list-group-item">Message: '. $_POST['home_message'] .'</li>
        </ul>
      </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>
';

if (!$mail->Send()) {
    echo "Mailer Error: Failed";
}
else {
    echo "Message has been sent";
         $to = ''.$_POST['home_email'];
         $subject = 'Globalb2bservices Support Team';
         
         $message = '<p>Below details are came from the website.</p>';
         $message .= 'Thanks for cantacting us. We will reach soon';
         
         $header = 'From:'. $_POST['home_email'].'\r\n';
        //  $header .= "Cc:saisiva.kumar229@gmail.com \r\n";
        //  $header .= "Cc:bhupathi1193@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            die(header("Location: index.html"));
            echo "Message sent successfully...";
         }else {
           echo "Message could not be sent...";
         }
    die(header("Location: index.html"));

}