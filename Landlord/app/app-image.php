<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
$image2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));

if ($_FILES["image"]["size"] > 1000000 ||$_FILES["image1"]["size"] > 1000000 || $_FILES["image2"]["size"] > 1000000) {
header("location:../?r=3478");
}else{
	
    try {
    $id = $_GET['appid'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("UPDATE tbl_posts SET app_image='$image', app_image1='$image1', app_image2='$image2' WHERE app_id='$id'");
    $stmt->execute();
	?>
	<script>
		window.alert("You have successfully updated your apartment");
        window.location.href = "../my-jobs.php";
		</script>
		<?php			  
	}catch(PDOException $e)
    {

    }

	
}

?>