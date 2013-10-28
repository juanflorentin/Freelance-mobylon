<?php 
include_once "includes/connection.php";
$id=$_GET["id"];
$mid=$_GET["mid"];

if($_GET["work"]=="online") {
		$act_sql="Update tbljobs set online='1', adminonline='1' where id='$id'";	
		}
else
		{
			$act_sql="Update tbljobs set online='0',adminonline='0' where id='$id'";	
		}
             mysql_query($act_sql);	
	if($mid=="")
		header("Location:managelisting.php");
	else
		header("Location:ownerlisting.php?mid=".$mid);
	 	 

?>