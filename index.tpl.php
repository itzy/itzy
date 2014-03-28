<!doctype html>
<html class='no-js' lang='<?php echo $lang?>'>
<?php
$db = new CDatabase($itzy['database']);
$user= new CUser($db);



?>
<head>

        <!-- Here is the rest of the <head> code -->
        <script src='<?php echo $modernizr; ?>'></script>
    <meta charset='utf-8'/>
    <title><?php echo get_title($title); ?></title>
    <?php if(isset($favicon)): ?><link rel='shortcut icon' href='<?php echo $favicon; ?>'/><?php endif; ?>
    <?php foreach($stylesheets as $val): ?>
        <link rel='stylesheet' type='text/css' href='<?php echo $val?>'/>
    <?php endforeach; ?>

</head>
<body>
<div id='wrapper'>
    <nav class='above'><?php echo CNavigation::GenerateMenu($menu1);?>
       <?php echo $user->userLoginMenu(); ?></nav>

    <div id='header'><?php echo $header; ?></div>
    <div id="search"><form action="search.php" method="get">
            <label>Sök artist: <input type='search' name='title'/></label>
    </form></div>
    <nav class='navbar'><?php echo CNavigation::GenerateMenu($menu, $active_page);?></nav>
<div id="music1"><img src="../webroot/img/music1.jpg"></div>
    <div id="music2"><img src="../webroot/img/music2.jpg"></div>
    <div id='main'><?php echo $main; ?></div>
    <div id='footer'><?php echo $footer; ?></div>
</div>

<?php if(isset($jquery)):?><script src='<?php echo $jquery?>'></script><?php endif; ?>

<?php if(isset($javascript_include)): foreach($javascript_include as $val): ?>
    <script src='<?php echo $val?>'></script>
<?php endforeach; endif; ?>

<?php if(isset($google_analytics)): ?>
    <script>
        var _gaq=[['_setAccount','<?=$google_analytics?>'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
<?php endif; ?>

</body>
</html>
