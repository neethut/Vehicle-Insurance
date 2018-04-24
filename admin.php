<html>
<head>
	<title></title>
	<style type="text/css">

	ul{
		list-style-type: none;
		margin: 0;
		padding: 0;
		width: 100%;
	
		overflow: auto;
		position: fixed;
		background-color: grey;
		top: 0;

	}

	li{
		float: left;
		border-right: 1px solid #bbb;
	}

	li a{
		display: block;
		color: white;
		text-align: center;
		padding: 10px;
	}

	li a:hover{
		background-color: black;
		color:red;
	}

	li a.active{
		background-color: #555;
		color:white;
	}

	.active{
		background-color: blue;
	}

	li:last-child {
    border-right: none;
	}
	input[type=submit] {
    width: 80%;
    background-color: blue;
    color: white;
    padding: 12px 5px;
    margin:  ;
    border: none;
    border-radius: 7px;
    cursor: pointer;
	display:inline;
	}
	select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
	
	body
{
	background: url(14550531_867944169972428_66839806_o.jpg) no-repeat center center 		fixed; 
  		-webkit-background-size: cover;
  		-moz-background-size: cover;
  		-o-background-size: cover;
  		background-size: cover;	
		background-repeat: repeat-y;
}
.box1 {
    display: block;
    padding: 4px;
    margin-bottom: 30px;
    text-align: center;
}

.box2 {
    
    padding: 2px;
    text-align: center;
}

	</style>
</head>

	<body>
		<ul>
		<li><a href="home.html">HOME</a></li>
		<li style="float:right"><a href="logout.php">LOGOUT</a></li>
	</ul>

	<div style="padding:20px;margin-top:30px;">
	
		<form method="POST">
		<div class="box1"align="center">
			<table>
				<tr><td>Select Option:
					<td><select name="choose">
							<option value="customers">Customer Details
							<option value="renew">To be renewed
						</select>
						</div>
				</tr>
				
				<div class="box2">
				<tr><td><input type="submit" value="Proceed" name="proceed">
				</div>
			</table>
		</form>
		
	</body>
	
<html>


<?php
	
	session_start();
	
	
		$conn=mysqli_connect("localhost","root","","mysql");
		if($conn){
			$sql="select*from login where role='customer'";
			$search=mysqli_query($conn,$sql);
			
			if(isset($_POST['proceed'])){
				$str1=$_POST['choose'];
				$x=strcmp($str1,"customers");
				if(!$x){
					echo"<table align=center cellspacing=30>";
					echo"<h3 align=center>CUSTOMER's INFORMATION";
					echo"<caption><b>USERNAMES</b></caption>";
					
					while($row=mysqli_fetch_array($search)){
						$user=$row['username'];
						
						echo"<tr>" ;
						echo"<td>" .strtoupper($row["username"]);
						echo"<td>";
						
						echo"<a href= ' customers.php?get_id=$user' >Show </a>";	
					}
					
					echo"</table>";
					
				}
				else{
					echo "<script>window.open('renew.php','_self')</script>";
				
				}
				
				
			}	
		}	
	

?>