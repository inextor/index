<a href="/phpmyadmin">PhpMyadmin</a>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "asdf";
$dbname = "_registro_pos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM store WHERE status = 'ACTIVE' OR status = 'UNLISTED' ORDER BY storename";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	// output data of each row
	while($row = $result->fetch_object()) 
	{
		echo '<divv><a href="http://127.0.0.' . $row->id.':4000" style="margin-top:20px;font-size:20px">' . $row->storename.'</a><div>';
	}
}
else 
{
	echo "0 results";
}
$conn->close();
