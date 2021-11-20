=== Thumbnails ===
Tags: thumbnails, media
Tested up to: 5.8
Stable tag: 1.1.5
Contributors: satollo

Autoselect the featured image and creates pixel perfect resizes on the fly without regenerate all the thumbnails.

== Description ==

WordPress themes need thumbnails in different sizes and they even let the user to change those dimensions. 
But WordPress has a problem: it does not regenerates the thumbnails when new sizes are registered.

Thumbnails intercepts the request by themes or plugins to WordPress to get a specific thumbnail, generates it and caches it on disk. 
Efficiently, it produces a perfectly cropped image, with the right dimension avoiding unpleasant stretching.

Thumbnails does not modify your blog or your media library. When deactivated the blog returns to its old behavior.

The second important feature is the autoselection of featured image for post which are missing it. 
You can choose between the on the fly selection without persist it or, for better performances, to persist it once selected.

Read the [Thumbnails](https://www.satollo.net/plugins/thumbnails) official page for detailed information.

Theme developers can find instructions to use it (no code tied to Thumbnails needs to be written!).

Other plugins by Stefano Lissa:

* [Hyper Cache](https://www.satollo.net/plugins/hyper-cache)
* [Newsletter](https://www.thenewsletterplugin.com)
* [Header and Footer](https://www.satollo.net/plugins/header-footer)
* [Include Me](https://www.satollo.net/plugins/include-me)
* [Ads for bbPress](https://www.satollo.net/plugins/ads-bbpress)

== Installation ==

1. Put the plug-in folder into [wordpress_dir]/wp-content/plugins/
2. Go into the WordPress admin interface and activate the plugin
3. Optional: go to the options page and configure the plugin

== Frequently Asked Questions ==

See the [Thumbnails](https://www.satollo.net/plugins/thumbnails) official page.

== Screen shots ==

No screenshots are available at this time.

== Changelog ==

= 1.1.5 =

* Readme and plugin headers fix for WP 5.8

= 1.1.4 =

* Checked compatibility with WP 5.7

= 1.1.3 =

* Checked compatibility with WP 5.5

= 1.1.2 =

* Added crop options

= 1.1.1 =

* Compatibility check with WP 5.2.4

= 1.1.0 =

* Compatibility changes

= 1.0.8 =

* Fixed a debug notice

= 1.0.7 =

* Added core size processing
* Improved admin CSS

= 1.0.6 =

* Added featured image persistence option

= 1.0.5 =

* Compatibility checks with WP 4.7
* Tagged to be translatable on translate.wordpress.org (even you can help!)


= 1.0.4 =

* Fixes to the options panel

= 1.0.3 =

* Compatibility with WP 4.4.2

= 1.0.2 =

* Fixes

= 1.0.0 =

* First public release (but it is working on many blogs since months)

