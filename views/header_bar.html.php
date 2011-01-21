<?php
// If we're authorize, show a header bar with a logout link
if (isset($_SESSION['access_token'])):
?>
<div id="header_bar">You're logged in as <?php echo $profile['username']; ?></div>
<div id="logout">
  <a href="disconnect.php" title="Disconnect"><img src="images/scc-disconnect-small.png" alt="Disconnect" /></a>
</div> <!-- end logout -->
<?php endif; ?>
