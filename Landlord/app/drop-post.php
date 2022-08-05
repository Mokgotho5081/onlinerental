<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$app_id = $_GET['id'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("DELETE FROM tbl_posts WHERE app_id= :app_id ");
$stmt->bindParam(':app_id', $app_id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM tbl_room_requests WHERE app_id= :app_id");
$stmt->bindParam(':app_id', $app_id);
$stmt->execute();

header("location:../my-jobs.php?r=0173");					  
}catch(PDOException $e)
{

}
	
?>