<?php

error_reporting(0);

include_once "includes/connection.php";
include_once "includes/checksession.php";

$bcheck=$_POST['bcheck'];
if($bcheck=='true'){
	$name = $_POST['name'];
	$keywords=$_POST['keywords'];
	$admin=$_POST['admin'];
	$paypal=$_POST['paypal'];
	$footer=$_POST['footer'];
	$fee=$_POST['fee'];
	$listingdays=$_POST['listingdays'];
	$freelisting=$_POST['freelisting'];
	if($freelisting!=1)
		$freelisting=0;
	$insert="Update general set title ='$name', 
			email='$admin',
			fee='$fee',
			paypal='$paypal',
			listingdays='$listingdays',
			freelisting='$freelisting',  	
			copyright='$footer',
			keywords='$keywords'";
	//echo $insert;
	
	mysql_query($insert)  or die(mysql_error());
	echo "<script>document.location='gsettings.php?act=okey'</script>";
}
	 	$search=$_POST['search'];
		?>



<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>The Jobs Board - Administration</TITLE>

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
-->
</style></HEAD>
<BODY>

<?php if ($_SESSION['adminid']==1)

				require 'includes/adminmenu.php';

			else

				require 'includes/menu.php'; ?>

<?php

$result_sql="SELECT * from general";
$result = mysql_query($result_sql);
$row=mysql_fetch_array($result);
 

?>

  

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

          <TD   align="left" valign="top"  bordercolor="#FF6600" style="padding-left:15px;"><p><span class="titulos" ><span class="botones"><font size="3" style="verdana" color="#015fe7"><BR><B>General Settings </B></font></span></span></p>

           
			
            <form name="form1" method="post" action="gsettings.php">
            <table width="90%" border="0">
                <tr>
                  <td></font></td>
                  <td></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><font face="Arial, Helvetica, sans-serif" size="2">Admin Email:</font></td>
                  <td><input name="admin" id="admin" value="<?=$row["email"]?>" class="mytextbox" type="text" size="50"  /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><font face="Arial, Helvetica, sans-serif" size="2">Paypal ID:</font></td>
                  <td><input name="paypal" id="paypal" value="<?=$row["paypal"]?>" class="mytextbox" type="text" size="50"  /></td>
                  <td>&nbsp;</td>
                </tr>
				<? if ($row["freelisting"]==1)
						{
							$chk='checked="checked"';
						}
					else
						{
							$chk='';
						}?>
                <tr>
                  <td><font face="Arial, Helvetica, sans-serif" size="2">Free Listings:</font></td>
                  <td><label>
                    <input name="freelisting" type="checkbox"  <?=$chk?> id="freelisting" value="1">
                  </label></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><font face="Arial, Helvetica, sans-serif" size="2">Listing Days :</font></td>
                  <td><input name="listingdays" id="listingdays" value="<?=$row["listingdays"]?>" class="mytextbox" type="text" size="50"  /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><font face="Arial, Helvetica, sans-serif" size="2">Project Listing Fee:</font></td>
                  <td><input name="fee" id="fee" value="<?=$row["fee"]?>" class="mytextbox" type="text" size="10"  />
                  -<span class="titulos">USD</span></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input name="bcheck" value="true" type="hidden"><input name="submit" class="boxtop" style="background-color:#0066CC;" type="submit" value="Save Settings"/>
&nbsp;&nbsp;
<input name="btn" class="boxtop" style="background-color:#0066CC;" type="button" value="Cancel" onClick="document.location='managelisting.php';"/></td>
                  <td>&nbsp;</td>
                </tr>
              </table>
            </form>


          <LABEL> </LABEL>            <LABEL> </SPAN></LABEL></TD>

        </TR>

    

    

  </TBODY>

</TABLE>


</BODY></HTML>