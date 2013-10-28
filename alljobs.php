<?php
error_reporting(0);
session_start();
include_once "admin/includes/connection.php";
include "functions.php";
?>
<?php include './themes/default/header.php'; ?>
<div class="main2">
<div class="container">
<div class="row about">
<div class="span4">
<h3>
<img src="img/index/commission.png" width="32" height="32" align="absmiddle" />
No Commission
</h3>
<p>Simply hire a freelancer for a small project listing price.<BR>We connect you to the best freelancers.</p>
</div>
<div class="span4">
<h3>
<img src="img/index/skype.png" width="32" height="32" align="absmiddle" />
Skype Contact
</h3>
<p>Freelancer Pro recommends to use Skype for communication and interviewing freelancers. </p>
</div>
<div class="span4">
<h3>
<img src="img/index/hire.png" width="32" height="32" align="absmiddle" />
123 Hire
</h3>
<p>
Freelancer Pro makes it easy to hire the best candidate for your project.</p>
</div>
<div class="span4">
<h3>
<img src="img/index/post.png" width="32" height="32" align="absmiddle" />
Easy Project Posting
</h3>
<p>Simple and fast job posting in just three steps. Simply manage any job post with one password.</p>
</div>
<div class="span4">
<h3>
<img src="img/index/people.png" width="32" height="32" align="absmiddle" />
Find the Best
</h3>
<p>Advertise on global marketplace for helping you to find the best freelancer. 
</p>
</div>
<div class="span4">
<h3>
<img src="img/index/exposure.png" width="32" height="32" align="absmiddle" />
Project Exposure
</h3>
<p>Freelancer Pro gives you the best global project exposure to our marketplace to hire and get hired easily. </p>
</div>
</div>
</div>
</div>
<div id="main">
<div class="container">
<div class="row">
<div class="span9"> 

<?php
	$today=date("Y-m-d");
	$tbl_name="tbljobs";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	if($_REQUEST['cid'] > 0 )
	{
		$catid=$_REQUEST['cid'];
		$query="SELECT COUNT(*) AS num from tbljobs Where online='1' and jobcatid=$catid and featured='1'";
		}
		else
		{
			$query="SELECT COUNT(*) AS num from tbljobs Where online='1' and featured='1'";
			}
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "alljobs.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
		if($_REQUEST['cid'] > 0 )
		{
			$catid=$_REQUEST['cid'];
			$sql="SELECT * from tbljobs Where online='1' and jobcatid=$catid and  featured=1 and expirdate > 	'$today'  order by id desc  LIMIT $start, $limit";
			}
			else
			{
				$sql="SELECT * from tbljobs Where online='1' and  featured='1' and expirdate > '$today'  order 	by id desc  LIMIT $start, $limit";
				}


	$result = mysql_query($sql);
	$totjobs=mysql_num_rows($result);
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination pagination-centered\"><ul>";
		//previous button
		if ($page > 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$prev\"><<</a></li>";
		else
			$pagination.= "<li class=\"disabled\"><a href=\"#\"><<</a></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"disabled\"><a href=\"#\">$counter</a></li>";
				else
					$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><span>$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><span>...</span></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
				$pagination.= "<li><span>...</span></li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><span>$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\#\">...</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
				$pagination.= "<li><a href=\#\">...</a></li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><span>$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage?page=$next\">>></a></li>";
		else
			$pagination.= "<li class=\"disabled\"><a href=\"#\">>></a></li>";
		$pagination.= "</ul></div>\n";		
	}
?>
	<?php
		$catid=$_REQUEST['cid'];
		$cname="SELECT name from tbljobcategories Where id=$catid";
		$result2 = mysql_query($cname);
		while ($row = mysql_fetch_array($result2)) {
			echo '<h1>'.htmlspecialchars($row['name']);
			echo ' Jobs</h1>';
			}
		if($_REQUEST['cid'] > 0 )
			{
		}
		else
		{	
		echo '<h1>All Project Listings</h1>'; 
			}

			?>
	<?php
	$i = 1;
		while($row = mysql_fetch_array($result, MYSQL_BOTH))
		{
		?><div class="well">

<a class="btn btn-primary pull-right" href="jobdetail.php?jobid=<?=$row['id']?>">View Details</a>
<h2><a style="text-decoration:none;" href="jobdetail.php?jobid=<?=$row['id']?>"><?php echo $row['jobtitle'];?></a></h2>
<p><?=$row['location'];?></p>
<p><?php echo substr($row ['ddesc'], 0, 256);?>[...]</p>

</div>
<?php 		
$i++;
}
if($totjobs==0)
echo '<div class="well"><h2>No projects found in this category</h2></div>';
?>
<?=$pagination?>
  	
  </div>
<?php include './themes/default/sidebar.php'; ?>
</div>
</div>
</div>
<body id="jobs">
<?php include './themes/default/footer.php'; ?>