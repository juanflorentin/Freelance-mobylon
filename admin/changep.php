<?php error_reporting(0);
include_once "includes/connection.php";

include_once "includes/checksession.php";

	  
	 	$targetaction=$_POST['targetaction'];
		
		
		
	
			if($targetaction=='editrecord')
			{
				 $p1=$_POST['p1'];
				 $p2=$_POST['p2'];
				 $p3=$_POST['p3'];				 				 
				 $username=$_POST['username'];
				 $password=$p1;
				 /*echo $username;
				 echo "<br>";
				 echo $password;
				 exit;*/
				 $result = mysql_query ("SELECT * FROM tbladmin Where username='".$username. "'". "and password='".$password."'", $connection);
  				 $num = mysql_num_rows($result); 
				
				 if ($num > 0)
					{
						
					
					
						$p2=$_POST['p2'];
						$p3=$_POST['p3'];
						$u1=$_POST['u1'];
						
						if ($p2==$p3)
						{
						
						$ssql="";
						$ssql="Update tbladmin set  
								password='$p2'"; 
						//	echo $ssql;
						//	exit;	
								//Where catid=".$fid;
						$sql = mysql_query($ssql) or die
						(mysql_error()); 
						echo '<script type="text/javascript">document.location="changep.php?act=done";</script>';
						//header("Location:changep.php?act=done");
					}
					else
					{
						//header("Location:changep.php?act=notmatch");
						echo '<script type="text/javascript">document.location="changep.php?act=notmatch";</script>';
					}
					
					}
					else
					{
						//header("Location:changep.php?act=notdone");
						echo '<script type="text/javascript">document.location="changep.php?act=notdone";</script>';
					}
				
			} 
?>

