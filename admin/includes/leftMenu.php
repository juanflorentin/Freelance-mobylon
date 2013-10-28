<?php include_once "includes/connection.php";
include_once "includes/checksession.php"; 
?>
<div style="padding:0px;" align="left"> 
<?php 

	function checkAccess($userID,$name) { 
	//echo "I am here";
	$ssql="SELECT * FROM users_access WHERE userID = '$userID' && name = '$name' ";
	//echo $ssql;
	
	$check_access = @mysql_num_rows(@mysql_query($ssql));
	
	if($check_access > 0) { 
	return 1;
	} else { 
	return 0;
	}
}
session_start();
?>
<table width="100%" border="0" align="left" cellpadding="6" cellspacing="1" bordercolor="#FFFFFF" class="det1">
  <TBODY>
   <tr bgcolor="#6470DD">
   <TD width="10" align="center" bgcolor="#F3F3F3" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left; ">
				<img src="images/icon_select.gif" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid" /></TD> 
      <TD bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><A 
                  href="dashboard.php">Home</A></TD>
    </TR>
  <?php
  	$userID= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name="moderator";
    $rslt= checkAccess($userID,$name);
	if($rslt >= 1) {
   ?>
	 
    <tr bgcolor="#F3F3F3"> <TD width="10" align="center" bgcolor="#F3F3F3" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left">
				<img src="images/icon_select.gif" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid" /></td>
      <TD bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><a 
                  href="manageusers.php">Admin/ Moderator</a><a 
                  href="moderator.php"></a><A 
                  href="manageclients.php"></A></TD>
    </TR>
<?php } ?>
 <?php
  	$userID= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name="members";
    $rslt= checkAccess($userID,$name);
	if($rslt >= 1) {
   ?>
	 <tr bgcolor="#F3F3F3"> <TD width="10" align="center" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left"><img src="images/icon_select.gif" width="55" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid" /></td>
      <TD bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><p><A 
                  href="moderator.php"></A><a 
                  href="managemembers.php">Members</a></p>        </TD>
    </TR>
<?php } ?>	

<?php
  	$userID= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name="enquiries";
    $rslt= checkAccess($userID,$name);
	if($rslt >= 1) {
   ?>
     <tr bgcolor="#F3F3F3">
       <TD align="center" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left"><img src="images/icon_select.gif" width="50" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid" /></TD>
       <TD bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><a 
                  href="enquiries.php">Enquiries</a></TD>
     </TR>
<?php } ?>
<?php
  	$userID= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name="builder";
    $rslt= checkAccess($userID,$name);
	if($rslt >= 1) {
   ?> 
     <tr bgcolor="#F3F3F3">
       <TD align="center" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left"><img src="images/icon_select.gif" width="50" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid" /></TD>
       <TD bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><a 
                  href="sitebuilder.php">Site Builder </a></TD>
     </TR>
<?php } ?>
<?php
  	$userID= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name="newsletter";
    $rslt= checkAccess($userID,$name);
	if($rslt >= 1) {
   ?>	 
     <tr bgcolor="#F3F3F3">
       <TD align="center" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left"><img src="images/icon_select.gif" width="50" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid" /></TD>
       <TD bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><a 
                  href="newslettermem.php">Newsletters </a></TD>
     </TR>
<?php } ?>	 
	 <?php
  	$userID= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name="stock";
    $rslt= checkAccess($userID,$name);
	if($rslt >= 1) {
   ?>
     <tr bgcolor="#F3F3F3">
       <TD align="center" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left"><img src="images/icon_select.gif" width="50" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid" /></TD>
       <TD bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><a 
                  href="#">Stock </a></TD>
     </TR>
<?php } ?>
<?php
  	$userID= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name="favorite";
    $rslt= checkAccess($userID,$name);
	if($rslt >= 1) {
   ?>
    <tr bgcolor="#F3F3F3"><TD width="10" align="center" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left">
                <IMG src="images/icon_select.gif" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid"></TD> 
      <TD bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><A 
                  href="fav_gallery.php">Favorities</A></TD>
    </TR>
<?php } ?>	
<?php
  	$userID= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name="settings";
    $rslt= checkAccess($userID,$name);
	if($rslt >= 1) {
   ?>
   
    <tr bgcolor="#F3F3F3">
      <TD align="center" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left"><img src="images/icon_select.gif" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid" /></TD>
      <TD height="40" bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><a 
                  href="#">General Setting </a></TD>
    </TR>
<?php } ?>	
<?php
  	$userID= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name="security";
    $rslt= checkAccess($userID,$name);
	if($rslt >= 1) {
   ?>
    <tr bgcolor="#F3F3F3">
      <TD align="center" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left"><img src="images/icon_select.gif" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid" /></TD>
      <TD height="40" bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><a 
                  href="security.php">Security </a></TD>
    </TR>
<?php } ?>

    <tr bgcolor="#F3F3F3">
      <TD align="center" 
                style="VERTICAL-ALIGN: middle;   TEXT-ALIGN: left"><img src="images/icon_select.gif" border="0" style="BORDER-WIDTH: 0px; WIDTH: 10px;  border-color:#CCCCCC; border-style:solid" /></TD>
      <TD height="40" bgcolor="#979FE8" 
                style="VERTICAL-ALIGN: middle; WIDTH: 100%; HEIGHT: 35px; TEXT-ALIGN: left; border-bottom: 1px solid #fff;"><a 
                  href="logout.php">Logout</a></TD>
    </TR>
  </TBODY>
</TABLE>
</div>