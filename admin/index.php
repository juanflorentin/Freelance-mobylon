<HTML><HEAD><TITLE>The Jobs Board - Administration</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="images/newstyles.css" type=text/css rel=stylesheet>

<script LANGUAGE="JavaScript">

function validateit(theForm)
{

        if (theForm.uname.value == "")
        {
                  alert("Enter Admin User Id");
				  theForm.uname.focus();
                  return false;
   }

        if (theForm.password.value == "")
        {
                alert ("Enter password");
				theForm.password.focus();
                return false;
        }


        return true;
}

</script>
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
						   if($_REQUEST['logininfo']=='loginerror')
						   { ?>
      <TR align="center"> 
        <TD height=33 vAlign=center class=formulario><table width="410" border="0" bgcolor="#ffffff"
		   style="BORDER-TOP: #767238 1px solid;
  				  BORDER-BOTTOM: #767238 1px solid;
		          BORDER-LEFT: #767238 1px solid;
                  BORDER-RIGHT: #767238 1px solid;">
            <tr> 
              <td width="31"><img src="images/block.png" width="30" height="31"></td>
              <td width="358" align="left">&nbsp;<font face="arial" size="2" color="#FF0000"><strong>Invalid 
                UserName or Password, Try Again...</strong></font></td>
            </tr>
          </table><br></TD>
      </TR>
      <?php }
						   ?>
      <TR> 
        
      <TD height=33 align="center"> 
	  
	  	<FIELDSET style="WIDTH: 100%" class=titulos><LEGEND><font size="3" face="verdana" color="#005de6">Administrator Login</font></LEGEND>
                  <form name="frmadmin" method="post" action="redirect.php" onSubmit="return validateit(this)">
          <TABLE WIDTH=387 BORDER=0 align="center" CELLPADDING=0 CELLSPACING=0>
            <TR> 
              <TD COLSPAN=6>&nbsp; </TD>
            </TR>
            <TR> 
              <TD width="4">&nbsp; </TD>
              <TD width="150" valign="top"><BR><img src="images/adminlogin.png"></TD>
              <TD width="4">&nbsp;</TD>
              <TD width="4">&nbsp;</TD>
              <TD width="339" align="left"> <table width="180" border="0" cellspacing="4" cellpadding="0">
                  <tr> 
                    <td><span class="style2"><font size="3" face="verdana">Username </font></span></td>
                    <td><input name="uname" id="uname" type="text" size="14" style="font-family: Verdana; font-size: 14pt; color: #000066; border: 1px solid #CAC3BF;height: 25px; display: block;">                    </td>
                  </tr>
                  <tr> 
                    <td><font size="3" face="verdana"><span class="style3">Password </span></font></td>
                    <td><input name="password" type="password" id="password" style="font-family: Verdana; font-size: 14pt; color: #000066;height: 25px; border: 1px solid #CAC3BF;" size="14">                    </td>
                  </tr>
                  <tr> 
                    <td colspan="2"> <div align="right"> 
                        <BR><input name="image" type="image" src="images/loginbutton.png">
                      </div></td>
                  </tr>
                  <input type="hidden" name="val2" value="true">
                </table>
                <div align="center"></div></TD>
              <TD width="4">&nbsp; </TD>
            </TR>
            
			 <TR> 
              <TD COLSPAN=6> <div align="center"><BR><a href="forgotpassword.php" style="color:#0066CC;" ><font class="myfont style2" ><u>Forgot Password?</u></font></a></div></TD>
            </TR>
          </TABLE>
          <p>&nbsp;</p>
          </form>                
        </fieldset>
	  </TD>
      </TR>
    </TBODY>
  </TABLE>

</BODY>
</HTML>