<?php
error_reporting(0);
include_once "includes/connection.php";
include_once "includes/checksession.php";
$bcheck=$_POST['bcheck'];
if($bcheck=='true'){
	$location = $_POST['name'];
	$desc=$_POST['desc'];
	
	$insert="insert into tbljobcategories set name='$location', description='$desc'";
	mysql_query($insert);
	header("Location:jobcategories.php?act=added");
}
	 	$search=$_POST['search'];
		?>



<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>The Jobs Board - Administration</TITLE>

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
$PageSize = 100;
$StartRow = 0;
 $Tsql="SELECT * from tbljobcategories";
$TRecord = mysql_query($Tsql);

$result_sql="SELECT * from tbljobcategories ORDER BY name  LIMIT $StartRow,$PageSize";
$result = mysql_query($result_sql);
 if($_REQUEST['act']=='search')

   {

   		$TRecord = mysql_query("SELECT * from tbljobcategories");

 		$result = mysql_query("SELECT * from tbljobcategories where name LIKE '%$search%'  LIMIT $StartRow,$PageSize");

   }
$TTRecord=mysql_num_rows($TRecord);
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

			else

				require 'includes/leftMenu.php';

			?></TD>

          <TD   align="left" valign="top"  bordercolor="#FF6600" style="padding-left:15px;"><p><span class="titulos" ><span class="botones"><font size="3" style="verdana" color="#015fe7"><BR><B>Manage Project Categories </B></font></span></span></p>
            <div align="left" style="vertical-align:top">
              <table cellspacing="0" cellpadding="0" width="99%" border="0" style="vertical-align:top">
                <tbody>
                  <tr>
                    <td colspan="2" align="left" style="padding-top:10px;"><input name="Submit2" type="button" class="boxtop" style="background-color:#0066CC;" value="Add New Project Category" onClick="document.location='jobcategories.php?act=new';">



<?php if($_GET['act']=='new'){?>
            <form name="form1" method="post" action="jobcategories.php">
            <table width="90%" border="0">
                <tr>
                  <td width="14%"></font></td>
                  <td width="83%"></td>
                  <td width="3%">&nbsp;</td>
                </tr>
                <tr>
                  <td><font face="Arial, Helvetica, sans-serif" size="2">Category  Name:</font></td>
                  <td><input name="name" id="name" class="mytextbox" type="text" size="30" value="" /></td>
                  <td>&nbsp;</td>
                </tr>
                
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input name="bcheck" value="true" type="hidden"><input name="submit" class="mybtn" type="submit" value="Save Category"/>
&nbsp;&nbsp;
<input name="btn" class="mybtn" type="button" value="Cancel" onClick="document.location='jobcategories.php';"/></td>
                  <td>&nbsp;</td>
                </tr>
              </table>
            </form><?php }?>







</td>
                  </tr>
                  <tr align="left">
                    <td colspan="2"><span class="style10">
                        <?php 

	  					if($_GET["act"]=="updatedone")

							echo "<font face=arial color=green size=2><strong>Record has been updated.</strong></font><br>";

							

	  					?>
                        <?php 

	  					if($_GET["actn"]=="recordadded")

							echo "<font face=arial color=green size=2><strong>New Client record has been added.</strong></font><br>";

							

	  					?>
                        <?php

						   if($_REQUEST['del']=='tru')

						   { ?>
                      &nbsp; <font face="arial" size="2" color="#FF0000">Record 
                        
                        has been deleted.</font>
                      <?php }

						   ?>
						   <?php

						   if($_REQUEST['edit']=='tru')

						   { ?>
                      &nbsp; <img src="images/save.gif"><font face="arial" size="2" color="#009900"><strong>Record                       
                        has been Updated.</strong></font>
                      <?php }

						   ?>
                      <br>
                      <table cellspacing="0" cellpadding="2" width="450" border="0">
                        <tbody>
                          <tr>
                            <td align="center" class="boxheading"> S#</td>
                            <td class="boxheading">&nbsp;&nbsp;&nbsp;Project Category  Name </td>
                            <td align="center" class="boxheading"><div align="center">Action</div></td>
                          </tr>
                          <?php 

							 			$userid=$HTTP_SESSION_VARS['userid'];

										//$ssql="SELECT * from tbldomains Where UserID=".$userid;

										

									   	//$result = mysql_query($ssql);

										//$num_rows = mysql_num_rows($result); 

										//$get_info = mysql_fetch_row($result);										



										if($TTRecord <= 0) {

									   ?>
                          <tr  style="BACKGROUND: #F1F1FD">
                            <td colspan="3" class="productssleftouter"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">-no 
                              
                              record found-</font></div></td>
                          </tr>
                          <?php 

										}

										else

										{

										

											$i = 1;

											while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {

												$bil = $i + ($PageNo-1)*$PageSize;
											?>
                          <tr>
                            <td width="50" align="center" valign="top" bgcolor="#eeeeee" class="productssleft1"><?php echo $bil ?> </td>
                            <td class="productssleft1" valign="top" bgcolor="#002102" align="left" style="width:320px;">
							
							<?php if(($_GET["targetaction"]=="edit") && ($row['id']==$_GET["id"]))
									{?>
									<form action="updaterecord.php?id=<?=$row['id']?>&tgact=editjobcat" method="post">
										<input name="editname" type="text" value="<? echo $row['name'];?>" size="40">
										<input type="image" src="images/save.gif" alt="Save" title="Update"><a href="jobcategories.php"><img src="images/icon_err.gif" border="0" alt="Cancel" title="Cancel"></a>
									</form>
									<?php }
									else {
										 echo $row['name'];
										 
									}?>							</td>
                          <td width="100" align="center" valign="top" bgcolor="#eeeeee" class="productssright1"><?php echo '<a  href=jobcategories.php?targetaction=edit&id='.$row['id'].' style="color:#0066FF; font-weight:lighter; font-size:10px; text-decoration:underline;">Edit</a> |';?><?php echo '<a  href=deleterecord.php?targetaction=deletejobcat&id='.$row['id'].' onClick="return confirm(\'Are you sure to delete this record?\')" style="color:#0066FF; font-weight:lighter; font-size:10px; text-decoration:underline;">Delete</a>';?>                          </tr>
                          <?php 

									  $i++;

					}

					}

										?>
                        </tbody>
                      </table>
                      <br>
                      <font size="2" face="Arial, Helvetica, sans-serif">
                        <?php

        //Print First & Previous Link is necessary

        if($CounterStart != 1){

            $PrevStart = $CounterStart - 1;

            print "<a href=world.php?PageNo=1>First </a>: ";

            print "<a href=world.php?PageNo=$PrevStart>Previous </a>";

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

                    echo "<a href=jobcategories.php?PageNo=$c>$c</a> ";

                }else{

                    echo "<a href=jobcategories.php?PageNo=$c>$c</a> ,";

                }//END IF

            }else{

                if($PageNo == $MaxPage){

                    print "$c ";

                    break;

                }else{

                    echo "<a href=jobcategories.php?PageNo=$c>$c</a> ";

                    break;

                }//END IF

            }//END IF

       }//NEXT



      echo "] ";



      if($CounterEnd < $MaxPage){

          $NextPage = $CounterEnd + 1;

          echo "<a href=jobcategories.php?PageNo=$NextPage>Next</a>";

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

        echo "<a href=jobcategories.php?PageNo=$MaxPage>Last</a>";

        }

      ?>
                    </font> </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </div>
           
			

          <LABEL> </LABEL>            <LABEL> </SPAN></LABEL></TD>

        </TR>

    

    

  </TBODY>

</TABLE>


</BODY></HTML>

