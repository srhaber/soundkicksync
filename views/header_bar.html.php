<?php
// If we're authorize, show a header bar with a logout link
if (isset($_SESSION['access_token'])):
?>
<div id="header_bar">You're logged in as <a href="<?php echo $base_url; ?>"><?php echo $profile['username']; ?></a></div>
<div id="logout">
  <a href="disconnect.php" title="Disconnect"><img src="images/scc-disconnect-small.png" alt="Disconnect" /></a>
</div> <!-- end logout -->
<?php endif; ?>
