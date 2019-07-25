<?
/*-------------HERE WAS BD CONNECTION------------*/
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die();
}

if ($_POST['type'] == 'regnewuser' && $_POST['username'] && $_POST['email'] && $_POST['password']) {
	echo $_POST['photo'];
	$sql = "SELECT user_id FROM all_users WHERE user_name = '".$_POST['username']."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo 'There is a user with such name.';
	} else {
		$sql2 = "SELECT user_id FROM all_users WHERE user_email = '".$_POST['email']."'";
		$result2 = $conn->query($sql2);
		
		if ($result2->num_rows == 1) {
			echo 'There is a user with such email.';
		} else {
			$username2 = mb_convert_encoding($_POST['username'], "windows-1251", "utf-8");
			$password2 = md5($_POST['password']);
			$sql3 = "INSERT INTO all_users (user_name, user_email, user_password, user_loaded_photo)
			VALUES ('".$username2."', '".$_POST['email']."', '".$password2."', '".$_POST['photo']."')";

			if ($conn->query($sql3) === TRUE) {
				echo "You were registered!";
			} else {
				echo "Error: ".$sql3."<br>".$conn->error;
			}
		}
	}

	$conn->close();
} elseif ($_POST['type'] == 'loguser' && $_POST['email'] && $_POST['password']) {
	$sql4 = "SELECT user_id FROM all_users WHERE user_email = '".$_POST['email']."'";
	$result3 = $conn->query($sql4);
	
	if ($result3->num_rows == 1) {
		$password3 = md5($_POST['password']);
		$sql5 = "SELECT user_id, user_name FROM all_users WHERE user_password = '".$password3."' AND user_email = '".$_POST['email']."'";
		$result4 = $conn->query($sql5);
		
		if ($result4->num_rows == 1) {
			while($row = $result4->fetch_assoc()) {
				if (setCookie('login', $row["user_id"], time()+(3600), '/', $_SERVER["SERVER_NAME"])) {
					echo 1;
				} else {
					echo 'Some problem occured, please try again later!';
				}
			}
		} else {
			echo 'Try checking your password!';
		}
		
	} else {
		echo 'There is no user with such email!';
	}
	
	$conn->close();
} elseif ($_POST['type'] == 'profilepage') {
	$sql6 = "SELECT user_id, user_name, user_email, user_loaded_photo FROM all_users WHERE user_id = '".$_POST['id']."'";
	$result5 = $conn->query($sql6);
	
	if ($result5->num_rows == 1) {
		while($row = $result5->fetch_assoc()) {
			echo '<div>Your name: '.$row["user_name"].'</div><div>Your email: '.$row["user_email"].'</div><div>Your photo: </div><div class="uk-margin" style="background-image: url(../upload/'.$row['user_loaded_photo'].'); height: 150px; width: 150px; background-size:cover; background-position: center; background-repeat: no-repeat;"></div>';
		}
	} else {
		echo 'Some problem occured!';
	}
	
	$conn->close();
} else {
	echo 'some error occured.';
}
?>