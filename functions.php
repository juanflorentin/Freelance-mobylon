<?php 

function getcountry($cid)

	{

		$r="select * from tblcountry where id='$cid'";

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$cname=$xx["name"];		

		}

		return $cname;

	}







function getcatname($cid)

	{

		$r="select * from tbljobcategories where id='$cid'";

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$cname=$xx["name"];		

		}

		return $cname;

	}





function gettotaljobs($cid)

	{
		$today= date("Y-m-d");
		$r="select * from tbljobs where jobcatid='$cid' and featured=1 and expirdate > '$today'";

		$inter=@mysql_query($r);

		$totrec=mysql_num_rows($inter);

		

		return $totrec;

	}

	

function getalljobs($cid)

	{
		$today= date("Y-m-d");
		$r="select * from tbljobs where online=1 and featured=1 and expirdate > '$today'";

		$inter=@mysql_query($r);

		$totrec=mysql_num_rows($inter);

		

		return $totrec;

	}



function getowneremail($oid)

	{

		$r="select * from tblmember where mid='$oid'";

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$owneremail=$xx["memail"];		

		}

		return $owneremail;

	}

	

function getworld($wid)

	{

		$r="select * from tblworld where id='$wid'";

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$wname=$xx["name"];		

		}

		return $wname;

	}

function getcity($cityid)

	{

		$r="select * from tblcity where id='$cityid'";

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$cityname=$xx["name"];		

		}

		return $cityname;

	}



function getregion($rid)

	{

		$r="select * from tblregion where id='$rid'";

		//echo $r;

		//exit;

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$regionname=$xx["name"];		

		}

		return $regionname;

	}

	

	function getnbh($nbhid)

	{

		$r="select * from tblneighbour where id='$nbhid'";

		//echo $r;

		//exit;

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$nbhname=$xx["name"];		

		}

		if($nbhname=="")

			$nbhname="----";

		return $nbhname;

	}

	

function getfeature($fid)

	{

		$r="select * from tblpropertyfeatures where pfid='$fid'";

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$fname=$xx["name"];		

		}

		return $fname;

	}	





function getactivity($aid)

	{

		$r="select * from tblpropertyactivity where paid='$aid'";

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$fname=$xx["name"];		

		}

		return $fname;

	}	

	

	

function getmembername($rid)

	{

		$r="select * from tblmember where mid='$rid'";

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$fname=$xx["fname"];	

		$lname=$xx["lname"];	

		}

		$fullname= $fname. " ".$lname;

		return $fullname;

	}



function getviews($vid)

	{

		$r="select * from tblpropertyviews where pvid='$vid'";

		//echo $r;

		//exit;

		$inter=@mysql_query($r);

		while($xx = @mysql_fetch_array($inter))

		{

		$vname=$xx["name"];		

		}

		return $vname;

	}	

	

function changests($v)

	{

		if($v==1)

			return "Yes";

		else

			return "No";

	}



?>