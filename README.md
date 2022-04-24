# Fix Youtube titles [![Listed in Awesome YOURLS!](https://img.shields.io/badge/Awesome-YOURLS-C5A3BE)](https://github.com/YOURLS/awesome-yourls/)

*Without this plugin*, shortening a Youtube URL returns an incorrect title: <kbd>Before you continue to YouTube</kbd> (read why below)

**With this plugin**, you get the correct title, ie <kbd>Backyard Squirrel Maze 1.0- Ninja Warrior Course - YouTube</kbd>

Tested with [YOURLS](https://yourls.org) `1.8.1` and above.

## Installation

1. In `/user/plugins`, create a new folder named `fix-youtube-titles` or something like this
2. Drop these files in that directory.
3. Go to the Plugins administration page (eg. `http://sho.rt/admin/plugins.php`) and activate the plugin.
4. Have fun!

## License

Do what the hell you want with it.

## Why is this needed?

Youtube redirects every unknown user to a page where they need to accept their darn cookies:

<img src="https://user-images.githubusercontent.com/223647/120112768-85809e80-c177-11eb-952a-d1ab429be086.png" width="300px" />

Your YOURLS instance is such an *unknown* user to Google, since it has no Youtube cookie. This plugin tricks Youtube and makes it think it has one.

🍪 FTW.
