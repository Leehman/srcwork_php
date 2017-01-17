<?php 
     require_once("dbconnect.php") ;
    //
    try {
       $dataDB = db::getInstance()->query('SELECT client_id, name, gender, company FROM clients ');
     } catch(PDOException $ex) {
         echo "An Error occured! <br>"; //user friendly message
         echo $ex->getMessage();
    }

foreach ($dataDB as $row): 

echo '<tr>';
echo '<td>&nbsp;</td>';
echo '<td>';
echo $row['name']. '</td>';
echo '<td>&nbsp;</td>';
echo '<td>';
echo $row['gender']. '</td>';
echo '<td>&nbsp;</td>';
echo '<td>';
echo $row['company']. '</td>';
echo '<td>&nbsp;</td>';
echo "<td >";
echo "<a href='#".$row['client_id']."'>Edit<a/>";
echo "</td >";
echo '<td>&nbsp;</td>';
echo "<td >";
echo "<a href='#' >Delete <a/>";
echo "</td >";
echo '<td>&nbsp;</td>';
echo "<td >";
echo "<a href='#' >View <a/>";
echo "</td >";
echo '<td>&nbsp;</td>';
echo '</tr>';
endforeach; 

?>
