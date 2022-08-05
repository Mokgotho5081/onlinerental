<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\System\composer\vendor\autoload.php';
date_default_timezone_set('Africa/Johannesburg');

if (isset($_POST['reg_mode'])) {
checkemail();	
}else{
header("location:../");		
}


function checkemail() {
	
try {
	require '../constants/db_config.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$email = $_POST['email'];
	$account_type = $_POST['acctype'];
	
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = :email");
	$stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$records = count($result);
	
	if ($account_type == "101") {
	$role = "Tenant";	
	}else{
	$role = "Landlord";	
	}
	
	if ($records > 0) {
	header("location:../register.php?p=$role&r=0927");	
		
	}else{
	
	if ($account_type == "101") {
	register_as_Tenant();
	}else{
	register_as_Landlord();
	}
	
		
	}
					  
	}catch(PDOException $e)
    {
    header("location:../register.php?p=$role&r=4568");
    }
}

function register_as_Tenant() {

try {
	require '../constants/db_config.php';
	require '../constants/uniques.php';
	$role = 'Tenant';
    $account_type = $_POST['acctype'];
    $last_login = date('d-m-Y h:m A ');
   $member_no = 'EM'.get_rand_numbers(9).'';
    $fname = ucwords($_POST['fname']);
    $lname = ucwords($_POST['lname']);
    $email = $_POST['email'];
    $login = md5($_POST['password']);
	$p= $_POST['password'];
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO tbl_users (first_name, last_name, email, last_login, login, role, member_no) 
	VALUES (:fname, :lname, :email, :lastlogin, :login, :role, :memberno)");
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
$stmt->bindParam(':lastlogin', $last_login);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':role', $role);
	$stmt->bindParam(':memberno', $member_no);
    $stmt->execute();
	$mail = new  PHPMailer();

						try {
							$mail->SMTPDebug = 2;									
							$mail->isSMTP();											
							$mail->Host	 = 'smtp.gmail.com;';					
							$mail->SMTPAuth = true;							
							$mail->Username = 'mzondoonke@gmail.com';				
							$mail->Password = '29041999';						
							$mail->SMTPSecure = 'tls';							
							$mail->Port	 = 587;

							$mail->setFrom('mzondoonke@gmail.com', 'Online Rental Apartment|TempHome');		
							$mail->addAddress($email, $fname);
							
							
							$mail->isHTML(true);								
							$mail->Subject = 'Online Rental Apartment|TempHome  - Registration';
							$mail->Body = '<html>
							           <head>
							             <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
										 <title></title>
							           </headd>
									   <body>
									      <div id="email-wrap" style="color:black">
										  <p>Dear '.$fname.' , </p>
										  
										  <p>I hope you are well. </p>
										  <p>Thank you for opening an account with TempHome. </p>	
										  										  
							               <p><strong>Your Login Details:</strong></p>
										   <p><strong> Username: '.$email.'  </strong></p>
										   <p><strong> Password: '. $p.'    </strong></p>
										   <p><strong> To login click on the following link: http://localhost/System/login.php </strong></p>
										   
										  
										  <p>Regards, </p>
										  <p>TempHome</p>';
							$mail->AltBody = 'Body in plain text for non-HTML mail clients';
							$mail->send();
							echo "<script>window.open('../login.php?p=Tenant&r=1123','_self')</script>";
                                                                							
							
						} catch (Exception $e) {
							echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
						}

	//header("location:../login.php?p=Tenant&r=1123");				  
	}catch(PDOException $e)
    {
    header("location:../register.php?p=Tenant&r=4568");
    }	
	
}

function register_as_Landlord() {
try {
	require '../constants/db_config.php';
	require '../constants/uniques.php';
	         $role = 'Landlord';
		$account_type = $_POST['acctype'];
		$last_login = date('d-m-Y h:m A ');
		$comp_no = 'CM'.get_rand_numbers(9).'';
		$cname = ucwords($_POST['name']);
		$lname = ucwords($_POST['lname']);
		$email = $_POST['email'];
		$login = md5($_POST['password']);
		$p= $_POST['password'];
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO tbl_users (first_name,last_name, email, last_login, login, role, member_no) 
  VALUES (:fname, :lname, :email, :lastlogin, :login, :role, :memberno)");
    $stmt->bindParam(':fname', $cname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
	$stmt->bindParam(':lastlogin', $last_login);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':role', $role);
	$stmt->bindParam(':memberno', $comp_no);
    $stmt->execute();
	$mail = new  PHPMailer();

						try {
							$mail->SMTPDebug = 2;									
							$mail->isSMTP();											
							$mail->Host	 = 'smtp.gmail.com;';					
							$mail->SMTPAuth = true;							
							$mail->Username = 'mzondoonke@gmail.com';				
							$mail->Password = '29041999';						
							$mail->SMTPSecure = 'tls';							
							$mail->Port	 = 587;

							$mail->setFrom('mzondoonke@gmail.com', 'Online Rental Apartment|TempHome');		
							$mail->addAddress($email, $cname);
							
							
							$mail->isHTML(true);								
							$mail->Subject = 'Online Rental Apartment|TempHome  - Registration';
							$mail->Body = '<html>
							           <head>
							             <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
										 <title></title>
							           </headd>
									   <body>
									      <div id="email-wrap" style="color:black">
										  <p>Dear '.$cname.' , </p>
										  
										  <p>I hope you are well. </p>
										  <p>Thank you for opening an account with TempHome. </p>	
										  										  
							               <p><strong>Your Login Details:</strong></p>
										   <p><strong> Username: '.$email.'  </strong></p>
										   <p><strong> Password: '. $p.'    </strong></p>
										   <p><strong> To login click on the following link: http://localhost/System/login.php </strong></p>
										   
										  
										  <p>Regards, </p>
										  <p>TempHome</p>';
							$mail->AltBody = 'Body in plain text for non-HTML mail clients';
							$mail->send();
							echo "<script>window.open('../login.php?p=Landlord&r=1123','_self')</script>";
                                                                							
							
						} catch (Exception $e) {
							echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
						}
	//header("location:../login.php?p=Landlord&r=1123");				  
	}catch(PDOException $e)
    {
    header("location:../register.php?p=Landlord&r=4568");
    }	
	
}

?>