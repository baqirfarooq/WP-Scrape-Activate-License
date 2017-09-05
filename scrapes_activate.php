<?php
/*
Plugin Name: Scrapes Activate License
Plugin URI: https://github.com/baqirfarooq/WP-Scrape-Activate-License
Description: This is just a plugin,  activate scrapes license
Author: Baqir Farooq
Version: 1.0
Author URI: https://github.com/baqirfarooq
*/

//Create the Scrapes Activate Settings
function add_theme_menu_item() {
    add_menu_page("Scrapes Activate", "Scrapes Activate", "manage_options", "scrape-activate", "scrape_activate_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");

//Register all of the settings for the settings page
function scrape_activate_register_settings() { 
    //Declare all options and if applicable, the default information
    add_option( 'scrapes_valid', 1);
    add_option( 'scrapes_domain', 'http://www.abc.com'); 
    add_option( 'scrapes_code', '726c917c-9874-4b26-9075-d0a28a7a7895'); 
    add_option( 'scrape_user_agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36');
 

    //Register all previously declared settings 
    register_setting( 'sa', 'scrapes_valid' ); 
    register_setting( 'sa', 'scrapes_domain' ); 
    register_setting( 'sa', 'scrapes_code' ); 
    register_setting( 'sa', 'scrape_user_agent'); 
} 
add_action( 'admin_init', 'scrape_activate_register_settings' );

//Build the theme options page
function scrape_activate_page() { ?>
<div class="wrap">
<style>
    /*** Make your theme page pretty by wrapping your inputs in divs and styling them ***/
    .wrap h2 {margin-bottom: .7em;}
    .postbox {width: 100%; float: left; margin: 0 0 1% 0;}
    .postbox h3 {padding: 1%; margin: 0;}
    .postbox .inside {padding: 0 1% 1% 1%;}
    .postbox .inside input[type='text'], .postbox .inside textarea {width: 100%;}
</style>

<div>
 <h1>Scrapes Setting</h1>
 <form method="post" action="options.php"> 
 <?php settings_fields( 'sa' ); //do this before building the inputs for the settings ?>


 <div class="postbox" >
    <h3>Scrape Activate License</h3>
    <div class="inside">
     <label for="scrapes_valid">Scrape Valid:</label><br>
     <input type="text" id="scrapes_valid" name="scrapes_valid" value="<?php echo get_option('scrapes_valid'); ?>" /><br>
 
     <label for="scrapes_domain">Scrape Domain :</label><br>
     <input type="text" id="scrapes_domain" name="scrapes_domain" value="<?php echo get_option('scrapes_domain'); ?>" />

     <label for="scrapes_code">Scrape Purchase Code :</label><br>
     <input type="text" id="scrapes_code" name="scrapes_code" value="<?php echo get_option('scrapes_code'); ?>" />
    
     <label for="scrape_user_agent">Scrape Agenct :</label><br>
     <input type="text" id="scrape_user_agent" name="scrape_user_agent" value="<?php echo get_option('scrape_user_agent'); ?>" />

    </div>
</div> 


<!-- end footer text -->
    <div style="clear: both;"></div>
    
    <?php submit_button(); ?>
 </form>
 </div>
</div>

<?php
    } //end options page
?>
