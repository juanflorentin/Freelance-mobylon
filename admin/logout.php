<?php
include_once "includes/connection.php";
//echo $_SESSION['username'];
//echo $_SESSION['password'];
//echo $HTTP_SESSION_VARS['username'];
//exit();
session_start();
//echo $_SESSION['adminname'];

$_SESSION['adminuser']='';
$_SESSION['password']='';
$_SESSION['adminuser']='';
$_SESSION['adminid']='';

//session_register("adminname");

session_unregister("adminuser");
session_unregister("password");
session_unregister("adminid");

unset ($_SESSION['adminuser']);
unset ($_SESSION['adminid']);
unset ($_SESSION['password']);
unset($_SESSION['adminuser']);
echo $_SESSION['adminuser'];
	//exit;						
?>
<html>
<head>
<title>::: Logout :::</title>
<META content="text/html; charset=windows-1252" http-equiv=Content-Type><LINK href="style.css" rel=stylesheet type=text/css>
<META content="Microsoft FrontPage 5.0" name=GENERATOR>
<meta http-equiv="Refresh" content="4; URL=../index.php">

</head>

<body bgcolor="#FFFFFF" text="#000000" class="TA">
<div align="center"><img src="images/title.png" style="border-bottom:0px solid #ccc;"></div><br>
<div id="Layer1" align="center"> 
     <?php
	 	if($_GET['un']=='changed')
		{
	 ?>      
     <font color="#0000FF" size="2" face="Tahoma">Your Username has been successfully Changed. Please Re-Login!<BR>
Redirecting, please wait.</font>   
	  <?php
	  }
	  else {  ?>
	   <font color="#0000FF" size="3" face="verdana">You
      have been successfully logged out! <BR>
Redirecting, please wait.</font>   
	<?php } ?>
    <br>
</div><br><br>
<div align="center"><img src="images/progress_bar.gif"></div>
</body>
</html>