<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Job Bidder -  Administration</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="images/newstyles.css" type=text/css rel=stylesheet>
<SCRIPT src="images/stmenu.js" type=text/javascript></SCRIPT>
<script type="text/javascript">
function validate(theForm)
{

        if (theForm.passcode.value == "")
        {
                  alert("Enter Password");
				  theForm.passcode.focus();
                  return false;
   }

        if (theForm.u1.value == "")
        {
                alert ("Enter Login ID");
				theForm.u1.focus();
                return false;
        }


        return true;
}
</script>
<META content="MSHTML 6.00.2900.3492" name=GENERATOR>
<style type="text/css">
<!--
.style3 {color: #000000}
.style2 {color: #0000FF}
.linkcls {		color:#FFFFFF; font-weight: bold; font-family:Arial, Helvetica, sans-serif;
		font-size: 12px;
}
.style20 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</HEAD>
<BODY><?php if ($_SESSION['adminid']==1)
				require 'includes/adminmenu.php';
			else
				require 'includes/menu.php'; ?>

<TABLE cellSpacing=0 cellPadding=0 width="99%" height="78%" align=left style="vertical-align:top;" border="0">
  <!--DWLayoutTable-->
  <TBODY>
        <TR>
           <TD  bgcolor="#FFFFFF" align="left" valign="top" style="border-right:10px solid #ebebeb; width:140px;">
            <?php 
			if ($_SESSION['adminid']==1)
				require 'includes/adminleftMenu.php';
			else
				require 'includes/leftMenu.php';
			?></TD>
          <TD   align="left" valign="top"  bordercolor="#FF6600" style="padding-left:15px;"><p><span class="titulos" ><span class="botones"><font size="3" style="verdana" color="#015fe7"><BR><B>Security </B></font></span></span></p>
          
            <div align="left" style="vertical-align:top">
              <table width="98%" border="0" style="border:1px solid #000000" cellspacing="0" cellpadding="0">
                <tr>
                  <td bgcolor="#1A3E6E" class="boxtop"><div align="center" class="linkcls">CHANGE
                    PASSWORD</div></td>
                </tr>
                <tr>
                  <td height="258"><form action="changep.php" method="post" enctype="multipart/form-data" name="frmurl" id="frmurl" onSubmit="return validate(this)">
                      <table width="521" height="246" border="0" align="center" cellspacing="5">
                        <tr align="center" valign="top">
                          <td height="21" colspan="3"><font  size="2"  color="#CC0033" face="Arial, Helvetica, sans-serif">
                            <?php
						   if($_REQUEST['act']=='done')
						   { ?>
                            &nbsp;</font>
                              <table width="278" border="0" bgcolor="#F4F3E8"
		   style="BORDER-TOP: #767238 1px solid;
  				  BORDER-BOTTOM: #767238 1px solid;
		          BORDER-LEFT: #767238 1px solid;
                  BORDER-RIGHT: #767238 1px solid;">
                                <tr>
                                  <td height="17" align="center" valign="top" bgcolor="#006633"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Password 
                                    has been changed successfully!</strong></font></td>
                                </tr>
                              </table>
                            <?php }
						   ?>
                              <br />
                              <font  size="2"  color="#CC0033" face="Arial, Helvetica, sans-serif">
                              <?php
						   if($_REQUEST['act']=='notdone')
						   { ?>
                                &nbsp;</font>
                              <table width="451" border="0" bgcolor="#F4F3E8"
		   style="BORDER-TOP: #767238 1px solid;
  				  BORDER-BOTTOM: #767238 1px solid;
		          BORDER-LEFT: #767238 1px solid;
                  BORDER-RIGHT: #767238 1px solid;">
                                <tr>
                                  <td width="443" height="17" align="center" valign="top" bgcolor="#990000"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Your Old Password is not correct, Please Try with valid Password.</strong></font></td>
                                </tr>
                              </table>
                            <?php }
						   ?>
                              <?php
						   if($_REQUEST['act']=='notmatch')
						   { ?>
                            &nbsp;</font>
                            <table width="451" border="0" bgcolor="#F4F3E8"
		   style="BORDER-TOP: #767238 1px solid;
  				  BORDER-BOTTOM: #767238 1px solid;
		          BORDER-LEFT: #767238 1px solid;
                  BORDER-RIGHT: #767238 1px solid;">
                              <tr>
                                <td width="443" height="17" align="center" valign="top" bgcolor="#990000"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Second Password Does not match with First One.</strong></font></td>
                              </tr>
                            </table>
                            <?php }
						   ?>                          </td>
                        </tr>
                        <tr valign="top">
                          <td width="30" valign="middle" height="1"><div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; </font></div></td>
                          <td width="133" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> User Name:&nbsp;</font></td>
                          <td width="302" height="1"><p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">(<strong><?php echo $_SESSION['adminuser']?></strong>)</font></p></td>
                        </tr>
                        <tr valign="top">
                          <td valign="middle" height="1"><div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; </font></div></td>
                          <td valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> Old Password:&nbsp;</font></td>
                          <td height="1"><p align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
                              <input name="p1" type="password" class="First" id="p1" style="font-family: Verdana; font-size: 10pt; color: #000066; border: 1px solid #CAC3BF;background-image:     url('field_bg.jpg')" size="30" />
                          </font></p></td>
                        </tr>
                        <tr valign="top">
                          <td height="24" valign="middle"><div align="left"></div></td>
                          <td height="24" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">New 
                            Password:&nbsp;&nbsp;</font></td>
                          <td height="24"><div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
                              <input name="p2" type="password" class="First" id="active2" style="font-family: Verdana; font-size: 10pt; color: #000066; border: 1px solid #CAC3BF;background-image:     url('field_bg.jpg')" value="" size="30" />
                          </font></div></td>
                        </tr>
                        <tr valign="top">
                          <td height="1" valign="middle"><div align="left"></div></td>
                          <td height="1" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Re-Password:</font>&nbsp;&nbsp;</td>
                          <td height="1"><div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
                              <input name="p3" type="password" class="First" id="dorder22" style="font-family: Verdana; font-size: 10pt; color: #000066; border: 1px solid #CAC3BF;background-image:     url('field_bg.jpg')" size="30" />
                          </font></div></td>
                        </tr>
                        <tr valign="top">
                          <td colspan="3" height="21"><div align="center">
                              <table width="300" border="0">
                                <tr>
                                  <td><hr />                                  </td>
                                </tr>
                              </table>
                          </div></td>
                        </tr>
                        <tr valign="top">
                          <td colspan="3" height="26"><div align="center">
                              <input type="hidden" name="targetaction"  value="editrecord" />
                              <input type="hidden" name="username" value="<?php echo $_SESSION['adminuser']?>" />
                              <input type="submit" name="Submit" value="Change Password" class="boxtop" />
                              <input type="button" name="Cancel" tabindex="4" value="Cancel" class="boxtop" onClick="document.location='security.php'; return false;" />
                          </div></td>
                        </tr>
                      </table>
                  </form></td>
                </tr>
              </table>
            </div>

          <LABEL> </LABEL>            <LABEL> </SPAN></LABEL></TD>
        </TR>
    
    
  </TBODY>
</TABLE>

</BODY></HTML>
