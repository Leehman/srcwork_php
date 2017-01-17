<?php
    ob_start();
    print "In first buffer\n";

    ob_start();
    print "In second buffer\n";
    ob_end_flush();

    print "In first buffer\n";
    ob_end_flush();
?>