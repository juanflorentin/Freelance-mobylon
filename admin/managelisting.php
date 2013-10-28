<?php

error_reporting(0);

include_once "includes/connection.php";





require "functions.php";


include_once "includes/checksession.php";

	 $search=$_POST['search'];

	$ownerid=$_GET['mid'];

//===getting the name of the owner=====




	

	

?>



<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Freelancer Pro - Administration</TITLE>

<META http-equiv=Content-Type content="text/html; charset=utf-8">

<LINK href="images/newstyles.css" type=text/css rel=stylesheet>

<SCRIPT src="images/stmenu.js" type=text/javascript></SCRIPT>



<script language="JavaScript">

function sortit(str)

	{

		window.location='manageclients.php?lsts='+str;

		//alert(str);	

	

		

	}

</script>



<META content="MSHTML 6.00.2900.3492" name=GENERATOR>

<style type="text/css">

<!--

.style2 {color: #0000FF}

-->

</style>

</HEAD>

<BODY>

<?php if ($_SESSION['adminid']==1)

				require 'includes/adminmenu.php';

			else

				require 'includes/menu.php'; ?>

<?php

$PageSize = 50;

$StartRow = 0;



//Set the page no

if(empty($HTTP_GET_VARS['PageNo'])){

    if($StartRow == 0){

        $PageNo = $StartRow + 1;

    }

}else{

    $PageNo = $HTTP_GET_VARS['PageNo'];

    $StartRow = ($PageNo - 1) * $PageSize;

}



//Set the counter start

if($PageNo % $PageSize == 0){

    $CounterStart = $PageNo - ($PageSize - 1);

}else{

    $CounterStart = $PageNo - ($PageNo % $PageSize) + 1;

}



//Counter End

$CounterEnd = $CounterStart + ($PageSize - 1);

?>

  

<TABLE cellSpacing=0 cellPadding=0 width="99%" height="78%" align=left style="vertical-align:top;" border="0">

  <!--DWLayoutTable-->

  <TBODY>

        <TR>

          <TD  bgcolor="#FFFFFF" align="left" valign="top" style="border-right:10px solid #ebebeb; width:140px;">

            <?php 

			if ($_SESSION['adminid']==1)

				require 'includes/adminleftMenu.php';

			

			?></TD>

          <TD   align="left" valign="top"  bordercolor="#FF6600" style="padding-left:15px;"><p><span class="titulos" ><span class="botones"><font size="3" style="verdana" color="#015fe7"><BR><B>Manage Project Listings </B></font></span></span>

            <?php





 		$TRecord = mysql_query("SELECT * from tbljobs");

 		$result = mysql_query("SELECT * from tbljobs ORDER BY id Desc LIMIT $StartRow,$PageSize");



  

  $jobcat=0;

   if($_REQUEST['act']=='search')

   {
		$jobcat=$_REQUEST['jobcat'];
		
   		$TRecord = mysql_query("SELECT * from tbljobs where jobcatid ='$jobcat'");

 		$result = mysql_query("SELECT * from tbljobs where jobcatid ='$jobcat'  LIMIT $StartRow,$PageSize");

   }



 //Total of record

 $RecordCount = mysql_num_rows($TRecord);



 //Set Maximum Page

 $MaxPage = $RecordCount % $PageSize;

 if($RecordCount % $PageSize == 0){

    $MaxPage = $RecordCount / $PageSize;

 }else{

    $MaxPage = ceil($RecordCount / $PageSize);

 }

?>

            </h1>

          </p>

          

            <div align="left" style="vertical-align:top">

              <table cellspacing="0" cellpadding="0" width="99%" border="0" style="vertical-align:top">

            <tbody>

             

<tr>

                 <td colspan="2" align="left" style="padding-top:10px;">

				 <table width="100%" border="0" bgcolor="#F0EDE6" cellpadding="1" cellspacing="1" style="border: 1px solid #999;" >

                   <tr>

                     <td>

					 

					   <form name="srch" action="managelisting.php?act=search" method="post">

					     

					     <div align="left"><span class="contenidos style3">Sort by Category:</span>

					       <select name="jobcat" id="jobcat" style="width:260px">
									
									<?php
									if($jobcat > 0 )
										{
									?>
									<option value="<?=$jobcat;?>" selected="selected"><?=getcatname($jobcat);?></option>
									<?php } else {?>
										<option value="0">Select Project Category</option>
									<?php } ?>
                                <?php $w_ql="select * from tbljobcategories order by name";
				        $w_res=mysql_query($w_ql);
						while($w_row=mysql_fetch_array($w_res))
				  {
				  
				  ?>		 
				  			
                                <option value="<?=$w_row['id']?>">
                                  <?=$w_row['name']?>
                              </option>
                                <?php }?>
                            </select>

					       <input name="Submit" type="submit" class="boxtop" style="background-color:#0066CC;" value="Go">

					       <input name="Submit2" type="button" class="boxtop" style="background-color:#0066CC;" value="View All" onClick="document.location='managelisting.php';">
					       <?php

						  	if ($_GET['act']=='msgsent')

								echo "<font color=green size=2 face=arial><b>Message sent</b></font>";

						  ?>
						  </div>

			            </form></td>

                    </tr>

                 </table></td>

              </tr>

              <tr align="left"> 

                <td colspan="2">
                <?php 

	  					if($_GET["act"]=="updatedone")

							echo "<font face=arial color=green size=2><strong>Record has been updated.</strong></font><br>";

							

	  					?>

                  <?php 

	  					if($_GET["actn"]=="recordadded")

							echo "<font face=arial color=green size=2><strong>New Job record has been added.</strong></font><br>";

							

	  					?>

                  <?php

						   if($_REQUEST['del']=='tru')

						   { ?>

&nbsp; <font face="arial" size="2" color="#FF0000">Record 

                      has been deleted.</font>

<?php }

						   ?>

<br />
<table cellspacing="0" cellpadding="2" width="60%" border="0">
  <tbody>
    <tr>
      <td width="7%" align="center" class="boxheading">#</td>
      <td align="center" class="boxheading"><div align="left"> Project Title</div></td>
      <td align="center" class="boxheading">Expiration Date</td>
      <td align="center" class="boxheading">Posted Date </td>
      <!--  <td align="center" class="boxheading">Live Status</td>-->
      <td align="center" class="boxheading"><div align="center">Action</div></td>
    </tr>
    <?php 
							 			$userid=$HTTP_SESSION_VARS['userid'];
										//$ssql="SELECT * from tbldomains Where UserID=".$userid;
										
									   	//$result = mysql_query($ssql);
										//$num_rows = mysql_num_rows($result); 
										//$get_info = mysql_fetch_row($result);										

										if($RecordCount <= 0) {
									   ?>
    <tr  style="BACKGROUND: #F1F1FD">
      <td colspan="5" class="productssleftouter" style="height:26px; border:1px solid #ccc;"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">-No 
        Job record found-</font></div></td>
    </tr>
    <?php 
										}
										else
										{
										
											$i = 1;
											while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
												$bil = $i + ($PageNo-1)*$PageSize;
												
												$listingid=$row['id'];
												$ssqqll=mysql_query("select photo from tblphotos where listingid='$listingid' and type='1'");
												$row_photo=mysql_fetch_array($ssqqll);
												//$ssql="select gname from tblgroups where gid='".$row[14]."'";
												//$resultg= mysql_query($ssql);
												//$rowg = mysql_fetch_array($resultg)
											?>
    <tr>
      <td class="productssleft1" valign="middle" align="center" bgcolor="#eeeeee"><?php echo $bil ?> </td>
      <td class="productssleft1" valign="middle" bgcolor="#002102" align="left"><a href="editjob.php?jid=<?=$row[0];?>" style="color:#0066FF; text-decoration:underline; font-weight:normal; font-size:11px;">
        <?=$row['jobtitle'];?>
      </a></td>
      <td valign="middle" bgcolor="#eeeeee" class="productssright1">&nbsp;
           <?php if(($_GET["targetaction"]=="editexdate") && ($row['id']==$_GET["id"]))
									{?>
									<form action="updaterecord.php?id=<?=$row['id']?>&tgact=editexpdate" method="post">
										<input  style="width:90px;" type="text" value="<? echo $row['expirdate'];?>" name="expdate"><input type="image" src="images/save.gif" alt="Save" title="Update">
										<a href="managelisting.php"><img src="images/icon_err.gif" alt="Cancel" border="0" title="Cancel"></a>
									</form>
									<?php }
									else {
										 echo $row['expirdate'];
										 
									?>&nbsp;<a href="?targetaction=editexdate&id=<?=$row['id']?>"> <img src="images/edit.gif" width="16" height="16" title="Change Date" border="0"></a><? } ?>          </td>
      <td align="center" valign="middle" bgcolor="#eeeeee" class="productssright1">
	  <?php
	  $today=date("Y-m-d");
	  
	  $datearr= explode("-",$today);
					$d_month=$datearr[1];
					$d_day=$datearr[2];
						$d_year=$datearr[0];
						
				//echo $affectivedate;	
				
				 	
					 	$yesterday = date("Y-m-d", mktime(0, 0, 0, $d_month, $d_day-1, $d_year));
	  if($today==$row['posteddate'])
	  	 echo "<font color=green>Today</font>";
	  elseif($yesterday==$row['posteddate'])
	  	 echo "<font color=#FF6600>Yesterday</font>";
	  else
	  	echo $row['posteddate'];
	  ?>




      <td align="center" valign="middle" bgcolor="#eeeeee" class="productssright1"><a href="../jobdetail.php?jobid=<?=$row[0];?>" style="color:#0066FF; text-decoration:underline; font-weight:normal; font-size:11px;">View</a> | <a href="editjob.php?jid=<?=$row[0];?>" style="color:#0066FF; text-decoration:underline; font-weight:normal; font-size:11px;">Edit</a> | <?php echo '<a  href=deleterecord.php?targetaction=dellisting&listingid='.$row[0].'&mid='.$ownerid.' onClick="return confirm(\'Are you sure to Remove this job?\')" style="color:#0066FF; font-weight:lighter; font-size:10px; text-decoration:underline;">Remove</a>';?>    </tr>
    <?php 
									  $i++;
					}
					}
										?>
  </tbody>
