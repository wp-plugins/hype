=== Gallery Widget ===
Contributors: Oliver Schaal
Website link: http://blog.splash.de/
Author URI: http://blog.splash.de/
Plugin URI: http://blog.splash.de/plugins/hype_it/
Tags: social bookmark, hype, yeebase, button
Requires at least: 2.5
Tested up to: 2.6.1
Stable tag: 0.1.0
License: GPL v3, see LICENSE

This Plugin adds the hype!-Button to posts, which uses defined tags, on your Site. Just add the following to your theme/templates: <?php echo hype_it(get_permalink(),get_the_tags()); ?>.

== Description ==

Simple Plugin to include the hype!-Button on posts, which use a defined tag.

For more information on how to use this plugin see [http://blog.splash.de/plugins/]

== Installation ==

1. Upload the 'hype!'-folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in the WordPress admin
3. Set the tags/style on the options page
4. Include the following php-function in your theme/templates using this snippet:
<?php echo hype_it(get_permalink(),get_the_tags()); ?>

or (maybe the better way)

<?php if ( function_exists('hype_it') ) : ?>
<?php hype_it(get_permalink(),get_the_tags()); ?>
<?php endif; ?>


