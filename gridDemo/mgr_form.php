<?php

require_once "getData.php";

//var_dump($_REQUEST);
//exit;
$actrid = explode("|", $_REQUEST["ridact"]);
$acton = trim($actrid[1]);
$rid = trim($actrid[0]);
//
echo <<< EODCSS
<style>
.error{
    display: none;
    margin-left: 10px;
}       
 
.error_show{
	color: red;
	margin-left: 10px;
}
</style>
EODCSS;
//
if (strcmp($acton,"add") == 0){
	//echo $acton;
	echo <<< EOD
		<form action="" method="" name="frmmgr" id="frmmgr">
		<fieldset>
			
			<div>
				<input style="border:0px;background-color:#F2F2F2;" type='text' size='40' id='fmessage'/>

				<p>
				<label for="fname">First Name: </label>
				<input type='text' size='25' name='fname' id='fname'/></p>

				<p>
				<label for="fcompany">Company: </label>
				<input type='text' size='25' name='fcompany' id='fcompany'/></p>
				
				<p>
				<label for="gender">Gender: </label>
				<select size='2' name='fgender'>
				  <option value="male" selected="true">Male</option>
				  <option value="female">Female</option>			
				</select>

				</p>
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
		
		$dbData = getData::clientByid($rid) ;
		$genders = trim($dbData[1]);
		$mgender = " " ;	
		$fgender = " " ;
		if (strcmp($genders,"male") == 0){
			$mgender = "selected='true'" ;	
		} else{$fgender = "selected='true'" ; }

		$popform = <<< EOD
		<form action="" method="" name="frmmgr" id="frmmgr">
			<fieldset>
				
				<div>
					<input style="border:0px;background-color:#F2F2F2;" type='text' size='40' id='fmessage'/>
					
					<p>
					<label for="fname">Name: </label>
					<input type='text' size='30' name='fname' id='fname' value="{$dbData[0]}" /></p>

					<p>
					<label for="fcompany">Company: </label>
					<input type='text' size='30' name='fcompany' id='fcompany' value="{$dbData[2]}" /></p>
					
					<p>
					<label for="gender">Gender: </label>
					<select size='2' name='fgender'>
						<option value="male" {$mgender} >Male</option>
						<option value="female" {$fgender} >Female</option>	
					</select>

					</p>
					<p>
					<label for="">Action: </label>
					<input type="submit" value="Submit" id="submit" name="submit"/>&nbsp;
					<input type="button" value="Cancel"  name="cancel" id="cancel"/>
					</p>
					
					<input type="hidden" name="frecordid" value="{$rid}" />
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

<script  type="text/javascript">
  // show the dialog on click of a button
  $("#frmmgr").submit(function(event){
  	//validate fields 1st
  	//alert("hi");
  	// Abort any pending request
    if (request) {	request.abort();	 }
    var $form = $(this);
    //var frmtype = $("#ftype").val();
            // Let's select ""and cache all the fields
    var $inputs = $form.find("input, select, button");

    // Serialize the data in the form
    var serializedData = $form.serialize();
    //$inputs.prop("disabled", true);
    
    var request = $.ajax({
      		url: "mgrDatabase.php",
      		type: "POST",
      		dataType: "text",
      		data: serializedData,
      		beforeSend: function() {                    
				$empty = $('#frmmgr').find("input").filter(function() {
				    return this.value === "";
				});
				if($empty.length) {
				    $("#frmessage").val("Errors need to fixed to proceed.");
				    return false;
				}else{
				    return true;
				};
				},
      		}) ;
      		//
		request.done (function(response, textStatus, jqXHR) {
				//alert("good="+jqXHR.responseText);
				//$(this).closest(".ui-dialog-content").dialog("close");
			 	 });
		      	//
		request.fail (function( jqXHR, textStatus, errorThrown ) {
  				alert( "Request failed: " + textStatus + errorThrown);
				 });
		//request.always(function () {
		        // Reenable the inputs
		        //$inputs.prop("disabled", false);
		 //   	});
		//
		//event.preventDefault();

    });	

    $("#cancel").click(function(){
        $(this).closest(".ui-dialog-content").dialog("close");
    });
    
    //validate form
    

//});
</script>

<script  type="text/javascript">



</script>






