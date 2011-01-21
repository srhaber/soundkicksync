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

function sc_has_access() {
	return isset($_SESSION['access_token']);
}

function sc_set_access() {
	global $sc;
	
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