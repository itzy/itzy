<?php
/**
 * Config-file for itzy. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

$itzy = array();

define('ITZY_INSTALL_PATH', __DIR__ . '/..');
define('ITZY_THEME_PATH', ITZY_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(ITZY_INSTALL_PATH . '/src/bootstrap.php');


/**
 * Settings for the database.
 *
 */
$itzy['database']['dsn']            = 'mysql:host=blu-ray.student.bth.se;dbname=jusi14;';
$itzy['database']['username']       = 'jusi14';
$itzy['database']['password']       = '8BA?3;rA';
$itzy['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();




/**
 * Theme related settings.
 *
 */
$itzy['stylesheets'] = array('style/style.css');
$itzy['favicon']    = 'img/bird.png';
/**
 * Create the itzy variable.
 *
 */

/**
 * Site wide settings.
 *
 */
$itzy['lang']         = 'sv';
$itzy['title_append'] = ' | Min filmdatabas';

$itzy['header'] = <<<EOD

<img class='sitelogo' src='img/logo.png' alt='itzy Logo'/>
<span class='sitetitle'>'This is from our hearts'</span>
<span class='siteslogan'>RM Rental Music</span>
EOD;

$itzy['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) RM Rental Music (julia.sivartsson@gmail.com) |
<a href="viewsource.php">Source</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;

/**
CNavigation
 **/
$menu = array(
    'home'  => array('text'=>'Hem',  'url'=>'home.php'),
    'music'  => array('text'=>'Musik',  'url'=>'music.php'),
    'news'  => array('text'=>'Nyheter',  'url'=>'news.php'),
    'about'  => array('text'=>'Om',  'url'=>'about.php'),
);

$active_page = basename($_SERVER['REQUEST_URI']);
$active_page = preg_replace('/\.php$/', '', $active_page);

$menu1 = array(
    '1'  => array('text'=>'Me-sidan',  'url'=>'../../../kmom01/itzy/webroot/hello.php'),
    '2'  => array('text'=>'Login',  'url'=>'login.php'),
);


/*
class CNavigation {
    public static function GenerateMenu($items) {
        $html = "<nav>\n";
        foreach($items as $item) {
            $html .= "<a href='{$item['url']}'>{$item['text']}</a>\n";
        }
        $html .= "</nav>\n";
        return $html;
    }
};*/
/**
 * Configuration for img.php, name the config file the same as your img.php and
 * append _config. If you are testing out some in imgtest.php then label that
 * config-file imgtest_config.php.
 *
 */


$itzy['modernizr'] = 'js/modernizr.js';
$itzy['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
//$itzy['jquery'] = null; // To disable jQuery
$itzy['javascript_include'] = array();
//$itzy['javascript_include'] = array('js/main.js'); // To add extra javascript files


/**
 * Google analytics.
 *
 */
$itzy['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analyticsjquery'] = null; // To disable jQuery
