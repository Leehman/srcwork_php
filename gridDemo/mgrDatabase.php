<?php
//print_r($_POST);
//exit();

require_once "getData.php";
//
$rid = $_POST["frecordid"];
//
if(isset($_POST["fname"])){
	$dbname = trim($_POST["fname"]);
} else { $dbname = "";	}
if(isset($_POST["fcompany"])){
	$dbcompany = trim($_POST["fcompany"]);
} else { $dbcompany = ""; }
if(isset($_POST["fgender"])){
	$dbgender = trim($_POST["fgender"]);
} else {$dbgender = "male"; }
//
if (isset($_POST["ftype"])){
	if($_POST["ftype"]==="edit")
	{	// update
		$dbData = getData::updateByid($dbname,$dbcompany,$dbgender,$rid) ;
		//
		//echo $dbData;
		exit($dbData);
	}
	else if($_POST["ftype"]==="add"){
		// add
		$dbData = getData::addClients($dbname,$dbgender,$dbcompany) ;
		//
		//echo $dbData;
		exit($dbData);
	}
	else if($_POST["ftype"]==="delete"){
		// add
		$dbData = getData::deleteClients($rid) ;
		//
		//echo $dbData;
		exit($dbData);
	}
	else {	exit('Wrong database action used to get to this page!');
			} 
} else {
	exit('Wrong method used to get to this page!');	}


?>








