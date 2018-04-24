<html>
<head>
	<title></title>
	<style type="text/css">
		.error{
			color: red;
		}

		table,th,td{
			border-collapse: collapse;
		}
		th,td{
			padding: 10px;
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
					<select name="buy">
						<option value="2016">2016</option>
						<option value="2015">2015</option>
						<option value="2014">2014</option>
						<option value="2013">2013</option>
						<option value="2012">2012</option>
						<option value="2011">2011</option>
						<option value="2010">2010</option>
						<option value="2009">2009</option>
					</select>
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
		$conn=new MongoClient();
		if($conn){
			$db=$conn->insurance;
			$collection=$db->login;

			if (isset($_POST['sign_in'])) {
				# code...	
				$search = array('username' =>$_POST['username'] );	
				$doc = array("name"=>$_POST['name'],"v_type"=>$_POST['veh'],"buy"=>$_POST['buy'],"regno"=>$_POST['reg_no'],"username" => $_POST['username'], "password" => $_POST['password'],"mob"=>$_POST['mob'] );


				if($collection->findOne($search))
				{
					echo '<script language="javascript">';
					echo 'alert("username exists")';
					echo '</script>';
				
				}
				else
				{
					$collection->insert($doc);
					echo "<script>window.open('login.php','_self')</script>";
				}
			}
		}
			
		else
			echo "not connected";

?>
