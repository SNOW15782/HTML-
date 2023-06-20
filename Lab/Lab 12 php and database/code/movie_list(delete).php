<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cinema";

// Create a database connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<html>
<head><title>Movie List</title>
<link href="design.css" type="text/css" rel="stylesheet" />

<script type="text/javascript">
// Create a JavaScript function named confirmation()
function confirmation(movieId) {
    if (confirm("Are you sure you want to delete this movie?")) {
        // If the user confirms, redirect to the same page to delete the record
        window.location.href = "movie_list(delete).php?delete_id=" + movieId;
    }
}
</script>

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
            // Retrieve movie records from the database
            $sql = "SELECT * FROM movies";
            $result = $conn->query($sql);

            // Check if any records exist
            $count = $result->num_rows;

            // Generate table rows for each movie record
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["movie_id"]."</td>";
                echo "<td>".$row["movie_title"]."</td>";
                echo "<td>".$row["ticket_price"]."</td>";
                echo "<td><a href='javascript:confirmation(".$row["movie_id"].")'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>

        <p> Number of records: <?php echo $count; ?></p>

    </div>
    
</div>

</body>
</html>

<?php
// Check if the delete_id parameter is set in the URL
if (isset($_GET['delete_id'])) {
    // Retrieve the movie ID to be deleted
    $deleteId = $_GET['delete_id'];

    // Delete the chosen record from the database
    $deleteSql = "DELETE FROM movies WHERE movie_id = $deleteId";
    if ($conn->query($deleteSql) === TRUE) {
        // Deletion successful, refresh the page
        header("Location: movie_list(delete).php");
        exit();
    } else {
        echo "Error deleting movie: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
