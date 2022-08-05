<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\System\composer\vendor\autoload.php';
include '../constants/db_config.php';
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
require '../constants/settings.php'; 
require 'constants/check-login.php';	


	
$stmtb = $conn->prepare("SELECT * FROM tbl_users WHERE role = 'Landlord' AND member_no = '$myid' ");
                            $stmtb->execute();
                            $resultb = $stmtb->fetchAll();
							
							foreach ($resultb as $rows)
							
							{
								
								 

								
$userID = $_GET['userid'];
$stmtb = $conn->prepare("SELECT * FROM tbl_users WHERE role = 'Tenant' AND member_no = '$userID' ");
                            $stmtb->execute();
                            $resultb = $stmtb->fetchAll();
							
							foreach ($resultb as $rowb)
							
							{
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
							$mail->addAddress($rowb['email'],  $rowb['first_name']);
							
							
							$mail->isHTML(true);								
							$mail->Subject = 'TempHome  - Room Request';
							$mail->Body = '<html>
							           <head>
							             <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
										 <title></title>
							           </headd>
									   <body>
									      <div id="email-wrap" style="color:black">
										  <p>Dear '.$rowb['first_name'].' , </p>
										  
										  <p>I hope you are well. </p>
										  <p>Thank you for requesting a room using temphome system,. </p>	
										  										  
							               <p><strong>Your request have been approved by '.$rows['first_name'].'  '.$rows['first_name'].' </strong></p>
										   <p><strong>Landlord contact details:</strong></p>
										   <p><strong>Address: </strong></p>
										   <p>'.$rows['street'].'</p>
										   <p>'.$rows['city'].'</p>
										   <p>'.$rows['country'].'</p>
										   <p>'.$rows['zip'].'</p>
										   <p><strong>Cellphone number: </strong>'.$rows['phone'].'</p> 
										   <p><strong>Email Address: </strong> '.$rows['email'].'</p>
										   
										  
										  <p>Regards, </p>
										  <p>TempHome Group</p>';
							$mail->AltBody = 'Body in plain text for non-HTML mail clients';
							$mail->send();
							echo "<script>window.open('index.php','_self')</script>";
                                                                							
							
						} catch (Exception $e) {
							echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
						}

					  
	      }
	
 }