<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cinema"; 

$conn = mysqli_connect($host, $user, $password, $dbname);
?>

<html>
<head><title>Movie List</title>
<link href="design.css" type="text/css" rel="stylesheet" />


</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<h1>List of Movies</h1>

		<table border="1">
			<tr>
				<th>Movie ID</th>
				<th>Movie Title</th>
				<th>Movie Ticket Price</th>
				<th colspan="3">Action</th>
			</tr>
			
			<?php

			$result = mysqli_query($conn, "SELECT * FROM movie");	
			$count = mysqli_num_rows($result);//used to count number of rows
			
			while($row = mysqli_fetch_assoc($result))
			{
			
			?>			

			<tr>
				<td><?php echo $row ['movie_id']?></td>
				<td><?php echo $row ['movie_title']?></td>
				<td><?php echo $row ['movie_ticket_price']?></td>
				<td><a href = "movie_detail.php?movieid=<?php echo $row['movie_id']; ?>"> More Details</a></td>
				
			</tr>
			<?php
			
			}
			
			?>
		</table>


		<p> Number of records : <?php echo $count; ?></p>

	</div>
	
</div>


</body>
</html>

