<?php
error_reporting(0);
session_start();

include_once "admin/includes/connection.php";

include "functions.php";
$id=$_REQUEST["jobid"];
?>
<?php include_once("generator.php"); ?>
<?php

	 //----------Captcha check 
	$success = false;
	//echo $_POST["kind"]."yes";
	//exit;
	if ($_POST["kind"] == "basic")	
	{
		$success = checkCaptcha($_POST, 0);
		//echo $success;
		//exit;
	}
	else
	{
		$success = checkCaptcha($_POST, 1) && checkCaptcha($_POST, 2) && checkCaptcha($_POST, 3);
	}


	if ($success)
	{
		$a="tanoli";
	}
    else
	{
		header("Location:forgotpassword.php?cp=err&jobid=$id");
		exit;
	}
	 
	
	 $email=$_POST["email"];
	

	 $result = mysql_query("SELECT * from tbljobs where id='$id' and empemail='$email'");
	 $num_rows = mysql_num_rows($result);
	 if ($num_rows <= 0)
		{
			header("Location:forgotpassword.php?logininfo=loginerror&jobid=$id");
		}
		else
		{
			 $row = mysql_fetch_array($result);
			 $pass=$row['password'];
			//---------SEND EMIL---------------------------------------------------
						$to  = $email; // note the comma
						// $ip = getenv("REMOTE_ADDR"); 
						
						/* subject */
						$subject = "Freelancer Pro - Password Recovery";
						
						/* message */
						$message = '
						
						'. $title . " " . " ". $fname . " ".$lname.'

						Here is your password to edit the project.
						  
						Your Password is = '.$pass.'
						
												
						';
						
			
					
						/* and now mail it */
						mail($to, $subject, $message, $header);
					//---------------------------------------------------------
			header("Location:forgotpassword.php?jobid=$id&email=okey");
		}

	 

?>

