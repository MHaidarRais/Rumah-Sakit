<?php
include 'server.php';

$response = array();
//Jika request method menggunakan post
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

//cek parameter yang dibutuhkan
	if (isset($_POST['vsname']) && isset($_POST['vsaddress']) && isset($_POST['vsgender']) && isset(
		$_POST['vspekerjaan']) && isset($_POST['vspendidikan']) && isset($_POST['vsusername']) && isset($_POST['vspassword'])) {
		
		$name 		= $_POST['vsname'];
		$address 	= $_POST['vsaddress'];
		$gender 	= $_POST['vsgender'];
		$pekerjaan 	= $_POST['vspekerjaan'];
		$pendidikan = $_POST['vspendidikan'];
		$username	= $_POST['vsusername'];
		$password	= md5($_POST['vspassword']);

		$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
		$check = mysqli_fetch_array(mysqli_query($db, $sql));

		if (isset($check)) {
			$response['result'] = 0;
			$response['msg'] = "anda salah";
		}else{
			$sql = "INSERT INTO tbl_user (name,address,gender,pekerjaan,pendidikan,username,password) VALUES ('$name','$address','$gender','$pekerjaan','$pendidikan','$username','$password')";

			if (mysqli_query($db, $sql)) {
				$response['result'] = '1';
				$response['msg'] = 'berhasil';
			}else{
				$response['result'] = '0';
				$response['msg'] = 'Salah';
			}

			echo json_encode($response);
		}
	}else{
		echo "Harus terisi";
	}
}else{
	echo "method fail";
}

?>