<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html height="100%">
<head>
 
    <title>Fetch Data From ThingSpeak</title>
    <script type="text/javascript" src="jquery-1.12.1.min.js"></script>
    <script type="text/javascript">
	var f1,f2,f3;
        $(document).ready(function ()
        {
            GetData1();
        });
		
		$(document).ready(function ()
        {
            GetData2();
        });
		
		$(document).ready(function ()
        {
            GetData3();
        });
        function GetData1()
        {
            var url = 'https://api.thingspeak.com/channels/1021106/feeds.json?key=B3FL0KXTD9WPSNB0&results=1';
            $.ajax
            ({
                url: url,
                type: 'GET',
                contentType: "application/json",
                //dataType: "json",
                //crossDomain: true,
                success: function (data, textStatus, xhr) {
                    $.each(data, function (i, item) {
                        if (i == 'feeds') {
                            var ubound = item.length;
							//document.write(ubound);
                            $('#txtField1').val(item[ubound - 1].field1);
							 f1=item[ubound - 1].field1
							//document.write(f1);
							//document.write(",");
							
                        }
                    });
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
			
            setTimeout(GetData1, 1000);
        }
	
		
		 function GetData2()
        {
            var url = 'https://api.thingspeak.com/channels/1021106/feeds.json?key=B3FL0KXTD9WPSNB0&results=1';
            $.ajax
            ({
                url: url,
                type: 'GET',
                contentType: "application/json",
                //dataType: "json",
                //crossDomain: true,
                success: function (data, textStatus, xhr) {
                    $.each(data, function (i, item) {
                        if (i == 'feeds') {
                            var ubound = item.length;
							//document.write(ubound);
                            $('#txtField2').val(item[ubound - 1].field2);
							 f2=item[ubound - 1].field2
						//	document.write(f2);
						//	document.write(",");
                        }
                    });
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });

            setTimeout(GetData2, 1000);
        }
		
		 function GetData3()
        {
            var url = 'https://api.thingspeak.com/channels/1021106/feeds.json?key=B3FL0KXTD9WPSNB0&results=1';
            $.ajax
            ({
                url: url,
                type: 'GET',
                contentType: "application/json",
                //dataType: "json",
                //crossDomain: true,
                success: function (data, textStatus, xhr) {
                    $.each(data, function (i, item) {
                        if (i == 'feeds') {
                            var ubound = item.length;
							//document.write(ubound);
							$('#txtField3').val(item[ubound - 1].field3);
							 f3=item[ubound - 1].field3
							//document.write(f3);
							//document.write("<br>");
							
                        }
                    });
					
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });

            setTimeout(GetData3, 1000);
			
        }
		
	

    </script>
	
	<?php  echo '<script> console.log(f1);;</script>';?>
</head>
<body height="100%">
<form method="POST" action="things.php">
    <table width="100%" height="100%" border="1" class="MGVTable">
<tr height="5%">
            <td style="background: #F0F0F0">
                Data fetched from ThingSpeak every 10 seconds
            </td>
        </tr>
<tr height="95%">
            <td>
                <table width="100%" height="100%" border="1" style="border-collapse: collapse; border: 1px solid #CDCDCD;">
<tr>
                        <td width="20%" valign="top">
                            
                        </td>
                        <td width="80%" valign="top">
                            <table>
<tr><td>Field 1:</td><td><input id="txtField1" type="text" name="f11" /></td><td></td></tr>
<tr><td>Field 2:</td><td><input id="txtField2" type="text" name="f22"/></td><td></td></tr>
<tr><td>Field 3:</td><td><input id="txtField3" type="text" name="f33"/></td><td></td></tr>



</table>
</td>
                    </tr>
</table>
</td>
        </tr>
</table>
</form>
<meta http-equiv="refresh" content="5" />
</body>

</html>
<?php 
/*$d1=$_POST['f11'];
echo $d1;
echo "<br>";
$d2=$_POST['f22'];
echo $d2;
echo "<br>";
$d3=$_POST['f33'];
echo $d3;

 <TR>
    <TD></TD>
    <TD><INPUT TYPE="SUBMIT"></TD>
    </TR>
	*/
?>