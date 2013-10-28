<?php 
include_once "includes/connection.php";
$id=$_GET["id"];
$mid=$_GET["mid"];
if($_GET["work"]=="featured") {
		$act_sql="Update tbljobs set featured='1',online='1' where id='$id'";	
		}
else
		{
			$act_sql="Update tbljobs set featured='0',online='0' where id='$id'";	
		}
             mysql_query($act_sql);	
//echo $act_sql;
//exit;
	if($mid=="")
		header("Location:managelisting.php");
	else
		header("Location:managemembers.php?mid=".$mid);
		
?>