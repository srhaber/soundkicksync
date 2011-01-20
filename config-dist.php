<?php
$client_id = '';
$client_secret = '';

$redirect_uri = '';

// ** DON'T EDIT BELOW THIS LINE **

include 'lib/soundcloud/Services/Soundcloud.php';

$soundcloud = new Services_Soundcloud($client_id, $client_secret, $redirect_uri);

session_start();
