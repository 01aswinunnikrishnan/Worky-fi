
<?php
      include("SessionValidator.php");
      include("../Assests/Connection/Connection.php");
ob_start();
include("Head.php");
$eid="";
$ename="";

	  if(isset($_POST["btnsave"]))
		{
			$complainttypename=$_POST["txt_ComplaintType"];

			if($_POST["txtid"]!="")
			{
				$upQry="update tbl_complainttype set complainttype_name='".$complainttypename."' where complainttype_id='".$_POST["txtid"]."'";
				if($con->query($upQry))
				{
					?>
					<script>						
							alert("Complaint Type Updated");
							window.location="ComplaintType.php";
					</script>
           		<?php		
				}
				else
				{	
				?>
        			<script>
							alert("Complaint Type Updation Failed");
							window.location="ComplaintType.php";
					</script>
       			<?php
				
					}
				
				}
			else
			{
			
			$insQry="insert into tbl_complainttype(complainttype_name)values('".$complainttypename."')";
			//echo $insQry;
			if($con->query($insQry))
			{
				
			?>

					<script>
						
							alert("Complaint Type Inserted");
							window.location="ComplaintType.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Insertion Failed");
							window.location="ComplaintType.php";
					</script>
       	<?php
				
			}
			}
		    }
			
  if(isset($_GET["did"]))
  { 
    $del="delete from tbl_complainttype where complainttype_id='".$_GET["did"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Complaint Type Deleted");
							window.location="ComplaintType.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Deletion Failed");
							window.location="ComplaintType.php";
					</script>
       	<?php
			}
			
  }
  if(isset($_GET["eid"]))
  {
	  $sel1="select * from tbl_complainttype where complainttype_id='".$_GET["eid"]."'";
	  $row1=$con->query($sel1);
	  $data=$row1->fetch_assoc();
	  $eid=$data["complainttype_id"];
	  $ename=$data["complainttype_name"];
   }

?>
  


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ComplaintType</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
  <input type="hidden" name="txtid" value="<?php echo $eid?>" />
    <tr>
      <td>Complaint Type</td>
      <td><label for="txt_ComplaintType"></label>
      <input type="text" name="txt_ComplaintType" id="txt_ComplaintType" required autocomplete="off" /></td>
     </tr>
    <tr>
      <td colspan="4" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" onMouseOver="mouseOvers()" onMouseOut="mouseOuts()"  />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" onMouseOver="mouseOverc()" onMouseOut="mouseOutc()" /></td>
    </tr>
  </table>  <br />
  <hr />
  <br />
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>SlNo</td>
      <td>Complaint Type</td>
      <td>Action</td>
    <?php
	$sel="select * from tbl_complainttype";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	<tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["complainttype_name"]?></td>
      <td><a href="ComplaintType.php?did=<?php echo $data["complainttype_id"]?>">Delete</a>/<a href="ComplaintType.php?eid=<?php echo $data["complainttype_id"]?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
 	   
</table>
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