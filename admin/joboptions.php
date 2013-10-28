<?php

error_reporting(0);

include_once "includes/connection.php";
include_once "includes/checksession.php";


	 $search=$_POST['search'];

	$ownerid=$_GET['mid'];

//===getting the name of the owner=====



$sql_getname=mysql_fetch_array(mysql_query("select fname, lname from tblmember where mid='$ownerid'"));

	

	

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

          <TD height="18" bgcolor="#804000" colspan="2" align=left vAlign=left  style="VERTICAL-ALIGN: top; width:16%">

            <?php 

			if ($_SESSION['adminid']==1)

				require 'includes/adminleftMenu.php';

			else

				require 'includes/leftMenu.php';

			?></TD>

          <TD width="813" rowspan="2" align="left" vAlign=top bordercolor="#FF6600" class=titulos style="width:84%;"><p><span class="titulos" style="width:84%;" ><strong><a href="dashboard.php" style="color:#0000FF; font-weight:bold;">Home</a><span class="style2"> &gt; </span></strong><span class="botones"><strong>Manage Job Options </strong></span></span></p>
            <TABLE cellSpacing=0 cellPadding=0 width="95%" align=center border=0>
            <!--DWLayoutTable-->
            <TBODY>
              
              <TR>
                <TD width="1%" height=33 align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD width="18%" align=right vAlign=center class=formulario><label> </label></TD>
                <TD width="21%" align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD width="21%" align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD width="19%" align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD width="19%" align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD width="1%" align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
              </TR>
              <TR>
                <TD height=33 align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD align=right vAlign=center class=formulario><div align="center"><span style="HEIGHT: 40px"> <a href="propertyactivities.php"><img src="images/pactivities.gif" name="sitb" width="55" height="55" border="0"  id="sitb"></a><a href="propertyfeatures.php"></a></span></div></TD>
                <TD align=right vAlign=center class=formulario><div align="center"><span style="HEIGHT: 40px"><a href="propertyactivities.php"></a></span></div></TD>
                <TD align=right vAlign=center class=formulario><div align="center"><span style="HEIGHT: 40px"><a href="propertyviews.php"></a></span></div></TD>
                 <TD align=right vAlign=center class=formulario><div align="center"><span style="HEIGHT: 40px"> <a href="town.php"></a></span></div></TD>
                 <TD align=right vAlign=center class=formulario><div align="center"><span style="HEIGHT: 40px"><a href="neighbour.php"></a></span></div></TD>
                <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
              </TR>
              <TR>
                <TD height=19 align=right vAlign=center><LABEL> </LABEL></TD>
                <TD align=right vAlign=center><div align="center"> <a href="jobcategories.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"> Job Categories </a> </div></TD>
                <TD align=right vAlign=center class=formulario><div align="center"><a href="propertyactivities.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a></div></TD>
                <TD align=right vAlign=center class=formulario><div align="center"><a href="propertyviews.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a></div></TD>
                  <TD align=right vAlign=center><div align="center"> <a href="town.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a> </div></TD>
                  <TD align=right vAlign=center class=formulario><div align="center"><a href="neighbour.php" style="color:#000000; text-decoration:none; font-weight:normal; font-size:12px"></a></div></TD>
                <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
              </TR>
              <TR>
                <TD height=36 align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
                <TD align=right vAlign=center class=formulario><!--DWLayoutEmptyCell-->&nbsp;</TD>
              </TR>
            </TBODY>
          </TABLE>  
            <p>&nbsp;</p>
            <hr align="left"> 

        

            <div align="left">

          <?php include "includes/footer.php"; ?>

            </div>

          <LABEL> </LABEL>            <LABEL> </SPAN></LABEL></TD>

        </TR>

    

    

  </TBODY>

</TABLE>


</BODY></HTML>

