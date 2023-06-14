<!DOCTYPE html>
<html>

<head><title>Lab 11</title>
</head>

<body>

<h3><u>ASTRO BILL STATEMENT</u></h3>

	<form name="subscribefrm" method="post" action="" >
	
		<p>Additional Channels : 
			<br><input type="checkbox" name="channel[]" value="Sports">Sports
			<br><input type="checkbox" name="channel[]" value="Movie">Movie
			<br><input type="checkbox" name="channel[]" value="Kids">Kids 
		</p>
		
		<p>
			Bill Type:
			<input type="radio" name="billtype" value="Email" /> Email
			<input type="radio" name="billtype" value="Post" /> Post
		</p>
	
		<p>	<input type="submit" name="billbtn" value="Send" ></p>
	
	</form>

<?php
if(isset($_POST["billbtn"])){ //check if the "send" button is clicked
	$channels = isset($_POST["channel"]) ? $_POST["channel"] : []; //Get the selected channels 
	$billType = isset($_POST["billtype"]) ? $_POST["billtype"] : ""; // Get the selectec bill type

	$extraCharge = 0; //initialize the extra charge 

	if ($billType === "Post"){
		$extraCharge = 3.00; //Set the extra charge for "Post" bill type
	}

	$totalCost = 0; //Initialize the total cost 

	foreach ($channels as $channel){
		switch ($channel){
			case "Sports": 
			echo "Sports (RM " . number_format(25.00, 2) . ")<br>"; // Add the cost of Sports channel 2 decimal places 
			$totalCost += 25.00; // Add the cost of Sports channel
            break;

			case "Movie":
			echo "Movie (RM " . number_format(40.00, 2) . ")<br>"; // Add the cost of Movie channel 2 decimal places
			$totalCost += 40.00; // Add the cost of Movie channel
			break; 

			case "Kids":
			echo "Kids (RM " . number_format(16.00, 2) . ")<br>"; // Add the cost of Kids channel 2 decimal places
			$totalCost += 16.00; // Add the cost of Kids channel
			break; 
		}
	}

	$sstRate = 0.06; //6% sst rate
	$sstAmount = $totalCost * $sstRate; //Calculate SST amount 
	$totalBill = $totalCost + $extraCharge + $sstAmount; // calculate the total 

//Ouput part 

echo "<h3>Bill Statement</h3>"; // Print the heading for the bill statement section.
	echo "Your Subscription:<br>"; // Print the label indicating the start of the subscription section.
	foreach ($channels as $channel) { // Iterate over the selected channels.
		switch ($channel) {
			case "Sports":
				echo "Sports (RM " . number_format(25.00, 2) . ")<br>"; // Print the name and price of the Sports channel.
				break;
			case "Movie":
				echo "Movie (RM " . number_format(40.00, 2) . ")<br>"; // Print the name and price of the Movie channel.
				break;
			case "Kids":
				echo "Kids (RM " . number_format(16.00, 2) . ")<br>"; // Print the name and price of the Kids channel.
				break;
		}
	}
	echo "<br>"; //line break 
	echo "Bill Cost: RM " . number_format($totalCost, 2) . "<br>"; //display bill cost
	echo "Total: RM " . number_format($totalCost, 2) . "<br>"; //display total 
	echo "SST: RM " . number_format($sstAmount, 2) . "<br>"; //display sst
	echo "Bill: RM " . number_format($totalBill, 2) . "<br>"; //display bill 

}

?>

</body>
</html>