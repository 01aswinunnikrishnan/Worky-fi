<?php

    include("SessionValidator.php");
    include("../Assests/Connection/Connection.php");
	include("Head.php");
	
  $selQryC="select * from tbl_customer where customer_id='".$_SESSION["cid"]."'";
  $rowC=$con->query($selQryC);
  $dataC=$rowC->fetch_assoc(); 
if(isset($_POST["btnedit"]))
 {
	 $Photo=$_FILES["file_photo"]["name"];
	 $temp=$_FILES["file_photo"]["tmp_name"];
	 move_uploaded_file($temp,"../Assests/CustomerPhoto/".$Photo);
	 
	 if($Photo != "")
	 {
   		$up="update tbl_customer set customer_name='".$_POST["txt_name"]."',customer_age='".$_POST["txt_age"]."',customer_contact='".$_POST["txt_contact"]."',customer_email='".$_POST["txt_email"]."',customer_address='".$_POST["txt_add"]."',customer_photo='".$Photo."' where customer_id='".$_SESSION["cid"]."'" ;
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
		 $up="update tbl_customer set customer_name='".$_POST["txt_name"]."',customer_age='".$_POST["txt_age"]."',customer_contact='".$_POST["txt_contact"]."',customer_email='".$_POST["txt_email"]."',customer_address='".$_POST["txt_add"]."' where customer_id='".$_SESSION["cid"]."'" ;
  	    $con->query($up);
  
	 }
 }
   
   
 ?>
<html>
<body>
<form i name="form1" method="post" action="" enctype="multipart/form-data">
<input type="file" name="file_photo" id="file_photo" onChange="previewFile()" style="visibility:hidden"/>
  <table border="1" align="center" cellpadding="10">
      <tr>
      <td colspan="2" align="center">
        <img onClick="chooseFile()" id="previewImg" src="../Assests/CustomerPhoto/<?php echo $dataC["customer_photo"]?>" width="120" height="120" style="border-radius:50%" />
      </td>
      </tr>
      <td>
      
      <p>Name : 
        <label for="txt_name"></label>
        <input type="text" name="txt_name" id="txt_name" value="<?php echo $dataC["customer_name"]?>" /></p>
      <p>Age :
         <label for="txt_age"></label>
         <input type="number" name="txt_age" id="txt_age" value="<?php echo $dataC["customer_age"]?>" /></p>    
      <p>Contact :
        <label for="txt_contact"></label>
        <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $dataC["customer_contact"]?>" /></p>
      <p>Emai l  :
        <label for="txt_email"></label>
        <input type="email" name="txt_email" id="txt_email" value="<?php echo $dataC["customer_email"]?>" /></p>
      <p>Address :
        <label for="txt_add">
          <textarea name="txt_add" id="txt_add"  cols="45" rows="5"><?php echo $dataC["customer_address"]?></textarea>
        </label></p>
      </p></td>
    </tr>
    <tr>
    <td align="center">
        <input type="submit" name="btnedit" id="btnedit" value="Save Change" onMouseOver="mouseOvere()" onMouseOut="mouseOute()" />
        <input type="reset" name="btncancel" id="btncancel" value="Cancel" onMouseOver="mouseOverc()" onMouseOut="mouseOutc()" />
      </td>
      </tr>
  </table>
  </form>
</body>
<?php
include("Foot.php");
?>
<script>
function mouseOvere()
{
	document.getElementById("btnedit").style.color="Blue";
}
function mouseOute()
{
	document.getElementById("btnedit").style.color="White";
}

function mouseOverc()
{
	document.getElementById("btncancel").style.color="Red";
}
function mouseOutc()
{
	document.getElementById("btncancel").style.color="White";
}

</script>
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