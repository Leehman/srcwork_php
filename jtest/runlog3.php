<?php
 
$earliest_date =  date('Y-m-d H:i:s' , strtotime('-15 minutes'));
 
$filename = 'access_log' ;
echo $filename;
$file = fopen("/usr/bin/tac  $filename  2>/dev/null;", 'r');
 
while ($line = fgets($file)) {
 
        ##example:  168.8.56.7 - - [26/Sep/2013:10:59:04 -0400] "GET /wp-content/
 
        $regex = '|^(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}) - - [(\d{2}/\w{3}/\d{4}:\d{2}:\d{2}:\d{2})|';
 
        preg_match($regex, $line, $matches )    ;
       //$matches[1] is the IP number, while $matches[2] is the date.
 
        $activityDateTime = date_create_from_format('d/M/Y:H:i:s', $matches[2])->format('Y-m-d H:i:s') ;
        // reformat the date to a more php-friendly format
 
        if  ( $activityDateTime >= $earliest_date )     {
                echo $line      ;
        } else {
                pclose($file);
                break;
        }
}
 
?>