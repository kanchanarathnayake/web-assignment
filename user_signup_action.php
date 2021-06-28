<html>
<?php
session_start();
?>
	<head>
		<style>
			
			#title{
				background-color:#00b300;
				font-size:33px;
				
				
				color:white;
				margin-left:20px;
				margin-top:20px;
				margin-bottom:20px;
				
				}
			ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #00b300;
			}
			
			li {
				float: right;
			}
			
			#titlehead{
				float: left;
			}

			li a {
				display: block;
				color: white;
				font-size:20px;
				text-align: center;
				padding: 16px 20px;
				margin-top:10px;
				text-decoration: none;
			}

			li a:hover:not(.active) {
				background-color: #4dff4d;
			}

			.active {
				background-color: #4dff4d;
			}
			
			#home_img{
				padding-left:50px;
				padding-bottom:10px;
				
			}
			
			#bottom_posts{
				
				display: grid;
				grid-template-columns: auto auto auto;
				padding: 10px;
			
			}
			
			#img_title{
				
				display: grid;
				grid-template-columns: auto auto auto;
				padding: 10px;
			
			}
			
			#posts{
				padding: 20px;
				font-size: 30px;
				text-align: center;
			
			}
			
			#card{
				background-color:#FFFFEF;
				margin:150px;
				height:150px:
				border-radius:5px;
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
				text-align:center;
				font-size:24px;
				padding:25px;
				margin-left:200px;
				margin-right:200px;
			}
			
			#done{
				background-color: #00b300;
				color: white;
				padding: 12px 20px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			
			}
			
		</style>
	</head>
	
	<body>
		
		
		
		<ul>
			<li id="titlehead"><p id="title">Pharmacy</p></li>
			<li style=margin-right:10px;><a href="admin_login.php">Admin</a></li>
			<li><a href="user_login.php">Pharmacist</a></li>
			<li><a class="active" href="user_login.php">User</a></li>
			<li><a href="home.php">Home</a></li>
		</ul>

<?php
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname ="pharmacydb";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "CREATE TABLE IF NOT EXISTS customer (
			customer_id VARCHAR(50) PRIMARY KEY,
			customer_name VARCHAR(50), 
			customer_password VARCHAR(50),
			customer_phone VARCHAR(50),
			customer_email VARCHAR(50)
		)";

		if ($conn->query($sql) === TRUE) {
		//echo "Table created successfully";
		} else {
		echo "Error creating table: " . $conn->error;
		}
		
		$customerid = filter_input(INPUT_GET,'customerid');
		$customername = filter_input(INPUT_GET,'name');
		$customerpass = filter_input(INPUT_GET,'pass');
		$customerphone = filter_input(INPUT_GET,'number');
		$customeremail = filter_input(INPUT_GET,'email');
		
		$sql = "SELECT * FROM customer WHERE customer_id = '$customerid'";
		$result = $conn->query($sql);

		if(mysqli_num_rows($result)>0){
			echo "<div id='card'><p>User ID Already Exists</p><form action='user_signup.php' method='get'><button type='submit' id='done'>Try Again</button></form></div>";
		}else{
			$sql = "INSERT INTO customer (customer_id, customer_name, customer_password, customer_phone, customer_email) 
			VALUES ('$customerid', '$customername', '$customerpass','$customerphone','$customeremail')";


			if ($conn->query($sql) === TRUE) {
				//echo "New record created successfully";
				$_SESSION["customer_id"] = $customerid;
				echo "<div id='card'><p>New user Successfully Added</p><form action='user_home.php' method='get'><button type='submit' id='done'>Done</button></form></div>";
					
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		$conn->close();
		
		?>
		
</body>
	
	
	


</html>