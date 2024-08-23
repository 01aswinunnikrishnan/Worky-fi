<?php
      include("SessionValidator.php");
      include("../Assests/Connection/Connection.php");
	   include("Head.php");
  
	                 if(isset($_GET["did"]))
  { $del="delete from tbl_feedback where feedback_id='".$_GET["did"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Feedback Deleted");
							window.location="ViewFeedback.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Feedback Deletion Failed");
							window.location="ViewFeedback.php";
					</script>
 
    	    <?php
				
			}
		}
		
?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Feedback</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
 <table align="center" cellpadding="10" border="1">
    <tr>
      <td>SiNo</td>
       <td>Customer Name</td>
       <td>Date</td>
       <td>Content</td>
     <td>Action</td>
    </tr>
     <?php
	 
	$sel="select * from tbl_feedback f inner  join tbl_customer c on c.customer_id=f.customer_id where worker_id='".$_SESSION["wrid"]."'";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	    <tr>
            <td><?php echo $i?></td>
            <td><?php echo $data["feedback_content"]?></td>
            <td><?php echo $data["feedback_date"]?></td>
            <td><?php echo $data["customer_name"]?></td>

             <td><a href="ViewFeedback.php?did=<?php echo $data["feedback_id"]?>">Delete</a>
        
       </td>
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