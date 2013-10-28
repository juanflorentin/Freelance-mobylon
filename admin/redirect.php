<?php
include_once "includes/connection.php";
$username = $_POST['uname']; 
$password = $_POST['password']; 
 

  $ssql="SELECT * FROM tbladmin Where username='$username' and password='$password'";
  $result = mysql_query($ssql,$connection);	
  $abc=mysql_fetch_array($result);
  $num_rows = mysql_num_rows($result); 
 //echo "sdf".$num_rows;
// echo " fetch ".$abc['username'];
 $userID=$abc['id'];
 
	

if ($num_rows <= 0)
{
	//echo "Your Password is <b>", $password,"</b>";
	//echo "Invalid Uder Name or Password <b>", $password,"</b>";
	header("Location:index.php?logininfo=loginerror");
}
else
{
	 $row = mysql_fetch_array($result);
	// $ulevel=$row["accesslevel"];
	 //$adminuser=$row["username"];
	 session_start();
	//session_register("adminid");
	//session_register("ulevel");
	//session_register("adminuser");
	//session_register("password");
	//session_register("id");
	$_SESSION['adminuser']=$username;
	$_SESSION['adminid']=$userID;
	$_SESSION['password']=$password;
	//echo $_SESSION['adminuser'];
	//exit;
	 $today=date("Y-m-d");
		$ssql="delete from tbljobs  where expirdate < '$today'";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
	
	header("Location:managelisting.php");	
	exit;
	
	
}	

?>
