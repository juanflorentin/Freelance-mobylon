<?php include_once "includes/connection.php";
include_once "includes/checksession.php"; 
?>

<?php 

	function checkAccess2($userID2,$name2) { 
	//echo "I am here";
	$ssql2="SELECT * FROM users_access WHERE userID = '$userID2' && name = '$name2' ";
	//echo $ssql;
	
	$check_access2 = @mysql_num_rows(@mysql_query($ssql2));
	
	if($check_access2 > 0) { 
	return 1;
	} else { 
	return 0;
	}
}
session_start();
?>
<TABLE class=newchispa cellSpacing=0 cellPadding=0 width=948 border=0>
  <!--DWLayoutTable-->
  <TBODY>
    <TR> 
      <TD height="120" align="right" vAlign=middle background="images/header.jpg" style="border-bottom: 2px solid #FF9933;"> <P><font size="2" face="Verdana, Arial, Helvetica, sans-serif">You 
        are logged in as (<font color="#FF6600" size="4">
        <?php echo $_SESSION['adminuser'];?>
        </font>)</font></P>        </TD>
    </TR>
  </TBODY>
</TABLE>
<table width="100%"><tr><TD  colspan="2" valign="middle" style="border-bottom:1px solid #cccccc; padding-left: 10px; background:url(images/pbg.gif); height:30px;">
<a href="dashboard.php">Home</a>
 <?php
  	$userID2= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name2="members";
    $rslt2= checkAccess2($userID2,$name2);
	if($rslt2 >= 1) {
   ?>
<font color="#FFFFFF">|</font> <a href="managemembers.php">Manage Members</a>
<?php } ?>
<?php
  	$userID2= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name2="newsletter";
    $rslt2= checkAccess2($userID2,$name2);
	if($rslt2 >= 1) {
   ?>
<font color="#FFFFFF">|</font> <a href="newslettermem.php">News Letters</a> 
<?php } ?>
<?php
  	$userID2= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name2="enquiries";
    $rslt2= checkAccess2($userID2,$name2);
	if($rslt2 >= 1) {
   ?>
<font color="#FFFFFF">|</font> <a href="enquiries.php">Enquiries</a> 
<?php } ?>
<?php
  	$userID2= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name2="support";
    $rslt2= checkAccess2($userID2,$name2);
	if($rslt2 >= 1) {
   ?>
<font color="#FFFFFF">|</font> <a href="#">Support</a>
<?php } ?>
<?php
  	$userID2= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name2="news";
    $rslt2= checkAccess2($userID2,$name2);
	if($rslt2 >= 1) {
   ?>
<font color="#FFFFFF">|</font> <a href="#">News</a>
<?php } ?>
<?php
  	$userID2= $_SESSION['adminid'];
	//echo $userID;
	//exit;
	$name2="setting";
    $rslt2= checkAccess2($userID2,$name2);
	if($rslt2 >= 1) {
   ?>
<font color="#FFFFFF">|</font> <a href="manageadmin.php">Setting</a> 
<?php } ?>
<font color="#FFFFFF">|</font> <a href="logout.php">Logout</a></td></tr></table>