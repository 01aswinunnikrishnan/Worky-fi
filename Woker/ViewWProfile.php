
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ViewWorkerProfile</title>
</head>

<body>
<?php


include("SessionValidator.php");
include("../Assests/Connection/Connection.php");
include("Head.php");





  
?>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1" cellpadding="10">
      <td>
         <?php
	$selQry="select * from tbl_worker w inner join tbl_worktype wt on wt.worktype_id=w.worktype_id where worker_id='".$_SESSION["wrid"]."'";
	$row=$con->query($selQry);
	if($data=$row->fetch_assoc())
	{
	?>
    
      <p><div  align="center" class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../Assests/WorkerPhoto/<?php echo $data["worker_photo"];?>" width="120" height="120" style="border-radius:50%">
				</div></div></div></div></p>
       <br/>        
      <p>UserName : <?php echo $data["worker_username"];?></p>
      <p>Name : <?php echo $data["worker_name"];?></p>
      <p>Work Type : <?php echo $data["worktype_name"];?></p>
      <p>Age  :<?php echo $data["worker_age"];?></p>
      <p>Contact :<?php echo $data["worker_contact"];?></p>
      <p>Emai l  :<?php echo $data["worker_email"];?></p>
      <p>Address :<?php echo $data["worker_address"];?></p>
      <p><a href="PreviousWork.php"</a>Add Previous Works</p>
       <p><a href="ViewFeedback.php"</a>Feedbacks</p>
      <?php
	  }
	  ?>
      </td>
    </tr>
  </table>
</form>
 <?php
include("Foot.php");
?>
<script src="../Assests/Templates/Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

</body>
</html>