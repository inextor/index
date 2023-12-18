<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
		<style>
			.float-right{ float: right }
			a.float-right{ float: right; width:200px;}
		</style>
	</head>
	<body>
		<div class="m-3 card">
			<ul class="list-group">
				<li class="list-group-item">
					<a href="/phpmyadmin">PhpMyadmin</a>
				</li>
				<?php
					$servername = "127.0.0.1";
					$username = "root";
					$password = "asdf";
					$dbname = "_registro_pos";
	
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error)
					{
						die("Connection failed: " . $conn->connect_error);
					}
	
					// $sql = "SELECT * FROM store WHERE status = 'ACTIVE' OR status = 'UNLISTED' ORDER BY storename";
					$sql = "SELECT * FROM store WHERE status IN('ACTIVE','UNLISTED') ORDER BY storename";
					$result = $conn->query($sql);
	
					if ($result->num_rows > 0)
					{
						// output data of each row
						while($row = $result->fetch_object())
						{
							?>
								<li class="list-group-item">
									<?php echo '<a href="http://127.0.0.'.$row->id.':4000">'.$row->storename.'</a>';?>
									<?php echo '<a href="http://127.0.0.'.$row->id.':4001" class="btn btn-primary float-right">POS:4001</a>';?>
								</li>
							<?php
						}
					}
					else
					{
						echo "0 results";
					}
					$conn->close();
				?>
			</ul>
		</div>
	</body>
</html>
