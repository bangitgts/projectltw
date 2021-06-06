<?php
require "../connect/connectdb.php";
$data = $_POST['username'];
$sql = "SELECT username,email from users WHERE username='$data' or email='$data' ";
$result = $con->query($sql);

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 8)
{
    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}


if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $user = $row["username"];
        $email = $row["email"];
    }
} else {
    header("Location: ./index.php?mess=err");
}
$newpassforuser = generate_string($permitted_chars, 8);
$newpassword = md5($newpassforuser);
$sql_change_pass = "UPDATE users SET password = '$newpassword' WHERE username = '$user'";
$result = $con->query($sql_change_pass);

if ($result) {
    echo "Đã gửi tài khoản lại tài khoản mật khẩu cho bạn";
    
    echo "$newpassforuser";
} else {
    echo "abc";
}
$con->close();



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail9250.maychuemail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sg.it1@phuonganhtourist.com';                     //SMTP username
    $mail->Password   = 'phuonganh122';                               //SMTP password
    $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       =  465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sg.it1@phuonganhtourist.com', 'Lap Trinh Web');
    $mail->addAddress($email, $user);     //Add a recipient
    $mail->addAddress($email);               //Name is optional
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your password has been created';
    $mail->Body    = 'Username: ' . $user. '<br>'.'Password: <b>' . $newpassforuser . '</b>' ;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
