<?
require '../header.php';
$target_dir = "../upload/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 0;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $error = "File is not an image.";
        $uploadOk = 0;
    }
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) {?>
	<div class="uk-container uk-margin-large-top">
		<div class="uk-margin">Sorry, only JPG, PNG & GIF files are allowed.</div>
		<div class="uk-margin">
			<a class="uk-button uk-button-primary" href="../profile/">Back to profile!</a>
		</div>
	</div>
	<?
    $uploadOk = 0;
} elseif (file_exists($target_file)) {?>
	<div class="uk-container uk-margin-large-top">
		<div class="uk-margin">Sorry, this file already exists!</div>
		<div class="uk-margin">
			<a class="uk-button uk-button-primary" href="../profile/">Back to profile!</a>
		</div>
	</div>
	<?$uploadOk = 0;
}
if ($uploadOk == 0) {
	
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		/*-------------HERE WAS BD CONNECTION------------*/
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die();
		}
		
		$sql = "SELECT user_loaded_photo FROM all_users WHERE user_id = '".$_POST['id']."'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1) {
			while($row = $result->fetch_assoc()) {
				$myFile = '../upload/'.$row["user_loaded_photo"];
				unlink($myFile);
			}
		} else {
			echo 'Some problem occured!';
		}
		
		$sql2 = "UPDATE all_users
				SET user_loaded_photo = '".$_FILES["fileToUpload"]["name"]."'
				WHERE user_id = '".$_POST['id']."'";

		if ($conn->query($sql2) === TRUE) {?>
			<div class="uk-container uk-margin-large-top">
				<div class="uk-margin">Photo was uploaded!</div>
				<div class="uk-margin">
					<a class="uk-button uk-button-primary" href="../profile/">Back to profile!</a>
				</div>
			</div>
		<?} else {
			echo "Error: ".$sql2."<br>".$conn->error;
		}
		
		$conn->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
require '../footer.php';?>