=== hype it! ===
Contributors: cybio
Website link: http://blog.splash.de/
Author URI: http://blog.splash.de/
Plugin URI: http://blog.splash.de/plugins/hype_it/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=C2RBCTVPU9QKJ&lc=DE&item_name=splash%2ede&item_number=WordPress%20Plugin%3a%20hype%20it%21&cn=Mitteilung%20an%20den%20Entwickler&no_shipping=1&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: social bookmark, hype, yeebase, button, t3n, social, news, bookmark
License: GPL v3, see LICENSE
Requires at least: 2.5
Tested up to: 3.0.1
Stable tag: 0.2.5

This Plugin adds the t3n Social News-Button to posts, which uses defined tags, on your Site. Just add the following to your theme/templates: `<?php echo hype_it(get_permalink(),get_the_tags()); ?>`.

== Description ==

Simple Plugin to include the "t3n Social News"-Button (hype!-Button) on posts, which use a defined tag.

For more information on how to use this plugin see [splash ;)](http://blog.splash.de/plugins/).

== Installation ==

1. Upload the 'hype!'-folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in the WordPress admin
3. Set the tags/style on the options page
4. Include the following php-function in your theme/templates using this snippet:
`<?php echo $hypeIt->getButton(get_permalink(),get_the_tags()); ?>`

or (maybe the better way)

`<?php if ( is_object($hypeIt) ) : ?>
<?php echo $hypeIt->getButton(get_permalink(),get_the_tags()); ?>
<?php endif; ?>`

== Changelog ==

= 0.2.5 =
* [FIX] rename: "hype it!" -> "t3n SocialNews"

= 0.2.4 =
* [FIX] security 

= 0.2.3 =
* [FIX] update to t3n.de/socialnews (new button/url)

= 0.2.2 =
* [FIX] security (don't allow script execution outside wordpress)