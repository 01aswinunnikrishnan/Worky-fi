<?php
        include("SessionValidator.php");
		include("../Assests/Connection/Connection.php");
		include("Head.php");
ob_start();

	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View complaint</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table align="center" border="1" cellpadding="10">
    <tr>
      <td>SiNo</td>
      <td>Date</td>
       <td>Customer Name</td>
      <td>Complaint Type</td>
      <td>Content</td>
      <td>Action</td>
    </tr>
     <?php
	 
	$sel="select * from tbl_complaint c inner join tbl_complainttype ct on ct.complainttype_id=c.complainttype_id inner join tbl_customer u on u.customer_id=c.customer_id where c.complaint_cstatus='0'";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	<tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["complaint_date"]?></td>
      <td><?php echo $data["customer_name"]?></td>
      <td><?php echo $data["complainttype_name"]?></td>
      <td><?php echo $data["complaint_content"]?></td>
      <td><a href="Reply.php?rid=<?php echo $data["complaint_id"]?>">Reply</a>
       
       </td>
    </tr>
	<?php
	}
	?>
  </table>
</form>
</body>
<style>
table
{
	text-align:center;


}
table th{
	background-color:#F00;
	color:#FFF;
}
</style>

<?php
include("Foot.php");
ob_flush();
?>

</html>