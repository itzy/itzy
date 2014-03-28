<?php
/**
 * This is a itzy pagecontroller.
 *
 */

// Include the essential config-file which also creates the $itzy variable with its defaults.
include(__DIR__.'/config.php');


$db = new CDatabase($itzy['database']);
$music = new CMusic($db);

$sql = 'SELECT * FROM music ORDER BY lastmodified DESC LIMIT 3';
$res = $db->ExecuteSelectQueryAndFetchAll($sql);

$news = 'SELECT * FROM News ORDER BY lastmodified DESC LIMIT 3';
$resultat = $db->ExecuteSelectQueryAndFetchAll($news);

$genre = 'SELECT DISTINCT genre FROM music';
$hej = $db->ExecuteSelectQueryAndFetchAll($genre);

$random = 'SELECT * FROM music ORDER BY Rand() LIMIT 1';
$rand = $db->ExecuteSelectQueryAndFetchAll($random);

// Put results into a HTML-table
$album = "<h1>Senast uppdaterade album:</h1>";
foreach($res AS $key => $val) {
    $album .= "<div id='album'> <a href='" . $music->getUrlToContent($val) . "'><img width='190'
src='{$val->picture}
    alt='{$val->album}' /><br>
   {$val->album}</a><br>
    {$val->artist}<br>{$val->lastmodified}</div>";
}
$album .= '<div style="clear: both;"></div>';

$ge= "<h2>Existerande genrer:</h2>";
$ge .= '<ul>';
foreach($hej AS $key => $val) {
    $ge .= "<li><a href='genre.php?p={$val->genre}'>{$val->genre}</a></li>";
}
$ge .= '</ul>';

$ran= "<h2>Random album:</h2>";
$ran .= '<ul>';
foreach($rand AS $key => $val) {
    $ran .= "<li><a href='page.php?url={$val->url}'>{$val->album}</a></li>";
}
$ran .= '</ul>';

$slug    = isset($_GET['slug']) ? $_GET['slug'] : null;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;
$url     = isset($_GET['url']) ? $_GET['url'] : null;

// Put results into a HTML-table
$lala= "<h1>Senast uppdaterade inläggen:</h1><tr><th>Titel</th><th>Innehåll</th><th>Senast uppdaterad</th></tr>";
foreach($resultat AS $key => $val) {
    $val->DATA = substr($val->DATA, 0, 40);
    $lala .= "<tr><td><a href='blog.php?slug={$val->slug}'>{$val->title}</a></td><td>{$val->DATA}</td><td>{$val->lastmodified}</td></tr>";
}
// Do it and store it all in variables in the itzy container.
$itzy['title'] = "Hem";

$itzy['main'] = <<<EOD

<div id="sidmeny">
  {$ge}

{$ran}

</div>

  {$album}
  <table>
  {$lala}
  </table>
EOD;



// Finally, leave it all to the rendering phase of itzy.
include(ITZY_THEME_PATH);
