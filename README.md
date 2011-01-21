# Soundkick Sync

A simple mashup demonstrating the APIs of Soundcloud and Songkick.

## What does it do?

This app writes the upcoming tour dates from a Songkick artist to your Soundcloud profile.

## See the demo app!

Test the app at [http://soundkicksync.srhaber.com](http://soundkicksync.srhaber.com).

### SETUP

To setup this app locally, you'll first need to [register a new application](http://soundcloud.com/you/apps/new) with Soundcloud.  Give the app an appropriate title.

Additionally, you'll need to [apply for an api key](http://www.songkick.com/api_key_requests/new) with Songkick.

1. Git clone this project to a web server and run the following commands to download the git submodules:

	`git submodule init`

	`git submodule update`

1. Copy the config-dist.php to config.php.

1. In config.php, enter the Soundcloud client key and secret and the Songkick API key.  Also enter the base URL for the app.

The app should be up and running now.
