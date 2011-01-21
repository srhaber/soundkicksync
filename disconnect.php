<?php
include 'config.php';

// Remove all session data
$_SESSION = array();

// Delete the session cookie
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
  );
}

// Finish destroying the session
session_destroy();

// The user is now no longer connected with Soundcloud.
// Redirect back to authorization page.
header("Location: {$base_url}");
