<?php
         include("SessionValidator.php");
		include("../Assests/Connection/Connection.php");

		include("Head.php");
ob_start();
if(isset($_POST["btnSend"]))
{
	$reply=$_POST["txt_reply"];
	
	
	$upQry="update tbl_complaint set complaint_reply='".$reply."',complaint_cstatus=1 where complaint_id='".$_GET["rid"]."'";
	//echo $upQry;
	if($con->query($upQry))
	{
		?>
        <script>
		alert("Reply Sended")
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("Reply  Not Sended")
		</script>
        <?php
	}
		
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reply</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td><p>Content :
          <label for="txt_reply"></label>
          <textarea name="txt_reply" id="txt_reply" cols="45" rows="5" required></textarea>
      </p>
      <p align="center">
        <input type="submit" name="btnSend" id="btnSend" value="Send" />
        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
      </p></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>

</html>