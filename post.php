<?php
$link = mysqli_connect("localhost", "root", "", "bulko");

if($link == false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

$name = mysqli_real_escape_string($link, $_REQUEST['nom']);
$mail = mysqli_real_escape_string($link, $_REQUEST['email']);
$tel = mysqli_real_escape_string($link, $_REQUEST['tel']);
$message = mysqli_real_escape_string($link, $_REQUEST['message']);

$sql = "INSERT INTO message (nom, email, tel, message) VALUES ('$name', '$mail', '$tel', '$message')";
if (mysqli_query($link, $sql)){
		echo "Records added successfully.";
} else {
		echo "ERROR: could not able to execute $sql. " . mysqli_error($link);
}
?>