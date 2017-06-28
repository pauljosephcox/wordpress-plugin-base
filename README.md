# Wordpress Plugin Base
A Starting point for every custom wordpress plugin

```
class MyCustomPlugin extends BasePlugin {

	function __construct(){

		// Default Plugin Construction
		parent::__construct();
		$this->path    = plugin_dir_path(__FILE__);
		$this->url     = plugin_dir_url(__FILE__);
		$this->slug    = 'wordpress-plugin-base'; // Theme Directory Override

	}	

}
```

```
class Resource extends BasePostType {
	
	function __construct($post = null){

		// Default Plugin Construction
		parent::__construct($post);

	}

}

// This will create a new resource post type in wordpress and update the custom field "my_custom_field"
$resource = new Resource();
$resource->title = "My Resource";
$resource->set("my_custom_field","Hello World");
$resource->save();
```