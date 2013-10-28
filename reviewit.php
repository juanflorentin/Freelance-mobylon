<?php 
include_once "admin/includes/connection.php";
//include "chksession.php";
include "functions.php";
$id=$_SESSION['memid'];
//echo $id;
$id=$_REQUEST['id'];
$member_sql="select * from tbljobs where id='$id'";
	$res=mysql_query($member_sql);
	$row=mysql_fetch_array($res);
	$jobtitle= $row['jobtitle'];
	$cid= $row['jobcatid'];
	//echo $cid;
	//exit;
	
$result_sql="SELECT * from general";
$resultg = mysql_query($result_sql);
$rowg=mysql_fetch_array($resultg);	
?>
<?php include './themes/default/header.php'; ?>
<div id="main">
	<div class="container">
		<div class="row">
			<div class="span9">
<div class="page-header"><center><h1>Review your listing</h1></center></div>
<div class="span7 offset1">

<?php

						if($rowg['freelisting']==0) {

						

							$action='https://www.paypal.com/cgi-bin/webscr';

						} else {

						$action='thanks.php';

						}

						?>

<form action="<?=$action;?>" method="post" name="frmpay" id="frmpay"> 

<div class="well">
<div class="alert alert-success"><img src="img/check2.gif" width="36" height="38" align="absmiddle" />     Your Listing has been successfully updated</div>
<h3>Project Information</h3>
<div class="row">
	<div class="span3"><h4>Project title: </h4></div>
	<div class="span3"><h4><?=$jobtitle;?></h4></div>
</div>	
<div class="row">
	<div class="span3"><h5>Project Location: </h5></div>                               
	<div class="span3"><h6><?=$row['location'];?> </h6></div>
</div>                      
<div class="row">
	<div class="span3"><h5>Category: </h5></div>                               
	<div class="span3"><h6><?=getcatname($cid);?></h6></div>
</div>        
<div class="row">
	<div class="span3"><h5>Project Type: </h5></div>                          
	<div class="span3"><h6><?=$row['bidaccepttype'];?> </h6></div>
</div>        
<div class="row">
	<div class="span3"><h5>Project Description: </h5></div> 
	<div class="span3"><p><?=$row['ddesc'];?></p></div>
</div>
<div class="row">
	<div class="span3"><h5>Skills Required: </h5></div>
	<div class="span3"><p><?=$row['specialnote'];?></p></div>
</div>

<h3>Employer Information</h3>
<div class="row">
	<div class="span3"><h5>Company name: </h5></div>
	<div class="span3"><h6><?=$row['cname'];?></h6></div>
</div>
<div class="row">
	<div class="span3"><h5>Website: </h5></div>                 
	<div class="span3"><h6><?=$row['website'];?></h6></div>
</div>
<div class="row">
	<div class="span3"><h5>Email: </h5></div>                 
	<div class="span3"><h6><?=$row['empemail'];?></h6></div>
</div>
<br><br>
<center> <input name="btn" class="btn btn-primary btn-large" type="button" value="Back" onclick="document.location='alljobs.php';"/></center>

                      <input type="hidden" name="cmd" value="_xclick" />

                        <input type="hidden" name="business" value="<?=$rowg['paypal'];?>" />

                        <!-- to change-->

                        <input type="hidden" name="receiver_email" value="<?=$rowg['paypal'];?>"/>

                        <!-- to change-->

                        <input type="hidden" name="item_name" value="Freelancer Pro - Project Listing Fee." />

                        <input type="hidden" name="custom" value="<?php echo $id?>" />

                        <input type="hidden" name="notify_url" value="http://www.easyonjob.com/ipn.php?user=<?php echo $_SESSION['session_login'];?>"/>

                        <input type="hidden" name="return" value="http://www.easyonjob.com/thanks.php?fee=sub" />

                        <input type="hidden" name="cancel_return" value="http://www.easyonjob.com/alljobs.php" />

                        <input type="hidden" name="amount" value="<?=$rowg['fee'];?>" />
                        </div>
                    </form>
  </div>
			</div>
		<?php include './themes/default/sidebar.php'; ?>
		</div>
	</div>
</div>

					
					
<?php include './themes/default/footer.php'; ?>                    
                    
                    