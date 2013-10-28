<?php error_reporting(0);
include_once "includes/connection.php";
include_once "includes/checksession.php";
$targetaction=$_GET['targetaction'];			
		
			
			//===Deleting property listing
			if($targetaction=='deleteworld')
			{
				
				$id=$_GET['id'];
				$ssql="delete from tblworld  where id=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:world.php?del=tru");
			}	
			
			
			
			if($targetaction=='deletefee')
			{
				
				$id=$_GET['id'];
				$ssql="delete from tbllistingfees where id=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:listingfees.php?del=tru");
			}	
				//===Deleting property listing
			if($targetaction=='deletecountry')
			{
				
				$id=$_GET['id'];
				$ssql="delete from tblcountry  where id=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:country.php?del=tru");
			}		
			//===Deleting property listing
			if($targetaction=='deleteregion')
			{
				
				$id=$_GET['id'];
				$ssql="delete from tblregion  where id=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:region.php?del=tru");
			}		//===Deleting property listing
			if($targetaction=='deletecity')
			{
				
				$id=$_GET['id'];
				$ssql="delete from tblcity  where id=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:town.php?del=tru");
			}		//===Deleting property listing
			if($targetaction=='deleteneighbour')
			{
				
				$id=$_GET['id'];
				$ssql="delete from tblneighbour  where id=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:neighbour.php?del=tru");
			}	
		
			
			//===Deleting property listing
			if($targetaction=='dellisting')
			{
				
				$id=$_GET['listingid'];
				$mid=$_GET['mid'];
				$ssql="delete from tbljobs  where id=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:managelisting.php?del=tru&mid=".$id);
			}	
			
			//deleting owner
			
			if($targetaction=='deleteclient')
			{
				
				$id=$_GET['mid'];
				$ssql="delete from tblmember  where mid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:managemembers.php?del=tru");
			}
			
			
			if($targetaction=='deletejobcat')
			{
				
				$id=$_GET['id'];
				$ssql="delete from tbljobcategories  where id=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:jobcategories.php?del=tru");
			}
	
			if($targetaction=='delmsgp')
			{
				
				$id=$_GET['msgid'];
				// deleting the avatar file
								
				$ssql="delete from tblmailbox where id=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
				
				$ssql="delete from tblmailbox where msgid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				header("Location:enquiries_properties.php?del=tru");
			}	
			
			if($targetaction=='deletemode')
			{
				
				$id=$_GET['moid'];
				$ssql="delete from tblmoderator  where id=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:moderator.php?del=tru");
			}	
			
			if($targetaction=='deletenletter')
			{
				
				$id=$_GET['cid'];
				$ssql="delete from tblnewsletters where id=$id";
			//	echo $ssql;
				//exit;		
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				header("Location:newslettermem.php?del=tru");
			}				
			
			
			
			
			if($targetaction=='deletephoto')
			{
				
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				// deleting the Photo file
				$sqqq=mysql_fetch_array(mysql_query("select pic from tblstock where stockid='$id'"));
				$avaa="../files/stock/photo/".$sqqq['pic'];
				unlink($avaa);
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:photo.php?mid=$mmid&del=tru");
			}		

//============DELETING WALLPAPERS=====================				
		if($targetaction=='deletewalls')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				// deleting the Photo file
				$sqqq=mysql_fetch_array(mysql_query("select pic from tblstock where stockid='$id'"));
				$avaa="../files/stock/wallpaper/".$sqqq['wallpaper'];
				unlink($avaa);
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:wallpaper.php?mid=$mmid&del=tru");
			}		

