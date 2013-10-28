<?php
include_once "includes/connection.php";
$emall=$_POST['email'];
$count=-1;
//echo $emall; exit;
if(isset($_POST['email'])){
$inter=("select * from general where email='".$_POST[email]."'");
		$res=@mysql_query($inter);
		$count=@mysql_num_rows($res);
		//if found, emails the user and pass
		if($count=='1'){
		while($ro=@mysql_fetch_array($res))
		{
		$aemail=$ro["email"];
		
		
}


  

if($count=='1'){

	  $ssql="SELECT * FROM tbladmin";
      $result = mysql_query($ssql,$connection);	
      $rou=@mysql_fetch_array($result);	  
	    
		$usr=$rou["username"];
		$pass=$rou["password"];
$wtitle="info@charismamodels.com";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers.= "From: ".$wtitle;

$comments='<img src="http://www.charismamodels.com/jobboard/admin/images/title.png"><br><br>Here is the login information for admin account.<br><br>User name: '.$usr.'<br>Password: '.$pass.'<br><br><br>
You can login here<br><br>
<a href="http://www.charismamodels.com/jobboard/admin/">Login Now</a>';
@mail($emall,"Jobboard - Admin Account Recovery", $comments, $headers);
//displays message 
$mess="<font color=green >Shortly you will receive an email with the login details.</font>";}
else $mess='<font color=red size=2>Invalid Email Address please try again</font>';
}}
?>
<HTML><HEAD><TITLE>The Jobs Board - Administration</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="images/newstyles.css" type=text/css rel=stylesheet>

<script>
function validate(theForm)
{

        if (theForm.email.value == "")
        {
                  alert("Enter Admin Email");
				  theForm.email.focus();
                  return false;
   }

      

        return true;
}
function callit()
{
	//alert("hi");
	//document.getElementById('uname').style.display = 'none';

}
</script>
<style type="text/css">
<!--
.style1 {
	color: #006600;
	font-weight: bold;
	font-size: 12px;
}
.style2 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</HEAD>

<BODY>
<TABLE class=topbg cellSpacing=0 cellPadding=0 width=948 border=0>
  <!--DWLayoutTable-->
  <TBODY>
    <TR> 
      <TD height=144 vAlign=center bgcolor="#FFFFFF"> 
	  <img src="images/title.png" ></TD>
    </TR>
    
    <TR> 
      <TD vAlign=top style="border-bottom: 0px solid #e8e4d9;"><!--DWLayoutEmptyCell-->&nbsp;</TD>
    </TR>
  </TBODY>
</TABLE>

  <TABLE cellSpacing=0 cellPadding=0 width="50%" align=left border=0>
    <!--DWLayoutTable-->
    <TBODY>
      
    <TR> 
      <TD class=titulos vAlign=center align=left height=25><!--DWLayoutEmptyCell-->&nbsp;</TD>
      </TR>
      <?php
						   if($count==0)
						   { ?>
      <TR align="center"> 
        <TD height=33 vAlign=center class=formulario><table width="410" border="0" bgcolor="#ffffff"
		   style="BORDER-TOP: #767238 1px solid;
  				  BORDER-BOTTOM: #767238 1px solid;
		          BORDER-LEFT: #767238 1px solid;
                  BORDER-RIGHT: #767238 1px solid;">
            <tr> 
              <td width="31"><img src="images/block.png" width="30" height="31"></td>
              <td width="358" align="left">&nbsp;<span class="style2"><font face="arial" color="#FF0000">Invalid 
                admin email address</font></span></td>
            </tr>
          </table><br></TD>
      </TR>
      <?php }
						   ?>
						   
		 <?php
						   if($count==1)
						   { ?>
      <TR align="center"> 
        <TD height=33 vAlign=center class=formulario><table width="410" border="0" cellpadding="0" cellspacing="0" bgcolor="#D9F2B3"
		   style="BORDER-TOP: #767238 1px solid;
  				  BORDER-BOTTOM: #767238 1px solid;
		          BORDER-LEFT: #767238 1px solid;
                  BORDER-RIGHT: #767238 1px solid; padding:3px;">
            <tr> 
              <td width="31" bgcolor="#D9F2B3"><img src="images/check2.gif" width="36" height="38"></td>
              <td width="358" align="center" bgcolor="#D9F2B3" style="font-size:11px;">&nbsp;<span class="style1"><font face="arial">Shortly you will receive an email with the login details. Thanks </font></span></td>
            </tr>
          </table><br></TD>
      </TR>
      <?php }
						   ?>
      <TR> 
        
      <TD height=33 align="center"> 
	  
	  	<form method="post" onSubmit="return validate(this);">
                    <FIELDSET style="WIDTH: 380px" class=titulos><LEGEND>Password Recovery</LEGEND> 
					<table width="100%" border="0">
                      
                     
					  <tr>
					    <td class="botones" >&nbsp;</td>
					    <td colspan="3" align="center">&nbsp;</td>
				      </tr>
					  <tr>
                        <td class="botones" ><strong>Admin Email: </strong></td>
                        <td colspan="3" align="center"><span style="padding-left: 0px;">
                          <input name="email" id="email" type="text" size="25" style="font-family: Verdana; font-size: 10pt; color: #000066; border: 1px solid #CAC3BF;height: 17px; display: block;"  />
                        </span></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td width="13%"><div align="right"><span style="padding-left: 50px; padding-top: 5px;">
                            <input type="submit" name="submit" value="Send Password" style="border: 2px solid #000; background-color:#4387ff; color:#fff;" />
                        </span></div></td>
                        <td width="17%">
                          <input type="button" name="submit2" value="Cancel" onClick="document.location='index.php';" style="border: 2px solid #000; background-color:#4387ff; color:#fff;" />                        </td>
                        <td>
                          <input type="hidden" name="bcheck" value="true" />                       </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="3"><a href="forgotpassword.php" class="style3"></a> </td>
                      </tr>
                  </table>
                </FIELDSET></form>
	  </TD>
      </TR>
    </TBODY>
  </TABLE>

</BODY>
</HTML>