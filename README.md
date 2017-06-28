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
```