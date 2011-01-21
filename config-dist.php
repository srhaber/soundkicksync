<?php
$base_url = '';
$redirect_uri = '';

$client_id = '';
$client_secret = '';

$songkick_api_key = '';

$curl_options = array(
  CURLOPT_SSL_VERIFYPEER => false, 
  CURLOPT_SSL_VERIFYHOST => false,
);

// ** DON'T EDIT BELOW THIS LINE **

include 'lib/soundcloud/Services/Soundcloud.php';
include 'app.php';

$sc = new Services_Soundcloud($client_id, $client_secret, $redirect_uri);

session_start();
