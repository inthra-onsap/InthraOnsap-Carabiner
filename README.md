<h2>Laravel4-Carabiner with Blade Compiler</h2>
<p>Carabiner is a js/css minify package. I changed some code to get it work with Laravel4 and add a few functionalities to make it compile php code. It's a good package when you work with two languages website or you need to send some php data to javascript file and so on.</p>
<h2>Installation</h2>
<p>Add "inthraonsap/carabiner": "dev-master" to composer.json file.</p>
<pre>
{
  "require": {
    "inthraonsap/carabiner": "dev-master"
  }
}
</pre>
<p>Run composer update CLI.</p>
<pre>
$ composer update
</pre>
<p>Open the app.php file in app/config/. and follow these steps.</p>
<pre>
'providers' => array(
  ...,
  'Inthraonsap\Carabiner\CarabinerServiceProvider',
  ...
),
'aliases' => array(
  ...,
  'Carabiner'   => 'Inthraonsap\Carabiner\Facades\Carabiner',
  ...
)
</pre>
<p>Publish a config file by using artisan CLI.</p>
<pre>
$ php artisan config:publish inthraonsap/carabiner
</pre>
<h2>Usage</h2>
<ul>
  <li><a href="#configuration">Configuration</a></li>
  <li><a href="#methods">Methods</a></li>
</ul>
<h3 id="configuration">
Configuration
</h3>
<p>Configuration file of this package.</p>
<pre>
return array(
    /*
    |--------------------------------------------------------------------------
    | Script Directory
    |--------------------------------------------------------------------------
    |
    | Path to the script directory.
    | Relative to the public-Folder
    |
    */
    'scriptDir' => '/',
    
    /*
    |--------------------------------------------------------------------------
    | Style Directory
    |--------------------------------------------------------------------------
    |
    | Path to the style directory.
    | Relative to the public-Folder
    |
    */
    'styleDir' => '/',
    /*
    |--------------------------------------------------------------------------
    | Cache Directory
    |--------------------------------------------------------------------------
    |
    | Path to the cache directory. Must be writable.
    | Relative to the public-Folder
    |
    */
    'cacheDir' => 'cache/',
    
    /*
     * Base url for file location.
     */
    'base_uri' => URL::to('/').'/',
    
    /*
    |--------------------------------------------------------------------------
    | Combine
    |--------------------------------------------------------------------------
    |
    | Flags whether files should be combined. Defaults to TRUE.
    |
    */
    'combine' => TRUE,
    
    
    /*
    |--------------------------------------------------------------------------
    | Development Flag
    |--------------------------------------------------------------------------
    |
    |  Flags whether your in a development environment or not. Defaults to FALSE.
    |
    */
    'dev' => FALSE,
    
    /*
    |--------------------------------------------------------------------------
    | Minify Javascript
    |--------------------------------------------------------------------------
    |
    | Global flag for whether JS should be minified. Defaults to TRUE.
    |
    */
    'minify_js' => TRUE,
    
    /*
    |--------------------------------------------------------------------------
    | Minify CSS
    |--------------------------------------------------------------------------
    |
    | Global flag for whether CSS should be minified. Defaults to TRUE.
    |
    */

    'minify_css' => TRUE,
    
    /*
    |--------------------------------------------------------------------------
    | Force cURL
    |--------------------------------------------------------------------------
    |
    | Global flag for whether to force the use of cURL instead of file_get_contents()
    | Defaults to FALSE.
    |
    */

    'force_curl' => FALSE,

    /*
    |--------------------------------------------------------------------------
    | Predifined Asset Groups
    |--------------------------------------------------------------------------
    |
    | Any groups defined here will automatically be included.  Of course, they
    | won't be displayed unless you explicity display them ( like this: Carabiner::display('jquery') )
    | See docs for more.
    |
    */
    'groups' =>  array(),
    
    /**
     * character encoding for javascript tag.
     * Default: UTF-8
     */
    'charset' => 'UTF-8',
    
    /**
     * Choose a compiler for javascript file.(It works once you use Carabiner::compileJs())
     * Options: php | blade
     * ex. php
     *      alert("&lt;?php echo 'print some text'; ?&gt;");
     * ex. blade
     *      alert("{{{ print some text }}}");
     * Default: php
     */
    'compiler' => 'php'
);
</pre>
<h3 id="methods">
Methods
</h3>
<p>Working with assets</p>
<pre>
/** 
* Add JS file to queue
* @param	String of the path to development version of the JS file.  Could also be an array, or array of arrays. (ex. "assets/js/jquery.js")
* @param	String of the path to production version of the JS file. NOT REQUIRED
* @param	Boolean flag whether the file is to be combined. NOT REQUIRED
* @param	String of the group name with which the asset is to be associated. NOT REQUIRED
* @return   Void
*/
Carabiner::js($dev_file, $prod_file = '', $combine = TRUE, $minify = TRUE, $group = 'main');

/**
* Add CSS file to queue
* @param	String of the path to development version of the CSS file. Could also be an array, or array of arrays. (ex. "assets/css/layout.css")
* @param	String of the media type, usually one of (screen, print, handheld) for css. Defaults to screen.
* @param	String of the path to production version of the CSS file. NOT REQUIRED
* @param	Boolean flag whether the file is to be combined. NOT REQUIRED
* @param	Boolean flag whether the file is to be minified. NOT REQUIRED
* @param	String of the group name with which the asset is to be associated. NOT REQUIRED
* @return   Void
*/		
Carabiner::css($dev_file, $media = 'screen', $prod_file = '', $combine = TRUE, $minify = TRUE, $group = 'main')

/**
* Adding js file to queue with blade or php compiler.
* @param string $dev_file is String of the path to development version of the JS file.  Could also be an array, or array of arrays. (ex. "assets/js/jquery.js")
* @param type $args is Array of variable that you want to send to js view. (ex. array("name"=>"Inthra Onsap")).
* @param string $prod_file is String of the path to production version of the JS file. NOT REQUIRED
* @param type $combine is Boolean flag whether the file is to be combined. NOT REQUIRED
* @param type $minify is Boolean flag whether the file is to be minified. NOT REQUIRED
* @param type $group is String of the group name with which the asset is to be associated. NOT REQUIRED
* @return Void
*/
Carabiner::compileJs($dev_file, $args = array(), $prod_file = '', $combine = TRUE, $minify = TRUE, $group = 'main'){
		
// Display css
Carabiner::display('css');

//display js
Carabiner::display('js');

// display both
Carabiner::display(); // OR Carabiner::display('both');

// display group
Carabiner::display('jquery'); // group name defined as jquery

// display filterd group
Carabiner::display('main', 'js'); // group name defined as main, only display JS

// return string of asset references
$string = Carabiner::display_string('main');

// clear css cache
Carabiner::empty_cache('css');

//clear js cache
Carabiner::empty_cache('js');

// clear both
Carabiner::empty_cache(); // OR Carabiner::empty_cache('both');

// clear before a certain date
Carabiner::empty_cache('both', 'now');	// String denoting a time before which cache 
                                        // files will be removed.  Any string that 
                                        // strtotime() can take is acceptable. 
                                        // Defaults to 'now'.
</pre>
<h2>Credits</h2>
<p>All Credits to original developers. https://github.com/EllisLab/CodeIgniter/wiki/Carabiner and https://github.com/weboAp/laravel4-carabiner</p>
<h2>Support or Contact</h2>
<p>If you find any issue, Please contact me by <a href="mailto:inthra.onsap@gmail.com">inthra.onsap@gmail.com</a></p>
