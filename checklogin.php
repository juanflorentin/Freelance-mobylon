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


	if ($success==1)
	{
		$a=786;
	}
    else
	{
		header("Location:login.php?cp=err&jobid=$id");
		exit;
	}
	//echo "Waseem";
	//echo $success;
	//echo $a;
	//exit;
	 

	 $pwd=$_POST["password"];

	

	 $result = mysql_query("SELECT * from tbljobs where id='$id' and password='$pwd'");
	 $num_rows = mysql_num_rows($result);
	 if ($num_rows <= 0)
		{
		//echo "Your Password is <b>", $password,"</b>";
		//echo "Invalid Uder Name or Password <b>", $password,"</b>";
			header("Location:login.php?logininfo=loginerror&jobid=$id");
		}
		else
		{
			header("Location:editjob.php?jobid=$id");
		}

	 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Freelancer Pro - Hire Freelancers and Find Freelance Projects</title>

<meta name="description" content="Hire Freelancers and Find Freelance Projects." />

<meta name="keywords" content="freelancer, freelancers, web design, job, jobs, work, seek, find, hire, marketing, promotions, seo" />

<style type="text/css">

<!--

a:link { color: #015fe7; text-decoration: none; }

a:visited { color: #015fe7; text-decoration: none; }

body {

	background-image: url(img/bgtexture.jpg);

	margin:0;

}

-->

</style>

<link rel="stylesheet" type="text/css" href="style.css" />
		<script type="text/javascript" src="jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="script-min.js"></script>
<script language="javascript">
function validate(theForm)
{

		 if (theForm.jobtitle.value == '')
        {
                  alert("Please Enter Project Title First.");
				  theForm.jobtitle.focus();
				   theForm.jobtitle.style.background="#fde9b0";
                  return false;
   		}
		 

        if (theForm.jobcat.value == 0)
        {
                  alert("Please Choose a Project Category.");
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



<body><BR>

<div align="center">

    <div style="background:url(img/headerbackground.png); height:28px; width:958px;"></div>

	

	<table width="958" height="130" border="0" bgcolor="#FFFFFF">

          <tr>

            <td width="38" rowspan="2" valign="top" style="padding-left:10px;"><a href="index.php"><img src="img/title.png" border="0" /></a></td>

            <td width="910" align="right">
						<table width="467" border="0" cellspacing="0" cellpadding="0">
		
					  <tr>
		
						<td align="right" valign="middle" class="headingbk">
		
						  <img src="img/sharethispage.png" />&nbsp;&nbsp;&nbsp;<div style="float:right;" class="pw_widget pw_size_32">
		
							<a class='pw_googleplus'></a><a class='pw_facebook'></a><a class='pw_twitter'></a><a class='pw_linkedin'></a><a class='pw_stumble_upon'></a>
							</div>
							
							<script src="http://i.po.st/share/script/post-widget.js#publisherKey=8info7nr4kiagi5vfuqh" type="text/javascript"></script>
						</td>
		
						<td width="15">&nbsp;</td>
		
					  </tr>
		
					</table>
			</td>

          </tr>

		

          <tr>

            <td align="right" valign="bottom" style="padding-bottom:12px; padding-right:20px;">
			
			
				<table width="223" border="0" cellspacing="0" cellpadding="0">
	
				  <tr>
	
					<td align="center"><a href="alljobs.php" class="topmenu"><img src="img/home.png" border="0" /></a></td>
	
					<td class="seprator">&nbsp;&nbsp;</td>
	
					<td align="center"><a href="postjob.php" class="topmenu"><img src="img/postajob.png" border="0" /></a></td>
	
					<td class="seprator">&nbsp;&nbsp;</td>
	
					<td align="center"><a href="alljobs.php" class="topmenu"><img src="img/findajob.png" border="0" /></a></td>
	
				   
	
				  </tr>		  
	
				</table>
			</td>
			<td></td>

          </tr>

      </table>

	  

	  <table width="958"  border="0" bgcolor="#FFFFFF" background="img/seperator.png">

	  		<tr>

				<td width="677" valign="bottom" style="padding-left:15px; padding-top:5px; padding-bottom:5px;">

					<img src="img/postajoblisting.png" />				</td>

				<td width="271" style="padding-left:20px; padding-top:5px; padding-bottom:5px;">

			    <img src="img/categories.png" width="119" height="29" />				</td>

			</tr>

	  </table>

	   

	   <table width="958"  border="0" background="img/sidesbackground.png" cellpadding="0" cellspacing="0">
	  		<tr>

			  <td width="667" valign="top" style="padding-left:25px; padding-top:25px; padding-bottom:5px; background-color:#FFFFFF;">
			  
			  	<table width="99%" border="0">

                	<tr>

                  		<td><form action="updatejob.php" method="post" enctype="multipart/form-data" name="frm" id="frm" onsubmit="return validate(this);">

                      		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;" align="left">

                        		<tr>
									<td colspan="2"><img src="img/jobinformation.png" alt="Job Information" align="left">
										<?php
										if($_REQUEST['cp']=='err') { ?>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="images/stopinc.png" align="absmiddle"><font color="#FF1C1C">Invalid Captach Entry, Try again...</font>
										<? } ?>
										</td>
							</tr>
                              <tr>

                                <td height="5px" colspan="2"></td>

                              </tr>

                              <tr>

                                <td height="1px" colspan="2" bgcolor="#d0d0d0"></td>

                              </tr>

                              <tr>

                                <td height="26px" colspan="2"></td>

                              </tr>
						
							

                     

                        <tr>

                          <td width="37%" align="left"><font face="Arial, Helvetica, sans-serif" size="2"><img src="img/jobtitle.png" border="0"></font></td>

                          <td width="60%" align="left"><input name="jobtitle" id="jobtitle" class="mytextbox" type="text" size="50" value="<?=$r2['jobtitle'];?>" />

                              <span class="style5">*</span> </td>

                          <td width="3%">&nbsp;</td>

                        </tr>

                        <tr>

                          <td>&nbsp;</td>

                        </tr>



                        <tr>

                          <td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><img src="img/category.png" border="0"></font></td>

                          <td align="left"><select name="jobcat" id="jobcat" style="width:328px">

                              <option value="0">Select Project Category</option>

                              <?php $w_ql="select * from tbljobcategories order by name";

				        $w_res=mysql_query($w_ql);

						while($w_row=mysql_fetch_array($w_res))

				  {

				  

				  ?>

                              <option value="<?=$w_row['id']?>">

                              <?=$w_row['name']?>

                              </option>

                              <?php }?>

                            </select>

                              <span class="style5">*</span></td>

                          <td>&nbsp;</td>

                        </tr>

						

                        <tr>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><img src="img/location.png" border="0"></font></td>

                          <td align="left"><input name="location" id="location" class="mytextbox" type="text" size="50" value="<?=$r2['location'];?>" /></td>

                          <td>&nbsp;</td>

                        </tr>

						
                        <tr>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><img src="img/jobtype.png" border="0"></font></td>

                          <td align="left"><select name="bidtype" class="mytextbox" id="bidtype" style="width:200px">

                              <option value="Freelance" selected="selected" >Freelance</option>

                              <option value="PartTime" >Part Time</option>

                              <option value="FullTime" >Full Time</option>

                            </select>

                              <span class="style5">*</span></td>

                          <td>&nbsp;</td>

                        </tr>

						
                        <tr>

                          <td valign="top" align="right"></td>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><img src="img/detaileddescription.png" border="0"></font></td>

                          <td rowspan="3" align="left"><textarea name="ddesc" cols="40" rows="5" id="ddesc"><?=$r2['ddesc'];?></textarea></td>

                          <td>&nbsp;</td>

                        </tr>





                        <tr>

                          <td></td>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td>&nbsp;</td>

                          <td>&nbsp;</td>



                        </tr>

                        <tr>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td valign="top" align="left"><font face="Arial, Helvetica, sans-serif" size="2"><img src="img/skillsrequired.png" border="0"></td>

                          <td align="left"><textarea name="special" cols="40" rows="5" id="special"><?=$r2['specialnote'];?></textarea></td>

                          <td>&nbsp;</td>

                        </tr>









                        <tr>

                          <td>&nbsp;</td>

                          <td>&nbsp;</td>



                        </tr>



<td>

<BR>

<img src="img/employerinformation.png" alt="Employer Information" align="left">

</td>



                              <tr>

                                <td height="5px" colspan="2"></td>

                              </tr>

                              <tr>

                                <td height="1px" colspan="2" bgcolor="#d0d0d0"></td>

                              </tr>

                              <tr>

                                <td height="26px" colspan="2"></td>

                              </tr>



                        </tr>





                        <tr>

                          <td class="sty123" align="left"><img src="img/companyname.png" border="0"></td>

                          <td align="left"><input name="cname" id="cname" class="mytextbox" type="text" size="50" value="<?=$r2['cname'];?>" /></td>

                          <td>&nbsp;</td>

                        </tr>

						

                        <tr>

                          <td>&nbsp;</td>

                        </tr>                        

<tr>

                          <td class="sty123" align="left"><img src="img/website.png" border="0"></td>

                          <td align="left"><input name="website" id="website" class="mytextbox" type="text" size="50" value="<?=$r2['website'];?>" /></td>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td class="sty123" align="left"><img src="img/email.png" border="0"></td>

                          <td align="left"><input name="email" id="email" class="mytextbox" type="text" size="50" value="<?=$r2['empemail'];?>" /></td>

                          <td>&nbsp;</td>

                        </tr>

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





                              <tr>

                                <td height="25px" colspan="3"></td>

                              </tr>

                              <tr>

                                <td height="1px" colspan="3" bgcolor="#d0d0d0"></td>

                              </tr>

                              <tr>

                                <td height="26px" colspan="2"></td>

                              </tr>
							   
							   <tr>

                                <td height="26px" colspan="2"></td>

                              </tr>



                        </tr>



                       
						
						
						
						
						 <tr>

                          <td style="color:#2B9FFF;"><strong>Get 3 X's in a row and we'll know your a human.</strong></td>

                          <td><div id="captcha-place">
						<?php renderCaptcha(0); ?>
						<input type="hidden" name="kind" value="basic">
					</div> </td>

                          <td>&nbsp;</td>

                        </tr>

                        <tr>

                          <td>&nbsp;</td>

                          <td style="padding-top:7px;"><input name="submit" class="mybtn" type="submit" value="Submit"/>
						<input type="hidden" name="jobid" value="<?=$_REQUEST['jobid'];?>" />
                            &nbsp;&nbsp;

                            <input name="btn" class="mybtn" type="button" value="Cancel" onclick="document.location='alljobs.php';"/>

                          </td>

                          <td>&nbsp;</td>

                        </tr>

                      </table>

                  </form></td>

                </tr>

              </table></td>

				<td width="2" background="img/linebg.png">&nbsp;</td>

				<td width="290"  valign="top" style="padding-left:15px; padding-top:5px; padding-bottom:5px; background-color:#FFFFFF;">

					

					<table  border="0" cellspacing="0" cellpadding="0">

                      

                     

                      

                      <tr>

                        <td height="6px"></td>

                      </tr>

					   <tr height="30" align="left">

                        <td class="txtfield"  align="left" style="padding-left:15px; font-size:small; padding-top:8px; font-family:Arial, Helvetica, sans-serif;"><img src="img/categoryarrow.png" align="absmiddle" />&nbsp;&nbsp;&nbsp;<a href="alljobs.php" class="catlink" STYLE="text-decoration:none">All Listings&nbsp;(<?=getalljobs(0);?>)</a></td>

                      </tr>

					  <?php $w_ql="select * from tbljobcategories order by name";

				        $w_res=mysql_query($w_ql);

						while($r=mysql_fetch_array($w_res))

				  		{?>		                       <tr height="30">

                        <td class="txtfield"  align="left"  style="padding-left:15px; font-size:small; padding-top:8px; font-family:Arial, Helvetica, sans-serif;"><img src="img/categoryarrow.png" align="absmiddle" />&nbsp;&nbsp;&nbsp;<a href="alljobs.php?cid=<?=$r['id']?>" class="catlink" STYLE="text-decoration:none"><?=$r['name']?>&nbsp;(<?=gettotaljobs($r['id']);?>)</a></td>

                      </tr>

					  

                      <?php } ?>

                  </table><BR>

				

				</td>

			</tr>

	  </table>



<?php include 'footer.php'; ?>

