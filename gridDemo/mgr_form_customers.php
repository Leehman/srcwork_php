<?php

require_once "getDatacustomers.php";

//var_dump($_REQUEST);
//exit;
$custid = explode("|", $_REQUEST["custact"]);
$acton = trim($custid[1]);
$custsid = trim($custid[0]);
//


//
if (strcmp($acton,"add") == 0){
	//echo $acton;
	echo <<< EOD
		<form action="" method="" name="frmmgr" id="frmmgr">
		<fieldset>
			
			<div>
				<input style="border:0px;background-color:#F2F2F2;" type='text' size='40' id='fmessage'/>
				<p>
					<label for="fcname">Customer Name: </label>
					<input type='text' size='30' name='fcname' id='fcname' value=""  /></p>
					<p>
					<label for="fname">Contact First Name: </label>
					<input type='text' size='30' name='fname' id='fname' value=""  /></p>
					<p>
					<label for="lname">Contact Last Name: </label>
					<input type='text' size='30' name='lname' id='lname' value=""  /></p>
					<p>
					<label for="fphone">Contact Phone: </label>
					<input type='text' size='30' name='fphone' id='fphone' value=""  /></p>
					<p>
					<label for="faddress1">Address 1: </label>
					<input type='text' size='30' name='faddress1' id='faddress1' value=""  /></p>
					<p>
					<label for="faddress2">Address 2: </label>
					<input type='text' size='30' name='faddress2' id='faddress2' value=""  /></p>
					<p>
					<label for="fcity">City: </label>
					<input type='text' size='30' name='fcity' id='fcity' value=""  /></p>
					<p>
					<label for="fstate">State: </label>
					<input type='text' size='30' name='fstate' id='fstate' value=""  /></p>
					<p>
					<label for="fzip">Zip: </label>
					<input type='text' size='30' name='fzip' id='fzip' value=""  /></p>
					<p>
					<label for="fcountry">Country: </label>
					<input type='text' size='30' name='fcountry' id='fcountry' value=""  /></p>
					<p>
					<label for="fsrep">Sales Rep: </label>
					<input type='text' size='30' name='fsrep' id='fsrep' value=""  /></p>
					<p>
					<label for="fclimit">Credit Limit: </label>
					<input type='text' size='30' name='fclimit' id='fclimitS' value=""  /></p>

				<p>
				<label for="">Action: </label>
				<input type="submit" value="Submit" name="submit" id="submit" />&nbsp;
				<input type="button" value="Cancel"  name="cancel" id="cancel"/>
				</p>
				<input type="hidden" name="frecordid" value="" />
				<input type="hidden" name="ftype" value="add" />
			</div>
		</fieldset>
		</form>
EOD;
} 
elseif (strcmp($acton,"edit") == 0){
		//echo $acton;
		
		$dbData = getData::customersDB($custsid) ;
		
		$popform = <<< EOD
		<form action="" method="" name="frmmgr" id="frmmgr">
			<fieldset>
				
				<div>
					<input style="border:0px;background-color:#F2F2F2;" type='text' size='40' id='fmessage'/>
					
					<p>
					<label for="fcname">Customer Name: </label>
					<input type='text' size='30' name='fcname' id='fcname' value="{$dbData[1]}"  /></p>
					<p>
					<label for="fname">Contact First Name: </label>
					<input type='text' size='30' name='fname' id='fname' value="{$dbData[2]}"  /></p>
					<p>
					<label for="lname">Contact Last Name: </label>
					<input type='text' size='30' name='lname' id='lname' value="{$dbData[3]}"  /></p>
					<p>
					<label for="fphone">Contact Phone: </label>
					<input type='text' size='30' name='fphone' id='fphone' value="{$dbData[4]}"  /></p>
					<p>
					<label for="faddress1">Address 1: </label>
					<input type='text' size='30' name='faddress1' id='faddress1' value="{$dbData[5]}"  /></p>
					<p>
					<label for="faddress2">Address 2: </label>
					<input type='text' size='30' name='faddress2' id='faddress2' value="{$dbData[6]}"  /></p>
					<p>
					<label for="fcity">City: </label>
					<input type='text' size='30' name='fcity' id='fcity' value="{$dbData[7]}"  /></p>
					<p>
					<label for="fstate">State: </label>
					<input type='text' size='30' name='fstate' id='fstate' value="{$dbData[8]}"  /></p>
					<p>
					<label for="fzip">Zip: </label>
					<input type='text' size='30' name='fzip' id='fzip' value="{$dbData[9]}"  /></p>
					<p>
					<label for="fcountry">Country: </label>
					<input type='text' size='30' name='fcountry' id='fcountry' value="{$dbData[10]}"  /></p>
					<p>
					<label for="fsrep">Sales Rep: </label>
					<input type='text' size='30' name='fsrep' id='fsrep' value="{$dbData[11]}"  /></p>
					<p>
					<label for="fclimit">Credit Limit: </label>
					<input type='text' size='30' name='fclimit' id='fclimitS' value="{$dbData[12]}"  /></p>

					<p>
					<label for="">Action: </label>
					<input type="submit" value="Submit" id="submit" name="submit"/>&nbsp;
					<input type="button" value="Cancel"  name="cancel" id="cancel"/>
					</p>
					
					<input type="hidden" name="frecordid" value="{$custsid}" />
					<input type="hidden" name="ftype" value="edit" />
				</div>
			</fieldset>
		</form>
EOD;
		echo $popform;
	}
elseif (strcmp($acton,"delete") == 0){
	//delete record
}
elseif (strcmp($acton,"view") == 0){
	//view record
}
else{
	exit('Wrong method used to get to this page!');
}

?>

<script src="/js/jquery-2.1.3.min.js"></script>
<script src="/tstweb/js/jquery.validate.min.js"></script>


<script  type="text/javascript">
	$('#frmmgr').validate({ // initialize the plugin
        rules: {
        	fcname: {
            required: true,
            maxlength: 30	},

            fname: {
            required: true,
            maxlength: 20	}
        },
        messages :{
	        "fcname" : {
	            required : 'Required'
	        },
	        "fname" : {
	            required : 'Required!'
	        }	
	        ,
        submitHandler: function(form) {
           form.submit();
        }
    }
    });

	
</script>







