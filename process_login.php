<!DOCTYPE html>
<html>

<head>
	<title>HYMY MBox Movie</title>
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" />
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link href="https://fonts.googleeapis.com/css?family=Nunito:400,300" rel="stylesheets" type="screen" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
	<?php

	$userID = $_POST['userID'];
	$userPassword = $_POST['userPassword'];

	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "HYMY_DB";

	$link = mysqli_connect($host, $username, $password, $dbname);

	if (!$link) {
		die("Connection problemo : " . mysqli_connect_error($link));
	} else {
		$queryCheck = "SELECT * FROM USERS WHERE userID = '" . $userID . "' ";

		$resultCheck = mysqli_query($link, $queryCheck);

		if (mysqli_num_rows($resultCheck) == 0) {
			header("Location:wrongID.html");
			echo "User ID does not exists";
		} else {

			$row = mysqli_fetch_array($resultCheck, MYSQLI_BOTH);

			if ($row["userPassword"] == $userPassword) {

				session_start();

				$_SESSION["UID"] = $userID;
				$_SESSION["UserType"] = $row["UserType"];

				header("Location:menu.php");
			} else {
				header("Location:wrongPassword.html");
				echo "Wrong password.";
			}
		}
	}

	mysqli_close($link);
	?>

</body>

</html>