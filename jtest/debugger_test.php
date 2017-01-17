<?php
//
//set_include_path('c:\xampp\php\pear') ;
#'/usr/local/bin/vendor/autoload.php';
require 'vendor/autoload.php';
#require 'htdocs/html/tstweb/jobtests/vendor/autoload.php';
use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();

$debugbar["messages"]->addMessage("hello world!");
?>


<html>
    <head>
        <?php echo $debugbarRenderer->renderHead() ?>
    </head>
    <body>
        ...
        <?php echo $debugbarRenderer->render() ?>
    </body>
</html>