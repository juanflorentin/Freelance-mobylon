<?
session_start();
//echo "waseem".$_SESSION['adminuser'];
if($_SESSION['adminuser']=='')
	{
		echo "<script>window.location='index.php';</script>";
		//header("Location:index.php");
		//exit;
	}

?>