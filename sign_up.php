<html>
<head>
	<title></title>
	<style type="text/css">
		ul{
		list-style-type: none;
		margin: 0;
		padding: 0;
		width: 100%;
		text-align: right;
		overflow: auto;
		position: fixed;
		background-color: grey;
		top: 0;

	}
	select: hover
{
width: 200px;
height: 29px;
border-radius: 3px;
border: 1px solid #CCC;
font-weight: 200;
font-size: 15px;
font-family: Verdana;
box-shadow: 1px 1px 5px #CCC;
}

/*CSS for input textbox and password*/

input[type='text'], input[type='password']
{
width: 200px;
height: 29px;
border-radius: 3px;
border: 1px solid #CCC;
padding: 8px;
font-weight: 200;
font-size: 15px;
font-family: Verdana;
box-shadow: 1px 1px 5px #CCC;
}
	li{
		float: left;
		border-right: 1px solid #bbb;
	}

	li a{
		display: block;
		color: white;
		text-align: right;
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
	.login-page {
  		width: 360px;
  		padding: 8% 0 0;
  		margin: auto;
	}
		.error{
			color: red;
		}

		table,th,td{
			border-collapse: collapse;
		}
		th,td{
			padding: 10px;
			font-weight:bold;
		}

		.box{
				outline:2px solid black;
		}
		#para{
			color:red;
			display:inline-block;
			}

		#para1{
			color:red;
			display:inline-block;
		}
		
		#para2{
			color:red;
			display:inline-block;
		}
		tr.spaceUnder > td
		{
  			padding-bottom: 1em;
		}
		tr.spaceUnder > td
		{
  			padding-bottom: 2em;
		}
		body {
		background: url(14550531_867944169972428_66839806_o.jpg) no-repeat center center 			fixed; 
  		-webkit-background-size: cover;
  		-moz-background-size: cover;
  		-o-background-size: cover;
  		background-size: cover;
  		}
		input[type=submit]:hover {
    		background-color: blue;
		}
		input[type=submit] {
    			width: 40%;
    			background-color: blue;
    			color: white;
    			padding: 12px 5px;
    			margin: 5px 0;
    			border: none;
    			border-radius: 20px;
    			cursor: pointer;
		}

	</style>
	<script type="text/javascript">
		function validateform(){
		var len=0,c3=0,count=0;
		var letters = /^[A-Z]{2}\s[0-9]{2}\s[A-Z]{2}\s[0-9]{4}$/;  
		var namereg=/^[a-zA-Z ]*$/;
		var mobile=/^[0-9]{10}$/;
		var flag=1;

		
		var nametxt=document.getElementById("t1").value;
		var regno=document.getElementById("t2").value;
		var mob=document.getElementById("t5").value;
		
		var namelen=nametxt.length;
		
		if(nametxt.match(namereg))  
			count++;
		else  
			alert("enter valid name");
	
		
		if(regno.match(letters))  
			count++;
		else  
			alert("enter valid reg no");
	
		
		if(mob.match(mobile))  
			count++;
		else  
			alert("enter valid mobile no");
		

		if(count==3)
			return true;
		else
			return false;
	}


	function f2()
	{
		var c2=0;
		var a=document.getElementById("t1").value;
		var a_l=a.length;
		
		for(var i=0;i<a_l;i++)
		{ 	
				
			if((a.charAt(i)>='A' && a.charAt(i)<='Z') || (a.charAt(i)>='a' && a.charAt(i)<='z') || (a.charAt(i)==' '))
			{
				
				c2++;
			}
			else 
			 	break;
		} 
		if(c2!=a_l)
			document.getElementById("para").innerHTML="Name is not valid";	
	}

	function regval(inputtxt){
		var letters = /^[A-Z]{2}\s[0-9]{2}\s[A-Z]{2}\s[0-9]{4}$/;  
		var flag=1;

		if(inputtxt.value.match(letters))  
		{   
			return true;  
		}  
		else  
		{  
			flag=0;  
		}
		if(flag==0)
			document.getElementById("para1").innerHTML="Reg No is not valid";		
	}
	
	function mobval(inputtxt){
		var mobile=/^[0-9]{10}$/;
		var flag=1;
		
		if(inputtxt.value.match(mobile))  
		{   
			return true;  
		}  
		else  
		{  
			flag=0;  
		}
		if(flag==0)
			document.getElementById("para2").innerHTML="Mobile No is not valid";	
	}
	

	
	
	</script>
</head>
<body>


	<ul><div class=a>
	<li style="float:right"><a class="active" href="login.php">LOGIN</a></li>
	<li style="float:right"><a href="contact.html">CONTACT</a></li>
	<li style="float:right"><a href="about_us.html">ABOUT US</a></li>
	<li style="float:right"><a  href="home.html">HOME</a></li>
    	</div>
	</ul>
	<form  name="form1" method="POST" onsubmit="return validateform()">
		<div style="margin-top:60px;" >
				

			<table align="center">
			<tr>
				<td colspan="2">
					<p><span class="error" >*required field</span></p>
				</td>
			</tr>

				<tr>
				<td>
					Name:
				
				<td>
					<input type="text" name="name" placeholder="enter name" id="t1" required onblur=f2()>
			 <p id="para">
					</p>
					

			<tr>
				<td>
					Vehicle Type
				</td>
				<td>
					<select name="veh">
						<option value="bike">Bike</option>
						<option value="scooty">Scooty</option>
						<option value="car">Car</option>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					Date Of Buying
				</td>
				
				
				<td>
					<input type="date" name="buy">
				</td>
			</tr>


			<tr>
				<td>
					Registration No
				<td>
					<input type="text" name="reg_no"  placeholder="enter RTO number" id="t2" required onblur=regval(document.form1.reg_no)>
					<p id="para1">
					</p>
			</tr>
			
			<tr>
				<td>Mobile</td>
				<td><input type="text" name="mob" required placeholder="enter 10 digit mobile num" id="t5" onblur=mobval(document.form1.mob)>
					<p id="para2">
					</p>

			<tr>
				<td>UserName</td>
				<td><input type="text" name="username" required placeholder="enter unique name">


			<tr>
				<td>Password</td>
				<td><input type="password" name="password" placeholder="enter password" id="t4" required >
					</td>
			</tr>	

			<tr>
				<td></td>
				<td><input type="submit" name="sign_in" value="Sign Up" ></td>
			</tr>


		</table>
		</div>


	</form>


</body>
</html>



<?php
		$flag=0;
		$conn=mysqli_connect("localhost","root","","mysql");
		
		if($conn){
			echo "connected";
			
			if(isset($_POST['sign_in'])){
			
				$regno=$_POST['reg_no'];
				$name=$_POST['name'];
				$v_type=$_POST["veh"];
				$mob=$_POST["mob"];
				$username=$_POST["username"];	
				$password=$_POST["password"];
				$role="customer";
				$buy=strtotime($_POST['buy']);
				$renew=strtotime("+1 years",$buy);

				$sql1="SELECT * FROM login WHERE username='$username'";
				$search=mysqli_query($conn,$sql1);
				$numrows = mysqli_num_rows($search);
				if($numrows==0){
					$sql="insert into login values('$name','$v_type','$regno','$username','$password',$mob,'$role',$buy,$renew)";
				
					if(mysqli_query($conn,$sql)){
						echo "sucessfully done";
						echo "<script>window.open('login.php','_self')</script>";
					}
					else
						echo "insert not done";
				}
				else{
					echo '<script language="javascript">';
					echo 'alert("username exists")';
					echo '</script>';
				}
				
			
					
			}
		}
		else
			echo"not connected";
?>
