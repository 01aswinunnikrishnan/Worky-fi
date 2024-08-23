<?php

include("SessionValidator.php");
include("../Assests/Connection/Connection.php");
 include("Head.php");
  
 if(isset($_GET["pwid"]))
  { 
    $del="delete from tbl_previousworks where previousworks_id='".$_GET["pwid"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Value Deleted");
							window.location="ViewPreviousWork.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Deletion Failed");
							window.location="ViewPreviousWork.php";
					</script>
       	<?php
			}
			
  }
 


 
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Previous Work</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
   
	
    <tr>
      <td>SlNo</td>
      <td>Start Date</td>
      <td>End Date</td>
      <td>Work Type</td>
      <td>Worker Name</td>
      <td>Client Name</td>
      <td>Client Contact</td>
      <td>Work Image</td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_previousworks pw inner join tbl_worker w on w.worker_id=pw.worker_id inner join tbl_worktype wt on pw.worktype_id=wt.worktype_id where pw.worker_id='".$_SESSION["wrid"]."'";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{		
		$i++;
	?>	
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["previousworks_fdate"];?></td>
      <td><?php echo $data["previousworks_tdate"];?></td>
      <td><?php echo $data["worktype_name"];?></td>
      <td><?php echo $data["worker_name"];?></td>
      <td><?php echo $data["previousworks_clientname"];?></td>
      <td><?php echo $data["previousworks_clientcontact"];?></td>
      <td><img src="../Assests/WorkGallery/<?php echo $data["previousworks_img"];?>"  width="200" height="180" />
       <td><a href="PreviousWork.php?pwid=<?php echo $data["previousworks_id"]?>">Delete</a></td>
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

</body>

</html>