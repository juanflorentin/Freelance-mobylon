<?php
error_reporting(0);
session_start();
include_once "admin/includes/connection.php";
include "functions.php";
?>
<?php include './themes/default/header.php'; ?>

<div id="main">
	<div class="container">
		<div class="row">
			<div class="span9">
			<h1>Search results</h1>
			
<?php 

$query = $_REQUEST['search'];
					$min_length = 2;
					if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
					$query = htmlspecialchars($query); 
					// changes characters used in html to their equivalents, for example: < to &gt;
					$query = mysql_real_escape_string($query);
					$result = mysql_query("SELECT * FROM tbljobs
WHERE  featured='1' and (`ID` LIKE '%".$query."%') OR(`jobtitle` LIKE '%".$query."%') OR (`specialnote` LIKE '%".$query."%') OR (`location` LIKE '%".$query."%')OR (`ddesc` LIKE '%".$query."%')") or die(mysql_error());

										$totjobs=mysql_num_rows($result);

										if($totjobs>0)

												{

													echo "<h2><br> Search for <font color=black>'".$query."'</font> returned <font color=black>$totjobs</font> results.</h2>";

												}

												$i = 1;
												while ($row2 = mysql_fetch_array($result, MYSQL_BOTH)) {
											?>

<div class="well"><a class="btn btn-primary pull-right" href="jobdetail.php?jobid=<?=$row2['id']?>">View Details</a>
<h3><a style="text-decoration:none;" href="jobdetail.php?jobid=<?=$row2['id']?>"><?php echo $row2['jobtitle'];?></a></h3>
<p><?=$row2['location'];?></p>                                                
<p><?php echo substr($row2 ['ddesc'], 0, 256);?>[...]</p>
</div>
				<?php 		
  				  $i++;
					}
					if($totjobs==0)
						{
							echo "<h2><br> Search for <font color=black>'".$query."'</font> returned <font color=black>$totjobs</font> results.</h2>";

						}

					}

else{ // if query length is less than minimum

echo "<h3>Minimum search query length is ".$min_length."</h3>";

}

					?>
				
			</div>
			<?php include './themes/default/sidebar.php'; ?>
		</div>
	</div>
</div>


<?php include './themes/default/footer.php'; ?>