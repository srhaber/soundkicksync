<div class="profile">
<div id="avatar"><img src="<?php echo $profile['avatar_url']; ?>" alt="<?php echo $username; ?>" /></div>
<h3><?php echo $profile['full_name']; ?></h3>
<p><strong><?php echo $profile['username']; ?></strong><br />
Location: <?php echo $profile['city']; ?></p>
<div id="description"><p><?php echo nl2br($profile['description']); ?></p></div>

<div class="form">
	<form action="post.php" method="post" accept-charset="utf-8">
		<label for="songkick-url">Songkick Artist URL:</label><br />
		<input type="text" name="songkick-url" value="<?php echo (isset($_SESSION['songkick-url'])) ? htmlentities($_SESSION['songkick-url']) : "http://www.songkick.com/artists/"; ?>" id="songkick-url" size="60" />
		<p class='example'><em>E.g., http://www.songkick.com/artists/383845-imogen-heap</em><p>
		<input type="hidden" name="form" value="songkick" />
		<p><input type="submit" value="Get Artist's Tour Dates"></p>
	</form>
</div> <!-- end songkick-form -->

<div class="form">
	<form action="post.php" method="post" accept-charset="utf-8">
		<label for="form-description">Soundcloud profile description:</label><br />
		<textarea name="description" rows="8" cols="40" id="form-description"><?php scv_get_profile_description(); ?></textarea>
		<input type="hidden" name="form" value="description" />
		<p><input type="submit" value="Save to Soundcloud"></p>
	</form>
</div> <!-- end profile-form -->

<!--
<pre>
<?php print_r($profile); ?>
</pre>
-->
</div> <!-- end profile -->
