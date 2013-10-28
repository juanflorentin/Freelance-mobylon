<?php

function getworld($id)
{
	$q="select * from tblworld where id='".$id."'";
	$result= mysql_query($q);
	$row=mysql_fetch_array($result);
	$name=$row["name"];
	return $name;
}

function getcountry($id)
{
	$q="select * from tblcountry where id='".$id."'";
	$result= mysql_query($q);
	$row=mysql_fetch_array($result);
	$name=$row["name"];
	return $name;
}
?>