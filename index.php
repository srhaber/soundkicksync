<?php
include 'config.php';

// Default view file, used for testing
$content_file = "raw_output";

// Check if the user needs to authorize this app
if (!sc_has_access()) {
  $authorize_url = $sc->getAuthorizeUrl();
  $content_file = "authorize_page";
}
else {
	// Once authorized, we'll have an access token.
	// Make sure this token is set for the Soundcloud service calls.
	sc_set_access();

  // Show the user's profile for authorized apps.
  try {
    $profile = json_decode($sc->get('me', array(), $curl_options), true);
    $content_file = "profile";
  }
  catch (Services_Soundcloud_Invalid_Http_Response_Code_Exception $e) {
    exit($e->getMessage());
  }
}

// Render the web page
include 'views/template.html.php';