</table>
<br> <font size="2" face="Arial, Helvetica, sans-serif"> 

                  <?php

        //Print First & Previous Link is necessary

        if($CounterStart != 1){

            $PrevStart = $CounterStart - 1;

            print "<a href=managelisting.php.php?PageNo=1>First </a>: ";

            print "<a href=managelisting.php.php?PageNo=$PrevStart>Previous </a>";

        }

        print " [ ";

        $c = 0;



        //Print Page No

        for($c=$CounterStart;$c<=$CounterEnd;$c++){

            if($c < $MaxPage){

                if($c == $PageNo){

                    if($c % $PageSize == 0){

                        print "$c ";

                    }else{

                        print "$c ,";

                    }

                }elseif($c % $PageSize == 0){

                    echo "<a href=managelisting.php.php?PageNo=$c>$c</a> ";

                }else{

                    echo "<a href=managelisting.php.php?PageNo=$c>$c</a> ,";

                }//END IF

            }else{

                if($PageNo == $MaxPage){

                    print "$c ";

                    break;

                }else{

                    echo "<a href=managelisting.php.php?PageNo=$c>$c</a> ";

                    break;

                }//END IF

            }//END IF

       }//NEXT



      echo "] ";



      if($CounterEnd < $MaxPage){

          $NextPage = $CounterEnd + 1;

          echo "<a href=managelisting.php.php?PageNo=$NextPage>Next</a>";

      }

      

      //Print Last link if necessary

      if($CounterEnd < $MaxPage){

       $LastRec = $RecordCount % $PageSize;

        if($LastRec == 0){

            $LastStartRecord = $RecordCount - $PageSize;

        }

        else{

            $LastStartRecord = $RecordCount - $LastRec;

        }



        print " : ";

        echo "<a href=managelisting.php.php?PageNo=$MaxPage>Last</a>";

        }

      ?>

                </font> </td>

              </tr>

              <tr> 

                <td colspan="2" align="center"><div align="left">

                  <label></label>

                </div></td>

              </tr>

              <tr> 

                <td colspan="2" align="center">&nbsp; </td>

              </tr>

            </tbody>

          </table>

            </div>



        



          </TD>

        </TR>

    

    

  </TBODY>

</TABLE>


</BODY></HTML>

