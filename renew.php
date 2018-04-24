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
    width: 10%;
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
    width: 12%;
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
		<li><a href="admin.php">BACK</a></li>
		<li style="float:right"><a href="logout.php">LOGOUT</a></li>
	</ul>

	<div style="padding:20px;margin-top:30px;">
	</div>
</body>
</html>



<?php
	
	session_start();	
	
	$username=$_SESSION['username_ori'];
	$today=time();
	
	$conn=mysqli_connect("localhost","root","","mysql");
	
		if($conn){
			$sql="select*from login where renew_date < $today and role='customer'";
			$search=mysqli_query($conn,$sql);
			
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
	
?>