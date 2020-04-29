<?php 
session_name("IT_Village");
session_start();

include '../includes/db_connect.php';

if (!isset($_SESSION['loggedin'])) {
	header("Location: login.php");
}

if(!empty( $_FILES )){ 

	if( !empty( $_FILES['user_image'] ) ){

		if (!file_exists('../user_photos/'. $_SESSION['username'])) {
			mkdir("../user_photos/". $_SESSION['username']);
		}

		if ($_FILES['user_image']['size'] > 4000000) { 
       		die('upload file up to 4Mb');
   		 } 

		//save file to desired folder
		//the upload dir must exist - created before first upload
		$allowed_file_extensions = ['png', 'jpg', 'jpeg'];

		$filename = $_FILES['user_image']['name'];

		 $file_arr = explode('.', $filename);

		if( in_array($file_arr[1], $allowed_file_extensions)){
			$error = false;
		}else{
			$error = true;
		}

		$check = getimagesize($_FILES["user_image"]["tmp_name"]);
		if($check !== false) {
			$error = false;
		} else {
			$error = true;
		}

		if ($error == false) {
			$uploaddir = '../user_photos/'. $_SESSION['username'] . '/';
			$rand = rand();
			$uploadfile = $uploaddir . date("d_m_y") . "_". $rand . "_" . basename($_FILES['user_image']['name']);

			$filename = date("d_m_y") . "_". $rand . "_" . basename($_FILES['user_image']['name']);

			//  validate file input
			if (move_uploaded_file($_FILES['user_image']['tmp_name'], $uploadfile)) {
				$error = false;
			} else {
				$error = true;
			}
			// validate data
			if ($error == false) {
				$query = "UPDATE `users` SET `user_image` = '".$filename."' WHERE `user_id` = '".$_SESSION['user_id']."'";

				$result = mysqli_query($conn, $query);

				if($result){
					header("Location: profile.php");
					$_SESSION['user_errors'] = false;
				}else{
					header("Location: profile.php");
					$_SESSION['user_errors'] = "Error occurs!!! Try again";
				}
			}else{
				header("Location: profile.php");
				$_SESSION['user_errors'] = "Error occurs!!! Try again";
			}
		}else{
			header("Location: profile.php");
			$_SESSION['user_errors'] = "Error occurs!!! Try again";
		}
	}else{
		header("Location: profile.php");
		$_SESSION['user_errors'] = "Error occurs!!! Try again";
	}
} else {
	header("Location: profile.php");
	$_SESSION['user_errors'] = "Error occurs!!! Try again";
}