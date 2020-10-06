<?php
include 'server.php';
$name = @$_POST['name'];
$address = @$_POST['address'];
$gender = @$_POST['gender'];
$pekerjaan = @$_POST['pekerjaan'];
$pendidikan = @$_POST['pendidikan'];
$image = @$_POST['image'];


$sql = "INSERT INTO info (name,address,gender,pekerjaan,pendidikan,image)
		VALUES ('$name', '$address', '$gender', '$pekerjaan','$pendidikan','$image')";


if ($result = $db->query($sql)) {
	$json_response = array();
	$json_response ["pesan"] = "Data tersimpan";
	$json_response ["sukses"] = true;
	echo json_encode($json_response);
}else{
	$json_response ["pesan"] = "Gagal tersimpan";
	$json_response ["sukses"] = false;
	echo json_encode($json_response);
}
?>