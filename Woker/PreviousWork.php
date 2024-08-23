<?php
      include("SessionValidator.php");
      include("../Assests/Connection/Connection.php");
	  include("Head.php");
	  
	    if(isset($_POST["btnsave"]))
		{
			$fdate=$_POST["txt_sd"];
			$edate=$_POST["txt_ed"];
			$pwname=$_POST["txt_name"];
			$pwcon=$_POST["txt_contact"];
			$wt=$_POST["sel_wt"];
			
			
			
			$upphoto=$_FILES["filepic"]["name"];
			$temp=$_FILES["filepic"]["tmp_name"];
			move_uploaded_file($temp,"../Assests/WorkGallery/".$upphoto);
		
				
			 $insQry="insert into tbl_previousworks(previousworks_fdate,previousworks_tdate,previousworks_clientname,previousworks_clientcontact,previousworks_img,worktype_id,worker_id)values('".$fdate."','".$edate."','".$pwname."','".$pwcon."','".$upphoto."','".$wt."','".$_SESSION["wrid"]."')";
	 
			if($con->query($insQry))
		     {	
			 ?>

					<script>
						
							alert("Value Inserted");
							//window.location="PreviousWork.php";
					</script>
            <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Insertion Failed");
							//window.location="PreviousWork.php";
					</script>
    	    <?php
				
			}
		}
			
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Previous Works</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table cellpadding="10" border="1" align="center">
     <tr>
      <td>Work Type</td>
      <td><label for="sel_wt"></label>
        <select name="sel_wt" id="sel_wt" required="required" autocomplete="off">
         <option>---select---</option>
          <?php
		               $selQry="select * from tbl_worktype";
					   $row=$con->query($selQry);
					   while($data=$row->fetch_assoc())
					   {
				?>
                <option value="<?php echo $data["worktype_id"]?>"><?php echo $data["worktype_name"]?></option>
                <?php
					   }
				?>	   
       
       
       
      </select></td>
    </tr>
    <tr>
      <td>Start Date</td>
      <td><label for="txt_sd"></label>
      <input type="date" name="txt_sd" id="txt_sd" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>End date</td>
      <td><label for="txt_ed"></label>
      <input type="date" name="txt_ed" id="txt_ed" required autocomplete="off"  /></td>
    </tr>
    <tr>
      <td>Client Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required autocomplete="off"  /></td>
    </tr>
    <tr>
      <td>Client Contact</td>
      <td><label for="txt_contact"></label>
      <input type="number" name="txt_contact" id="txt_contact" required autocomplete="off"  /></td>
    </tr>
    <tr>
      <td>Work Image</td>
     <td><label for="filepic"></label>
      <input type="file" name="filepic" id="filepic" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<?php
include("Foot.php");
?>
</body>
</html>