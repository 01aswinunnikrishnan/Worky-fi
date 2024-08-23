<?php

     include("SessionValidator.php");
    include("../Assests/Connection/Connection.php");
include("Head.php");

  $selQryW="select * from tbl_worker where worker_id='".$_SESSION["wrid"]."'";
  $rowW=$con->query($selQryW);
  $dataW=$rowW->fetch_assoc(); 
if(isset($_POST["btnedit"]))
{
	 $Photo=$_FILES["file_photo"]["name"];
	 $temp=$_FILES["file_photo"]["tmp_name"];
	 move_uploaded_file($temp,"../Assests/WorkerPhoto/".$Photo);
	 
	 if($Photo != "")
	 {
   $up="update tbl_worker set worker_name='".$_POST["txt_name"]."',worker_age='".$_POST["txt_age"]."',worker_contact='".$_POST["txt_contact"]."',worker_email='".$_POST["txt_email"]."',worker_address='".$_POST["txt_add"]."',worker_photo='".$Photo."' where worker_id='".$_SESSION["wrid"]."'" ;
   $con->query($up);
  
  
   if($con->query($up))
   
   {
	   ?>
       <script>
	   alert("updated");
	   </script>
       <?php
   }
   else
   {
	   ?>
       <script>
	   alert("not updated");
	   </script>
       <?php
   }
 }
   else
	 {
		 $up="update tbl_worker set worker_name='".$_POST["txt_name"]."',worker_age='".$_POST["txt_age"]."',worker_contact='".$_POST["txt_contact"]."',worker_email='".$_POST["txt_email"]."',worker_address='".$_POST["txt_add"]."' where worker_id='".$_SESSION["wrid"]."'" ;
   $con->query($up);
	 }
}
   
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Worker Profile</title>
</head>

<body>
<form id="form1" method="post" action="" enctype="multipart/form-data">
<input type="file" name="file_photo" id="file_photo" onChange="previewFile()" style="visibility:hidden"/>
     <table  align="center" border="1" cellpadding="10">
     <tr>
     <td colspan="2" align="center">
      <p align="center"><img onClick="chooseFile()" id="previewImg" src="../Assests/WorkerPhoto/<?php echo $dataW["worker_photo"]?>" width="110" height="110" style="border-radius:50%" /> </p>
      </td>
      </tr>
      <td>
      <p>Name : 
        <label for="txt_name"></label>
        <input type="text" name="txt_name" id="txt_name" value="<?php echo $dataW["worker_name"]?>" /></p>
      <p>Age :
         <label for="txt_age"></label>
         <input type="number" name="txt_age" id="txt_age" value="<?php echo $dataW["worker_age"]?>" /></p>    
      <p>Contact :
        <label for="txt_contact"></label>
        <input type="text" name="txt_contact" id="txt_contact" value=" <?php echo $dataW["worker_contact"]?>" /></p>
      <p>Emai l  :
        <label for="txt_email"></label>
        <input type="email" name="txt_email" id="txt_email" value="<?php echo $dataW["worker_email"]?>" /></p>
      <p>Address :
        <label for="txt_add">
          <textarea name="txt_add" id="txt_add"  cols="45" rows="5"><?php echo $dataW["worker_address"]?></textarea>
        </label></p></td>
    </tr>
    <tr>
    <td align="center">
        <input type="submit" name="btnedit" id="btnedit" value="Save Change" />
        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
      </td>
      </tr>
  </table>
  </form>
  <?php
include("Foot.php");
?>

</body>
<script src="../Assests/JQuery/jQuery.js"></script>
<script>
function chooseFile()
{
    
    $('#file_photo').trigger('click');
}

    function previewFile(input){


        var file = $("#file_photo").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>


</html>