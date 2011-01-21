<div class="profile">
<div id="avatar"><img src="<?php echo $profile['avatar_url']; ?>" alt="<?php echo $username; ?>" /></div>
<h3><?php echo $profile['full_name']; ?></h3>
<p><strong><?php echo $profile['username']; ?></strong><br />
Location: <?php echo $profile['city']; ?></p>
<div id="description"><p><?php echo $profile['description']?></p></div>
<div class="profile-form">
	<form action="post.php" method="post" accept-charset="utf-8">
		<label for="form-description">Description:</label><br />
		<textarea name="description" rows="4" cols="40" id="form-description"><?php echo $profile['description']; ?></textarea>
		<p><input type="submit" value="Submit"></p>
	</form>
<pre>
<?php print_r($profile); ?>
</pre>
</div> <!-- end profile -->
