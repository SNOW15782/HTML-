<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cinema";

$conn = mysqli_connect ($host,$user,$password,$dbname);
?>

<!DOCTYPE html>
<html>
<head><title>Add New Movie</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<h1>Insert New Movie</h1>

		<form name="addfrm" method="post" action="">

			<p><label>Title:</label><input type="text" name="mov_title" size="80">
		 
			<p><label>Ticket Price:</label><input type="text" name="mov_price" size="10">
			
			<p><label>Summary:</label><textarea cols="60" rows="4" name="mov_summary"></textarea>

			<p><label>Release Date:</label><input type="date" name="mov_release">
			
			<p><input type="submit" name="savebtn" value="SAVE MOVIE">

		</form>
	
	</div>
	
</div>


</body>
</html>

<?php

if(isset($_POST["savebtn"])) 	
{
	$mtitle = $_POST["mov_title"];  	
	$mprice = $_POST["mov_price"];  	
	$msummary = $_POST["mov_summary"];  	
	$mrelease = $_POST["mov_release"];  	
	
	
	mysqli_query($conn,"INSERT INTO movie (movie_title, movie_ticket_price, movie_summary,movie_release_date)VALUES('$mtitle','$mprice','$msummary','$mrelease')");
	?>
	
		<script type="text/javascript">
			alert("<?php echo $mtitle ?> saved");
		</script>
	
	<?php
	
	
}

?>

