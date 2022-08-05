<!doctype html>
<html lang="en">
<?php 
require 'constants/settings.php'; 
require 'constants/check-login.php';
require 'constants/db_config.php'; 

if (isset($_GET['appid'])) {

$appid = $_GET['appid'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_posts WHERE app_id = :appid");
	$stmt->bindParam(':appid', $appid);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$rec = count($result);
	if ($rec == "0") {
	header("location:./");	
	}else{

    foreach($result as $row)
    {
	$apartment_type = $row['apartment_type'];
	$city = $row['city'];
	$rent = $row['rent'];
	$rooms = $row['numrooms'];
	$desc = $row['description'];
	$date_posted = $row['date_posted'];
	$landlord = $row['landlord'];
	$img = $row['app_image'];
	$img1 = $row['app_image1'];
	$img2 = $row['app_image2'];
	
	
	
	}
	}

					  
	}catch(PDOException $e)
    {

    }


}else{
header("location:./");	
}


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE member_no = ".$_SESSION['myid']." ");
$stmt->execute();
$result = $stmt->fetchAll();


    foreach($result as $row)
    {
    $compname = $row['first_name'];
	//$pic = $row['avatar'];
	//$compbout = $row['about'];
	}

					  
	}catch(PDOException $e)
    {

    }
	
	

	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE role='Landlord' AND member_no = '$landlord' ");
$stmt->execute();
$results = $stmt->fetchAll();


    foreach($results as $rows)
    {
    $name = $rows['first_name'];
    $lname = $rows['last_name'];
	
	}

					  
	}catch(PDOException $e)
    {

    }
	
	
	

?>


<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Online Apartment - View_Apartment</title>
	<meta name="description" content="Online Job Management / Job Portal" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="BwireSoft">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Bwire Jobs" />
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

	 <script type="text/javascript">
   function update(str)
   {
	   
	var txt;
    var r = confirm("Are you sure you want to request this room , you can not UNDO");
    if (r == true) {
		document.getElementById("data").innerHTML = "Please wait...";
         var xmlhttp;

      if (window.XMLHttpRequest)
      {
        xmlhttp=new XMLHttpRequest();
      }
      else
      {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }	

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("data").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","app/request-room.php?opt="+str, true);
      xmlhttp.send();
    } else {

    }

  }
</script>

	
</head>

