<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$pop = addslashes(file_get_contents($_FILES['image']['tmp_name']));


if ($_FILES["image"]["size"] > 1000000 ) {
header("location:../?r=3478");
}else{
	
    try {
    $rid = $_GET['rid'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("UPDATE tbl_room_requests SET pop='$pop' WHERE id='$rid'");
    $stmt->execute();
	?>
	<script>
		window.alert("You have successfully uploaded your pop");
        window.location.href = "../my-posts.php";
		</script>
		<?php			  
	}catch(PDOException $e)
    {

    }

	
}

?>