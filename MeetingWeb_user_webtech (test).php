<html>
<head>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 50%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: center;
			padding: 8px;
			width: 10%;
		}
	
		tr:nth-child(even) {
			background-color: #dddddd;
		}
		.icon{
			width: 20%;
			height: auto;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<?php
		$servername = "webservhost";
		$username = "ite60010308_mart";
		$password = "mart2541308";
		$dbname = "ite60010308_martd";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		
		function displayRow($name,$date,$time,$place,$host,$meetcon){
			if($meetcon==1){
				echo "<tr><td></td><td></td><td>".$name."</td><td>".$date."</td><td>".$time."</td><td>".$place."</td><td>".$host."</td></tr>";
				return false;
			}
			elseif($meetcon==0){
				return true;
			}
		}
		
		$sqlSelect = "SELECT meetID, name, date, time, place, host, meetcon FROM meeting";
		$resultSelect = mysqli_query($conn, $sqlSelect);
		echo "<table><tr><th>Confirm</th><th>Ignore</th><th>Name</th><th>Date</th><th>Time</th><th>Place</th><th>Host</th>";
		if (mysqli_num_rows($resultSelect) > 0) {
			// output data of each row
			while($rowA = mysqli_fetch_assoc($resultSelect)) {
					if(displayRow($rowA["name"],$rowA["date"],$rowA["time"],$rowA["place"],$rowA["host"],$rowA["meetcon"])==true){
						$ID = $rowA["meetID"];
						echo "<tr>
						<td><a href=\"./updateCorrect.php?meetID=$ID\" onClick=\"return confirm('Are you sure to CONFIRM?');\" action><img src=\"correct icon.png\" class=\"icon\"></a></td>
						<td><a href=\"./updateWrong.php?meetID=$ID\" onClick=\"return confirm('Are you sure to IGNORE?');\"><img src=\"wrong icon.png\" class=\"icon\"></a></td>
						<td>".$rowA["name"]."</td><td>".$rowA["date"]."</td><td>".$rowA["time"]."</td><td>".$rowA["place"]."</td><td>".$rowA["host"]."</td></tr>";
					}
			}
			echo "</table>";
		} 
		else {
			echo "0 results";
		}

		mysqli_close($conn);
	?> 
</body>
</html>