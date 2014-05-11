<h2>Laravel4-Carabiner with Blade Compiler</h2>
<p>Carabiner is a js/css minify package. I changed some code to get it work with Laravel4 and add a few functionalities.</p>
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
<!--<p>Publish a config file by using artisan CLI.</p>
<pre>
$ php artisan config:publish inthraonsap/carabiner
</pre>-->
<h2>Usage</h2>
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
<p>For the functinalities of this package. I will update them next weekend. Becuase It is bed time for me.</p>
<h2>Credits</h2>
<p>All Credits to original developers. https://github.com/EllisLab/CodeIgniter/wiki/Carabiner and https://github.com/weboAp/laravel4-carabiner</p>
<h2>Support or Contact</h2>
<p>If you found any problems, Please give me a contact with <a href="mailto:inthra.onsap@gmail.com">inthra.onsap@gmail.com</a></p>
