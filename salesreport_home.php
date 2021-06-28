<html>
<?php
// Start the session
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
			
			.grid-container {
				display: grid;
				grid-template-columns: auto auto;
				grid-gap: 20px;
				padding: 10px;
			}
			
			.btn{
				background-color: white;
				border: none;
				color: #424242;
				padding-top:7px;
				text-align: center;
				margin-bottom:0px;
				
				font-size: 20px;
			}
			
			.btn:hover{
				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
			}
			
		</style>
	</head>
	
	<body>
		
	<?php
        if($_SESSION["salesid"] === ""){
          echo $_SESSION['salesid'];
          echo "login";
          header("Location: home.php ");
        }
      ?>
		
		<ul>
			<li id="titlehead"><p id="title">Megh  a Pharma Pvt(Ltd)</p></li>
			<li style=margin-right:10px;><a href="pharmacist_logout.php">Logout</a></li>
			<li><a class="active" href="pharmacist.php">Sales Officer</a></li>
			</ul>
		
		
		<h2 style="font-style:italic; font-size:35px;padding-left:30px;">Sales Report Dashboard</h2>
		
		
		<div class="grid-container">
			<div style="text-align:right;"><img src="image\view.png"></div>  
			<div ><button type="button" class="btn" onclick="location.href='sale_report_action.php'">Daily Sale Report</button></div>
			<div style="text-align:right;"><img src="image\viewe.png"></div>  
			<div ><button type="button" class="btn" onclick="location.href='view_stock.php'">Monthly Sale Report</button></div>
			<div style="text-align:right;"><img src="image\userm.png"></div>  
			<div ><button type="button" class="btn" onclick="location.href='view_puser.php'">Customerwise Report</button></div>
            <div style="text-align:right;"><img src="image\view.png"></div>
			<div><button type="button" class="btn" onclick="location.href='update_inventory.php'">Drug wise Report</button></div>
		</div>
		
		
		
		
		
	</body>
	
	
	


</html>