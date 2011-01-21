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

// Process songkick form
if ($_POST['form'] == 'songkick') {
	$_SESSION['songkick-url'] = $_POST['songkick-url'];
	
	if (preg_match('/artists\/([^\/]+)\/?/', $_POST['songkick-url'], $matches)) {
		$artist = $matches[1];
		//$response = songkick_get_tour_dates();
		$_SESSION['new_description'] = "New description here!";
	}
	else {
		$_SESSION['new_description'] = "";
		$_SESSION['flash_msg'] = "Error: Unable to parse artist name from Songkick URL!";
	}
}

// Process description form
if ($_POST['form'] == 'description') {
	$postdata = array('user[description]' => $_POST['description']);
	try {
	  $response = json_decode($sc->put('me', $postdata, $curl_options), true);
	}
	catch (Exception $e) {
	  exit($e->getMessage());
	}
}

header("Location: {$base_url}");