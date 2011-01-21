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

function sc_authorize() {
  
}