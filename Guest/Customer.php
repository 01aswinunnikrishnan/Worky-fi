<?php
      include("../Assests/Connection/Connection.php");
	  include("Head.php");
	  
	  if(isset($_POST["btn_save"]))
		{
			
			$customername=$_POST["txt_name"];
			$customerage=$_POST["txt_age"];
			$customeraddress=$_POST["txt_add"];
			$customercon=$_POST["txt_contact"];
			$customeremail=$_POST["txt_email"];
			$customergender=$_POST["rdbgender"];
			
			$pid=$_POST["sel_place"];
			$customerpw=$_POST["txt_password"];
			$customercpw=$_POST["txt_confirmpassword"];
			
			$username=$_POST["txtusername"];
			
			
			$upphoto=$_FILES["filepic"]["name"];
			$temp=$_FILES["filepic"]["tmp_name"];
			move_uploaded_file($temp,"../Assests/CustomerPhoto/".$upphoto);
			
			
			if($customerpw== $customercpw)
			{
				$selChk="select * from tbl_customer where customer_username='$username'";
				$row=$con->query($selChk);
				if(mysqli_num_rows($row)>0)
				{
					?>

					<script>
						
							alert("USERNAME Already Registred");
							window.location="Customer.php";
					</script>
           <?php
					
				}
				else
				{
			
			
			
			 $insQry="insert into tbl_customer(customer_name,customer_age,customer_address,customer_contact,customer_email,customer_gender,place_id,customer_photo,customer_password,customer_username)values('".$customername."','".$customerage."','".$customeraddress."','".$customercon."','".$customeremail."','".$customergender."','".$pid."','".$upphoto."','".$customerpw."','".$username."')";
	// echo $insQry;
			if($con->query($insQry))
		     {
			?>

					<script>
						
							alert("Value Inserted");
							window.location="Customer.php";
					</script>
           <?php
				
			}
	else
		{
				
			?>
        			<script>
							alert("Insertion Failed");
							window.location="Customer.php";
					</script>
       	<?php
				
		 }
			
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
<title>Customer</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table border="1" cellpadding="10" style="border-collapse:collapse" align="center">
    <tr>
    <br/>
    <br/>
      <td><p>Name</p></td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required autocomplete="off" pattern="^[A-Z]+[a-zA-Z ]*$" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" onChange="nameval(this)" />
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
      <input type="text" name="txt_contact" id="txt_contact" required autocomplete="off" pattern="[0-9]{10}" title="Phone number with 7-9 and remaing 9 digit with 0-9" onChange="checknum(this)"/>
      <span id="contact"></span></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" required autocomplete="off" onKeyUp="emailval(this), checkEmail(this.value)"/>
      <span id="content"></span></td>
    </tr>
    <tr>
      <td>Gender</td>
       <td> 
        <input type="radio" name="rdbgender" id="rdbgender" value="Male" required autocomplete="off" checked="checked"/>Male
         <input type="radio" name="rdbgender" id="rdbgender" value="Female" required autocomplete="off" /> Female
        </td>
    </tr>
    <tr>
      <td>State</td>
      <td><label for="sel_state"></label>
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
      <td>Photo</td>
      <td><label for="filepic"></label>
      <input type="file" name="filepic" id="filepic" /></td>
    </tr>
     <tr>
      <td>Username</td>
      <td><label for="txtusername"></label>
        <input type="text" name="txtusername" id="txtusername"  required autocomplete="off" /></td>
    </tr>
   <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
        <span class="control-group"><input type="password" name="txt_password" id="txt_password"  required autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></span></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_confirmpassword"></label>
      <span class="control-group"><input type="password" name="txt_confirmpassword" id="txt_confirmpassword" required autocomplete="off" class="form-control" required onchange="chkpwd(this, txtpwd)"/>
                   <span id="pass"></span></span></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="save" onMouseOver="mouseOvers()" onMouseOut="mouseOuts()" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" onMouseOver="mouseOverc()" onMouseOut="mouseOutc()" /></td>
    </tr>
  </table>
  </form>
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
</script>
<script>
function mouseOvers()
{
	document.getElementById("btn_save").style.color="#0F0";
}
function mouseOuts()
{
	document.getElementById("btn_save").style.color="white";
}

function mouseOverc()
{
	document.getElementById("btn_cancel").style.color="Red";
}
function mouseOutc()
{
	document.getElementById("btn_cancel").style.color="white";
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