<?php


#'/xampp/apache/logs/
$filename = "/xampp/apache/logs/access.log";
$file_handle = fopen($filename,'r' );
##
$fline = "";
$file_array = array();
$chrome = 0;
$ffox = 0;
$ie =0;
$safari = 0;
$opera = 0;
$total = 0;
$fgood =0;
$fbad = 0;

#function to get browser clients
function getClients($fileline){
	
}

function array_push_assoc(&$array, $key, $value){
$array[$key] = $value;
return $array;
}

#loop contents
echo "start process loop <br>";
$mykey = 0;
while(!feof($file_handle)){
	$total++;
	$fline =fgets($file_handle);
	#echo $fline."<br>";
	$pos = strpos($fline, 'HTTP/1.1');
	if ($pos == true){
		#$file_array[] = $fline;
		//array_push($file_array, substr($fline,$pos));
		
		array_push_assoc($file_array, $mykey, substr($fline,$pos));
		$mykey++;
		$fgood++;
		
	}else{
		
		$fbad++;
	}
	
	
$total++;
}


#close
fclose($file_handle);

#print array
foreach ($file_array as $key => $value) {
    echo "Key: $key => Value: $value"."<br>";
	//echo "Key: $key; Value: $value\n";
}
#var_dump($file_array);
#foreach($file_array as $f_ne) {
#    echo "- line in log : ".$f_ne."<br>" ;
#}

#echo "<br>Good records found= ".$fgood;
#echo "<br>Bad records found= ".$fbad;
#
?>