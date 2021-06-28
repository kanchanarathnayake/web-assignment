<html>
<?php
// Start the session
session_start();
?>
	<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
			<li id="titlehead"><p id="title">Megha Phama Pvt (Ltd)</p></li>
			<li style=margin-right:10px;><a href="pharmacist_logout.php">Logout</a></li>
			<li><a class="active" href="sales_home.php">Sales Officer</a></li>
		</ul>

        <div class="container">
<div class="row">

<div class="col-md-6 mx-auto">
<div class="jumbotron p-2 mt-4">
    <h3Megha Phama Pvt(Ltd)</h3>
    <p align="center">
      Mega Phma Pvt(Ltd)<br>
      Month Wise Total Sale Summary
    </p>
</div>
		
	<?php
        if($_SESSION["salesid"] === ""){
          echo $_SESSION['salesid'];
          echo "login";
          header("Location: home.php ");
        }
      ?>
		
		
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
		  
          $sql = "SELECT 
MONTHNAME(purchase_date) as mname, 
sum(Total) as total
FROM purchase Where Type='Confirm'
GROUP BY MONTH(purchase_date)";
//execute sql
$result = $conn->query($sql);
?>
<table class="table table-striped">
<tr>
   <th>Month</th>
   <th>Total</th>
</tr>
    <?php while ($row = $result->fetch_object()):
    ?> 

<tr>
    <td><?php echo $row->mname; ?></td>
    <td><?php echo $row->total; ?></td>
</tr>

<?php endwhile; 
    $conn->close();
    
    ?>





		
                                
                               
		
		
		
    </table>
    </div>

</div>
</div>
		
</body>
	
	
	


</html>