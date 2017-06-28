<?php

/**
 *
 * @wordpress-plugin
 * Plugin Name: Wordpress Plugin Base
 * Description: A starting point for custom wordpress plugins
 * Author: Paul Joseph Cox
 * Version: 1.0
 * Author URI: http://pauljosephcox.com/
 */


if (!defined('ABSPATH')) exit;

if (!class_exists('BasePlugin')) require_once('classes/base-plugin.class.php');

register_activation_hook( __FILE__, array( 'MyCustomPlugin', 'activate' ) );

class MyCustomPlugin extends BasePlugin {

	function __construct(){

		// Default Plugin Construction
		parent::__construct();
		$this->path    = plugin_dir_path(__FILE__);
		$this->url     = plugin_dir_url(__FILE__);
		$this->slug    = 'wordpress-plugin-base'; // Theme Directory Override

		// Actions
		add_action('init', array($this, 'setup'), 10, 0);
		add_action('wp_enqueue_scripts', array($this, 'scripts'));
		add_action('wp_loaded', array($this , 'forms'));
		add_action('parse_request', array($this , 'endpoints'));
		add_action('admin_menu', array($this, 'register_options_page'));

	}

	/**
	 * Activate
	 * @return null
	 */

	public static function activate() {}

	/**
	 * Setup
	 * @return Null
	 */

	public function setup() {

		// register types
		$this->register_types();

	}

	/**
	 * Register Post Types
	 * @return null
	 */

	public function register_types() {


		$args = array(
			'labels'             => $this->build_type_labels('Topic', 'Topics'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'topics' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_icon'			 => 'dashicons-welcome-learn-more',
			'menu_position'      => 40,
			'supports'           => array( 'title', 'editor', 'page-attributes' )
		);

		// register_post_type( 'topic', $args );


	}


	/**
	 * Include Scripts
	 * @return null
	 */

	public function scripts() {

		// wp_enqueue_script('jquery.validate', '//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js', array('jquery'), $this->version, true);

	}


	/**
	 * Process Forms
	 * @return null
	 */

	public function forms() {

		if (!isset($_POST['base_starter_action'])) return;

		switch ($_POST['base_starter_action']) {

			case 'action':
				// $this->action($_POST);
				break;

			default:
				break;
		}

	}

	/**
	 * Endpoints
	 * @param type $wp 
	 * @return type
	 */

	public function endpoints($wp) {

		$pagename = (isset($wp->query_vars['pagename'])) ? $wp->query_vars['pagename'] : $wp->request;

		switch ($pagename) {

			case 'api/base':
				// $this->api($_GET);
				break;

			default:
				break;

		}

	}


   /**
    * Register Options Page
    * ---------------------------------------------
    * @return false
    * ---------------------------------------------
    **/

	public function register_options_page() {

		// main page
		add_options_page('Base Plugin', 'Base Plugin', 'manage_options', 'base_plugin_options', function(){ $this->template_include('options.php'); });
		add_action('admin_init', array($this, 'plugin_options'));

	}

   /**
    * Plugin Options
    * ---------------------------------------------
    * @return false
    * ---------------------------------------------
    **/

	public function plugin_options() {

		$options = array(
			'plugin_starter_test',
			'plugin_starter_test2'
		);

		foreach ($options as $option) {
			register_setting('base_plugin_options', $option);
		}

	}

}

$mycustomplugin = new MyCustomPlugin();
?>