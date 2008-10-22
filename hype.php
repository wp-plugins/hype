<?php
/*
Plugin Name: hype it!
Website link: http://blog.splash.de/
Author URI: http://blog.splash.de/
Plugin URI: http://blog.splash.de/plugins/hype_it/
Description: This Plugin adds the hype!-Button to posts, which uses defined tags, on your Site. Just add the following to your theme/templates: <?php echo hype_it(get_permalink(),get_the_tags()); ?>.
Author: Oliver Schaal
Version: 0.2.0

    This is a WordPress plugin (http://wordpress.org) and widget
    (http://automattic.com/code/widgets/).
*/

if (!class_exists("HypeIt")) {
    class HypeIt {
        // constructor
        function __construct()
        {
            add_action('admin_menu', array(&$this, 'showAdminMenuLink'));
            register_deactivation_hook(__FILE__, array(&$this, 'deactivatePlugin'));
        }
        // delete all options on deactivation
        private function deactivatePlugin()
        {
            delete_option('hype_tags');
            delete_option('hype_style');
        }
        // special urlencoding used by hype it
        private function hype_urlencode($str)
        {
            return str_replace('%', '%25', urlencode(htmlentities($str)));
        }
        // main method
        function getButton($permlink, &$tags)
        {
            $defined_tags = explode(',', get_option('hype_tags'));
            $url = $this->hype_urlencode($permlink);
            $ret_val = '';

            if (is_array($tags)) {
                foreach($tags as $tag) {
                    if (in_array(strtolower($tag->name), $defined_tags)) {
                        $ret_val = "<div style=\"" . get_option('hype_style') . "\"><script type=\"text/javascript\" src=\"http://hype.yeebase.com/ebutton/$url\"></script></div>";
                        break;
                    }
                }
            }

            return $ret_val;
        }
        function showAdminMenuLink()
        {
            add_options_page('hypeIt', 'hype it!', 9, basename(__FILE__), array(&$this, 'showAdminOptions'));
        }
        // Prints out the admin page
        function showAdminOptions()
        {
            $hidden_field_name = 'submit_hidden';
            // Read in existing option value from database
            $opt_tags = get_option('hype_tags');
            $opt_style = get_option('hype_style');
            // See if the user has posted us some information
            // If they did, this hidden field will be set to 'Y'
            if ($_POST[ $hidden_field_name ] == 'Y') {
                // Read their posted value
                $opt_tags = $_POST[ 'hype_tags' ];
                $opt_style = $_POST[ 'hype_style' ];
                // Save the posted value in the database
                // first lets cleanup
                $tags = explode(',', $opt_tags);
                reset($tags);
                while (list($key, $value) = each($tags)) {
                    $tags[$key] = strtolower(trim($value));
                }
                $opt_tags = implode(',', $tags);

                update_option('hype_tags', $opt_tags);
                update_option('hype_style', $opt_style);
                // Put an options updated message on the screen

                ?>
<div class="updated"><p><strong><?php _e('Options saved.', 'hype_it');

                ?></strong></p></div>
<?php

            }
            // Now display the options editing screen
            echo '<div class="wrap">';
            // header
            echo "<h2>" . __('hype it!', 'hype_it') . "</h2>";
            // options form

            ?>

<form name="form1" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']);

            ?>">
<input type="hidden" name="<?php echo $hidden_field_name;

            ?>" value="Y">

<p><?php _e("Tags (comma separated list,lowercase):", 'hype_it');

            ?>
<input type="text" name="hype_tags" value="<?php echo $opt_tags;

            ?>" size="20">
</p>
<p><?php _e("CSS-Style:", 'hype_it');

            ?>
<input type="text" name="hype_style" value="<?php echo $opt_style;

            ?>" size="20">
</p>

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Update Options', 'hype_it') ?>" />
</p>

</form>
</div>

					<?php
        } //End function printAdminPage()
    }
} //End Class HypeIt
if (class_exists("HypeIt")) {
    $hypeIt = new HypeIt();
}

// lets try to be compatible to previous versions
if (is_object($hypeIt)) {
    function hype_it($permlink, &$tags)
    {
        global $hypeIt;
        return $hypeIt->getButton($permlink, $tags);
    }
}
