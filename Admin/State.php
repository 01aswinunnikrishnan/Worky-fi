<?php
         include("SessionValidator.php");
		include("../Assests/Connection/Connection.php");
		include("Head.php");
ob_start();
$eid="";
$ename="";
		if(isset($_POST["btnsave"]))
		{
			
			$statename=$_POST["txt_state"];
			$hid=$_POST["txtid"];
			if($hid!=null)
			{
				$up="update tbl_state set state_name='".$statename."' where state_id='".$hid."'";
				if($con->query($up));
				{
				
			?>

					<script>
						
							alert("State updated");
							window.location="State.php";
					</script>
   <?php
				}
			}
			else
			{
			
			$insQry="insert into tbl_state(state_name)values('".$statename."')";
			if($con->query($insQry))
			{
				
			?>

					<script>
						
							alert("Value Inserted");
							window.location="State.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Insertion Failed");
							window.location="State.php";
					</script>
       	<?php
				
			}
			}
			
  }
  
  if(isset($_GET["did"]))
  { $del="delete from tbl_state where state_id='".$_GET["did"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Value Deleted");
							window.location="State.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Deletion Failed");
							window.location="State.php";
					</script>
       	<?php
			}
  }
  if(isset($_GET["eid"]))
  {
	  $sel1="select * from tbl_state where state_id='".$_GET["eid"]."'";
	  $row1=$con->query($sel1);
	  $data1=$row1->fetch_assoc();
	  $eid=$data1["state_id"];
	  $ename=$data1["state_name"];
  }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>State</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
  <input type="hidden" name="txtid" value="<?php echo $eid?>" />
    <tr>
      <td>State</td>
      <td><label for="txt_state"></label>
      <input type="text" name="txt_state" id="txt_state" required autocomplete="off"  value="<?php echo $ename?>" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" onMouseOver="mouseOvers()" onMouseOut="mouseOuts()" />
      <input type="reset" name="btnc" id="btncancel" value="Cancel" onMouseOver="mouseOverc()" onMouseOut="mouseOutc()" /></td>
    </tr>
  </table>
  <br />
  <hr />
  <br />
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>SlNo</td>
      <td>State</td>
      <td>Action</td>
    </tr>
    <?php
	$sel="select * from tbl_state";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["state_name"]?></td>
      <td><a href="State.php?did=<?php echo $data["state_id"]?>">Delete</a>/<a href="State.php?eid=<?php echo $data["state_id"]?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  </form>
</body>
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