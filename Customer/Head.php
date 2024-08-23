<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WORKY-FI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../Assests/Templates/Main/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../Assests/Templates/Main/lib/owlcarousel/owl.carousel.min.js" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Assests/Templates/Main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assests/Templates/Main/css/style.css" rel="stylesheet">
    <link href="../Assests/Templates/Form2.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
                <!--<div class="h-100 d-inline-flex align-items-center text-white">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                </div>-->
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                <span class="fs-5 fw-bold me-2"><i class="fa fa-star me-2"></i><i class="fa fa-star me-2"></i>
                <i class="fa fa-star me-2"></i><i class="fa fa-star me-2"></i><i class="fa fa-star me-2"></i></span>

                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-success navbar-light sticky-top py-0 pe-5">
        <a href="index.html" class="navbar-brand ps-5 me-0">
            <h1 style="color:#0FF"class="m-0">WORKY-FI</h1>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
				
						<a href="Search.php"><form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon bg-success"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div></a>
	
                       <a style="color:#FFF" href="CustHomePage.php" class="nav-item nav-link active fas fa-home "> Home                        </a>
                <div class="nav-item dropdown">
                    <a style="color:#FFF" href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="../Assests/Icons/login icon3_files/OIP.pjIGqqqh5SYH7Ynsv6h7ZAAAAA" alt="..." class="avatar-img rounded-circle" width="20">Profile                     </a>
                    <div class="dropdown-menu bg-light m-0">
                    <img src="../Assests/Icons/login icon3_files/OIP.pjIGqqqh5SYH7Ynsv6h7ZAAAAA" alt="..." class="avatar-img rounded-circle" width="30">
                        <a href="ViewCProfile.php">View Profile</a>
                        <a href="EditCProfile.php" class="dropdown-item">Edite Profile</a>
                        <a href="ChangeCPassword.php" class="dropdown-item">Change Password</a>
                    </div>
                </div>
                <a style="color:#FFF" href="ViewWorkRequest.php" class="nav-item nav-link">Work Requests</a>
                <a style="color:#FFF" href="Complaint.php" class="nav-item nav-link">Complaint</a>
            </div>
            <a href="../Guest/Login.php" class="btn btn-primary px-3 d-none d-lg-block" style="background:#009">LogOut</a>
        </div>
    </nav>
    <!-- Navbar End -->
    <!-- Navbar End -->
   <style>
table
{
	color:#006;
	font-family:"Arial Black", Gadget, sans-serif;

}
</style>
