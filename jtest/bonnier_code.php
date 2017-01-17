<?php
/*
 * This script expects these parameters:
 * - article_id
 * - score
 *
 * Example bonnier_test.php?article_id=1&vote_value=1
 */

//wrapped everything in a try / catch to help capture any errors.
try 
{
//changed to do same as before but added die connection is not made. also there should be a config file or 
//include file. this can be seen by vieiwng the page as it is now. of the user and password. root should 
//never be used as the log in. create a separate login with read,
//write priveleges as appropriate.
$con = mysql_connect("localhost","root","unded1");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("bonnier", $con);

function db_result($result) {
  if ($result && mysql_num_rows($result) > 0) {
    $array = mysql_fetch_row($result);
    return $array[0];
  }
  return false;
  // changed FALSE to false. this will cause issue with case sensitivity
}

//used isset to test that url variables actually exist before proceeding. decode url values
if(isset($_REQUEST['article_id'])){
	$article_id = urldecode($_REQUEST['article_id']);}
else {echo 'Article ID not found! ';
	exit;}

if(isset($_REQUEST['vote_value'])){
	$vote_value = urldecode($_REQUEST['vote_value']); }
else {echo 'Vote value not found! ';
	exit;}

/* since both url variables are integer values needed to properly concatenate them into their appropriate string values.
	probably need to use SQL injection prevention by using placeholders
*/
$sql = "";

$current_score = db_result(mysql_query("SELECT score FROM vote WHERE article_id = ".$article_id));

if ($current_score) {
	$new_score = (int)$current_score + (int)$vote_value;
	$sql = " UPDATE vote SET score =".$new_score." WHERE article_id = ".$article_id ;
	mysql_query($sql);
}
else {
	$sql = "INSERT INTO vote (article_id, score) VALUES (".$article_id.", ".$vote_value.")";
	mysql_query($sql);
}

$article_score = db_result(mysql_query("SELECT score FROM vote WHERE article_id = ".$article_id."))";

//urlencode values
$urlyes = 1;
$urlno = -1;

$widget  = "<div class='voting_widge'>";
$widget .= "<a href='bonnier_test.php?article_id=".$article_id."'&vote_value=".urlencode(urlyes).">Vote Up</a>";
$widget .= " ";
$widget .= "<a href='bonnier_test.php?article_id=".$article_id."'&vote_value=".urlencode(urlno).">Vote Down</a>";
$widget .= " ";
$widget .= "Score: ". $article_score;
$widget .= "</div>";

print $widget;

}
catch((Exception $e){
	echo 'Web processing exception: ',  $e->getMessage(), "\n";

}
