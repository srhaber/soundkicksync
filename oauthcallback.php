<?php
include 'config.php';

// Check if we have an authorization code
if (isset($_GET['code'])) {
  $code = $_GET['code'];
}
else {
  die('No authorization code');
}

// Fetch an access token using the auth code
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
