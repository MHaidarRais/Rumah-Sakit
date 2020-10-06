<?php
	include 'server.php';

	$response = array();
	$username = $_POST['vsusername'];
	$password = md5($_POST['vspassword']);

	$userdetails = mysqli_query($db, "SELECT * FROM tbl_user WHERE username = '$username' and password = '$password'");

	if (!$userdetails) {
		echo "Tidak jalan :".mysqli_error($db);
		exit();
	}
	$row = mysqli_fetch_row($userdetails);

	$result_data = array(
		'id'			=> $row[0],
		'name'			=> $row[1],
		'address'		=> $row[2],
		'gender'		=> $row[3],
		'pekerjaan'		=> $row[4],
		'pendidikan'	=> $row[5],
		'username'		=> $row[6],
		'password'		=> $row[7]
	);

	if (mysqli_num_rows($userdetails) > 0) {
		$response['result']		='1';
		$response['msg']		='Berhasil, We did it, berhasil hore';
		$response['user']		= $result_data;
	}else{
		$response['result']		='0';
		$response['msg']		='Swiper mengambil usermu';
	}

	echo json_encode($response);




?>