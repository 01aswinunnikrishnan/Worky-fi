<?php
session_start();


		include("../Assests/Connection/Connection.php");		
$message="";

if(isset($_POST["btn_submit"]))
{
	$email=$_POST["txt_uname"];
	$password=$_POST["txt_pw"];
	
	$selQryA="select * from tbl_admin where admin_username='".$email."' and admin_password='".$password."'";
	$rowA=$con->query($selQryA);
	
	$selQryW="select * from tbl_worker where worker_username='".$email."' and worker_password='".$password."'";
	$rowW=$con->query($selQryW);
	
	$selQryC="select * from tbl_customer where customer_username='".$email."' and customer_password='".$password."'";
	$rowC=$con->query($selQryC);
	
	if($dataA=$rowA->fetch_assoc())
	{ 
	    $_SESSION["aid"]=$dataA["admin_id"];
		header("location:../Admin/HomePage.php");
		?>
        
        <?php
		
		
	}
	else if($dataW=$rowW->fetch_assoc())
	{
		$_SESSION["wrid"]=$dataW["worker_id"];
		$_SESSION["wname"]=$dataW["worker_name"];
		if($dataW["worker_vstatus"]==1)
		{
			header("location:../Woker/WorkerHomePage.php");
		}
		else
		{
			?>
            <script>
			alert("You are not Verified By The Admin !!");
			window.location="Login.php";
			</script>
            <?php
		}
	}
	else if($dataC=$rowC->fetch_assoc())
	{
		$_SESSION["cid"]=$dataC["customer_id"];
		$_SESSION["cname"]=$dataC["customer_name"];
		if($dataC["status"]==1)
		{
			header("location:../customer/CustHomePage.php");
		}
		else
		{
			?>
            <script>
			alert("You are not Verified By The Admin !!");
			window.location="Login.php";
			</script>
            <?php
		}
		
		?>
        <?php
	}
	   else
	   {
		   ?>
            <script>
			     alert("invalid iogin");
				// window.location="Login.php";
				 </script>
                 <?php
	   }
}
		       
?>

<script>
function mouseOver1()
{
	document.getElementById("btn_submit").style.color="#0F9";
}
function mouseOut1()
{
	document.getElementById("btn_submit").style.color="black";
}
</script>


</html>







<!DOCTYPE html>
<html lang="en">
<head>
	<title>WORKY-FI Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../Assests/Templates/Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assests/Templates/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assests/Templates/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assests/Templates/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assests/Templates/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assests/Templates/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assests/Templates/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Assests/Templates/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>	
	<div class="limiter">
     <div class="container-login100">
        <div><a href="../index.php"><img src="../Assests/Icons/home3.jpg" width="55" id="btn_home" alt="..." class="avatar-img rounded-circle" onMouseOver="mouseOvers()" onMouseOut="mouseOuts()">
	</a></div>
       	<div class="wrap-login100" style="background-image:url(../Assests/Icons/wp2058337.jpg)">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../Assests/Icons/workyfi2.png" class="rounded-circle" height="300" alt="IMG">
				</div>
               <form class="login100-form validate-form" method="post">
                	<span class="login100-form-title" style="color:#FFF">
						 Login
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="txt_uname" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="txt_pw" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn" style="color:#FFF">
						<button class="login100-form-btn" type="submit" name="btn_submit" id="btn_submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span style="color:#FFF" class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#" style="color:#FFF">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="HomePage.php" style="color:#FFF">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="../Assests/Templates/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assests/Templates/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="../Assests/Templates/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assests/Templates/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assests/Templates/Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src=""></script>
    <script>
function mouseOvers()
{
	document.getElementById("btn_home").src="../Assests/Icons/home.jpeg"

}
function mouseOuts()
{
	document.getElementById("btn_home").src="../Assests/Icons/home3.jpg"
}
</script>
</body>
</html>