<?php
	$dbhost="localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname="kpi_db";
	$tbl_name = "users";
	
	$link = mysql_connect($dbhost,$dbusername,$dbpassword) or die ("cannot connect");
	mysql_select_db($dbname,$link) or die ("cannot select DB ".mysql_error());
	
	if((!empty($_POST['myusername'])) && (!empty($_POST['mypassword']))){
		
		$myusername = $_POST['myusername'];
		$mypassword = $_POST['mypassword'];
		//$encrypted_mypassword=md5($mypassword);

		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);
		$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
		$result=mysql_query($sql);

		$count=mysql_num_rows($result);
		
		if($count==1){
		session_start();
		$_SESSION("myusername") = 1;
		//$_SESSION("mypassword") = "mypassword"; 
		header("location:login_success.php");
		}
		else {
		echo "Wrong Username or Password";
		}
	}
<<<<<<< HEAD
=======
//	else {
//		echo "Failed"
//	}*/
>>>>>>> 678ab4403f34361154e568a30b20073a13a910e6
?>