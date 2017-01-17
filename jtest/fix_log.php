<?php

$file = 'c:\\xampp\\apache\\logs\\error.log'; // Path of Apache log file
$fp = fopen($file, 'r');
fseek($fp, filesize($file)-5000);
$content = array_slice(array_reverse(explode("\n",fread($fp, 5000))), 0, 51);

#21 now 51
array_shift($content);
#echo '<pre>';
#print_r($content);
#echo '</pre>';
//lh
$noline =0;
foreach($content as $f_ne) {

	$noline++;
    echo "- line in log {$noline}: ".$f_ne."<br>" ;
}

?>