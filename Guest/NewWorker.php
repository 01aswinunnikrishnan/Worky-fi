<?php
      include("../Assests/Connection/Connection.php");
	  include("Head.php");
	  
	  if(isset($_POST["btn_save"]))
		{
			
			$name=$_POST["txt_name"];
			$userage=$_POST["txt_age"];
			$useraddress=$_POST["txt_add"];
			$usercon=$_POST["txt_contact"];
			$useremail=$_POST["txt_email"];
			$usergender=$_POST["rdbgender"];
			$description=$_POST["txt_dec"];
			$experiennce=$_POST["txt_exp"];
			$pid=$_POST["sel_place"];
			$userpw=$_POST["txt_password"];
			$usercpw=$_POST["txt_confirmpassword"];
			
			$username=$_POST["txtusername"];
			$worktype=$_POST["sel_work"];
			
			
			$upphoto=$_FILES["filepic"]["name"];
			$temp=$_FILES["filepic"]["tmp_name"];
			move_uploaded_file($temp,"../Assests/WorkerPhoto/".$upphoto);
			
			
			$upproof=$_FILES["file_proof"]["name"];
			$temp=$_FILES["file_proof"]["tmp_name"];
			move_uploaded_file($temp,"../Assests/Workerproof/".$upproof);
			
			if($userpw== $usercpw)
			{
			
			
			
			 $insQry="insert into tbl_worker(worker_name,worker_age,worker_address,worker_contact,worker_email,worker_gender,place_id,worker_photo,worker_proof,worker_experience,worker_description,worker_password,worker_username,worktype_id)values('".$name."','".$userage."','".$useraddress."','".$usercon."','".$useremail."','".$usergender."','".$pid."','".$upphoto."','".$upproof."','".$experiennce."','".$description."','".$userpw."','".$username."','".$worktype."')";
	 echo $insQry;
			if($con->query($insQry))
		     {	
			?>

					<script>
						
							alert("Registration Successfully Completed..You can login only after Verification.");
							window.location="NewWorker.php";
					</script>
           <?php
				
			}
			else
			{
				
			?>
        			<script>
							alert("Insertion Failed");
							window.location="NewWorker.php";
					</script>
       	<?php
				
			}
			
  }
  else
    {
		?>
        <script>
        alert("password missmatch");
		</script>
        <?php
 }
   }     
   
					





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Worker registration </title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table align="center" border="1" cellpadding="10" style="border-collapse:collapse.">
  
   <tr>
      <td width="179">State</td>
      <td width="287"><label for="sel_state"></label>
        <select name="sel_state" id="sel_state"  onchange="getDistrict(this.value)">
         <option>---select---</option>
        <?php
		               $selQry="select * from tbl_state";
					   $row=$con->query($selQry);
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
      <td><label for="sel_dist"></label>
        <select name="sel_dist" id="sel_dist" onChange="getPlaceDetails(this.value)">
         <option>---select---</option>
       
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
         <option>---select---</option>
       
      </select></td>
    </tr>
    <tr>
    <td>Work Type</td>
      <td><label for="sel_work"></label>
        <select name="sel_work" id="sel_work">
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
      <td><p>Full Name( capital letters)</p></td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required autocomplete="off" pattern="^[A-Z]+[A-Z ]*$" title="Name Must Be Capital Letter" onChange="nameval(this)" />
      <span id="name"></span></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><label for="txt_age"></label>
      <input type="number" name="txt_age" id="txt_age" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td height="37">Address</td>
      <td><label for="txt_add"></label>
        <label for="txt_add2"></label>
      <textarea name="txt_add" id="txt_add" cols="45" rows="5" required autocomplete="off"></textarea></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="number" name="txt_contact" id="txt_contact" required autocomplete="off" pattern="([0-9]{10,10})" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9"  onchange="checknum(this)"/>
      <span id="contact"></span></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" required onKeyUp="emailval(this), checkEmail(this.value)"/>
      <span id="content"></span></td>
    </tr>
    <tr>
      <td>Gender</td>
       <td> 
        <input type="radio" name="rdbgender" id="rdbgender" value="Male" required autocomplete="off" checked="checked" />Male
         <input type="radio" name="rdbgender" id="rdbgender" value="Female" required autocomplete="off" /> Female
        </td>
    </tr>
   

    <tr>
      <td><p>Experience</p></td>
      <td><label for="txt_exp"></label>
      <textarea name="txt_exp" id="txt_exp" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><label for="txt_dec"></label>
      <textarea name="txt_dec" id="txt_dec" cols="45" rows="5"></textarea></td>
    </tr>
     <tr>
      <td>Username</td>
      <td><label for="txtusername"></label>
        <input type="text" name="txtusername" id="txtusername" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
        <span class="control-group"><input type="password" name="txt_password" id="txt_password" required autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  /></span></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_confirmpassword"></label>
      <span class="control-group"><input type="password" name="txt_confirmpassword" id="txt_confirmpassword" required autocomplete="off" onChange="chkpwd(this, txtpwd)"/>
                   <span id="pass"></span></span></td>
    </tr>
        <tr>
      <td>Photo</td>
      <td><label for="filepic"></label>
      <input type="file" name="filepic" id="filepic" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Save" onMouseOver="mouseOvers()" onMouseOut="mouseOuts()"/>
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" onMouseOver="mouseOverc()" onMouseOut="mouseOutc()" /></td>
    </tr>
  </table>
  <br  />
  <hr />
  <a href="NewWorker.php">Worker</a>
  
  
  </form>
  <br />
