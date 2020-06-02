<?php
function isGet()
{
    if ($_GET['id'] == '') {
        return false;
    }
    if (isset($_GET['id'])) {
        return true;
    } else {
        return false;
    }
}

function getId()
{
    if ($_GET['id'] == '') {
        return false;
    } else {
        return ($_GET['id']);
    }
}
function rim($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function vmail($data)
{
    require 'vendor/PHP_Email/PHPMailer-master/PHPMailerAutoload.php';

    define("PROJECT_HOME", "http://localhost/phpsamples/");

    define("PORT", "465"); // port number
    define("MAIL_USERNAME", "testdatabindra@gmail.com"); // smtp usernmae
    define("MAIL_PASSWORD", "Test@123"); // smtp password
    define("MAIL_HOST", "smtp.gmail.com"); // smtp host
    define("MAILER", "smtp");
    define("SENDER_NAME", "Vishal");
    define("SERDER_EMAIL", "ashishbindra2@gmail.com");

    $mailto = $data['email'];
    $mailSub = $data['sub'];
    $emailBody = "<p>" . $data['body'] . "</p>";

    $mail = new PHPMailer();
    $mail->IsSmtp();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; //465; // or 587
    $mail->IsHTML(true);
    $mail->Username = 'testdatabindra@gmail.com';
    $mail->Password = 'Test@123';
    $mail->SetFrom('testdatabindra@gmail.com');
    $mail->Subject = $mailSub;
    $mail->Body = $emailBody;
    $mail->AddAddress($mailto);

    if (!$mail->Send()) {
        return false;
    } else {
        return true;
    }
}
