<?php
session_start();
include_once "includes/connection.php";



//--------Location Info -------------------------
  $companyname=$_POST['cname'];
  
  $cperson=$_POST['cperson'];
  $website=$_POST['website'];
  
   $email=$_POST['email'];
    $location=$_POST['location'];
	
	 $jid=$_POST['jid'];
	
  
  /*
  echo $wcountry;
  echo "<br>";
  echo $state;
  echo "<br>". $city;
  exit;
  $sel_town= $_POST['city'];
  $sel_neigh=$_POST['nbhour'];
  
  $no_location=$_POST['nolocation'];
  
  //echo $sel_town;
  
  if($no_location!=1){ 
   $location_sql="insert into tbllocation set warea='$worldarea', 
  					country='$sel_country', city='$sel_town', region='$sel_region', neighbour='$sel_neigh',chckbox='$no_location'";
 
 // mysql_query($location_sql);
  $max_location_sql="select Max(id) as id from tbllocation";
  $max_location_res=mysql_query($max_location_sql);
  $max_location= mysql_fetch_array($max_location_res);
  $max_location_id= $max_location['id'];
 }
 */
 // ------Property Info -------------------------
  $jobtitle = $_POST['jobtitle']; 
  $jobcat = $_POST['jobcat'];
  $empid = $_SESSION['memid'];
  $address1 = $_POST['address1'];
  $budget = $_POST['budget'];
  $zipcode = $_POST['zipcode'];
  $bidtype = $_POST['bidtype'];
 
  $pcode = $_POST['pcode'];
  $country = $_POST['country'];
  $type=$_POST['type'];
  $bdesc=$_POST['bdesc'];
  $ddesc=$_POST['ddesc'];
  $jobdate=$_POST['jobdate'];
  $special=$_POST['special'];
  $available=$_POST['available'];
  $jobexpdate=$_POST['jobexpdate'];
  
 // echo $empid;
  //exit;
  
  //-----------------
//echo $_FILES["photo"]["type"];


		
		
	
				 
		 //$image= $new_name . "_".$_FILES['image']['name'];

  
  
  $today=date("Y-m-d");
 $sql_home="Update tbljobs 
 		set jobtitle='$jobtitle',
		jobcatid='$jobcat',
		
		cname='$companyname', 
		address1='$address1', 
		
		specialnote='$special', 
		bidaccepttype='$bidtype',
		bdesc='$bdesc',
	
		jobstartdate='$jobdate',
		
		location ='$location',
	
		website ='$website',
		empemail ='$email',
		
		
		ddesc='$ddesc' where id='$jid'";
		




mysql_query($sql_home);



  //$max_listing_sql="select Max(id) as id from tbljobs";
// $max_listing_res=mysql_query($max_listing_sql);
 //$max_listing=mysql_fetch_array($max_listing_res);

  
 // echo  $id;

//exit;
  
//--------------Property Specs--------------------


//-------------Property View----------------------------




//------------Things Allowed----------------------------

//------------Features----------------------------------



//---------------Activities----------------

//--------------Currency--------------------------




 //$sql_img_1="insert into tbljobfiles set listingid='$max_listing_id', photo='$image', type=1";
 //mysql_query($sql_img_1);






header("Location:managelisting.php?act=update");


?>