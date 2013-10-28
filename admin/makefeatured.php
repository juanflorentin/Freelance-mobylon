<?php 
include_once "includes/connection.php";
$id=$_GET["id"];
$mid=$_GET["mid"];
if($_GET["work"]=="featured") {
		$act_sql="Update tblemployer set featured='1',online=1 where mid='$id'";	
		}
else
		{
			$act_sql="Update tblemployer set featured='0' where mid='$id'";	
		}
             mysql_query($act_sql);	
//echo $act_sql;
//exit;
	if($mid=="")
		header("Location:managemembers.php");
	else
		header("Location:managemembers.php?mid=".$mid);
		
?>