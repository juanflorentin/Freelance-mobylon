<?php
include_once "includes/checksession.php";
error_reporting(0);
include_once "includes/connection.php";


//Getting total number of members
$sql_member=mysql_fetch_array(mysql_query("SELECT COUNT(mid) AS total_members from tblmember"));

//Getting total number of stock
$sql_stock=mysql_fetch_array(mysql_query("SELECT COUNT(stockid) AS total_stock from tblstock"));

//Getting total number of pictures
$sql_pic=mysql_fetch_array(mysql_query("SELECT COUNT(stockid) AS total_pic from tblstock where flag='photo'"));

//Getting total number of wallpaper
$sql_wallpaper=mysql_fetch_array(mysql_query("SELECT COUNT(stockid) AS total_wallpaper from tblstock where flag='wallpaper'"));

//Getting total number of powerpoint
$sql_powerpoint=mysql_fetch_array(mysql_query("SELECT COUNT(stockid) AS total_powerpoint from tblstock where flag='powerpoint'"));

//Getting total number of Videos
$sql_video=mysql_fetch_array(mysql_query("SELECT COUNT(stockid) AS total_video from tblstock where flag='video'"));

//Getting total number of Music
$sql_music=mysql_fetch_array(mysql_query("SELECT COUNT(stockid) AS total_music from tblstock where flag='music'"));

//Getting total number of Flash
$sql_flash=mysql_fetch_array(mysql_query("SELECT COUNT(stockid) AS total_flash from tblstock where flag='flash'"));

//Getting total number of avatar
$sql_avatar=mysql_fetch_array(mysql_query("SELECT COUNT(stockid) AS total_avatar from tblstock where flag='avatar'"));

//Getting total number of Smiley
$sql_smiley=mysql_fetch_array(mysql_query("SELECT COUNT(stockid) AS total_smiley from tblstock where flag='smiley'"));

?>
<HTML><HEAD><TITLE>The Jobs Board - Administration</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="images/newstyles.css" type=text/css rel=stylesheet>

