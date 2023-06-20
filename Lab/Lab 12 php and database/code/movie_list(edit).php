<?php include(".............."); ?>

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
				<th colspan="2">Action</th>
			</tr>
			<!--can copy paste the code from movie_list(view_details).php and add on edit hyperlink-->
			
		</table>


		<p> Number of records : <?php echo $count; ?></p>

	</div>
	
</div>


</body>
</html>

