<?php
error_reporting(0);
session_start();
include_once "admin/includes/connection.php";
include "functions.php";
include_once("generator.php"); 
$jobid=$_REQUEST["jobid"];
$result = mysql_query("SELECT * from tbljobs Where online='1'  and id='$jobid'");
$r2 = mysql_fetch_array($result, MYSQL_BOTH);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Freelancer Pro - Forgot Password: <?php echo $r2['jobtitle'];?></title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/extra.css" rel="stylesheet">
<link href="css/fonts.css" rel="stylesheet"> 
<script language="javascript">	
function validate(theForm)
{
if (theForm.email.value == '')
        {
                  alert("Please Enter Email First.");
				  theForm.email.focus();
				   theForm.email.style.background="#fde9b0";
                  return false;
   		}
		
		var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
			 if (theForm.email.value.search(emailRegEx) == -1) {
				  alert("Please enter a valid email address.");
				  theForm.email.focus();
                return false;
			 }

        return true;
}
</script>
<link rel="stylesheet" type="text/css" href="style.css" />
		<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="js/script-min.js"></script>
</head>
<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">

 <?php include './themes/default/navbar.php'; ?>
<?php include './themes/default/mainheader.php'; ?>

<div id="main">
	<div class="container">
		<div class="row">
			<div class="span9"> 
<div class="page-header"><h1>Password Recovery: <?php echo $r2['jobtitle'];?></h1></div>
				<div class="span7 offset1">				
					<div class="well">
				
<form action="recoverpassword.php" method="post"  name="frm" id="frm" onsubmit="return validate(this);">

<a href="jobdetail.php?jobid=<?=$row2['id']?>"  style="text-decoration:none; font-weight:bold; font-family:Arial, Helvetica, sans-serif"></a>

   				      <?php
						   if($_REQUEST['logininfo']=='loginerror')
						   { ?>
<div class="alert alert-error"><img src="images/stopinc.png" > Incorrect Email, Try Again...</div>
				    <?php }
						   ?>
						  <?php
										if($_REQUEST['cp']=='err') { ?>
										 
										<div class="alert alert-error"><img src="images/stopinc.png" align="absmiddle"> Invalid Captach Entry, Try again...</div>
        					<? } ?>
					<?php
										if($_REQUEST['email']=='okey') { ?>
	<div class="alert alert-success"><img src="images/success.gif" align="absmiddle"> Your Password has been sent to your email address.<br><br>
										<? } ?>
                   <div class="control-group">
	<label class="control-label" for='email' >Your Email Address: </label>
	<div class="controls">
                       <input name="email" type="text" id="email" size="30" />
	</div>
                   </div>

<div class="row">

	<div class="span3">									
<label for='scaptcha'>Get 3 X's in a row and we'll know you are human.</label>
	</div>				
				
	<div class="span3">
						<?php renderCaptcha(0); ?>
						<input type="hidden" name="kind" value="basic">
					</div>
		</div>
						<label>
                       <input type="submit" name="Submit" class="btn btn-primary" value="Submit" />
					   <input type="hidden" name="jobid" value="<?=$_REQUEST['jobid'];?>" />
                       <input type="button" name="button" class="btn" onClick="window.location='login.php?jobid=<?=$_REQUEST['jobid'];?>'" value="Cancel" />
                      </label>
                      
                      	</form>
                      	</div>
				</div>
			</div>
<?php include './themes/default/sidebar.php'; ?>
</div>
</div>
</div>			              
<?php include './themes/default/footer.php'; ?>