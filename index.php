<?php
include 'config.php';

// Default view for testing
$content_file = "raw_output";

// Check if we have an access token yet
if (!sc_has_access()) {
  $authorize_url = $sc->getAuthorizeUrl();
  $content_file = "authorize_page";
}
else {
	sc_set_access();

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
