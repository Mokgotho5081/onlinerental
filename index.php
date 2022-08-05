<!doctype html>
<html lang="en">
<?php 
include 'constants/settings.php'; 
include 'constants/check-login.php';
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Online Apartment System</title>
	<meta name="description" content="Online Job Management / Job Portal" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="BwireSoft">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Nightingale Jobs" />
    <meta property="og:description" content="Online Job Management / Job Portal" />

	<link rel="shortcut icon" href="images/ico/favicon.png">


	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="icons/linearicons/style.css">
	<link rel="stylesheet" href="icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="icons/rivolicons/style.css">
	<link rel="stylesheet" href="icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="icons/flaticon-ventures/flaticon-ventures.css">

	<link href="css/style.css" rel="stylesheet">

	
</head>

  <style>
  
    .autofit2 {
	height:70px;
	width:400px;
    object-fit:cover; 
  }
  
      .autofit3 {
	height:80px;
	width:100px;
    object-fit:cover; 
  }
  

  </style>
<body class="home">


	<div id="introLoader" class="introLoading"></div>

	<div class="container-wrapper">

		<header id="header">

			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<!--<a href="./"><img src="images/logo.png" alt="Logo" /></a>-->
							<P style="font-size:20px; color:white;"><b>RENTAL APARTMENT</b></P>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
							
								<a href="./">Home</a>
								
							</li>
							
							<li>
								<a href="app-list.php"> Apartments</a>

							</li>
							<!--
							<li>
								<a href="employers.php">Employers</a>
							</li>
							
							<li>
								<a href="employees.php">Employees</a>
							</li>
							-->
							<li>
								<a href="contact.php">Contact Us</a>
							</li>

						</ul>
				
					</div>

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
						<?php
						if ($user_online == true) {
						print '
						    <li><a href="logout.php">logout</a></li>
							<li><a href="'.$myrole.'">Profile</a></li>';
						}else{
						print '
							<li><a href="login.php">login</a></li>
							<li><a data-toggle="modal" href="#registerModal">register</a></li>';						
						}
						
						?>

						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>

			
			<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Create your account for free</h4>
				</div>
				
				<div class="modal-body">
				
					<div class="row gap-20">
					
						<div class="col-sm-6 col-md-6">
							<a href="register.php?p=Landlord" class="btn btn-facebook btn-block mb-5-xs">Register as Landlord</a>
						</div>
						<div class="col-sm-6 col-md-6">
							<a href="register.php?p=Tenant" class="btn btn-facebook btn-block mb-5-xs">Register as Tenant</a>
						</div>

					</div>
				
				</div>
				
				<div class="modal-footer text-center">
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
				</div>
				
			</div>

			
		</header>

		<div class="main-wrapper">
		
			<div class="hero" style="background-image:url('images/hero-header/city.jpg');">
				<div class="container">

					<h1>A Higher Quality Of Living</h1>
					<p>Finding your nice apartment on Online Apartment Systems</p>

					<div class="main-search-form-wrapper">
					
						<form action="job-list.php" method="GET" autocomplete="off">
					
							<div class="form-holder">
								<div class="row gap-0">
								
									<div class="col-xss-3 col-xs-3 col-sm-3">
										<select class="form-control" name="category" required/>
										<option value="">-Select category-</option>
										 <?php
										 require 'constants/db_config.php';
										 try {
                                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                         $stmt = $conn->prepare("SELECT * FROM tbl_categories ORDER BY category");
                                         $stmt->execute();
                                         $result = $stmt->fetchAll();

                                         foreach($result as $row)
                                         {
                                        ?>
										
										<option style="color:black" value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
										<?php
	                                     }
                                         $stmt->execute();
					  
	                                     }catch(PDOException $e)
                                         {
        
                                         }
	
										?>
														   
										</select>
									</div>
									
									<div class="col-xss-3 col-xs-3 col-sm-3">
										<select class="form-control"  name="city" required/>
										<option value="">-Select city-</option>
										 <?php
										 require 'constants/db_config.php';
										 try {
                                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                         $stmt = $conn->prepare("SELECT * FROM tbl_cities ORDER BY city_name");
                                         $stmt->execute();
                                         $result = $stmt->fetchAll();

                                         foreach($result as $row)
                                         {
                                        ?>
										
										<option style="color:black" value="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
										<?php
	                                     }
                                         $stmt->execute();
					  
	                                     }catch(PDOException $e)
                                         {
               
                                         }
	
										?>

										</select>
										
									</div>
									<div class="col-xss-3 col-xs-3 col-sm-3">
										<select class="form-control"  name="p1" required/>
										
										 
										
										<option style="color:black" value="1000">R1000</option>
										<option style="color:black" value="2000">R2000</option>
										<option style="color:black" value="3000">R3000</option>
										<option style="color:black" value="4000">R4000</option>
										<option style="color:black" value="5000">R5000</option>
										<option style="color:black" value="6000">R6000</option>
										
										</select>
										
									</div>
									<div class="col-xss-3 col-xs-3 col-sm-3">
										<select class="form-control"  name="p2" required/>
										
										 
										
										<option style="color:black" value="2000">R2000</option>
										<option style="color:black" value="3000">R3000</option>
										<option style="color:black" value="4000">R4000</option>
										<option style="color:black" value="5000">R5000</option>
										<option style="color:black" value="6000">R6000</option>
										<option style="color:black" value="7000">R7000</option>
										
										</select>
										
									</div>
									
									
								</div>
								
							
							</div>
							
							
							
							<div class="btn-holder">
								<button name="search" value="✓" type="submit" class="btn"><i class="ion-android-search"></i></button>
							</div>
						
						</form>
						
					</div>

				</div>
				
			</div>

			
			<div class="post-hero bg-light">
			
				<div class="container">

					<div class="process-item-wrapper mt-20">
							
						<div class="row">
						
							<div class="col-sm-4">
								
								<div class="process-item clearfix">
									
									<div class="icon">
										<i class="flaticon-line-icon-set-magnification-lens"></i>
									</div>
									
									<div class="content">
										<h5>01 / Search for Apartment</h5>
									</div>
									
								</div>
								
							</div>
							
							<div class="col-sm-4">
							
								<div class="process-item clearfix">
									
									<div class="icon">
										<i class="flaticon-line-icon-set-pencil"></i>
									</div>
									
									<div class="content">
										<h5>02 / Rent Apartment</h5>
									</div>
									
								</div>
								
							</div>
							
							<div class="col-sm-4">
								
								<div class="process-item clearfix">
									
									<div class="icon">
										<i class="flaticon-line-icon-set-calendar"></i>
									</div>
									
									<div class="content">
										<h5>03 / Start Staying</h5>
									</div>
									
								</div>
								
							</div>
							
						</div>
					
					</div>
					
				</div>
			
			</div>


			<div class="pt-0 pb-50">
			
				<div class="container">

					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
							
								<br><h2>Random Apartments</h2>
								
							</div>
						
						</div>
					
					</div>
					
					<div class="row top-company-wrapper with-bg">

							
					<?php
					require 'constants/db_config.php';
					try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE role = 'employer' ORDER BY rand() LIMIT 8");
                    $stmt->execute();
                    $result = $stmt->fetchAll();

                    foreach($result as $row) {
					$complogo = $row['avatar'];
					?>
					<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
							
					<div class="top-company">
					<div class="image">
					<?php 
					if ($complogo == null) {
					print '<center><img class="autofit2" alt="image"  src="images/blank.png"/></center>';
					}else{
					echo '<center><img class="autofit2" alt="image"  src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
					}
					?>
					</div>
					<h6><?php echo $row['first_name'];?></h6>
					<a target="_blank" href="company.php?ref=<?php echo $row['member_no']; ?>">View Apartment</a>
					</div>
							
					</div>
					<?php
					
                    {

	                }
					  
	                }}catch(PDOException $e)
                    {

                    }
	
					?>
						

						
						
					</div>

				</div>

			</div>
			
			<div class="bg-light pt-80 pb-80">
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
							
								<h2>Latest Apartments</h2>
								
							</div>
						
						</div>
					
					</div>
					
					<!--<div class="row">
						
						<div class="col-md-12">
						
							<div class="recent-job-wrapper alt-stripe mr-0">
							<?php
							/*require 'constants/db_config.php';
							try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT * FROM tbl_jobs ORDER BY enc_id DESC LIMIT 8");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
  

                            foreach($result as $row) {
							$jobcity = $row['city'];
							$jobcountry = $row['country'];
							$type = $row['type'];
							$title = $row['title'];
							$closingdate = $row['closing_date'];
							$company_id = $row['company'];
							$post_date = date_format(date_create_from_format('d/m/Y', $closingdate), 'd');
                            $post_month = date_format(date_create_from_format('d/m/Y', $closingdate), 'F');
                            $post_year = date_format(date_create_from_format('d/m/Y', $closingdate), 'Y');
										   
							$stmtb = $conn->prepare("SELECT * FROM tbl_users WHERE member_no = '$company_id' and role = 'employer'");
                            $stmtb->execute();
                            $resultb = $stmtb->fetchAll();
							foreach($resultb as $rowb) {
							$complogo = $rowb['avatar'];
							$thecompname = $rowb['first_name'];	
								
							}
							
							if ($type == "Freelance") {
							$sta = '<div class="job-label label label-success">
									Freelance
									</div>';
											  
							}
							if ($type == "Part-time") {
							$sta = '<div class="job-label label label-danger">
									Part-time
									</div>';
											  
							}
							if ($type == "Full-time") {
							$sta = '<div class="job-label label label-warning">
									Full-time
									</div>';
											  
							}
							?>
							<a class="recent-job-item clearfix" target="_blank" href="explore-job.php?jobid=<?php echo $row['job_id']; ?>">
							<div class="GridLex-grid-middle">
							<div class="GridLex-col-5_xs-12">
							<div class="job-position">
							<div class="image">
							<?php 
							if ($complogo == null) {
							print '<center><img alt="image"  src="images/blank.png"/></center>';
							}else{
							echo '<center><img alt="image" title="'.$thecompname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
							}
							?>
							</div>
							<div class="content">
							<h4><?php echo "$title"; ?></h4>
							<p><?php echo "$thecompname"; ?></p>
							</div>
							</div>
							</div>
							<div class="GridLex-col-5_xs-8_xss-12 mt-10-xss">
							<div class="job-location">
							<i class="fa fa-map-marker text-primary"></i> <?php echo "$jobcountry" ?></strong> - <?php echo "$jobcity" ?>
							</div>
							</div>
							<div class="GridLex-col-2_xs-4_xss-12">
							<?php echo "$sta"; ?>
							<span class="font12 block spacing1 font400 text-center">Due - <?php echo "$post_month"; ?> <?php echo "$post_date"; ?>, <?php echo "$post_year"; ?></span>
							</div>
							</div>
							</a>
								
							<?php

                            }
	                        }catch(PDOException $e)
                            { 
                   
                             } */
                             ?>
						


