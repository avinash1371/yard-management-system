<?php
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

	$conn = new mysqli('localhost','root','','project');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into r_register(fname, username, email, password) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $fname, $username, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registred successfully...";
		header("Location: ../HomePage/homePage.html");
		$stmt->close();
		$conn->close();
	}
?>
