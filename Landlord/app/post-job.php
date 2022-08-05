<?php
date_default_timezone_set('Africa/Johannesburg');
require '../../constants/db_config.php';
require '../constants/check-login.php';
require '../../constants/uniques.php';
$postdate = date('F d, Y');
$app_id = ''.get_rand_numbers(10).'';
$apartment_type  = $_POST['category'];
$city  = ucwords($_POST['city']);
$rent = $_POST['rent'];
$numrooms = $_POST['numrooms'];
$desc = ucfirst($_POST['description']);
//$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
//$image1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
//$image2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));




try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);





	
$stmt = $conn->prepare("INSERT INTO tbl_posts (app_id,landlord, apartment_type, city, rent, numrooms,description,date_posted)
 VALUES (:appid,:landlord, :apartmenttype, :city, :rent, :numrooms, :description,:date_posted)");
$stmt->bindParam(':appid', $app_id);
$stmt->bindParam(':landlord', $myid);
$stmt->bindParam(':apartmenttype', $apartment_type);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':rent', $rent);
$stmt->bindParam(':numrooms', $numrooms);

$stmt->bindParam(':description', $desc);

$stmt->bindParam(':date_posted', $postdate);

$stmt->execute();
header("location:../post-apartment.php?r=9843");
		  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

?>