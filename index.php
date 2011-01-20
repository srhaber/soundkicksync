<?php
$content = "No session content.";

if (isset($_SESSION['soundcloud'])) {
  $content = print_r($_SESSION['soundcloud'], 1);
}

include 'views/template.html.php';
