<?php
require '../constants/settings.php';
date_default_timezone_set('Africa/Johannesburg');
$apply_date = date('m/d/Y');

session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
$myid = $_SESSION['myid'];	
$myrole = $_SESSION['role'];
$opt = $_GET['opt'];

if ($myrole == "Tenant"){
include '../constants/db_config.php';

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_room_requests WHERE member_no = '$myid' AND app_id = :appid");
	$stmt->bindParam(':appid', $opt);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
	
	
	$stm = $conn->prepare("SELECT * FROM tbl_posts WHERE app_id = '$opt' ");
    $stm->execute();
   $res = $stm->fetchAll();


    foreach($res as $rows)
    {
      $landlord = $rows['landlord'];
	
	}
	
	if ($rec == 0) {
	
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("INSERT INTO tbl_room_requests (member_no,landlord, app_id, request_date)
    VALUES (:memberno,:landlord ,:appid, :requestdate)");
    $stmt->bindParam(':memberno', $myid);
	 $stmt->bindParam(':landlord', $landlord);
    $stmt->bindParam(':appid', $opt);
    $stmt->bindParam(':requestdate', $apply_date);
    $stmt->execute();
	
	print '<br>
	 <div class="alert alert-success">
     You have successfully requested this apartment.
	 </div>
     ';
					  
	}catch(PDOException $e)
    {

    }
	
		
	}else{
	foreach($result as $row)
    {
	 print '<br>
	 <div class="alert alert-warning">
     You have already requested this room before , you can not request it again.
	 </div>
     ';
	}	
		
	}


					  
	}catch(PDOException $e)
    {

    }
	
}}

?>