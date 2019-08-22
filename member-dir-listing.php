<?php
/*
Plugin Name: CLL Member Directory Listing
Plugin URI:  tba 
Description: Creates an edit User Profile link/page
Version:     1.0.0
Author:      Mark Daniel Louwe, Danica Niña Louwe
Author URI:  http://creativelabbylouwe.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

class cll_member_dir_listing{

    public function __construct(){
        /* 
        Qs:
        x connect sa infusionsoft, butangi og nod chuchu
        x

        */
        add_action('admin_menu', array($this,'cll_add_submenu')); // adds plugin menu 
        add_action('admin_enqueue_scripts', array($this,'enqueue_admin_scripts_and_styles')); //admin scripts and styles
		//add_action('wp_enqueue_scripts', array($this,'enqueue_public_scripts_and_styles')); //public scripts and styles
        register_activation_hook(__FILE__, array($this,'plugin_activate')); //activate hook
		register_deactivation_hook(__FILE__, array($this,'plugin_deactivate')); //deactivate hook

    }// close construct

    public function connect_to_infusionsoft(){
        update_post_meta( 5, 'output_misc', 'it worked!' );

    }

    public function cll_add_submenu(){
        add_menu_page(
            __( 'CLL Member Directory Listing', 'cll' ), //control for user profile
            __( 'Member Directory Listing','cll' ),
            'manage_options',
            'cll-member-dir-listing',
            array($this, 'cll_add_submenu_cb')
        );

        $this->connect_to_infusionsoft();

    } //close cll add submenu 

    public function cll_add_submenu_cb(){
        echo "this is a test";
        ?>
        <p class="first">hello there</p>
        <?php

    } //close cll add submenu

    public function enqueue_admin_scripts_and_styles(){
        wp_enqueue_style('member_dir_listing_admin_styles', plugin_dir_url(__FILE__) . '/css/styles.css');


    }
    public function plugin_activate(){	

		//flush permalinks
        flush_rewrite_rules();//pretifier sa url 
        
    } // close fun activate
    
    public function plugin_deactivate(){
		//flush permalinks
        flush_rewrite_rules();
        
	} // close fun deactivate


}// close class

new cll_member_dir_listing;