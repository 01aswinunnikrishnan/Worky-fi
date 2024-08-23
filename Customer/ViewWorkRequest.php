<?php
      include("SessionValidator.php");
      include("../Assests/Connection/Connection.php");
	  include("Head.php");

 if(isset($_GET["crid"]))
  { 
    $del="delete from tbl_cwrequest where cwrequest_id='".$_GET["crid"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Work Request Cancelled");
							//window.location="ViewWorkRequest.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Cancellation Failed");
							//window.location="ViewWorkRequest.php";
					</script>
<?php
			}
			
  }
  ?> 







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<h1 align="center">My Work Requests</h1>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Work Request</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table  align="center" border="1" cellpadding="10">
    <tr>
      <td>SlNo</td>
      <td>Worker Name</td>
      <td>Work Type</td>
      <td>Place</td>
      <td>Location</td>
      <td>Address</td>
      <td>Expected End Date</td>
      <td> Work Details</td>
       <td>Work Requested Date</td>
      <td>Action</td>
      <td>Status</td>
    </tr>
      <?php
	$sel="select * from tbl_cwrequest cw inner join tbl_place p on cw.place_id=p.place_id inner join tbl_worker w on w.worker_id=cw.worker_id inner join tbl_worktype wt on wt.worktype_id=w.worktype_id where customer_id='".$_SESSION["cid"]."'";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["worker_name"];?></td>
      <td><?php echo $data["worktype_name"];?></td>
      <td><?php echo $data["place_name"];?></td>
      <td><?php echo $data["cwrequest_location"];?></td>
      <td><?php echo $data["cwrequest_address"];?></td>
      <td><?php echo $data["cwrequest_expectedenddate"];?></td>
      <td><?php echo $data["cwrequest_workdetails"];?></td>
      <td><?php echo $data["cwrequest_requesteddate"];?></td>
      <td><a href="ViewWorkRequest.php?crid=<?php echo $data["cwrequest_id"]?>">Cancel</a>||
      	  <a href="AddFeedback.php?wid=<?php echo $data["worker_id"]?>">Add Feedback</a></td>
      <td><?php 
	  
	  if($data["cwrequest_status"]==0)
	  {
		echo "Verification Pending..";  
	  }
	  else if($data["cwrequest_status"]==1)
	  {
		echo "Work Accepted";  
	  }
	   else 
	  {
		echo "Request Rejected";  
	  }
	  
	  ?></td>
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