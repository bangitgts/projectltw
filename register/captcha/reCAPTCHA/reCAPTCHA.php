<?php
require_once '../recaptchalib/recaptchalib.php';
$reCaptcha = new ReCaptcha("6LcjNhEbAAAAALDLdeE38lW07zuCkJz6hv0UpRKo");
$response = null;

if ($_POST['g-recaptcha-response']) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER['REMOTE_ADDR'],
        $_POST['g-recaptcha-response']
    );

    if ($response != null && $response->success) {
        echo 'handle a successful';
    } else {
        echo $response->error;
    }
}
