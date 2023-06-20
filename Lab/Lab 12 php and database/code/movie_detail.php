<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cinema";  
?>

<html>
<head><title>Movie Detail</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<h1>Details of Movie</h1>

		<?php
		 if(isset($_GET['movieid']))
		{
			$movid = $_GET["movieid"];
			$result = mysqli_query($conn, "select * from movie  where movie_id = '$movid'");
			$row = mysqli_fetch_assoc($result);
		
		echo "<br><b>ID</b><br>";
		echo $row["movie_id"]; 
		
		echo "<br><b>Title</b><br>";
		echo $row["movie_title"];

		echo "<br><b>Ticket Price</b><br>";
	    echo $row["movie_ticket_price"];

		echo "<br><b>Summary</b><br>";
		echo $row["movie_summary"];

		echo "<br><b>Release Date</b><br>";
		echo $row["movie_release_date"];

		 }
		?>
			
	
	</div>
	
</div>


</body>
</html>
