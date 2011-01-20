<?php
include 'config.php';

if (isset($_GET['code'])) {
  $code = $_GET['code'];
}
else {
  die('No authorization code');
}

try {
  $at = $sc->accessToken($code, array(), array(CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false));
}
catch (Exception $e) {
  echo $e->getMessage();
  die();
}

// Save access token in session data
$_SESSION['access_token'] = $at['access_token'];
$_SESSION['expiration_time'] = $at['expires_in'] + time();
$_SESSION['scope'] = $at['scope'];
$_SESSION['refresh_token'] = $at['refresh_token'];

// Redirect back to main page
header("Location: {$base_url}");
