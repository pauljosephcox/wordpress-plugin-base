<?php

class BasePostType {

	// The Wordpress ID
	public $ID;

	// The Worpdress Title
	public $title;

	// The Wordpress Post Type String
	public $type;

	// The Wordpress Post Status
	public $status;

	// The Post Metadata
	public $meta = array();


	/**
	 * Construct
	 * @param WPPost|null $post 
	 * @return null
	 */

	function __construct( $post = null){

		if(is_numeric($post)) $post = get_post($post);

		$this->ID = $post->ID;
		$this->title = $post->post_title;
		$this->post = $post;
		$this->status = $post->post_status;
		
		// Get All Meta
		$meta = get_post_meta($post->ID);
		foreach($meta as $key) $this->get($key);

	}

	/**
	 * Get
	 * Get the post meta
	 * @param string $key 
	 * @return *
	 */

	public function get($key){

		$this->meta[$key] = get_post_meta($this->ID,$key,true);

	}

	/**
	 * Set
	 * Set the post meta
	 * @param string $key 
	 * @param * $value 
	 * @return null
	 */

	public function set($key,$value){

		$this->meta[$key] = $value;

	}

	/**
	 * Save
	 * Save the date to wordpress and create a post if one doesn't exists
	 * @param string|null $key 
	 * @return null
	 */

	public function save($key = null){

		if(!$this->ID) $this->create();

		// Save Single Value
		if($key) {

			update_post_meta($this->ID, $key, $this->get($key));
			return;

		}

		// Save Everything
		foreach($this->meta as $key=>$value) $this->save($key);

	}

	/**
	 * Create
	 * Creates a new wordpress post
	 * @return INT
	 */

	public function create(){

		$new = array();
		$new['post_title'] = $this->title;
		$new['post_status'] = $this->status;
		$new['post_type'] = $this->type;

		// Save Post
		$this->ID = wp_insert_post($new);

		return $this->ID;

	}

}

?>