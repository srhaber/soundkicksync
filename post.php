<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] != "POST") {
  exit("Only POST submissions are accepted.");
}

$sc->setAccessToken($_SESSION['access_token']);

$postdata = array('user[description]' => $_POST['description']);

try {
  $response = json_decode($sc->put('me', $postdata, $curl_options), true);
}
catch (Exception $e) {
  exit($e->getMessage());
}

header("Location: {$base_url}");