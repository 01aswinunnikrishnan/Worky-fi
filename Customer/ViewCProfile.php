<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ViewCustomerProfile</title>
</head>
<?php
include("SessionValidator.php");


include("../Assests/Connection/Connection.php");
include("Head.php");




  $selQry="select * from tbl_customer where customer_id='".$_SESSION["cid"]."'";
 $row=$con->query($selQry);
 

 

 
 
?>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1" cellpadding="10">
      <tr>
      <td>
      <?php
       if($data=$row->fetch_assoc())
	  { 
	  ?>
      <p><div  align="center" class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../Assests/CustomerPhoto/<?php echo $data["customer_photo"];?>" width="100" height="100" style="border-radius:50%">
				</div></div></div></div></p>
        <br/>        
        <!--<p align="center"><img src="../Assests/CustomerPhoto/<?php echo $data["customer_photo"];?>" width="80" height="80" style="border-radius:50%"></p>-->
      <p>Name    : <?php echo $data["customer_name"];?></p>
      <p>Age     : <?php echo $data["customer_age"];?></p>
      <p>Contact : <?php echo $data["customer_contact"];?></p>
      <p>Email   : <?php echo $data["customer_email"];?></p>
      <p>Address : <?php echo $data["customer_address"];?></p>
      <?php
	  }
	  ?>
      </td>
    </tr>
  </table>
</form>
<?php
include("Foot.php");
ob_flush()
?>
<script src="../Assests/Templates/Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
</body>
</html>