//============DELETING VIDEOS=====================			
		if($targetaction=='deletevideo')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				// deleting the video file
				$sqqq=mysql_fetch_array(mysql_query("select video from tblstock where stockid='$id'"));
				$avaa="../files/stock/video/".$sqqq['video'];
				unlink($avaa);
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:videos.php?mid=$mmid&del=tru");
			}			
			
	//============DELETING MUSIC=====================			
		if($targetaction=='deletemusic')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				// deleting the video file
				$sqqq=mysql_fetch_array(mysql_query("select music from tblstock where stockid='$id'"));
				$avaa="../files/stock/music/".$sqqq['music'];
				unlink($avaa);
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:music.php?mid=$mmid&del=tru");
			}	
			
				
			
			
		//============DELETING POWERPOINT=====================			
		if($targetaction=='deletepowerpoint')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				// deleting the PPS file
				$sqqq=mysql_fetch_array(mysql_query("select powerpoint from tblstock where stockid='$id'"));
				$avaa="../files/stock/powerpoint/".$sqqq['powerpoint'];
				unlink($avaa);
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:powerpoint.php?mid=$mmid&del=tru");
			}		
			
		
			//============DELETING FLASH=====================			
		if($targetaction=='deleteflash')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				// deleting the flash file
				$sqqq=mysql_fetch_array(mysql_query("select flashgames from tblstock where stockid='$id'"));
				$avaa="../files/stock/flash/".$sqqq['flashgames'];
				unlink($avaa);
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:flash.php?mid=$mmid&del=tru");
			}				
			
		
			//============DELETING JOKES=====================			
		if($targetaction=='deletejoke')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:jokes.php?mid=$mmid&del=tru");
			}	
			
		
			//============DELETING SMILEY=====================			
		if($targetaction=='deletesmiley')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				// deleting the flash file
				$sqqq=mysql_fetch_array(mysql_query("select Smiley from tblstock where stockid='$id'"));
				$avaa="../files/stock/smiley/".$sqqq['Smiley'];
				unlink($avaa);
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:smiley.php?mid=$mmid&del=tru");
			}		
			
		//============DELETING FONTS=====================			
		if($targetaction=='deletefonts')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:fonts.php?mid=$mmid&del=tru");
			}													
			
		
		//============DELETING MEMBER AVATARS=====================			
		if($targetaction=='deleteaavv')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				// deleting the member avatars file
				$sqqq=mysql_fetch_array(mysql_query("select avatar from tblstock where stockid='$id'"));
				$avaa="../files/stock/avatars/".$sqqq['avatar'];
				unlink($avaa);
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:avatar.php?mid=$mmid&del=tru");
			}	
			
		//============DELETING LINKS=====================			
		if($targetaction=='deletelinks')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:links.php?mid=$mmid&del=tru");
			}		
			
	//============DELETING FAVORITES=====================			
	if($targetaction=='deletefav')
			{
				$stkid=$_GET['stkid'];
				$flg=$_GET['flg'];
				$un1=$_SESSION['adminuser'];
				
				$ssql="delete from tblfavorite where stockid=$stkid AND fav_by='$un1'";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				if ($flg=='photo')
					header("Location:fav_photo.php?del=tru");
				elseif ($flg=='wallpaper')
					header("Location:fav_wallpaper.php?del=tru");
				elseif ($flg=='video')
					header("Location:fav_video.php?del=tru");		
				elseif ($flg=='music')
					header("Location:fav_music.php?del=tru");
				elseif ($flg=='powerpoint')
					header("Location:fav_powerpoint.php?del=tru");
				elseif ($flg=='flash')
					header("Location:fav_flash.php?del=tru");
					
					
			}
			
	
	//============DELETING GIF=====================			
		if($targetaction=='deletegif')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				// deleting the gif file
				$sqqq=mysql_fetch_array(mysql_query("select giffile from tblstock where stockid='$id'"));
				$avaa="../files/stock/giffile/".$sqqq['giffile'];
				unlink($avaa);
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:giffile.php?mid=$mmid&del=tru");
			}	
			
		//============DELETING ANIMATION=====================			
		if($targetaction=='deleteanimation')
			{
				$id=$_GET['cid'];
				$mmid=$_GET['mid'];
				// deleting the animation file
				$sqqq=mysql_fetch_array(mysql_query("select animation from tblstock where stockid='$id'"));
				$avaa="../files/stock/animation/".$sqqq['animation'];
				unlink($avaa);
				
				$ssql="delete from tblstock where stockid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
					
				
				header("Location:flashanimation.php?mid=$mmid&del=tru");
			}
	
	//============DELETING PARTNER=====================	
	if($targetaction=='deletepartner')
			{
				
				$id=$_GET['pid'];
				$ssql="delete from tblpartner  where pid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:managepartners.php?del=tru");
			}
		if($targetaction=='deloffer')
			{
				
				$id=$_GET['id'];
				$ssql="delete from tbloffers  where offerid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:specialoffers.php?del=tru");
			}
			if($targetaction=='deletead')
			{
				
				$id=$_GET['id'];
				$ssql="delete from tblads  where adid=$id";
				$sql = mysql_query($ssql) or die
							(mysql_error()); 
							
				header("Location:ads.php?del=tru");
			}
			
			
																																																																									
?>
