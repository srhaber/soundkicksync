<?php
$base_url = "";
$redirect_uri = '';

$client_id = '';
$client_secret = '';

$curl_options = array(
  CURLOPT_SSL_VERIFYPEER => false, 
  CURLOPT_SSL_VERIFYHOST => false,
);

// ** DON'T EDIT BELOW THIS LINE **

include 'lib/soundcloud/Services/Soundcloud.php';

$sc = new Services_Soundcloud($client_id, $client_secret, $redirect_uri);

session_start();
