<?php
      include("SessionValidator.php");
      include("../Assests/Connection/Connection.php");
	  include("Head.php");
	   if(isset($_POST["btnSubmit"]))
		{
			
			$cpc=$_POST["txt_cmp"];		
			 $insQry="insert into tbl_feedback(feedback_content,customer_id,worker_id,feedback_date)values('".$cpc."','".$_SESSION["cid"]."','".$_GET["wrid"]."',curdate())";
	 
			if($con->query($insQry))
		     {	
			 ?>

					<script>
						
							alert("Feedback Submitted");
							window.location="CustomerFeedback.php";
					</script>
            <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Feedback Submission Failed");
							window.location="CustomerFeedback.php";
					</script>
                    <?php
				
			}
			}
  
  
                     if(isset($_GET["did"]))
  { $del="delete from tbl_feedback where feedback_id='".$_GET["did"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Feedback Deleted");
							window.location="CustomerFeedback.php?wid=<?php echo $_GET["wid"]?>";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Feedback Deletion Failed");
							window.location="CustomerFeedback.php?wid=<?php echo $_GET["wid"]?>";
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
<br />

<body>
<form id="form1" name="form1" method="post" action="">
  <table style="background-color:#C0C0C0"align="center" border="1" cellpadding="10" style="border-collapse:collapse">
      <tr>
      <td><p>Feedback   :
        <label for="txt_cmp"></label>
        <textarea name="txt_cmp" id="txt_cmp" cols="45" rows="5" required autocomplete="off"></textarea>
      </p><td></tr>
      <tr><td><p>
         <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
      </p></td>
    </tr>
  </table>
  </form>
  <?php
  include("Foot.php");
  ?>
  </body>
  </html>