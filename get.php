<?php
$link = mysqli_connect("localhost", "root", "", "bulko");

if($link == false){
	echo json_encode(mysqli_connect_error());
	die(json_encode(mysqli_connect_error()));
}
$selected = "";
$req = $_GET['id'];
if ($req){
	for ($i = 0; $i < count($req); $i++){
		$selected .= "'" . $req[$i] . "'";
		if ($i < count($req) - 1){
			$selected .= ", ";
		}
	}
}else{
	$selected .= "*";
}
$sql = "SELECT * from message where id = " . $selected;
$response = mysqli_query($link, $sql);

if (mysqli_query($link, $sql)){
	while( $row = mysqli_fetch_array($response, MYSQL_ASSOC)){
		echo json_encode($row);
		return json_encode($row);
	}
}else{
	echo json_encode(mysqli_error($link));
	return json_encode(mysqli_error($link));
}
?>