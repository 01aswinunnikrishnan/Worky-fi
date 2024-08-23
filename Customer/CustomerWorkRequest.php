<?php
      include("SessionValidator.php");
      include("../Assests/Connection/Connection.php");
	  include("Head.php");
	  $_SESSION["wid"]=$_GET["wrid"];
	    if(isset($_POST["btnSubmit"]))
		{
			
			$plid=$_POST["sel_place"];
			$crl=$_POST["txt_loc"];
			$cra=$_POST["txt_add"];
			$exdate=$_POST["txt_date"];
			$wrdetails=$_POST["txt_details"];		
			 $insQry="insert into tbl_cwrequest(customer_id,worker_id,place_id,cwrequest_location,cwrequest_address,cwrequest_expectedenddate,cwrequest_workdetails,cwrequest_requesteddate)values('".$_SESSION["cid"]."','".$_SESSION["wid"]."','".$plid."','".$crl."','".$cra."','".$exdate."','".$wrdetails."',curdate())";
	 
			if($con->query($insQry))
		     {	
			 ?>

					<script>
						
							alert("Work Submitted");
							//window.location="CustomerWorkRequest.php";
					</script>
            <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Work Submission Failed");
							//window.location="CustomerWorkRequest.php";
					</script>
    	    <?php
				
			}
		}
		$selQry="select * from tbl_worker w inner join tbl_worktype wt on wt.worktype_id=w.worktype_id where worker_id='".$_SESSION["wid"]."'";
		$row=$con->query($selQry);
		$data=$row->fetch_assoc();
			
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Work Request</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse" background="../Assests/Icons/bgform2.jpg">
  <td></td>
    <tr>
      <td>Work Type</td>
      <td><?php echo $data["worktype_name"]?></td>
    </tr>
    <tr>
       <td>Place</td>
    <td><label for="sel_place"></label>
      <select name="sel_place" id="sel_place" onChange="getSearch()" required="required" autocomplete="off">
       <option value="">---select---</option>
          <?php
			$sel="select * from tbl_place";
			$row=$con->query($sel);
			while($data=$row->fetch_assoc())
			{
				?>
                <option value="<?php echo $data["place_id"]?>"><?php echo $data["place_name"]?></option>
                <?php
			}
		?>
     
      </select></td>

    </tr>
    <tr>
      <td>Location</td>
      <td><label for="txt_loc"></label>
      <input type="text" name="txt_loc" id="txt_loc" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_add"></label>
      <textarea name="txt_add" id="txt_add" cols="45" rows="5" required autocomplete="off"></textarea></td>
    </tr>
    <tr>
      <td>Expected End Date</td>
      <?php
	  	$selQrychk="SELECT MAX(cwrequest_expectedenddate) as max FROM  tbl_cwrequest where cwrequest_status='1' and worker_id='".$_GET["wrid"]."'";
		$data=$con->query($selQrychk)->fetch_assoc();
		
	  ?>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" required autocomplete="off"  min="<?php echo $data["max"]?>"/></td>
    </tr>
    <tr>
      <td> Work Details</td>
      <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5" required autocomplete="off"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" onMouseOver="mouseOvers()" onMouseOut="mouseOuts()"/>
      <input type="reset" name="btnCancel" id="btnCancel" value="Cancel" onMouseOver="mouseOverc()" onMouseOut="mouseOutc()" /></td>
    </tr>
  </table>
</form>
<?php
  include("Foot.php");
  ?>
</body>
<script>
function mouseOvers()
{
	document.getElementById("btnSubmit").style.color="blue";
}
function mouseOuts()
{
	document.getElementById("btnSubmit").style.color="Black";
}

function mouseOverc()
{
	document.getElementById("btnCancel").style.color="Red";
}
function mouseOutc()
{
	document.getElementById("btnCancel").style.color="Black";
}

</script>
<script>
	//document.getElementById("txt_date").disabled = true;
</script>

</html>