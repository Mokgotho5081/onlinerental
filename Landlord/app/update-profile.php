<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';

$name = ucwords($_POST['name']);
$city = ucwords($_POST['city']);
$street = ucwords($_POST['street']);
$zip = ucwords($_POST['zip']);
$phone = $_POST['phone'];
$country = $_POST['country'];
$myemail = $_POST['email'];

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = :email AND member_no != '$myid'");
	$stmt->bindParam(':email', $myemail);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
	
	if ($rec == "0") {
    $stmt = $conn->prepare("UPDATE tbl_users SET first_name = :name, city = :city, street = :street, zip = :zip, country = :country, phone = :phone WHERE member_no='$myid'");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':city', $city);
	$stmt->bindParam(':street', $street);
    $stmt->bindParam(':zip', $zip);
	$stmt->bindParam(':country', $country);
    $stmt->bindParam(':phone', $phone);
	
    $stmt->execute();
	
	$_SESSION['name'] = $name;
	
       $_SESSION['myemail'] = $myemail;
       $_SESSION['myphone'] = $phone;
	
	$_SESSION['mycity'] = $city;
	$_SESSION['mystreet'] = $street;
	$_SESSION['myzip'] = $zip;
        $_SESSION['mycountry'] = $country;
    
	header("location:../?r=9837");	
	}else{
	header("location:../?r=0927");
	}

					  
	}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>


