<?php
include("SessionValidator.php");

include("../Assests/Connection/Connection.php");
include("Head.php");

 if(isset($_POST["btnsave"]))
 {
  $selQryC="select * from tbl_customer where customer_id='".$_SESSION["cid"]."'";
  $rowC=$con->query($selQryC);
  $dataC=$rowC->fetch_assoc(); 
  
     $password=$dataC["customer_password"];
     $oldpassword=$_POST["txt_cpw"];
     $newpass=$_POST["txt_npw"];
     $cpass=$_POST["txt_cpw2"];
 
 
 if($password==$oldpassword)
 {
	 if($newpass==$cpass)
	 {
	 $up="update tbl_customer set customer_password='".$_POST["txt_npw"]."' where customer_id='".$_SESSION["cid"]."'" ;
		 $con->query($up);
		 ?>
         <script>
		 alert("Password Changed");
		 window.location="ChangeCPassword.php";
		 </script>
         <?php
         }
         
			else
			{
				
			?>
        			<script>
							alert("Password Missmatch");
							window.location="ChangeCPassword.php";
					</script>
             <?php
		 
	 }
 }

 }




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>change Customer Password</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Old Password</td>
      <td><label for="txt_cpw"></label>
      <input type="text" name="txt_cpw" id="txt_cpw" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_npw"></label>
      <input type="text" name="txt_npw" id="txt_npw" required autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_cpw2"></label>
      <input type="text" name="txt_cpw2" id="txt_cpw2" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td  align="center"colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Save" onMouseOver="mouseOvers()" onMouseOut="mouseOuts()" />
      <input type="reset" name="button" id="btncancel" value="Cancel" onMouseOver="mouseOverc()" onMouseOut="mouseOutc()"/></td>
    </tr>
  </table>
</form>
<?php
  include("Foot.php");
  ?>
</body>
<script>
function mouseOvers()
{
	document.getElementById("btnsave").style.color="#0F0";
}
function mouseOuts()
{
	document.getElementById("btnsave").style.color="Black";
}

function mouseOverc()
{
	document.getElementById("btncancel").style.color="Red";
}
function mouseOutc()
{
	document.getElementById("btncancel").style.color="Black";
}

</script>

</html>