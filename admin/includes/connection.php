<?php

$host="localhost";
$database="juanpif_freelancepro";
$dbusername="juanpif_bemob";
$password="Root123456";


$connection = mysql_connect($host,$dbusername,$password);
mysql_select_db($database, $connection);

function query($sql) {
	// do query
	$this->query_id = @mysql_query($sql, $this->link_id);

	if (!$this->query_id) {
		$this->oops("<b>MySQL Query fail:</b> $sql");
	}
	
	$this->affected_rows = @mysql_affected_rows();

	return $this->query_id;
}

function fetch_array($query_id=-1) {
	// retrieve row
	if ($query_id!=-1) {
		$this->query_id=$query_id;
	}

	if (isset($this->query_id)) {
		$this->record = @mysql_fetch_assoc($this->query_id);
	}else{
		$this->oops("Invalid query_id: <b>$this->query_id</b>. Records could not be fetched.");
	}

	// unescape records
	if($this->record){
		$this->record=array_map("stripslashes", $this->record);
		//foreach($this->record as $key=>$val) {
		//	$this->record[$key]=stripslashes($val);
		//}
	}
	return $this->record;
}#-#fetch_array()

function query_first($query_string) {
	echo "here";
	exit;
	$query_id = $this->query($query_string);
	$out = $this->fetch_array($query_id);
	$this->free_result($query_id);
	return $out;
}#-#query_first()
?>