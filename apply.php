<?php
error_reporting(0);
session_start();
include_once "admin/includes/connection.php";
include "functions.php";
require_once("./include/fgcontactform.php");
include_once("generator.php");
//require_once("./include/captcha-creator.php");
$jobid=$_REQUEST["jobid"];
$result = mysql_query("SELECT * from tbljobs Where online='1'  and id='$jobid'");
$i = 1;
$r2 = mysql_fetch_array($result, MYSQL_BOTH);
$empemail=$r2['empemail'];
//echo $empemail;
$formproc = new FGContactForm();
//$captcha = new FGCaptchaCreator('scaptcha');
//$formproc->EnableCaptcha($captcha);
//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient($empemail); //<<---Put your email address here
//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('XsHVufPpgD9Epwl');
$formproc->AddFileUploadField('photo','jpg,jpeg,gif,png,bmp',2024);
$formproc->AddFileUploadField('resume','doc,docx,pdf,txt',2024);
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
		header("Location:apply.php?cp=err&jobid=$jobid");
		exit;
	}
	if($formproc->ProcessForm())

   {
 $formproc->RedirectToURL("thank-you.php");
}
}
?>
<?php include './themes/default/headerjob.php'; ?>
<div id="main">
	<div class="container">
		<div class="row">
			<div class="span9"> 
				<div class="page-header"><h1>Project Application</h1></div>
			
		<h2>Project Information</h2>
				
<h2><div class="row"><div class="span3">Project Title :</div>	<div class="span6"><?php echo $r2['jobtitle'];?></div></div></h2>
	 		
<div class="span7 offset1">
<form id='contactus' class="form-horizontal well" action='<?php echo $formproc->GetSelfScript(); ?>' method='post' enctype="multipart/form-data" accept-charset='UTF-8'>
	<?php
					if($_REQUEST['cp']=='err') { ?>
											<div class="alert alert-error"><img src="images/stopinc.png" align="absmiddle">Invalid Captach Entry, Try again...</div>
				<? } ?>	
	<?php

$result_sql="SELECT * from general";
$resultg = mysql_query($result_sql);
$rowg=mysql_fetch_array($resultg);
$listingdays = $rowg['listingdays'];
$m=date("m");
$d=date("d");
$y=date("Y");
$exdate= date("m-d-Y", mktime(0, 0, 0, $m, $d+$listingdays, $y));
//echo $exdate;
$datearray = explode("-",$exdate);
$exdaten= $datearray[2]."-".$datearray[0]."-".$datearray[1];
?>
 <input type="hidden" name="Job Title" value="<?=$r2['jobtitle'];?>">
 <input type="hidden" name="jobid" value="<?=$_REQUEST['jobid'];?>">
	<fieldset>					
		<legend>Apply for This Project</legend>
			
			<input type='hidden' name='submitted' id='submitted' value='1'/>
			<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
			<input type='text' class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />
									
			<div class='help-block'>* required fields</div>
			<div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>

<div class="control-group">
	<label class="control-label" for='name' >Your Full Name * : </label> 
		<div class="controls">
		<input type='text' name='name' id='name' class="input-xlarge" value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>
		<span id='contactus_name_errorloc' class='error'></span>
	</div>
</div>
									
<div class="control-group">									
	<label class="control-label" for='email' >Email Address * :</label>
		<div class="controls">									
			<input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
			<span id='contactus_email_errorloc' class='error'></span>
		</div>
</div>									

<div class="control-group">																		
	<label class="control-label" for='message' >Cover Letter :</label>
	<div class="controls">	
		<span id='contactus_message_errorloc' class='error'></span>
			<textarea class="input-xlarge" rows="15" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
									
	</div>
</div>	

<div class="control-group">									
	<label class="control-label" for='photo' >Your Photo :</label>
	<div class="controls">									
		<input type="file" name='photo' id='photo' /><br/>
			<span id='contactus_photo_errorloc' class='error'></span>
	</div>
</div>

<div class="control-group">	
	<label class="control-label" for='photo' >Resume :     </label>
	<div class="controls">							
		<input type="file" name='resume' id='resume' /><br/>
			<span id='contactus_resume_errorloc' class='error'></span>
	</div>
</div>
<br>
<br>
<div class="row">

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
    	<center><input name="submit" class="btn btn-primary" type="submit" value="Submit"/>
&nbsp;&nbsp;
		<input name="btncancel" class="btn" type="button" value="Cancel" onclick="document.location='alljobs.php';"/>
		</center><br>
		
			</fieldset>	
				
					</form>
			</div>
			
		</div>
		<?php include './themes/default/sidebar.php'; ?>
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
    frmvalidator.addValidation("photo","file_extn=jpg;jpeg;gif;png;bmp","Upload images only. Supported file types are: jpg,gif,png,bmp");
    //frmvalidator.addValidation("scaptcha","req","Please enter the code in the image above");
// ]]>
</script>
<?php include './themes/default/footer.php'; ?>