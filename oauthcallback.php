<?php
include 'config.php';

if (isset($_GET['code'])) {
  $code = $_GET['code'];
}
else {
  die('No authorization code');
}

try {
  $access_token = $sc->accessToken($code, array(), array(CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false));
}
catch (Exception $e) {
  echo $e->getMessage();
  die();
}

echo "<pre>";
print_r($access_token);
echo "</pre>";
