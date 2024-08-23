<?php
include("SessionValidator.php");
include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><h1 align="center">Worker verification</h1>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Workerverification</title>
</head>
<body>
<?php

		include("../Assests/Connection/Connection.php");
	
  
  if(isset($_GET["acid"]))
  { 
    $del="update tbl_worker set worker_vstatus='1'  where worker_id='".$_GET["acid"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Worker Accepted");
							window.location="WorkerVerification.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Worker Acception Failed");
							window.location="WorkerVerification.php";
					</script>
       	<?php
			}
			
  }
  
 if(isset($_GET["rejid"]))
  { 
    $del="update tbl_worker set worker_vstatus='2'  where worker_id='".$_GET["rejid"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Worker Rejected");
							window.location="WorkerVerification.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Woker Rejection Failed");
							window.location="WorkerVerification.php";
					</script>
<?php
			}
			
  }
  
?>

  <table border="1" align="center" cellpadding="10">
    <tr>
      <th>SlNo</th>
       <th>Work Type</th>
      <th>Name</th>
      <th>Contact</th>
      <th>Email</th>
       <th>State</th>
      <th>District</th>
      <th>Place</th>
      <th>Address</th>
      <th>Proof</th>
      <th>Photo</th>
      <th>Experience</th>
      <th colspan="2" align="center">Action</th>
     
    </tr>
     <?php
	$sel="select * from tbl_worker w inner join tbl_place p on w.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id inner join tbl_state s on s.state_id=d.state_id inner join tbl_worktype wt on wt.worktype_id=w.worktype_id where w.worker_vstatus='0'";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["worktype_name"];?></td>
      <td><?php echo $data["worker_name"];?></td>
      <td><?php echo $data["worker_contact"];?></td>
      <td><?php echo $data["worker_email"];?></td>
       <td><?php echo $data["state_name"];?></td>
      <td><?php echo $data["district_name"];?></td>
      <td><?php echo $data["place_name"];?></td>
       <td><?php echo $data["worker_address"];?></td>
      <td><img src="../Assests/WorkerPhoto/<?php echo $data["worker_photo"];?>" width="120" height="120" /></td>
      <td><img src="../Assests/Workerproof/<?php echo $data["worker_proof"];?>" width="120" height="120" /></td>
       <td><?php echo $data["worker_experience"];?></td>
       <td><a href="WorkerVerification.php?acid=<?php echo $data["worker_id"]?>"><img src="../Assests/Icons/acceptbt.png" width="100" height="60"></a></td>
       <td> <a href="WorkerVerification.php?rejid=<?php echo $data["worker_id"]?>"><img src="../Assests/Icons/reject2.png" width="100" height="60"></a>
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