<?php
include 'config.php';

// Default view for testing
$content_file = "raw_output";

// Check if we have an access token yet
if (!isset($_SESSION['access_token'])) {
  $authorize_url = $sc->getAuthorizeUrl();
  $content_file = "authorize_page";
}
else {
  // Check if we need to get a new access token
  if ($_SESSION['expiration_time'] < time()) {
    try {
      $at = $sc->accessTokenRefresh($_SESSION['refresh_token'], array(), $curl_options);
    }
    catch (Exception $e) {
      exit($e->getMessage());
    }
    
    sc_store_access_token($at);
  }

  $sc->setAccessToken($_SESSION['access_token']);

  // Show profile info
  try {
    $profile = json_decode($sc->get('me', array(), $curl_options), true);
    $content_file = "profile";
  }
  catch (Services_Soundcloud_Invalid_Http_Response_Code_Exception $e) {
    exit($e->getMessage());
  }
}

include 'views/template.html.php';