-->
							
							</div>
							
						</div>
						
					</div>
					
				</div>
			
			</div>
			


			
			<footer class="footer-wrapper">
			
				<div class="main-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-9">
							
								<div class="row">
								
									<div class="col-sm-6 col-md-4">
									
										<div class="footer-about-us">
											<h5 class="footer-title">About Online Apartment System</h5>
											<p>Online Rental Apartment is a web design that is developed by TempHouses group to make things easier for those who are looking for rental apartments.</p>
										</div>

									</div>
									
									<div class="col-sm-6 col-md-5 mt-30-xs">
										<h5 class="footer-title">Quick Links</h5>
										<ul class="footer-menu clearfix">
											<li><a href="./">Home</a></li>
											<li><a href="job-list.php">Apartments</a></li>
										
											<li><a href="contact.php">Contact Us</a></li>
											<li><a href="#">Go to top</a></li>

										</ul>
									
									</div>

								</div>

							</div>
							
							<div class="col-sm-12 col-md-3 mt-30-sm">
							
								<h5 class="footer-title">TempHome Contact</h5>
								
								<p>Address : 14 Diederich street, Khayalethu Residence, Witbank, 1035</p>
								<p>Email : <a href="mailto:info@temphome.com">info@temphome.com</a></p>
								<p>Phone : <a href="tel:+27786607474">+27 786 607 474</a></p>

							</div>

							
						</div>
						
					</div>
					
				</div>
				
				<div class="bottom-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-4 col-md-4">
					
								<p class="copy-right">&#169; Copyright <?php echo date('Y'); ?> TempHome</p>
								
							</div>
							
							<div class="col-sm-4 col-md-4">
							
								<ul class="bottom-footer-menu">
									<li><a >Developed by TempHome</a></li>
								</ul>
							
							</div>
							
							<div class="col-sm-4 col-md-4">
								<ul class="bottom-footer-menu for-social">
									<li><a href="<?php echo "$tw"; ?>"><i class="ri ri-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a></li>
									<li><a href="<?php echo "$fb"; ?>"><i class="ri ri-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a></li>
									<li><a href="<?php echo "$ig"; ?>"><i class="ri ri-instagram" data-toggle="tooltip" data-placement="top" title="instagram"></i></a></li>
								</ul>
							</div>
						
						</div>

					</div>
					
				</div>
			
			</footer>
			
		</div>


	</div>

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>


<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/handlebars.min.js"></script>
<script type="text/javascript" src="js/jquery.countimator.js"></script>
<script type="text/javascript" src="js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/easy-ticker.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="js/customs.js"></script>


</body>


</html>