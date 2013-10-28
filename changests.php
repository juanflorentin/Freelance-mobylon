<?php 
include_once "admin/includes/connection.php";
$id=$_GET["id"];
if($_GET["work"]=="online") {
		$act_sql="Update tbljobs set online='1' where id='$id'";	
		}
else
		{
			$act_sql="Update tbljobs set online='0' where id='$id'";	
		}
             mysql_query($act_sql);	
	 header("Location:profile.php");
?>