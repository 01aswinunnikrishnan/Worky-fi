<?php
include("SessionValidator.php");
include("Head.php");
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>
<body>
<?php

		include("../Assests/Connection/Connection.php");
		if(isset($_POST["btnsave"]))
		{
			
			$statename=$_POST["txt_place"];
			$sid=$_POST["sel_district"];
			
			
			$insQry="insert into tbl_place(place_name,district_id)values('".$statename."','".$sid."')";
			if($con->query($insQry))
			{
				
			?>

					<script>
						
							alert("Value Inserted");
							window.location="PlaceDetails.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Insertion Failed");
							window.location="PlaceDetails.php";
					</script>
       	<?php
				
			}
			}
  
  
  if(isset($_GET["did"]))
  { 
    $del="delete from tbl_place where place_id='".$_GET["did"]."'";
  	if($con->query($del))
			{
				
			?>

					<script>
						
							alert("Value Deleted");
							window.location="PlaceDetails.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Deletion Failed");
							window.location="PlaceDetails.php";
					</script>
       	<?php
			}
			
  }
  
?>


<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>State</td>
      <td><label for="sel_state"></label>
        <select name="sel_state" id="sel_state" onchange="getDistrict(this.value)">
        <option>---select---</option>
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
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district">
        <option>---select---</option>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place" required="required" autocomplete="off" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" onMouseOver="mouseOvers()" onMouseOut="mouseOuts()"/>
      <input type="reset" name="btnc" id="btncancel" value="Cancel" onMouseOver="mouseOverc()" onMouseOut="mouseOutc()" /></td>
    </tr>
  </table>
  <br  />
  <hr />
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>SlNo</td>
      <td>State</td>
      <td>District</td>
      <td>Place</td>
      <td>Action</td>
    </tr>
     <?php
	$sel="select * from tbl_place p inner join tbl_district d on d.district_id=p.district_id inner join tbl_state s on s.state_id=d.state_id";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
	
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["state_name"];?></td>
      <td><?php echo $data["district_name"];?></td>
      <td><?php echo $data["place_name"];?></td>
      <td><a href="PlaceDetails.php?did=<?php echo $data["place_id"]?>">Delete</a></td>
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
</script>
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