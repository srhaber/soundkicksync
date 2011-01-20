<?php
include 'config.php';

// Default view for testing
$content_file = "raw_output";

//if (!$sc->getAccessToken()) {
if (!isset($_SESSION['access_token'])) {
  $authorize_url = $sc->getAuthorizeUrl();
  $content_file = "authorize_page";
}

/*
if (isset($_SESSION['soundcloud'])) {
  $content = print_r($_SESSION['soundcloud'], 1);
}
*/

include 'views/template.html.php';
