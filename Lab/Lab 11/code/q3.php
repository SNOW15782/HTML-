<!DOCTYPE html>
<html>
<head><title>Lab 11</title></head>
<body>

<form name="frm" action="" method="post">

<p>Brand : 
<select name = "tbrand">
	<option value = "Nike">Nike (RM 30.00)</option>
	<option value = "Adidas">Adidas (RM 25.00)</option>
</select>
<p>Size : 	<input type="radio" name="tsize" value = "Small">Small (Extra RM 5.00)
            <input type="radio" name="tsize" value = "Large">Large (Extra RM 10.00)
            <input type="radio" name="tsize" value = "Extra Large">Extra Large (Extra RM 15.00)

<p><input type="submit" name="sendbtn" value="Calculate"></p>


<?php
//if isset get/post["select"];
if (isset($_POST["sendbtn"])){ // Check if the "Calculate" button is clicked

    $brand = $_POST["tbrand"]; //retreive the value of the brand from the form
    $size = $_POST["tsize"]; // retreive the value of the size from the form 

    function get_price($brand){
        switch($brand){
            case "Nike":
             return 30.00;    // Return the price of Nike

            case "Adidas":
                return 25.00; // Return the price of Adidas
        }
    }

function get_extra($size){ //this function give the price of the size price

    if ($size === "Small"){
        return 5.00; // Return the extra charge for small size
    }
    elseif ($size === "Large"){
        return 10.00; // Return the extra charge for large size
    }
    elseif ($size === "Extra Large"){
        return 15.00; // Return the extra charge for extra large size
    }
}

function getSizeName($size) { //this fucntion give the display of the size chosen
    switch ($size) {
        case "Small":
            return "Small"; // Return the name for small size
        case "Large":
            return "Large"; // Return the name for large size
        case "Extra Large": // Return the name for extra large size
            return "Extra Large";
    }
}
function display($brand, $size, $price, $bill){ //This function display the receipt
    $sizeName = getSizeName($size); 

    echo "<h3>Receipt</h3>"; 
    echo "Brand: $brand<br>"; // Display the selected brand
    echo "Price: $$price<br>"; // Display the price
    echo "Size: $sizeName<br>"; // Display the name of the size
    echo "Bill: $$bill<br>"; // Display the total bill

}
	$price = get_price($brand); // Get the price based on the selected brand
    $extra = get_extra($size); // Get the extra charge based on the selected size
    $bill = $price + $extra; // Calculate the total bill
	
    display($brand, $size, $price, $bill); // Display the receipt
}

?>



</form>
</body>
</html>
