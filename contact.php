<?php
error_reporting(0);
session_start();
include_once "admin/includes/connection.php";
include "functions.php";
require_once("./include/fgcontactform2.php");
include_once("generator.php");
$result_sql="SELECT * from general";
$resultg = mysql_query($result_sql);
$rowg=mysql_fetch_array($resultg);
$email=$rowg['email'];
//require_once("./include/captcha-creator.php");
//echo $empemail;
$formproc = new FGContactForm();
//$captcha = new FGCaptchaCreator('scaptcha');
//$formproc->EnableCaptcha($captcha);
//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient($email); //<<---Put your email address here
$formproc->SetFormRandomKey('XsHVufPpgD9Epwl');
if(isset($_POST['submitted']))
{
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
if ($success==1)
	{
		$a=786;
	}
    else
	{
		header("Location:contact.php?cp=err");
		exit;
	}
	if($formproc->ProcessForm())

   {
 $formproc->RedirectToURL("thankscontact.php");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Freelancer Pro - Contact us</title>
<meta name="description" content="Hire Freelancers and Find Freelance Projects." />
<meta name="keywords" content="freelance, freelancer, freelancers, web design, job, jobs, work, seek, find, hire, marketing, promotions, seo" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/extra.css" rel="stylesheet">
<link href="css/fonts.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="js/script-min.js"></script>
		<script type='text/javascript' src='scripts/gen_validatorv31.js'></script>  
</head>

<body class="preview" id="contact">
<?php include './themes/default/navbar.php'; ?>
<?php include './themes/default/mainheader.php'; ?>
<div id="main">
	<div class="container">
		<div class="row">
			<div class="span9"> 
				<div class="page-header"><h1>Contact us</h1></div>
<!-- Form Code Start -->
<form class="span12 contact-form" id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' enctype="multipart/form-data" accept-charset='UTF-8'>
<?php
					if($_REQUEST['cp']=='err') { ?>
											<div class="alert alert-error"><img src="images/stopinc.png" align="absmiddle"> Invalid Captach Entry, Try again...</div>
				<? } ?>	
<fieldset >
<div class="row">
    <div class="span5 well">
<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
<input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />

<div class='help-block'>* required fields</div>

<span class='error'><?php echo $formproc->GetErrorMessage(); ?></span>
    <label for='name' >Your Full Name*: </label><br/>
    <input class="span5" placeholder="Your Full Name" type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>
    <span id='contactus_name_errorloc' class='error'></span>
    <label for='email' >Email Address*:</label><br/>
    <input class="span5" placeholder="Your email address" type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <span id='contactus_email_errorloc' class='error'></span>
</div>
<div class="span6 well">
    <label for='message' >Message:</label><br/>
    <span id='contactus_message_errorloc' class='error'></span>
    <textarea class="input-xlarge span6" rows="10" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
</div>
</div>
<div class="row offset2">
<br><br>
<div class="span3">									
<label for='scaptcha'>Get 3 X's in a row and we'll know you are human.</label>
</div>				
				
<div class="span3">
    <?php renderCaptcha(0); ?>
    <input type="hidden" name="kind" value="basic" />
    <br/>
    <span id='contactus_scaptcha_errorloc' class='error'></span></div></div>
    <br>
    <br>
    <center>	<input name="submit" class="btn btn-primary" type="submit" value="Submit"/>
&nbsp;&nbsp;
		<input name="btncancel" class="btn" type="button" value="Cancel" onclick="document.location='index.php';"/></center>
			
			</div>
			</div>
				</fieldset>	
				
						</form>
					</div>
		</div>
	</div>
</div>

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");


// ]]>
</script>
<?php include './themes/default/footer.php'; ?>