</body>
<?php
include("Foot.php");
?>
<script src="../Assests/JQuery/jQuery.js"></script>
<script>
function getDistrict(sid)
{
	$.ajax({
		url:"../Assests/AjaxPages/AjaxDistrict.php?did="+sid,
		success: function(html){
			$("#sel_dist").html(html);
		}
	});
}
function getPlaceDetails(did)
{
	$.ajax({
		url:"../Assests/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
		}
	});
}
function mouseOver()
{
	document.getElementById("acc").src="../Assests/Icons/home3.jpg" 
}
function mouseOut()
{
	document.getElementById("acc").src="../Assests/Icons/home.jpeg"
}
</script>
<script>
function mouseOvers()
{
	document.getElementById("btn_save").style.color="#0F0";
}
function mouseOuts()
{
	document.getElementById("btn_save").style.color="Black";
}

function mouseOverc()
{
	document.getElementById("btn_cancel").style.color="Red";
}
function mouseOutc()
{
	document.getElementById("btn_cancel").style.color="Black";
}

</script>
<!--Validation-->


<script>
         
            function chkpwd(txtrp, txtp)
{
	if((txtrp.value)!=(txtp.value))
	{
		document.getElementById("pass").innerHTML = "<span style='color: red;'>Passwords Mismatch</span>";
	}
}

function checknum(elem)
{
	var numericExpression = /^[0-9]{8,10}$/;
	if(elem.value.match(numericExpression))
	{
		document.getElementById("contact").innerHTML = "";
		return true;
	}
	else
	{
		document.getElementById("contact").innerHTML = "<span style='color: red;'>Only 10 Numbers Allowed</span>";
		elem.focus();
		return false;
	}
}



function emailval(elem)
{
	var emailexp=/^([a-zA-Z0-9.\_\-])+\@([a-zA-Z0-9.\_\-])+\.([a-zA-Z]{2,4})$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("content").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("content").innerHTML ="<span style='color: red;'>Check Email Address Entered</span>";;
		elem.focus();
		return false;
	}
}
function nameval(elem)
{
	var emailexp=/^([A-Za-z ]*)$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("name").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("name").innerHTML = "<span style='color: red;'>Alphabets Are Allowed</span>";
		elem.focus();
		return false;
	}
}
        </script>


</html>
