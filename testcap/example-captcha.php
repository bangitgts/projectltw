<?php
require_once "recaptchalib.php";
$siteKey = "6LfKwBcbAAAAAAHIBYLk_rU1itlkgYmT5SNr2xYb";
$secret = "6LfKwBcbAAAAAEGjOXOsDfP8pAZ2qnHPUJpiKWX5";
$lang = "en";
$resp = null;
$error = null;
$reCaptcha = new ReCaptcha($secret);

// Was there a reCAPTCHA response?
if ($_POST["g-recaptcha-response"]) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
?>
<html>
  <head><title>reCAPTCHA Example</title></head>
  <body>
<?php
if ($resp != null && $resp->success) {
    echo "You got it!";
}
?>
    <form action="recaptchalib.php" method="post">
      <div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"></div>
      <script type="text/javascript"
          src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
      </script>
      <br/>
      <input type="submit" value="submit" />
    </form>
  </body>
</html>
