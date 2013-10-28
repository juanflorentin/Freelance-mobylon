<?php
error_reporting(0);
session_start();
include_once "admin/includes/connection.php";
include "functions.php";
?>
<?php 
$jbid = $_REQUEST['jbid'];
$act_sql="Update tbljobs set featured='1',online='1' where id='$jbid'";
mysql_query($act_sql);	
?>
<?php include './themes/default/header.php'; ?>

<div id="main">
	<div class="container">
		<div class="row">
			<div class="span9">
<div class="page-header"><center><h1>Application Status</h1></center></div>
<div class="span7 offset1">

<div class="well"><center><div class="alert alert-success"><img src="img/check2.gif" width="36" height="38" align="absmiddle" /><b>      Thank you for contacting us. We will be in touch with you very soon.</b></div></center><br><br>
<center> <input name="btn" class="btn btn-primary btn-large" type="button" value="Back" onclick="document.location='index.php';"/></center>
</div>
		</div>
			</div>
		<?php include './themes/default/sidebar.php'; ?>
		</div>
	</div>
</div>
					
<?php include './themes/default/footer.php'; ?>