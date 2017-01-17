    
<?php
     
    require_once("dbconnect_customers.php") ;
    //
    try {
        
        $dataDB = db::getInstance()->query('SELECT customernumber, customername, city, state FROM customers ');
        
    } catch(PDOException $ex) {
         echo "An Error occured! <br>"; //user friendly message
         echo $ex->getMessage();
         
    }
    
    //echo 'good';
     
?>


<!DOCTYPE html> 
<html language='en'>
    <head>
        
        <meta charset="utf-8" />
        <title>lee's test web page</title>
        <!--<img src="/tstweb/images/ajax-loader.gif" id="imgLoader" style="display:none;" />-->
        <!-- include you jquery ui theme -->
        <script src="/js/jquery-2.1.3.min.js"></script>
        <script src="/tstweb/js/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/tstweb/js/jquery-ui.css" >
        <script type="text/javascript" >
          function popWindow(acton, dbid){
            //alert("hi");
            var winpop = window.open("mgr_clientdb.html?act="+acton+"&dbids="+dbid ,"_blank","width=500, height=300");
            winpop.focus();
          }
        

        </script>
         
        <!-- you can have your own style -->
        <style>
          body {
              font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
              font-size: .8em;;
          }
          /* dialog div must be hidden */
          #myDialog{
              display:none;
          }    
        </style>
    </head>
    <body>
    <!--<form action="" method="" id="frmlist"> -->
    
    <div align="center">
        <div id="myDialog" title="Manage Customer Records" align="center"></div>

        <p>Customers Demo DB <?=date("Y.m.d") ?></p>
        <p><a href="#" >Add</a></p>
        
        <table id="grid" cellpadding="0" cellspacing="0" border="0"> 
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th>Customer Name</th>
                <th>&nbsp;</th>
                <th>City</th>
                <th>&nbsp;</th>
                <th>State</th>
                <th>&nbsp;</th>
                <th>Action</th>
                <th colspan="6">&nbsp;</th>
              </tr>

            </thead>
            <div id="gridTble">
              <?php foreach ($dataDB as $row): 

                    echo '<tr>';
                    echo '<td>&nbsp;</td>';
                    echo '<td>';
                    echo $row['customername']. '</td>';
                    echo '<td>&nbsp;</td>';
                    echo '<td>';
                    echo $row['city']. '</td>';
                    echo '<td>&nbsp;</td>';
                    echo '<td>';
                    echo $row['state']. '</td>';
                    echo '<td>&nbsp;</td>';
                    echo "<td >";
                    echo "<a href='#".$row['customernumber']."'>Edit<a/>";
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
                  endforeach; ?>

           </div>  
        </table>


    </div>   
    
    <!--</form> -->

    <script type="text/javascript">
          $(document).ready(function(){
            $("#grid tr:even").css("background-color", "#dedede");
            $("#grid tr:odd").css("background-color", "#ffffff");
          });
    </script>
    
    
    <script  type="text/javascript">
      // show the dialog on click of a button
      $("a").click(function(event){
        event.preventDefault();
        var faction = $(this).text();
        faction = faction.toLowerCase();
        faction = faction.trim();
        //alert(faction);
        //
        var href = $(this).attr("href");
        var sstr = href.substr(1); 
        //alert(sstr);
        if((faction ==="add") || (faction ==="edit") || (faction ==="delete") || (faction ==="view")){
          $("div#myDialog").load("mgr_form_customers.php?custact="+sstr+"|"+faction).dialog({
          //$("div#myDialog").load("mgr_form.php", {'choices[]': [href, faction] }).dialog({
              modal: true,
              height: 600,
              closeOnEscape: true,
              draggable: false,
              //buttons: { "Close": function() { $(this).dialog('close'); } },
              width: 600 , 
              //close: function(ev, ui){
               //$(this).dialog("destroy"); },
              //'Cancel': function() {
              //            $(this).dialog('close');
              //      }

            });
          //
        } else {  alert("i should not be here."); }
         //
       });
       

    </script>

    <script  type="text/javascript">
      $("#Cancel").click(function(){
            $(this).closest(".ui-dialog-content").dialog("close");
        });
        
    </script>
    </body>


</html>