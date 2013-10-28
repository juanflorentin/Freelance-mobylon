<?php error_reporting(0);
include_once "includes/connection.php";

include_once "includes/checksession.php";

?>

<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Job Bidder -  Administration</TITLE>
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
              <table width="94%" border="0" cellpadding="5" cellspacing="1" style="WIDTH: 98%">
                <tbody>

                  <tr>
                    <td align="middle"><table width="100%"
                  border="0" cellpadding="0" cellspacing="3" style="WIDTH: 98%;border:0px solid #000;" >
                      <tbody>
                        <tr>
                          <td align="right" style="WIDTH: 25%; HEIGHT: 14px; padding-left:20px;">&nbsp;</td>
                          <td align="left" style="WIDTH: 25%; HEIGHT: 14px; padding-left:20px;">&nbsp;</td>
                          <td style="WIDTH: 25%; HEIGHT: 14px">&nbsp;</td>
                          <td style="WIDTH: 25%; HEIGHT: 14px">&nbsp;</td>
                        </tr>
                        
                        <tr>
                          <td align="right" style="WIDTH: 25%; HEIGHT: 14px; padding-left:20px;"><img src="images/Users.png" width="55" height="55" /></td>
                          <td align="left" style="WIDTH: 25%; HEIGHT: 14px; padding-left:20px;" class="tables"><a href="changeu.php">Change User Name </a></td>
                          <td style="WIDTH: 25%; HEIGHT: 14px">&nbsp;</td>
                          <td style="WIDTH: 25%; HEIGHT: 14px">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="6%" align="right" style="WIDTH: 25%; HEIGHT: 14px; padding-left:20px; padding-top:5px;"><img src="images/sec.png" width="50" height="50" /></td>
                          <td width="44%" align="left" style="WIDTH: 25%; HEIGHT: 14px; padding-left:20px;" class="tables"><a href="changep.php" >Change Password</a></td>
                          <td width="25%" style="WIDTH: 25%; HEIGHT: 14px">&nbsp;</td>
                          <td width="25%" style="WIDTH: 25%; HEIGHT: 14px">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table>
            </div>

          <LABEL> </LABEL>            <LABEL> </SPAN></LABEL></TD>
        </TR>
    
    
  </TBODY>
</TABLE>

</BODY></HTML>
