<?php
include 'config.php';

if (isset($_GET['code'])) {
  $code = $_GET['code'];
}
else {
  die('No authorization code');
}

try {
  $at = $sc->accessToken($code, array(), $curl_options);
}
catch (Exception $e) {
  exit($e->getMessage());
}

// Save access token in session data
sc_store_access_token($at);

// Redirect back to main page
header("Location: {$base_url}");
