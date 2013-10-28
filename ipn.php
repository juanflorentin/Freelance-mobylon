<?php 
include_once "admin/includes/connection.php";
//include "chksession.php";
include "functions.php";
$id=$_SESSION['memid'];
//echo $id;

$custom = $_POST['custom'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];


$act_sql="Update tbljobs set featured='1',online='1' where id='$custom'";
 mysql_query($act_sql);	
	

		$inter=("select * from general");
		$res=@mysql_query($inter);
		
		$ro=@mysql_fetch_array($res);
		
		$aemail=$ro["email"];

//Mailing to the payer

$to = $aemail;
$subject = "Easyonjob Payment Details - Paypal";

$message = "Transaction Reference Number is: ".$txn_id." 
			Payer Email is ".$payer_email. "
			Transaction amount is: ".$payment_amount."";
			
$from = $aemail;
$headers = "From: $from";
mail($to,$subject,$message,$headers);



?>
