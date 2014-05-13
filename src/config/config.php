<?php

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
     *      alert("<?php echo 'print some text'; ?>");
     * ex. blade
     *      alert("{{{ print some text }}}");
     * Default: php
     */
    'compiler' => 'php'
);
