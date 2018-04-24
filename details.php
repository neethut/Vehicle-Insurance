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
		<li><a href="home.html">HOME</a></li>
		<li style="float:right"><a href="logout.php">LOGOUT</a></li>
	</ul>

	<div style="padding:20px;margin-top:30px;">
	
	
	<form action="details.php" method="POST">
			<div class="box1"align="center">
		<b>EXPLORE:</b>
		<select name="explore">
			<option value="policy">Review Policy</option>
			<option value="pay">Pay</option>
		</select>
		</div>
		<div class="box2">
		<b><input type="submit" name="submit"></b>
		</div>

	</form>
	</div>
	</div>

</body>
</html>

<?php
	
	session_start();
	
	if($_SESSION['username_ori']){
		$conn=mysqli_connect("localhost","root","","mysql");
		if($conn){
			$username=$_SESSION['username_ori'];
			
			$sql="select * from login where username='$username'";
			$search=mysqli_query($conn,$sql);
			$username=strtoupper($username);
			
			
			if(isset($_POST['submit'])){
				$str1=$_POST['explore'];
				$x=strcmp($str1,"policy");
				
				if(!$x){
					echo"<table align=center cellspacing=30>";
					
					echo"<h3 align=center>$username's INFORMATION";
					while($row=mysqli_fetch_array($search)){
						echo"<tr><td>NAME" ;
						echo"<td>" .strtoupper($row["name"]);
				
						echo"<tr><td>VEHICLE TYPE" ;
						echo"<td>" .strtoupper($row["v_type"]);
				
						echo"<tr><td>DATE OF BUYING" ;
						echo"<td>";
						$epoch=$row["buy"];
						$_SESSION['buy_date']=$epoch;
						echo date('d/m/y', $epoch) ;
						echo"<br>";
						
						echo"<tr><td>DATE OF RENEWING" ;
						echo"<td>";
						$renew_date=$row["renew_date"];
						$_SESSION['renew_date']=$renew_date;
						echo date('d/m/y',$renew_date);
						
						echo"<tr><td>RTO NUMBER" ;
						echo"<td>" .strtoupper($row["regno"]);
						
						echo"<tr><td>MOBILE" ;
						echo"<td>" .strtoupper($row["mob"]);
						echo"<a href=update.php><img src=pencil.png style=width:15px;height:10px;border:0;>";		
					}
					
					echo"</table>";
				}
				else{
					$str2=$_POST['explore'];
					$x=strcmp($str2,"pay");
					
					while($row=mysqli_fetch_array($search)){
						$renew_date=$row["renew_date"];
						$_SESSION['renew_date']=$renew_date;
						
						$epoch=$row["buy"];
						$_SESSION['buy_date']=$epoch;
						
						echo "<script>window.open('pay.php','_self')</script>";
					}
					
				}
				
				
			}	
		}	
	}
?>