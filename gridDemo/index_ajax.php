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

        <script>
              function showTable()
              {
              var xmlhttp;    
              
              if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
                }
              else
                {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
              xmlhttp.onreadystatechange=function()
                {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                  {
                  //document.getElementById("gridTble").innerHTML=xmlhttp.responseText;
                  $('#gridTble').html(xmlhttp.responseText);
                  }
                }
              xmlhttp.open("GET","loadtable.php",true);
              xmlhttp.send();
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
    
    <body onload="showTable()">
    <!--<form action="" method="" id="frmlist"> -->
    
    <div align="center">
        <div id="myDialog" title="Manage Griddemo Records">
          Thank you Lee for getting it right!
        </div>

        <p>Grid Demo DB <?=date("Y.m.d") ?></p>
        <p><a href="#" >Add</a></p>
        
        <table id="gridall" cellpadding="0" cellspacing="0" border="0"> 
        <thead>
              <tr>
                <th>&nbsp;</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>Gender</th>
                <th>&nbsp;</th>
                <th>Company</th>
                <th>&nbsp;</th>
                <th>Action</th>
                <th colspan="6">&nbsp;</th>
              </tr>

            </thead>
           <tbody id="gridTble">
           </tbody>  
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
          $("div#myDialog").load("mgr_form.php?ridact="+sstr+"|"+faction).dialog({
          //$("div#myDialog").load("mgr_form.php", {'choices[]': [href, faction] }).dialog({
              modal: true,
              height: 300,
              draggable: false,
              width: 400  });
          //
        } else {  alert("i should not be here."); }
         //
       });
       
    </script>
    </body>


</html>