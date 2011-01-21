<div class="profile">
<div id="avatar"><img src="<?php echo $profile['avatar_url']; ?>" alt="<?php echo $username; ?>" /></div>
<h3><?php echo $profile['full_name']; ?></h3>
<p><strong><?php echo $profile['username']; ?></strong><br />
Location: <?php echo $profile['city']; ?></p>
<div id="description"><p><?php echo nl2br(stripslashes($profile['description'])); ?></p></div>

<div class="form">
  <form action="post.php" method="post" accept-charset="utf-8">
    <label for="songkick-url">Songkick Artist URL:</label><br />
    <input type="text" name="songkick-url" value="<?php echo (isset($_SESSION['songkick-url'])) ? htmlentities($_SESSION['songkick-url']) : "http://www.songkick.com/artists/"; ?>" id="songkick-url" size="60" />
    <p class='example'><em>E.g., http://www.songkick.com/artists/383845-imogen-heap</em><p>
      <input type="hidden" name="form" value="songkick" />
      <p><input type="submit" value="Get Tour Dates from Songkick"></p>
    </form>
  </div> <!-- end songkick-form -->

<div class="form">
  <form action="post.php" method="post" accept-charset="utf-8">
    <label for="form-description">Soundcloud profile:</label><br />
    <textarea name="description" rows="10" cols="80" id="form-description"><?php scv_get_profile_description(); ?></textarea>
    <input type="hidden" name="form" value="description" />
    <p><input type="submit" value="Save to Soundcloud"></p>
  </form>
</div> <!-- end profile-form -->

<div id="instructions">
  <h3>Instructions</h3>
  <p><strong>Step 1 - Enter Songkick URL</strong><br />
	Enter the URL for an artist's page on Songkick and click the Get Tour Dates from Songkick button.</p>
	
  <p><strong>Step 2 - Examine the Content</strong><br />
	If successful, the tour dates will appear in the Soundcloud profile text area formatted in HTML.</p>
	
  <p><strong>Step 3 - Save to Soundcloud</strong><br />
	Click the Save to Soundcloud button to save this content to your Soundcloud profile description.</p>
	
  <p>A small preview of your profile appears at the top of this page, showing your current avatar, username, location, and description.</p>
</div>
</div> <!-- end profile -->
