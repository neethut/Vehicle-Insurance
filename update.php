<?php
	
	session_start();
	
	$username=$_SESSION['username_ori'];
	
	if(isset($_POST['submit'])){
		$mob=$_POST['mob'];
		
		$conn=new MongoClient();
		if($conn){
			$db=$conn->insurance;
			$collection=$db->login;
		
		
			$collection->update(array("username"=>$username),array('$set'=>array("mob"=>$_POST['mob'])));
		}
		echo "<script>window.open('details.php','_self')</script>";
	}

?>


<html>
	<body>
		<form method="POST">
			<table align="center">
				<tr><td>Enter Mobile Num To Update:
					<td><input type="text" name="mob">
				
				<tr>
					<td><input type="submit" name="submit" value="Update">
			</table>
		</form>
	</body>
	
</html>