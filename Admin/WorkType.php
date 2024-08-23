
<?php
      include("SessionValidator.php");
      include("../Assests/Connection/Connection.php");
	  include("Head.php");
ob_start();

$eid="";
$ename="";	  
	  if(isset($_POST["btnsave"]))
		{
			$worktypename=$_POST["txt_worktype"];

			if($_POST["txtid"]!="")
			{
				$upQry="update tbl_worktype set worktype_name='".$worktypename."' where worktype_id='".$_POST["txtid"]."'";
				if($con->query($upQry))
				{
					?>
					<script>						
							alert("Value Updated");
							window.location="WorkType.php";
					</script>
           		<?php		
				}
				else
				{	
				?>
        			<script>
							alert("Value Updation Failed");
							window.location="WorkType.php";
					</script>
       			<?php
				
					}
				
				}
			else
			{
			
			$insQry="insert into tbl_worktype(worktype_name)values('".$worktypename."')";
			//echo $insQry;
			if($con->query($insQry))
			{
				
			?>

					<script>
						
							alert("Value Inserted");
							window.location="WorkType.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Insertion Failed");
							window.location="WorkType.php";
					</script>
       	<?php
				
			}
			}
		    }
			
  if(isset($_GET["did"]))
  { 
    $del="delete from tbl_worktype where worktype_id='".$_GET["did"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Value Deleted");
							window.location="WorkType.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Deletion Failed");
							window.location="WorkType.php";
					</script>
       	<?php
			}
			
  }
  if(isset($_GET["eid"]))
  {
	  $sel1="select * from tbl_worktype where worktype_id='".$_GET["eid"]."'";
	  $row1=$con->query($sel1);
	  $data=$row1->fetch_assoc();
	  $eid=$data["worktype_id"];
	  $ename=$data["worktype_name"];
   }

?>
  


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WorkType</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
  <input type="hidden" name="txtid" value="<?php echo $eid?>" />
    <tr>
      <td>WorkType</td>
      <td><label for="txt_worktype"></label>
      <input type="text" name="txt_worktype" id="txt_worktype" required autocomplete="off" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" onMouseOver="mouseOvers()" onMouseOut="mouseOuts()"  />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" onMouseOver="mouseOverc()" onMouseOut="mouseOutc()" /></td>
    </tr>
  </table>  <br />
  <hr />
  <br />
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>SlNo</td>
      <td>WorkType</td>
      <td>Action</td>
    <?php
	$sel="select * from tbl_worktype";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	<tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["worktype_name"]?></td>
      <td><a href="WorkType.php?did=<?php echo $data["worktype_id"]?>">Delete</a>/<a href="WorkType.php?eid=<?php echo $data["worktype_id"]?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
 	   
</table>
  </form>
</body>
<?php
include("Foot.php");
ob_flush();
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