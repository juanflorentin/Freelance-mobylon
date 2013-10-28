<?php

session_start();

include_once "admin/includes/connection.php";

include_once("generator.php");



 $jobid=$_REQUEST['jobid'];
  $companyname=$_POST['cname'];

  

  $cperson=$_POST['cperson'];

  $website=$_POST['website'];

  

   $email=$_POST['email'];

    $location=$_POST['location'];

	

  

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

  //----------Captcha check

	$success = false;
	
	if ($_POST["kind"] == "basic")	
	{
		$success = checkCaptcha($_POST, 0);
	}
	else
	{
		$success = checkCaptcha($_POST, 1) && checkCaptcha($_POST, 2) && checkCaptcha($_POST, 3);
	}

	if ($success==1)
	{
		$a=786;
	}
    else
	{
		header("Location:editjob.php?cp=err&jobid=$jobid");
		exit;
	}


//--------Location Info -------------------------

  //-----------------

//echo $_FILES["photo"]["type"];





		

		if(isset($_FILES['image']))

		 {

				 $new_name = time();

		   if($_FILES['image']['tmp_name'] != "" && copy($_FILES['image']['tmp_name'], "photos/".$new_name . "_".$_FILES['image']['name'])) 

		   {

		    	unlink($_FILES['image']['tmp_name']);

				$image= $new_name . "_".$_FILES['image']['name'];

		   }

		 }

	

	

				 

		 //$image= $new_name . "_".$_FILES['image']['name'];



  

  
$jobid=$_REQUEST['jobid'];
  $today=date("Y-m-d");

 $sql_home="Update tbljobs 

 		set empid='$empid', 

		jobtitle='$jobtitle',

		jobcatid='$jobcat',

		budget='$budget', 

		cname='$companyname', 

		address1='$address1', 

		zip='$zipcode',

		city='$city',

		country='$wcountry',

		state='$state',

		specialnote='$special', 

		bidaccepttype='$bidtype',

		bdesc='$bdesc',

		posteddate='$today',

		jobstartdate='$jobdate',

		online='1',

		location ='$location',

		contactperson='$cperson',

		website ='$website',

		empemail ='$email',

		clogo='$image',
	

		expirdate='$jobexpdate',

		ddesc='$ddesc' where id=$jobid"; 





//echo $sql_home;

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













header("Location:reviewit.php?act=update&id=$jobid");





?>