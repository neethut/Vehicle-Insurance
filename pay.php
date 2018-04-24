<html>
<head>
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
		background-color: blue;
		color:red;
	}

	li a.active{
		background-color: blue;
		color:white;
	}

	.active{
		background-color: blue;
	}
input[type=submit] {
    width: 60%;
    background-color: blue;
    color: white;
    padding: 12px 5px;
    margin: 5px 15px;
    border: none;
    border-radius: 2px;
    cursor: pointer;
}
.box{
	padding:30px;
}
.box1 {
    display: block;
    padding: 20px;
    margin-bottom: 50px;
     margin:10px 10px 10px 10px;

    
}

.box2 {
    display: block;
    padding: 10px;
   
}

input[type=submit]:hover {
    background-color: blue;
}
body
{
	background: url(58542340effa27e4941369bd76c70e15.jpg) no-repeat center center 		fixed; 
  		-webkit-background-size: cover;
  		-moz-background-size: cover;
  		-o-background-size: cover;
  		background-size: cover;	
		background-repeat: repeat-y;
}
h2 {
    color:blue;
}
</style>
</head>
	<body>
		<ul>
		
		<li style="float:right"class="active"><a href="logout.php"><b>LOGOUT</b></a></li>
		<li style="float:left"><a href="details.php"><b>BACK</b></a></li>
		</ul>
		<form action="pay.php" method="POST">
			<div class="box">
			<h2 align="center" >Welcome To Secure Payment!!!</h2>
			<table align="center">
			<div class="box1" align="center">
				<tr><td>Select No of Years:
					<td><select name="names">
							<option value=1>1</option>
							<option value=2>2</option>
							<option value=3>3</option>
						</select>
				</tr>
				</div>

				<div class="box2" align="center">
						
				<tr><b><td><input type="submit" name="pay" value="Pay"></b>
				</div>
			</table>
		</form>
	</body>
</html>

<?php
	session_start();
	
	$renew_date=$_SESSION['renew_date'];
	$buy_date=$_SESSION['buy_date'];
	$username=$_SESSION['username_ori'];
	$today=time();
	
	$conn=mysqli_connect("localhost","root","","mysql");
	
		if($conn){
			if($renew_date>$today){
				echo"<h2 align =center>You Have Time To Renew</h2>";
			}
			else{
				if(isset($_POST['pay'])){
					$year=$_POST["names"];
					
					$sql="select * from insurance_scheme where year=$year";
					$search=mysqli_query($conn,$sql);
					
					$multiply=$_POST["names"];
					$new_renew_date=strtotime("+$multiply years",$renew_date);
					
					$sql2="update login set renew_date='$new_renew_date' where username='$username'";
					$search2=mysqli_query($conn,$sql2);
					
					while($row=mysqli_fetch_array($search)){
						echo"amount to be paid" .$row["rs"];
					}
				}
			}
		}
?>