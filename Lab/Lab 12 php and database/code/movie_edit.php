<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cinema";
?>

<html>
<head><title>Edit a Movie</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<?php
		if(isset($_GET["movie_id"]))
		{
			$movieId = $_GET["movie_id"];

			$conn = new mysqli($host, $user, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT * FROM movies WHERE movie_id = $movieId";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
		?>
		
		<h1>Edit a Movie</h1>

		<form name="editfrm" method="post" action="">

			<input type="hidden" name="movie_id" value="<?php echo $row['movie_id']; ?>">

			<p>Title:<input type="text" name="mov_title" size="80" value="<?php echo $row['movie_title']; ?>"></p>
		 
			<p>Ticket Price:<input type="text" name="mov_price" size="10" value="<?php echo $row['ticket_price']; ?>"></p>
			
			<p>Summary:<textarea cols="60" rows="4" name="mov_summary"><?php echo $row['movie_summary']; ?></textarea></p>

			<p>Release Date:<input type="date" name="mov_release" value="<?php echo $row['release_date']; ?>"></p>
			
			<p><input type="submit" name="savebtn" value="UPDATE MOVIE"></p>

		</form>
	    <?php 
		}
		  }
		?>
	</div>
	
</div>


</body>
</html>

<?php
// Check if the savebtn parameter is set in the POST request
if(isset($_POST["savebtn"]))
{
    // Retrieve the form data
    $movieId = $_POST["movie_id"];
    $title = $_POST["mov_title"];
    $price = $_POST["mov_price"];
    $summary = $_POST["mov_summary"];
    $releaseDate = $_POST["mov_release"];

    // Create a database connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the movie record in the database
    $sql = "UPDATE movies SET movie_title='$title', ticket_price='$price', movie_summary='$summary', release_date='$releaseDate' WHERE movie_id=$movieId";
    if ($conn->query($sql) === TRUE) {
        // Update successful, redirect back to the movie_list(edit).php page
        header("Location: movie_list(edit).php");
        exit();
    } else {
        echo "Error updating movie: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
