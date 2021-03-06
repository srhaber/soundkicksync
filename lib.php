<?php

/**
* Store access token data in user session.
*
* @param $at
*  The access token response array.
*/
function sc_store_access_token($at) {
  $_SESSION['access_token'] = $at['access_token'];
  $_SESSION['expiration_time'] = $at['expires_in'] + time();
  $_SESSION['scope'] = $at['scope'];
  $_SESSION['refresh_token'] = $at['refresh_token'];  
}

/** 
* Return true if client has an access token.
*/
function sc_has_access() {
  return isset($_SESSION['access_token']);
}

/** 
* Set the access token for use in the $sc object.  Get a new
* token if the current one expired.
*/
function sc_set_access() {
  global $sc, $curl_options;

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
}

/**
* Make an API call to Songkick to get the tour dates
*
* @param $artist
*  The name of the artist
* @return
*  The response of the API call.
*/
function songkick_get_tour_dates($artist) {
  global $songkick_api_key;

  $url = 'http://api.songkick.com/api/3.0/artists/'.$artist.'/calendar.json?apikey='.$songkick_api_key;
  $ch = curl_init();

  $options = array(
    CURLOPT_URL => $url,
    CURLOPT_HEADER => false,
    CURLOPT_RETURNTRANSFER => true,	
    );

  curl_setopt_array($ch, $options);

  $data = json_decode(curl_exec($ch), 1);
  curl_close($ch);

  return $data;
}

/*** View helper functions below ***/

/**
* Display an error message at the top of the page.
*/
function scv_flash_msg() {
  if (isset($_SESSION['flash_msg'])) {
    echo "<div class='flash'>{$_SESSION['flash_msg']}</div>";
    $_SESSION['flash_msg'] = NULL;
  }
}

/**
* Populate the text-area with the Songkick tour dates if available.
* Otherwise, just show the user's current description.
*/
function scv_get_profile_description() {
  global $profile;

  if (isset($_SESSION['new_description'])) {
    echo $_SESSION['new_description'];
    // Remove the new description from future requests
    $_SESSION['new_description'] = NULL;		
  }
  else {
    echo stripslashes($profile['description']);
  }
}