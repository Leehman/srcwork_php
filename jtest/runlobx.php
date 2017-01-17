<?php
// full path to text file
define("TEXT_FILE", "/xampp/htdocs/html/tstweb/jobtests/access.log");
// number of lines to read from the end of file
define("LINES_COUNT", 10);
 
 
function read_file($file, $lines) {
    //global $fsize;
    $handle = fopen($file, "r");
    $linecounter = $lines;
    $pos = -2;
    $beginning = false;
    $text = array();
    while ($linecounter > 0) {
        $t = " ";
        while ($t != "\n") {
            if(fseek($handle, $pos, SEEK_END) == -1) {
                $beginning = true; 
                break; 
            }
            $t = fgetc($handle);
            $pos --;
        }
        $linecounter --;
        if ($beginning) {
            rewind($handle);
        }
        $text[$lines-$linecounter-1] = fgets($handle);
        if ($beginning) break;
    }
    fclose ($handle);
    return array_reverse($text);
}
 
$fsize = round(filesize(TEXT_FILE)/1024/1024,2);
 
echo "<strong>".TEXT_FILE."</strong><br>";
echo "File size is {$fsize} megabytes<br>";
echo "Last ".LINES_COUNT." lines of the file:<br>";
 
$lines = read_file(TEXT_FILE, LINES_COUNT);
foreach ($lines as $line) {
    echo $line;
}
?>