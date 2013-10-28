<?php
error_reporting (0);
include "includes/connection.php";
include "includes/checksession.php";
include "functions.php";
$id=$_REQUEST['jid'];
$member_sql="select * from tbljobs where id='$id'";
	$res=mysql_query($member_sql);
	$row=mysql_fetch_array($res);
	$jobtitle= $row['jobtitle'];
	$cid= $row['jobcatid'];
?>

<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Administration</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="images/newstyles.css" type=text/css rel=stylesheet>
<SCRIPT src="images/stmenu.js" type=text/javascript></SCRIPT>

<script language="JavaScript">
function sortit(str)
	{
		window.location='manageclients.php?lsts='+str;
		//alert(str);	
	
		
	}
</script>

<META content="MSHTML 6.00.2900.3492" name=GENERATOR>
<style type="text/css">
<!--
.style2 {color: #0000FF}
.style29 {font-size: 12px}
.sty123 {font-size: 12px}
-->
</style>
</HEAD>
<BODY>
<?php if ($_SESSION['adminid']==1)
				require 'includes/adminmenu.php';
			else
				require 'includes/menu.php'; ?>
  
<TABLE cellSpacing=0 cellPadding=0 width="99%" height="78%" align=left style="vertical-align:top;" border="0">
  <!--DWLayoutTable-->
  <TBODY>
        <TR>
          <TD height="18" bgcolor="#f3f3f3" colspan="2" align=left vAlign=left  style="VERTICAL-ALIGN: top; width:16%">
            <?php 
			if ($_SESSION['adminid']==1)
				require 'includes/adminleftMenu.php';
			else
				require 'includes/leftMenu.php';
			?></TD>
          <TD   align="left" valign="top"  bordercolor="#FF6600" style="padding-left:15px;"><p><span class="titulos" ><span class="botones"><font size="3" style="verdana" color="#015fe7"><BR><B>Manage Project Listings </B></font></span></span>
            
            </h1>
          &gt; Edit Project Detail </p>
          
            <div align="left" style="vertical-align:top; padding-bottom:20px;">
             
<FORM action="savejob.php?id=<?=$_GET['id'];?>" method="post"  name=frm onSubmit="return check();" enctype="multipart/form-data">			 
			  <table width="60%" border="0" align="left" cellpadding="4" cellspacing="1" class="det1" style="border: 1px solid #000000;">
                <tr  bgcolor="#F3F3F3">
                  <TD style="VERTICAL-ALIGN: top;">
				  	<table width="100%" border="0" align="left">
                        <tr>
                          <td colspan="3" bgcolor="#9DBAFD"><h4 style="margin:0; padding:5px; font-size:12px;"> Project Detail </h4></td>
                        </tr>
                        <tr>
                          <td width="37%"><font face="Arial, Helvetica, sans-serif" size="2">Project Title :</font></td>
                          <td width="60%" align="left"><input name="jobtitle" id="jobtitle" class="mytextbox" type="text" size="40" value="<?=$jobtitle;?>" />
                              <span class="style5">*</span> </td>
                          <td width="3%">&nbsp;</td>
                        </tr>
                        <tr>
                          <td><font face="Arial, Helvetica, sans-serif" size="2">Project Category :</font></td>
                          <td><select name="jobcat" id="jobcat" style="width:260px">
                              <option value="<?=$cid;?>"><?=getcatname($cid);?></option>
                              <?php $w_ql="select * from tbljobcategories";
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
						<!--
                        <tr>
                          <td><font face="Arial, Helvetica, sans-serif" size="2">Budget:</font></td>
                          <td><input name="budget" id="budget" class="mytextbox" type="text" size="30" value="<?=$_GET['phone'];?>" />
                              <span class="style5">*</span></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><font face="Arial, Helvetica, sans-serif" size="2">Project Start Date:</font></td>
                          <td><input name="jobdate" value="<?=$_GET['date'];?>" type="text" class="First" id="jobdate" style="color: #000066; border: 1px solid #CAC3BF;background-image: url('field_bg.jpg')" size="30" />
                              <img src="images/calendar.png" alt="Date" name="date1" id="csv1_date11" style="cursor:pointer;cursor:hand;" />
                              <script type="text/javascript">Calendar.setup({
	inputField : "jobdate", // ID of the input field
	ifFormat : "%Y-%m-%d", // the date format
	button : "csv1_date11" // ID of the button
})
                              </script></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><font face="Arial, Helvetica, sans-serif" size="2">Job Expiry Date:</font></td>
                          <td><input name="jobexpdate" value="<?=$_GET['date'];?>" type="text" class="First" id="jobexpdate" style="color: #000066; border: 1px solid #CAC3BF;background-image: url('field_bg.jpg')" size="30" />
                              <img src="images/calendar.png" alt="Date" name="date1" id="jobexpdate2" style="cursor:pointer;cursor:hand;" />
                              <script type="text/javascript">Calendar.setup({
	inputField : "jobexpdate", // ID of the input field
	ifFormat : "%Y-%m-%d", // the date format
	button : "jobexpdate2" // ID of the button
})
                              </script></td>
                          <td>&nbsp;</td>
                        </tr>
						-->
                        <tr>
                          <td><font face="Arial, Helvetica, sans-serif" size="2">Project Location :</font></td>
                          <td><input name="location" id="location" class="mytextbox" type="text" size="50" value="<?=$row['location'];?>" /></td>
                          <td>&nbsp;</td>
                        </tr>
						<!--
                        <tr>
                          <td><font face="Arial, Helvetica, sans-serif" size="2">Address:</font></td>
                          <td><textarea name="address1" cols="40" class="mytextbox" id="address1"><?=$_GET['city'];?>
                            </textarea>
                              <span class="style5">*</span></td>
                          <td>&nbsp;</td>
                        </tr>
					-->
                        <tr>
                          <td><font face="Arial, Helvetica, sans-serif" size="2">Project Type :</font></td>
                          <td><select name="bidtype" class="mytextbox" id="bidtype" style="width:200px">						  		
                              <option value="<?=$row['bidaccepttype'];?>" selected="selected"><?=$row['bidaccepttype'];?></option>
							  <option value="FullTime" >Full Time</option>
                              <option value="PartTime">Part Time</option>
                              <option value="Freelance" >Freelance</option>
                            </select>
                              <span class="style5">*</span></td>
                          <td>&nbsp;</td>
                        </tr>
						<!--
                        <tr>
                          <td><font face="Arial, Helvetica, sans-serif" size="2">Brief Description:</font></td>
                          <td rowspan="2"><textarea name="bdesc" cols="50" id="bdesc"></textarea></td>
                          <td>&nbsp;</td>
                        </tr>
						-->
                        <tr>
                          <td valign="top" align="right"></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><font face="Arial, Helvetica, sans-serif" size="2">Detailed Description:</font></td>
                          <td rowspan="3"><textarea name="ddesc" cols="50" rows="4" id="ddesc"><?=$row['ddesc'];?></textarea></td>
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
                          <td><font face="Arial, Helvetica, sans-serif" size="2">Skills Required:</font></td>
                          <td><textarea name="special" cols="50" rows="6" id="special"><?=$row['specialnote'];?></textarea></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        
                        <tr>
                          <td colspan="3" bgcolor="#9DBAFD"><h4 style="margin:0; padding:5px; font-size:12px;">Employeer Detail </h4></td>
                        </tr>
                        <tr>
                          <td class="sty123">Company Name: </td>
                          <td><input name="cname" id="cname" class="mytextbox" type="text" size="50" value="<?=$row['cname'];?>" /></td>
                          <td>&nbsp;</td>
                        </tr>
						<!--
                        <tr>
                          <td class="sty123">Contact Person: </td>
                          <td><input name="cperson" id="cperson" class="mytextbox" type="text" size="50" value="<?=$_GET['cperson'];?>" /></td>
                          <td>&nbsp;</td>
                        </tr>
						-->
                        <tr>
                          <td class="sty123">Website/URL:</td>
                          <td><input name="website" id="website" class="mytextbox" type="text" size="50" value="<?=$row['website'];?>" /></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td class="sty123">Email:</td>
                          <td><input name="email" id="email" class="mytextbox" type="text" size="50" value="<?=$row['empemail'];?>" /></td>
                          <td>&nbsp;</td>
                        </tr>
						<!--
                        <tr>
                          <td class="sty123"><font face="Arial, Helvetica, sans-serif" size="2">Company Logo: </font></td>
                          <td><input type="file" name="image" id="image" size="25"  class="mytextbox" />
                              <span class="style5"><font face="Arial, Helvetica, sans-serif" size="2"></font></span></td>
                          <td>&nbsp;</td>
                        </tr>
						-->
                        <tr>
                          <td colspan="3"><hr /></td>
                        </tr>

                        <tr>
                          <td>&nbsp;</td>
                          <td><input name="submit" class="mybtn" type="submit" value="Update"/>
						  	<input type="hidden" name="jid" value="<?=$_REQUEST['jid'];?>">
                            &nbsp;&nbsp;
                            <input name="btn" class="mybtn" type="button" value="Cancel" onclick="document.location='managelisting.php';"/>
                          </td>
                          <td>&nbsp;</td>
                        </tr>
                    </table>
				  </TD>
                </TR>
            </TABLE>
			  
</FORM>			  
            </div><br>
            
        
            <div align="left">
          <?php //include "includes/footer.php"; ?>
            </div>
          <LABEL> </LABEL>            <LABEL> </SPAN></LABEL>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p></TD>
        </TR>
    
    
  </TBODY>
</TABLE>

</BODY></HTML>
