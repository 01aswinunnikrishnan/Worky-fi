<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<h1 align="center">New Work Requests</h1>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NewWorkRequests</title>
</head>

<body>
<?php
        include("SessionValidator.php");
		include("../Assests/Connection/Connection.php");
	include("Head.php");
  
  if(isset($_GET["acid"]))
  { 
    $del="update tbl_cwrequest set cwrequest_status='1'  where cwrequest_id='".$_GET["acid"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Work Accepted");
							window.location="NewWorkRequests.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Work Acception Failed");
							window.location="NewWorkRequests.php";
					</script>
       	<?php
			}
			
  }
  
 if(isset($_GET["rejid"]))
  { 
    $del="update tbl_cwrequest set cwrequest_status='2'  where cwrequest_id='".$_GET["rejid"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Work Rejected");
							window.location="NewWorkRequests.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Work Rejection Failed");
							window.location="NewWorkRequests.php";
					</script>
<?php
			}
			
  }
  
?>



 <br  />
  <hr />
  <table border="1" align="center" cellpadding="10">
    <tr>
      <th>SlNo</th>
      <th>Work Requested Date</th>
       <th>Work type</th>
       <th>client name</th>
       <th>Place</th>
      <th>Location</th>
      <th>Address</th>
      <th>Expected End Date</th>
      <th>Work Details</th>
      <th>Contact</th>
      <th>Email</th>
      <th colspan="2" align="center">Action</th>
     
    </tr>
     <?php
	$sel="select * from tbl_worker w inner join tbl_place p on w.place_id=p.place_id inner join tbl_worktype wt on wt.worktype_id=w.worktype_id inner join tbl_cwrequest c on c.worker_id=w.worker_id inner join tbl_customer t on t.customer_id=c.customer_id where c.cwrequest_status='0' and w.worker_id='".$_SESSION["wrid"]."'";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["cwrequest_requesteddate"];?></td>
      <td><?php echo $data["worktype_name"];?></td>
      <td><?php echo $data["customer_name"];?></td>
      <td><?php echo $data["place_name"];?></td>
       <td><?php echo $data["cwrequest_location"];?></td>
       <td><?php echo $data["cwrequest_address"];?></td>
       <td><?php echo $data["cwrequest_expectedenddate"];?></td>
      <td><?php echo $data["cwrequest_workdetails"];?></td>
       <td><?php echo $data["customer_contact"];?></td>
        <td><?php echo $data["customer_email"];?></td>
       <td><a href="NewWorkRequests.php?acid=<?php echo $data["cwrequest_id"]?>"><img src="../Assests/Icons/accept2.png" width="100" height="60"></a></td>
       <td> <a href="NewWorkRequests.php?rejid=<?php echo $data["cwrequest_id"]?>"><img src="../Assests/Icons/reject2.png" width="100" height="60" id="rej1" onMouseOver="mouseOverr()" onMouseOut="mouseOutr()" ></a>
       </td>
    </tr>
    <?php
	}
	?>
  </table>
  <br />
</form>
<?php
include("Foot.php");
?>

</body>


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

</script>
<script>
function mouseOverr()
{
	document.getElementById("rej1").src="../Assests/Icons/reject3.jpg"
}
function mouseOutr()
{
	document.getElementById("rej1").src="../Assests/Icons/reject2.png"
}




</script>

</html>