<body class="not-transparent-header">

	<div class="container-wrapper">


		<header id="header">

			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<P style="font-size:20px; color:white;"><b>RENTAL APARTMENT</b></P>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
							
								<a href="./">Home</a>
								
							</li>
							
							<li>
								<a href="app-list.php">Apartments</a>

							</li>
							
							
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

			
		</header>
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
		<div class="main-wrapper">
		
			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="job-list.php">All Apartments</a></li>
						<!--<li><a target="_blank" href="company.php?ref=<?php //echo "$compid"; ?>"><?php //echo "$compname"; ?></a></li>-->
						<li><span><?php echo "$apartment_type"; ?></span></li>
					</ol>
					
				</div>
				
			</div>
			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-md-10 col-md-offset-1">
						
							<div class="job-detail-wrapper">
							
								<div class="job-detail-header text-center">
											
									<h2 class="heading mb-15"><?php echo "$apartment_type"; ?></h2>
								
									<div class="meta-div clearfix mb-25">
										<!--<span>at <a target="_blank" href="company.php?ref=<?php //echo "$compid"; ?>"><?php //echo "$compname"; ?></a> as </span>
										<?php //echo "$sta"; ?> -->
									</div>
									
									<ul class="meta-list clearfix">
										<li>
											<h4 class="heading">Location:</h4>
											<?php echo "$city"; ?> 
										</li>
										<li>
											<h4 class="heading">No. Of Rooms:</h4>
											<?php echo "$rooms"; ?>
										</li>
										<li>
											<h4 class="heading">Rent</h4>
											<?php echo "$rent"; ?> 
										</li>
										<li>
											<h4 class="heading">Posted: </h4>
											<?php echo "$date_posted"; ?>
										</li>
									</ul>
									
								</div>
					
								<div class="job-detail-company-overview clearfix">
								
									<h3>Apartment Images</h3>
									<div class="image">
										<?php 
										//echo "$name"; ?>   <?php //echo "$lname"; 
										
										echo '<img alt="image" title="'.$lname.'" width="180" height="100" src="data:image/jfif;base64,'.base64_encode($img).'"/>';
										
										
										?>
									</div>
									<div class="image">
										<?php 
										//echo "$name"; ?>   <?php //echo "$lname"; 
										
										echo '<img alt="image" title="'.$lname.'" width="180" height="100" src="data:image/jfif;base64,'.base64_encode($img1).'"/>';
										
										
										?>
									</div>
									<div class="image">
										<?php 
										//echo "$name"; ?>   <?php //echo "$lname"; 
										
										echo '<img alt="image" title="'.$lname.'" width="180" height="100" src="data:image/jfif;base64,'.base64_encode($img2).'"/>';
										
										
										?>
									</div>
									
									
									
								</div>
								
								<div class="job-detail-content mt-30 clearfix">
								
									<h3>Apartment Description</h3>

									<p><?php echo "$desc"; ?></p>

									 
								
								</div>
								
								<div class="apply-job-wrapper">
								<?php
						              if ($user_online == true) {
								
								if ($myrole == "Tenant") {
                                                                             print '<button';?> onclick="update(this.value)" <?php print ' value="'.$appid.'" class="btn btn-primary btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-pencil"></i> Request this Apartment</button>';
								}else{
								print '<button class="btn btn-primary disabled btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-padlock"></i> Login as Tenant to request</button>';
								}	
								

								
								}else{
									
								print '<button class="btn btn-primary disabled btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-padlock"></i> Login to request this apartment</button>';	
								}
								
								?>
								
								<p id="data"></p>

								</div>
								
								<div class="tab-style-01">
								
									<ul class="nav" role="tablist">
										<!--<li role="presentation" class="active"><h4><a href="#relatedJob1" role="tab" data-toggle="tab">More apartments from <?php //echo "$compname"; ?></a></h4></li>-->
									</ul>

									<div class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="relatedJob1">
											<div class="tab-content-inner">
							<div class="recent-job-wrapper alt-stripe mr-0">
							<?php /*
							require 'constants/db_config.php';
							try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT * FROM tbl_posts WHERE company = '$compid' AND app_id != :appid ORDER BY rand() LIMIT 5");
							$stmt->bindParam(':appid', $appid);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
  
							}

	                        catch(PDOException $e)
                            { 
                   
                             }
							 */
                             
                           /* foreach($result as $row) {
			$post_date = date_format(date_create_from_format('d/m/Y', $row['closing_date']), 'd');
                            $post_month = date_format(date_create_from_format('d/m/Y', $row['closing_date']), 'F');
                            $post_year = date_format(date_create_from_format('d/m/Y', $row['closing_date']), 'Y'); 
                            $jobtype = $row['type'];
							
							$jobtype = $row['type'];
							if ($jobtype == "Freelance") {
	                        $sta = '<div class="job-label label label-success">
									Freelance
									</div>';
											  
	                        }
	                        if ($jobtype == "Part-time") {
	                        $sta = '<div class="job-label label label-danger">
									Part-time
									</div>';
											  
	                        }
	                        if ($jobtype == "Full-time") {
	                              $sta = '<div class="job-label label label-warning">
									Full-time
									</div>';
											  
	                        }
							
							?>
																											<a href="explore-job.php?jobid=<?php echo $row['job_id']; ?>" class="recent-job-item clearfix">
														<div class="GridLex-grid-middle">
															<div class="GridLex-col-6_sm-12_xs-12">
																<div class="job-position">
																	<div class="image">
																	 <?php 
										                            if ($complogo == null) {
										                            print '<center><img class="autofit3" alt="image"  src="images/blank.png"/></center>';
										                            }else{
										                            echo '<center><img class="autofit3" alt="image" title="'.$compname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
										                            }
										                             ?>
																	</div>
																	<div class="content">
																		<h4><?php echo $row['title']; ?></h4>
																		<p><?php echo "$compname"; ?></p>
																	</div>
																</div>
															</div>
															<div class="GridLex-col-3_sm-8-xs-8_xss-12 mt-10-xss">
																<div class="job-location">
																	<i class="fa fa-map-marker text-primary"></i> <?php echo $row['country']; ?>
																</div>
															</div>
															<div class="GridLex-col-3_sm-4_xs-4_xss-12">
                                                             <?php echo "$sta"; ?>
																<span class="font12 block spacing1 font400 text-center"> Due - <?php echo "$post_month"; ?> <?php echo "$post_date"; ?>, <?php echo "$post_year"; ?></span>
															</div>
														</div>
													</a>
													<?php
								
								
							}

	                        }catch(PDOException $e)
                            { 
                   
                             }
                             ?>
						
*/ ?>


							
							</div>

											
											</div>
										</div>

									</div>
									
								</div>
								
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
											<li><a href="../">Home</a></li>
											<li><a href="../job-list.php">Apartments</a></li>
											
											<li><a href="../contact.php">Contact Us</a></li>
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