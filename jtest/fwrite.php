<?php
    $myarray[] = "This is line one";
    $myarray[] = "This is line two";
    $myarray[] = "This is line three";
    $mystring = implode("\n", $myarray);
	$filename = 'testwrite.txt';
    $numbytes = file_put_contents($filename, $mystring);
    print "$numbytes bytes written\n";
?>