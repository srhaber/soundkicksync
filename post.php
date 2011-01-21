<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] != "POST") {
  exit("Only POST submissions are accepted.");
}

if (sc_has_access()) {
	sc_set_access();
}
else {
	// Client does not have access.  The user must re-authorize the app.
	header("Location: {$base_url}");
}

$postdata = array('user[description]' => $_POST['description']);

try {
  $response = json_decode($sc->put('me', $postdata, $curl_options), true);
}
catch (Exception $e) {
  exit($e->getMessage());
}

header("Location: {$base_url}");