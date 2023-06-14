<!DOCTYPE html>
<html>

<head><title>Lab 11</title></head>

<body>

<form name="addfrm" method="post" action="">

<p>Enter a number : <input type="text" name="num"></p>
<p><input type="submit" name="addbtn" value="Add All Number">
   <input type="submit" name="mulbtn" value="Multiply All Number">
</p>

</form>
<?php

if (isset($_POST["addbtn"]))//if user click add all number
{
	$num = $_POST ["num"]; //retrieve the value entered by the user
   $sum = 0; //initialize the variable

   //for loop 
   for ($i = 1; $i <= $num; $i++){ //Loop from 1 to the netered number
      $sum += $i; //add the current number to the sum
   }

   //Display the sum 
   echo "The total of all numbers is : $sum";
	
}

if (isset($_POST["mulbtn"]))//if user click multiply all number
{
	$num = $_POST ["num"]; //retrieve the value entered by the user
   $mul = 1; //initialize the variable 
   $i = 1; //initialize a counter variable

   //while loop 
   while ($i <= $num){
      $mul *= $i; //loop while the counter is less than or equal to the entered number
      $i++; //increment 
   }
   //Display the product 
   echo "The product of all numbers is : $mul"; 


	
	
}
?>


</body>
</html>