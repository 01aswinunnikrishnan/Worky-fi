<?php
        include("SessionValidator.php");
		include("../Assests/Connection/Connection.php");
		include("Head.php");
ob_start();

if(isset($_GET["rejid"]))
  { 
    $del="update tbl_customer set status='2' where customer_id='".$_GET["rejid"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Customer Rejected");
							window.location="AcceptedCustList.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Customer Rejection Failed");
							window.location="AcceptedCustList.php";
					</script>
<?php
			}
			
  }
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<h1 align="center">Accepted Customers List</h1>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AcceptedCustomerList</title>
</head>

<body>


  <table border="1" align="center" cellpadding="10">
    <tr>
      <th>SlNo</th>
      <th>Name</th>
      <th>Contact</th>
      <th>Email</th>
       <th>State</th>
      <th>District</th>
      <th>Place</th>
      <th>Address</th>
      <th>Photo</th>
      <th colspan="2" align="center">Action</th>
     
    </tr>
     <?php
	$sel="select * from tbl_customer c inner join tbl_place p on c.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_state s on s.state_id=d.state_id where c.status='1'";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["customer_name"];?></td>
      <td><?php echo $data["customer_contact"];?></td>
      <td><?php echo $data["customer_email"];?></td>
       <td><?php echo $data["state_name"];?></td>
      <td><?php echo $data["district_name"];?></td>
      <td><?php echo $data["place_name"];?></td>
       <td><?php echo $data["customer_address"];?></td>
      <td><img src="../Assests/WorkerPhoto/<?php echo $data["customer_photo"];?>" width="120" height="120" /></td>
       <td> <a href="CustomerVerification.php?rejid=<?php echo $data["customer_id"]?>"><img src="../Assests/Icons/reject2.png" width="100" height="60"></a>
       </td>
    </tr>
    <?php
	}
	?>
  </table>
  <br />
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>


<style>
table
{
	text-align:center;
	


}
table th{
	background-color:#333;
	color:#FFF;

}
</style>


<script src="../Assests/JQuery/jQuery.js"></script>
<script>
function getDistrict(sid)
{
	$.ajax({
		url:"../Assests/AjaxPages/AjaxDistrict.php?did="+sid,
		success: function(html){
			$("#sel_district").html(html);
		}
	});
}
</html>