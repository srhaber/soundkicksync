<?php
include 'config.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] != "POST") {
  exit("Only POST submissions are accepted.");
}

// Make sure the access token is set for Soundcloud service calls.
if (sc_has_access()) {
  sc_set_access();
}
else {
  // Client does not have access.  The user must re-authorize the app.
  header("Location: {$base_url}");
}

// Processing logic for the songkick form
if ($_POST['form'] == 'songkick') {
  $_SESSION['songkick-url'] = $_POST['songkick-url'];

  // Parse out the artist name from the Songkick URL
  if (preg_match('/artists\/([^\/]+)\/?/', $_POST['songkick-url'], $matches)) {
    $artist = $matches[1];
    // Make API call to Songkick to get tour dates
    $data = songkick_get_tour_dates($artist);
  }

  // Format the tour dates, or display error message if there are no tour dates
  if (isset($data['resultsPage']['results']['event'])) {
    $new_desc = "<b>Upcoming Tour Dates</b>\n\n";

    foreach($data['resultsPage']['results']['event'] as $event) {
      $date = date('M j, Y', strtotime($event['start']['date']));
      $location = $event['location']['city'];
      $uri = $event['uri'];
      $new_desc .= "<a href=\"{$uri}\" title=\"{$date} - {$location}\">{$date} - {$location}</a>\n";
    }

    $_SESSION['new_description'] = $new_desc;
  }
  else {
    $_SESSION['new_description'] = "";
    $_SESSION['flash_msg'] = "Error: Unable to retrieve tour dates from Songkick for this artist!";
  }
}

// Processing logic for the description form
if ($_POST['form'] == 'description') {
  $postdata = array('user[description]' => $_POST['description']);
  // Make API call to Soundcloud to update the user's profile
  try {
    $response = json_decode($sc->put('me', $postdata, $curl_options), true);
  }
  catch (Exception $e) {
    exit($e->getMessage());
  }
}

header("Location: {$base_url}");