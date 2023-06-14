<!DOCTYPE html>
<html>

<head><title>Lab 11</title></head>

<body>

<form name="convertfrm" method="get" action="">

<p>Enter the measurement in kilometer : <input type="text" name="kilometer"></p>
<p>Choose a unit to convert : 
	<input type="radio" name="unit" value="Miles"> Miles 
	<input type="radio" name="unit" value="Yards"> Yards
	<input type="radio" name="unit" value="Inch"> Inch
</p>
<p><input type="submit" name="convertbtn" value="Convert Value"></p>

</form>

<?php
define("MILE_RATE", 0.621371); 
define("YARD_RATE", 1093.61); 
define("INCH_RATE", 39370.1); 

//when convert value click 
if(isset($_GET["convertbtn"])){ //check if the "convert Value" button is clicked
	$kilometer = $_GET["kilometer"]; //Get the kilometer value from the form
	$unit = $_GET["unit"]; //Get the selected unit from the form
	$result = 0; 

	switch($unit){
		case "Miles":
			$result = $kilometer*MILE_RATE;
			break;

		case "Yards":
			$result = $kilometer*YARD_RATE;
			break; 

		case "Inch":
			$result = $kilometer*INCH_RATE;
			break;
	}
	//optional to put 2 decimal places 

	//$result = number_format($result,2);
	//ouput
	echo "<script> alert ('The converted value is: $result'); </script>"; 
}

?>



</body>
</html>