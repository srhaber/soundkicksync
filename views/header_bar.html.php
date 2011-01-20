<?php
// If we're authorize, show a header bar with a logout link
if (isset($_SESSION['access_token'])):
?>
<div id="header_bar">You're logged in as <?php echo "username"; ?> | <a href="#">Logout</a></div>
<?php endif; ?>
