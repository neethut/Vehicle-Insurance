<html>
<head>
	<title></title>
	<style type="text/css">
		
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);
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
	.form {
 		 position: relative;
 		 z-index: 1;
  		/*background: #FFFFFF;*/
  		max-width: 360px;
  		margin: 0 auto 100px;
  		padding: 45px;
  		text-align: center;
  		box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
	}
	.form input {
 		 font-family: "Roboto", sans-serif;
 		 outline: 0;
  		background: #f2f2f2;
  		width: 100%;
  		border: 0;
  		margin: 0 0 15px;
  		padding: 15px;
  		box-sizing: border-box;
  		font-size: 14px;
	}
	#button{
  		font-family: "Roboto", sans-serif;
  		text-transform: uppercase;
  		outline: 0;
  		background: blue;
  		width: 100%;
 	        border: 0;
  		padding: 15px;
  		/*color: #FFFFFF;*/
  		font-size: 14px;
  		-webkit-transition: all 0.3 ease;
 		 transition: all 0.3 ease;
  		cursor: pointer;
	}
	header {
    padding: 3em;
    color: white;
    background-color: black;
    clear: left;
   
}



.a{
	align=right;
}
body {
	background: url(14550531_867944169972428_66839806_o.jpg) no-repeat center center 		fixed; 
  		-webkit-background-size: cover;
  		-moz-background-size: cover;
  		-o-background-size: cover;
  		background-size: cover;
  
}
	</style>
</head>
<body>
	<ul><div class=a>
	<li style="float:right"><a class="active" href="login.php">LOGIN</a></li>
	<li style="float:right"><a href="contact.html">CONTACT</a></li>
	<li style="float:right"><a href="about_us.html">ABOUT US</a></li>
	<li style="float:right"><a  href="home.html">HOME</a></li>
    	</div>
	</ul>
 <div class="login-page">
  <div class="form">
    <form class="login-form" method="POST">
      <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="password" id="t2"/>
      <input type="submit" value="login in" name="submit" id="button">
      <p class="message">Not registered? <a href="sign_up.php">Create an account</a></p>
    </form>
  </div>
</div> 
</body>
</html>
<?php
	session_start();

	$conn=mysqli_connect("localhost","root","","mysql");

	if($conn){

			if(isset($_POST['submit'])){
				
				$username=$_POST['username'];
				$password=$_POST['password'];
				$role="customer";
			
				$sql1="SELECT * FROM login WHERE username='$username' and password='$password'";
				$search=mysqli_query($conn,$sql1);
				$row = mysqli_fetch_assoc($search);
				$numrows = mysqli_num_rows($search);
				$rolecheck=$row['role'];
			
				if($numrows==1){
					$_SESSION['username_ori']=$_POST['username'];
					$username=$_SESSION['username_ori'];
					
					$x=strcmp($rolecheck,"admin");
					if(!$x){
						echo "<script>window.open('admin.php','_self')</script>";
					}
					else
						echo "<script>window.open('details.php','_self')</script>";
				}
				else
					echo"username or password not matched";
			}
			
	}
	else
		echo "not connected";
?>
