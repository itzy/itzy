<?php
/**
 * This is a itzy pagecontroller.
 *
 */
// Include the essential config-file which also creates the $itzy variable with its defaults.
include(__DIR__.'/config.php');


// Create the object to display sourcecode
//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));


// Do it and store it all in variables in the itzy container.
$itzy['title'] = "Visa källkod";

$itzy['main'] = "<h1>Visa källkod</h1>\n" . $source->View();


// Finally, leave it all to the rendering phase of itzy.
include(ITZY_THEME_PATH);
