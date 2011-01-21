<?php
/**
 * The base url is the main hostname for this app.
 * Leave out the trailing slash.
 * E.g. $base_url = 'http://example.com'
 */
$base_url = '';

/**
 * The redirect URI is used for the oauth2 callback.
 */
$redirect_uri = $base_url . '/oauthcallback.php';

/**
 * Soundcloud client credentials.  These are available on app page.
 * http://soundcloud.com/you/apps/[title]/edit
 */
$client_id = '';
$client_secret = '';

/**
 * Songkick API key.  You may need to apply for one.
 * http://www.songkick.com/api_key_requests/new
 */
$songkick_api_key = '';

/**
 * These CURL options are added to all CURL requests.  Add or
 * modify these as needed by the app.
 */
$curl_options = array(
  CURLOPT_SSL_VERIFYPEER => false, 
  CURLOPT_SSL_VERIFYHOST => false,
);

/*** DON'T EDIT BELOW THIS LINE ***/

include 'modules/soundcloud/Services/Soundcloud.php';
include 'lib.php';

$sc = new Services_Soundcloud($client_id, $client_secret, $redirect_uri);

session_start();