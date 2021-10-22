<?php
	$email = $_POST['inputEmail'];
	$pswd = $_POST['inputPasswd'];

	$conn = pg_connect("postgres://jeefjvaujfztkq:c5b9532ccfdb36b51c68712438db56a78baf3c52aa1b44863b5145c3bce44eea@ec2-3-228-78-248.compute-1.amazonaws.com:5432/dc5hr2p60ti82h");
	if(!$conn){
		echo "Cannot connecto to database " . mysqli_connect_error($conn);
		exit;
	}

	$query = "SELECT username, password FROM admin";
	$result = pg_query($conn, $query);
	if(!$result){
		echo "Empty!";
		exit;
	}

	while ($row = pg_fetch_assoc($result)){
		if($email == $row['username'] && $pswd == $row['password']){
			echo "Welcome admin! Long time no see";
			break;
		}
	}
?>