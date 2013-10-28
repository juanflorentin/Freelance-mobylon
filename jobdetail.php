<?php 
error_reporting(0);
session_start();
include_once "admin/includes/connection.php";
include "functions.php";
include_once("generator.php");
	 $id=$_GET["jobid"];
	 $result = mysql_query("SELECT * from tbljobs Where online='1'  and id='$id'");
	 $i = 1;
	 $r2 = mysql_fetch_array($result, MYSQL_BOTH);
function makeSeo($text, $limit=75)
    {
      // replace non letter or digits by -
      $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
      // trim
      $text = trim($text, '-');
      // lowercase
      $text = strtolower($text);
      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);
      if(strlen($text) > 70) {
      	$text = substr($text, 0, 70);
      } 
      if (empty($text))
      {
        //return 'n-a';
        return time();
      }
      return $text;
    }
	 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title><?php echo $r2['jobtitle'];?></title>

<meta description="<?=$r2['ddesc']?>">

<meta keywords="<?php echo $r2['jobtitle'];?>, freelance, freelancer, freelancers, <?=$r2['location'];?>, <?=$r2['cname']?>, employment, work, find work, jobs board, job script, listings, employers, job promotions">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/extra.css" rel="stylesheet">
<link href="css/fonts.css" rel="stylesheet">  
</head>

<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">

<?php include './themes/default/navbar.php'; ?>
<?php include './themes/default/mainheader.php'; ?>

<div id="main">
	<div class="container">
		<div class="row">
			<div class="span9"> 

	<div class="page-header"><center><h1>View Project Details</h1></center></div>
		<center><h2><?php echo $r2['jobtitle'];?></h2></center>

<div class="well"><h3>Project Information</h3>

<p class="pull-right"><a class="btn btn-primary" href="login.php?jobid=<?=$_GET['jobid'];?>">Edit</a></p>

<div class="row">
	<div class="span4"><h4>Project Title: </h4></div>
	<div class="span4"><h4><?php echo $r2['jobtitle'];?></h4></div>
</div>
<div class="row">
	<div class="span4"><h5>Location: </h5></div>                               
	<div class="span4"><h6><?=$r2['location'];?></h6></div>  
</div>
<div class="row">
	<div class="span4"><h5>Project Type: </h5></div>                          
	<div class="span4"><h6><?=$r2['bidaccepttype']?></h6></div> 
</div>
<div class="row">
	<div class="span4"><h5>Description: </h5></div> 
	<div class="span4"><p><?=$r2['ddesc']?></p></div>
</div>	


						  <?php

						  if($r2['specialnote'] !="") {

						  ?>
<div class="row">
	<div class="span4"><h5>Skills Required: </h5></div>
	<div class="span4"><p><?=$r2['specialnote']?></p></div>
</div>
<div class="row">
	<div class="span4"><h5>Expires on: </h5></div>              
	<div class="span4"><h6><?=$r2['expirdate']?></h6></div>  
</div>
						  <? } ?>

<h3>Employer Information</h3>

<div class="row">
	<div class="span4"><h5>Company name: </h5></div>
	<div class="span4"><h6><?=$r2['cname']?></h6></div>
</div>

<div class="row">
	<div class="span4"><h5>Website: </h5></div>                 
	<div class="span4"><h6><?=$r2['website']?></h6></div>
</div>

<BR><BR>
<div class="row">
	<div class="span4"><img src="img/promotethisjob.png" border="0" /></div>
<div class="span4"><div class='pw_widget pw_size_32' pw_counter_buttons'>
<a class='pw_googleplus'></a>
<a class='pw_facebook'></a>
<a class='pw_twitter'></a>
<a class='pw_linkedin'></a>
<a class='pw_stumble_upon'></a>
</div>
<script src="http://i.po.st/share/script/post-widget.js#publisherKey=8info7nr4kiagi5vfuqh" type="text/javascript"></script></div>
</div>
<BR><BR>
<center><a href="apply.php?jobid=<?=$_REQUEST['jobid'];?>"><img src="img/applyforthis.png" alt="Apply for this Job"></a></center><BR><BR><BR>

</div>
			</div>
		<?php include './themes/default/sidebar.php'; ?>
		</div>
	</div>
</div>


<?php include './themes/default/footer.php'; ?>