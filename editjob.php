<?php
error_reporting(0);
session_start();
include_once "admin/includes/connection.php";
include "functions.php";
include_once("generator.php");
$id=$_REQUEST["jobid"];
$result = mysql_query("SELECT * from tbljobs where id='$id'");
$i = 1;
$r2 = mysql_fetch_array($result, MYSQL_BOTH);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Freelancer Pro - Edit Job: <?php echo $r2['jobtitle'];?></title>
<meta name="description" content="Hire Freelancers and Find Freelance Projects." />
<meta name="keywords" content="freelance, freelancer, freelancers, web design, job, jobs, work, seek, find, hire, marketing, promotions, seo" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/extra.css" rel="stylesheet">
<link href="css/fonts.css" rel="stylesheet"> 
		<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="js/script-min.js"></script>
<script language="javascript">
function validate(theForm)
{

		 if (theForm.jobtitle.value == '')
        {
                  alert("Please Enter Job Title First.");
				  theForm.jobtitle.focus();
				   theForm.jobtitle.style.background="#fde9b0";
                  return false;
   		}
		 

        if (theForm.jobcat.value == 0)
        {
                  alert("Please Choose a Job Category.");
				  theForm.jobcat.focus();
				   theForm.jobcat.style.background="#fde9b0";
                  return false;
   		}
		
		
		 if (theForm.cname.value == '')
        {
                  alert("Please Enter a Name for Your Company.");
				  theForm.cname.focus();
				   theForm.cname.style.background="#fde9b0";
                  return false;
   		}
		
		 if (theForm.email.value == '')
        {
                  alert("Please Enter Email.");
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
</head>

<body class="preview">

<?php include './themes/default/navbar.php'; ?>
<?php include './themes/default/mainheader.php'; ?>

<div id="main">
	<div class="container">
		<div class="row">
			<div class="span9"> 
<div class="page-header"><h1>Edit Project: <?php echo $r2['jobtitle'];?></h1></div>
<div class="span7 offset1">				
		<form action="updatejob.php" class="form-horizontal well" method="post" enctype="multipart/form-data" name="frm" id="frm" onsubmit="return validate(this);">
		
                     <?php
						if($_REQUEST['cp']=='err') { ?>
					<div class="alert alert-error"><img src="images/stopinc.png" align="absmiddle"> Invalid Captach Entry, Try again...</div>
										<? } ?>
<h2>Project Information</h2>
<div class="control-group">
	<label class="control-label" for='jobtitle' >Jobtitle * : </label> 
	<div class="controls">
<input name="jobtitle" id="jobtitle" class="mytextbox" type="text" size="50" value="<?=$r2['jobtitle'];?>" />
	</div>
</div>

<div class="control-group">
	<label class="control-label" for='jobcat' >Category * : </label> 
	<div class="controls">                              
		<select name="jobcat" id="jobcat" style="width:328px">
		<option value="0">Select Project Category</option>
		<?php $w_ql="select * from tbljobcategories order by name";
			$w_res=mysql_query($w_ql);
			while($w_row=mysql_fetch_array($w_res))
			{
				if($w_row['id']==$r2['jobcatid'])
						{?>
						 <option selected="selected" value="<?=$w_row['id']?>"><?=$w_row['name']?></option>
						<?php }
					else
						{
						?>
						<option value="<?=$w_row['id']?>"><?=$w_row['name']?></option>
						<?php }}?>
						</select>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for='location' >Location : </label> 
	<div class="controls">               
<input name="location" id="location" class="mytextbox" type="text" size="50" value="<?=$r2['location'];?>" />
	</div>
</div>
     
<div class="control-group">
	<label class="control-label" for='bidtype' >Project type * : </label> 
	<div class="controls">            
       <select name="bidtype" class="mytextbox" id="bidtype" style="width:200px">
       <option value="Freelance" selected="selected" >Freelance</option>
       <option value="PartTime" >Part Time</option>
       <option value="FullTime" >Full Time</option>
       </select>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for='ddesc' >Detailed Description : </label> 
	<div class="controls">
<textarea name="ddesc" cols="40" rows="5" id="ddesc"><?=$r2['ddesc'];?></textarea>
	</div>
</div>
                         
<div class="control-group">
	<label class="control-label" for='special' >Skills Required : </label> 
	<div class="controls">
	<textarea name="special" cols="40" rows="5" id="special"><?=$r2['specialnote'];?></textarea>
	</div>
</div>



<BR>
<h2>Employer Information</h2>

<div class="control-group">
	<label class="control-label" for='cname' >Company Name : </label> 
	<div class="controls">
<input name="cname" id="cname" class="mytextbox" type="text" size="50" value="<?=$r2['cname'];?>" />
	</div>
</div>

<div class="control-group">
	<label class="control-label" for='website' >Website : </label> 
	<div class="controls">                         
	<input name="website" id="website" class="mytextbox" type="text" size="50" value="<?=$r2['website'];?>" />
	</div>
</div>

<div class="control-group">
	<label class="control-label" for='email' >Email : </label> 
	<div class="controls">  
<input name="email" id="email" class="mytextbox" type="text" size="50" value="<?=$r2['empemail'];?>" />
	</div>
</div>

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
<input type="hidden" name="jobexpdate" value="<?=$exdaten;?>">


<div class="row">

	<div class="span3"><label for='scaptcha'>Get 3 X's in a row and we'll know you are human.</label>
	</div>				
				
<div class="span3">
						<?php renderCaptcha(0); ?>
						<input type="hidden" name="kind" value="basic">
					</div>
				</div>

<BR><BR><center><input name="submit" class="btn btn-primary" type="submit" value="Submit"/>
						<input type="hidden" name="jobid" value="<?=$_REQUEST['jobid'];?>" />
                            &nbsp;&nbsp;

                            <input name="btn" class="btn" type="button" value="Cancel" onclick="document.location='alljobs.php';"/></center>



                            </form>
                  </div>
			</div>
		<?php include './themes/default/sidebar.php'; ?>
		</div>
	</div>
</div>
<?php include './themes/default/footer.php'; ?>