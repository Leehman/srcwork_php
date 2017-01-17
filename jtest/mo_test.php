<?php

//lee holman 10-3-2015

$pad_array = array(	'2' => "abc", '3' => "def", '4' => "ghi",  '5' => "jkl",
		'6' => "mno", '7' => "pqrs", '8' => "tuv", '9' => "wxyz"	);
/*
$pad_array['2'] = "abc";
$pad_array['3'] = "def";
$pad_array['4'] = "ghi";
$pad_array['5'] = "jkl";
$pad_array['6'] = "mno";
$pad_array['7'] = "pqrs";
$pad_array['8'] = "tuv";
$pad_array['9'] = "wxyz";
*/
//
$pad_out ="";
define('Serror', 'Your input can only be 2 or 3 or 4 or 5 or 6 or 7 or 8 or 9');

//
function telephonepad($arg1, $arg2, &$pad_array){
	$pad_print_out = '';
	//
	if(array_key_exists($arg1, $pad_array) && array_key_exists($arg2, $pad_array) ){
		//loop 1st key value and then the second for displaying possible key values
		// get key value
		$sarg1 = $pad_array[$arg1];
		$sarg2 = $pad_array[$arg2];
		//
		//$pad_print_out = $sarg1.' - '.$sarg2;
		$sarg1_array= str_split($sarg1);
		$sarg2_array= str_split($sarg2);
		//
		foreach($sarg1_array as $char_arg1){
			//$pad_print_out .= $char_arg1;
			foreach($sarg2_array as $char_arg2){
				$pad_print_out .= $char_arg1.$char_arg2 . " -- ";
			
			}
		}
		//
		return $pad_print_out;
		
	}else{
		return Serror;
	}
	

}

//change these numbers based on the array above for results
// so for example 2,3 or 4,5 etc.

$pad_out = telephonepad(9,7,$pad_array);

echo $pad_out;
//var_dump($pad_array);


?>