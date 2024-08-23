<?php
     include("SessionValidator.php");
     include("../Assests/Connection/Connection.php");
     include("Head.php");
	  		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Feedback</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
 <table align="center" border="1" cellpadding="10" >
    <tr>
      <td>SiNo</td>
	  <td>Date</td>
      <td>Content</td>
      <td>Customer</td>
    </tr>
     <?php
	 
	$sel="select * from tbl_feedback f inner join tbl_customer c on c.customer_id=f.customer_id where f.worker_id='".$_GET["wid"]."'" ;
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	<tr>
      <td><?php echo $i?></td>
	  <td><?php echo $data["feedback_date"]?></td>
            <td><?php echo $data["feedback_content"]?></td>
            <td><?php echo $data["customer_name"]?></td>

      
    </tr>
	<?php
	}
	?>
  </table>
 
</form>
<?php
  include("Foot.php");
  ?>
</body>
</html>