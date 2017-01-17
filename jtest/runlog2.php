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

#loop contents
echo "start process loop <br>";

while(!feof($file_handle)){
	$total++;
	$fline =fgets($file_handle);
	#echo $fline."<br>";
	$pos = strpos($fline, 'HTTP/1.1');
	if ($pos == true){
		#$file_array[] = $fline;
		array_push($file_array, substr($fline,$pos));
		$fgood++;
		
	}else{
		
		$fbad++;
	}
	
	
$total++;
}


#close
fclose($file_handle);

#print array
#var_dump($file_array);
foreach($file_array as $f_ne) {
    echo "- line in log : ".$f_ne."<br>" ;
}

echo "<br>Good records found= ".$fgood;
echo "<br>Bad records found= ".$fbad;
#
?>