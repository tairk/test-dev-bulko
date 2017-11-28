<?php

$link = mysqli_connect("localhost", "root", "", "bulko");

if($link == false){
	echo json_encode(mysqli_connect_error());
	die(json_encode(mysqli_connect_error()));
}

$name = mysqli_real_escape_string($link, $_POST['nom']);
$mail = mysqli_real_escape_string($link, $_POST['email']);
$tel = mysqli_real_escape_string($link, $_POST['tel']);
$message = mysqli_real_escape_string($link, $_POST['message']);

$sql = "INSERT INTO message (nom, email, tel, message) VALUES ('$name', '$mail', '$tel', '$message')";
$result = mysqli_query($link, $sql);
if ($result){
	echo "DATA successfully added in DB";
	return $result;
} else {
		echo json_encode(mysqli_error($link));
		return json_encode(mysqli_error($link));
}
?>