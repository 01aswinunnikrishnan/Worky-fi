<?php
ob_start();
include("SessionValidator.php");
include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>
<body>
<?php

		include("../Assests/Connection/Connection.php");

		if(isset($_POST["btnsave"]))
		{
			
			$distname=$_POST["txt_dist"];
			$sid=$_POST["sel_state"];
			$hid=$_POST["txtid"];
			if($hid!=null)
			{
				 $up="update tbl_district set district_name='".$distname."',state_id='".$sid."' where district_id='".$hid."'";
				if($con->query($up));
				{
				
					?>
		
							<script>
								
									alert("Value Updated");
									window.location="District.php";
							</script>
					<?php
				}
			}
			else
			{
			
				 $insQry="insert into tbl_district(district_name,state_id)values('".$distname."','".$sid."')";
				if($con->query($insQry))
				{
					
					?>
		
							<script>
								
									alert("Value Inserted");
									window.location="District.php";
							</script>
				   <?php
						
				}
				else
				{
					
					?>
							<script>
									alert("Insertion Failed");
									window.location="District.php";
							</script>
					<?php
					
				}
			}
		}
  
  
  if(isset($_GET["did"]))
  { 
  	$del="delete from tbl_district where district_id='".$_GET["did"]."'";
  	if($con->query($del))
	{
		header("location:District.php");			
	}
  }
$disid="";
$dname="";
$sid="";
  if(isset($_GET["eid"]))
  {
	  $sel1="select * from tbl_district where district_id='".$_GET["eid"]."'";
	  $row1=$con->query($sel1);
	  $data1=$row1->fetch_assoc();
	  $disid=$data1["district_id"];
	  $dname=$data1["district_name"];
  }


?>

<form id="form1" name="form1" method="POST" action="">
  <table  border="1" align="center" cellpadding="10" style="border-collapse:collapse">
   <input type="hidden" name="txtid" value="<?php echo $disid?>" />
    <tr>
      <td>State</td>
      <td><label for="sel_state"></label>
        <select name="sel_state" id="sel_state">
        <option value="">---select---</option>
        <?php
	$sel="select * from tbl_state";
	$row=$con->query($sel);
	
	while($data=$row->fetch_assoc())
	{
		
	?>
    <option value="<?php echo $data["state_id"]?>"><?php echo $data["state_name"]?></option>
    <?php
	}
	?>
      </select></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="txt_dist"></label>
      <input type="text" name="txt_dist" id="txt_dist" value="<?php echo $dname ?>" required="required" autocomplete="off"  pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" onMouseOver="mouseOvers()" onMouseOut="mouseOuts()" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" onMouseOver="mouseOverc()" onMouseOut="mouseOutc()" /></td>
    </tr>
  </table>
  <br  />
  <hr />
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>SlNo</td>
      <td>State</td>
      <td>District</td>
      <td>Action</td>
    </tr>
     <?php
	$selQry="select * from tbl_district d inner join tbl_state s on s.state_id=d.state_id";

	$row=$con->query($selQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["state_name"];?></td>
      <td><?php echo $data["district_name"];?></td>
      <td><a href="District.php?did=<?php echo $data["district_id"]?>">Delete</a>/<a href="District.php?eid=<?php echo $data["district_id"]?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <br />
</form>

</body>
<?php
ob_flush();
include("Foot.php");
?>
<script>
function mouseOvers()
{
	document.getElementById("btnsave").style.color="#0F0";
}
function mouseOuts()
{
	document.getElementById("btnsave").style.color="Black";
}

function mouseOverc()
{
	document.getElementById("btncancel").style.color="Red";
}
function mouseOutc()
{
	document.getElementById("btncancel").style.color="Black";
}

</script>


</html>