<?php
      include("SessionValidator.php");
      include("../Assests/Connection/Connection.php");
	  include("Head.php");
	   if(isset($_POST["btnSubmit"]))
		{
			
			$cpt=$_POST["sel_ct"];
			$cpc=$_POST["txt_cmp"];		
			 $insQry="insert into tbl_complaint(customer_id,complainttype_id,complaint_content,complaint_date)values('".$_SESSION["cid"]."','".$cpt."','".$cpc."',curdate())";
	 
			if($con->query($insQry))
		     {	
			 ?>

					<script>
						
							alert("Complaint Submitted");
							//window.location="CustomerWorkRequest.php";
					</script>
            <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Complaint Submission Failed");
							//window.location="CustomerWorkRequest.php";
					</script>
    	    <?php
				
			}
		}
		
?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head><br/>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1" style="border-collapse:collapse" background="../Assests/Icons/bgform2.jpg">
  <td><p></p></td>
    <tr>
      <td><p>Complaint Type :
          <label for="sel_ct"></label>
          <select name="sel_ct" id="sel_ct" required="required" autocomplete="off">
          <option>----------------------------------------select--------------------------------------</option>
        <?php
		               $selQry="select * from tbl_complainttype";
					   $row=$con->query($selQry);
					   while($data=$row->fetch_assoc())
					   {
				?>
            <option value="<?php echo $data["complainttype_id"]?>"><?php echo $data["complainttype_name"]?></option>
                <?php
					   }
				?>	 
          </select>
      </p>
      <p>Complaint    :
        <label for="txt_cmp"></label>
        <textarea name="txt_cmp" id="txt_cmp" cols="45" rows="5" required autocomplete="off"></textarea>
      </p>
      <p align="right">
         <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
      </p></td>
    </tr>
  </table>
  <br/>
  <hr/>
  
  <table align="center" border="1" cellpadding="10">
    <tr>
      <td >SiNo</td>
      <td >Date</td>
      <td >Complaint Type</td>
      <td >Content</td>
      <td >Reply</td>
      <td >Action</td>
    </tr>
     <?php
	 
	$sel="select * from tbl_complaint c inner join tbl_complainttype ct on ct.complainttype_id=c.complainttype_id where customer_id='".$_SESSION["cid"]."'";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	<tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["complaint_date"]?></td>
      <td><?php echo $data["complainttype_name"]?></td>
      <td><?php echo $data["complaint_content"]?></td>
           <td><?php echo $data["complaint_reply"]?></td>

      <td><a href="NewWorkRequests.php?acid=<?php echo $data["cwrequest_id"]?>">Ok</a>
        <a href="NewWorkRequests.php?rejid=<?php echo $data["cwrequest_id"]?>">/Not ok</a>
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