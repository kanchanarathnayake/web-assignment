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
			
			* {
				box-sizing: border-box;
			}

			input[type=text], select, textarea,input[type=password],input[type=email],input[type=number],input[type=date] {
				margin-right:400px;
				text-align:center;
				width: 40%;
				padding: 12px;
				border: 1px solid #ccc;
				border-radius: 4px;
				resize: vertical;
			}

			label {
				font-size:18px;
				margin-left:450px;
				padding: 12px 12px 12px 0;
				display: inline-block;
			}

			input[type=submit] {
				background-color: #00b300;
				color: white;
				padding: 12px 20px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
				float: right;
			}

			input[type=submit]:hover {
				background-color: #4dff4d;
			}

			.container {
			    
				border-radius: 5px;
				background-color: #ffffff;
				padding: 20px;
			}

			.col-25 {
				float: left;
				width: 50%;
				margin-top: 6px;
			}

			.col-75 {
				float: left;
				width: 50%;
				margin-top: 6px;
			}

			/* Clear floats after the columns */
			.row:after {
				content: "";
				display: table;
				clear: both;
			}

			/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
			@media screen and (max-width: 600px) {
				.col-25, .col-75, input[type=submit] {
					width: 100%;
					margin-top: 0;
				}
			}
			
			
		</style>
	</head>
	
	<body>
		
	<?php
        if($_SESSION["pharmacistid"] === ""){
          echo $_SESSION['pharmacistid'];
          echo "login";
          header("Location:home.php");
        }
      ?>
		
		<ul>
			<li id="titlehead"><p id="title">Mega Pharma Pvt(Ltd)</p></li>
			<li style=margin-right:10px;><a href="pharmacist_logout.php">Logout</a></li>
			<li><a class="active" href="pharmacist_home.php">Customer</a></li>
		</ul>
		
		
		
		
		<h2 style="font-style:italic; font-size:30px;padding-left:30px;">Update Medicine</h2>
		
		<div style="text-align:center;"> <img src="image\medicine.png">  </div>
		
		<div class="container">
			<form action="update_inventory_action.php" method = "get">
				
				<div class="row">
					<div class="col-25">
						<label for="lname">Medicine Name</label>
					</div>
					<div class="col-75">
						<input type="text" pattern=".{1,}" required name="name" placeholder="Enter Medicine Name...">
					</div>
				</div>
				
				<div class="row">
					<div class="col-25">
						<label for="lname">Quantity</label>
					</div>
					<div class="col-75">
						<input type="text" pattern=".{1,}" required name="qty" placeholder=" Quantity...">
					</div>
				</div>
				
				
				
				<div class="row">
					<input type="submit" style="margin-right:600px; margin-top:10px;" value="Update">
				</div>
			</form>
			
			
			
		</div>
		
		
		
		
	</body>
	
	
	


</html>