<META content="MSHTML 6.00.2900.3492" name=GENERATOR>
<style type="text/css">
<!--
.style6 {color: #0000FF}
.style7 {color: #0000FF; font-size: 14px; }
-->
</style>
</HEAD>
<BODY>

<?php 
if ($_SESSION['adminid']==1)
				require 'includes/adminmenu.php';
			else
				require 'includes/menu.php'; ?>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" style="border-right: 1px solid #CC6600;"><fieldset style="width:85%; background-color:#9ebff9" >
          <legend style="background-color:#165bd5"><span class="style1 style6"><strong>Site Stat - Overview </strong></span></legend>
            <table width="100%" border="0" cellpadding="5" class="myfont">
              <tr>
                <td>Total Registered Employer:                </td>
                <td><strong>56</strong></td>
              </tr>
              <tr>
                <td>Total Job Seekers :</td>
                <td><strong>13</strong></td>
              </tr>
              <tr>
                <td>Total Open Jobs  :</td>
                <td><strong>4</strong></td>
              </tr>
              <tr>
                <td>Total Enquiries Today:</td>
                <td><strong>12</strong></td>
              </tr>
        </table>
        </fieldset> <br>
		
		<?php 
						 
						 $ssql="select * from tblmailbox where ownerid > 0 and readsts='0' order by id desc";
						 //echo $ssql;
						  $result = mysql_query($ssql); 
						 $RecordCount = mysql_num_rows($result);
				?>
        <fieldset style="width:85%; background-color:#9ebff9" >
			<legend style="background-color:#165bd5"><span class="style1 style6"><strong>Site MailBox </strong></span></legend>
			<img src="images/g_status.gif" width="48" height="48"><a href="enquiries_site.php" style="color:#0066FF; font-size: 14px; text-decoration:underline"><?=$RecordCount?> </a>new Emails 
		</fieldset>
		</td>
    <td><TABLE cellSpacing=0 cellPadding=0 width="75%" align=center border=0>
      
      <TBODY>
        
        <TR>
          <TD height=33 align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
          <TD width="34%" align=right vAlign=center class=formulario><div align="center"><span style="HEIGHT: 40px"> <a href="managelisting.php"> <img src="images/CMS.gif" name="sitb" width="55" height="55" style="border:1px solid #ccc; padding:3px;" border="0"  id="sitb"></a></span></div></TD>
          <TD width="39%" align=right vAlign=center class=formulario><div align="center"><span style="HEIGHT: 40px"><a href="gsettings.php"> <img style="border:1px solid #ccc; padding:3px;" src="images/builder.jpg" name="sitb" width="55" height="55" border="0"  id="sitb"></a></span></div></TD>
          <TD width="27%" align=center vAlign=center class=formulario><a href="security.php"><img style="border:1px solid #ccc; padding:3px;" src="images/keys.gif" name="sitb" width="55" height="55" border="0"  id="sitb"></a></TD>
          <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
        </TR>
        <TR>
          <TD height=19 align=right vAlign=center><LABEL> </LABEL></TD>
          <TD align=right vAlign=center><div align="center"><a href="managelisting.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"> Jobs Listings </a></div></TD>
          <TD align=right vAlign=center class=formulario><div align="center"> <a href="sitebuilder.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a>
                <div align="center"><a href="enquiries.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a><a href="gsettings.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px">General Settings </a></div>
          </div></TD>
          <TD align=right vAlign=center class=formulario><div align="center"><a href="security.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px">Security </a></div></TD>
          <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
        </TR>
        <TR>
          <TD height=36 align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
          <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
          <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
          <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
          <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
        </TR>
        
        
        <TR>
          <TD height=33><!--DWLayoutEmptyCell-->&nbsp;</TD>
          <TD height=33 colspan="3"><!--DWLayoutEmptyCell-->&nbsp;</TD>
          <TD height=33>&nbsp;</TD>
        </TR>
        <TR>
          <TD height=33 align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
          <TD width="34%" align=right vAlign=center class=formulario><div align="center"><span style="HEIGHT: 40px"> <a href="jobcategories.php"> <img src="images/pactivities.gif" name="sitb" width="55" height="55" style="border:0px solid #ccc; padding:3px;" border="0"  id="sitb"></a></span></div></TD>
          <TD align=right vAlign=center class=formulario><div align="center"><span style="HEIGHT: 40px"><a href="logout.php"></a><a href="security.php"></a></span><a href="logout.php"><img style="border:0px solid #ccc; padding:3px;"  src="images/logout.png" name="sitb" border="0"  id="sitb"></a></div></TD>
          <TD align=right vAlign=center class=formulario>&nbsp;</TD>
          <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
        </TR>
        <TR>
          <TD height=19 align=right vAlign=center><LABEL> </LABEL></TD>
          <TD align=right vAlign=center><div align="center"><a href="jobcategories.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"> Jobs Categories </a></div></TD>
          <TD align=right vAlign=center class=formulario><div align="center"><a href="logout.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a>
                  <div align="center"><a href="logout.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a><a href="security.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a>
                      <div align="center"> <a href="sitebuilder.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a>
                          <div align="center"><a href="enquiries.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a><a href="logout.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px">Logout</a></div>
                      </div>
                  </div>
          </div></TD>
          <TD align=right vAlign=center class=formulario>&nbsp;</TD>
          <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
        </TR>
        
        
        <TR>
          <TD height=33><LABEL> </SPAN></LABEL></TD>
          <TD height=33 colspan="3"><table width="753"  border="0">
              <tr>
                <td width="98">&nbsp;</td>
                <td width="645"><hr>
                    <div align="center" class="botones">Copyright (c) 2012 The Jobs Board. All rights reserved</div></td>
              </tr>
          </table></TD>
          <TD height=33>&nbsp;</TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</BODY></HTML>
