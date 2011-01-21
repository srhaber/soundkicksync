<div class="profile">
<div id="avatar"><img src="<?php echo $profile['avatar_url']; ?>" alt="<?php echo $username; ?>" /></div>
<h3><?php echo $profile['full_name']; ?></h3>
<p><strong><?php echo $profile['username']; ?></strong><br />
Location: <?php echo $profile['city']; ?></p>
<div id="description"><p><?php echo nl2br($profile['description']); ?></p></div>

<div class="form">
	<form action="post.php" method="post" accept-charset="utf-8">
		<label for="songkick-url">Songkick URL:</label><br />
		<input type="text" name="songkick-url" value="http://www.songkick.com/artists/" id="songkick-url" size="60" />
		<p class='example'><em>E.g., http://www.songkick.com/artists/383845-imogen-heap</em><p>
		<input type="hidden" name="form" value="songkick" />
		<p><input type="submit" value="Get Songkick Tour Dates!"></p>
	</form>
</div> <!-- end songkick-form -->

<div class="form">
	<form action="post.php" method="post" accept-charset="utf-8">
		<label for="form-description">Description:</label><br />
		<textarea name="description" rows="4" cols="40" id="form-description"><?php echo $profile['description']; ?></textarea>
		<input type="hidden" name="form" value="description" />
		<p><input type="submit" value="Submit"></p>
	</form>
</div> <!-- end profile-form -->

<!--
<pre>
<?php print_r($profile); ?>
</pre>
-->
</div> <!-- end profile -->
