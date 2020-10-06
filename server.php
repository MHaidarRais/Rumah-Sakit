<?php
session_start();
$name = "";
$address = "";
$gender = "";
$pekerjaan = "";
$id = 0;
$pendidikan = "";
$edit_state = false;


//COnnect to database
//membuat variable koneksi
$db = mysqli_connect('localhost','','crudaja','crudrs');
$dbh = new PDO ("mysql:host=localhost;dbname=crudrs", "", "crudaja");

//if save button is clickeds
if(isset($_POST['save'])) {
$name = $_POST['name'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$pekerjaan = $_POST['pekerjaan'];
$pendidikan = $_POST['pendidikan'];
#2
$query = "INSERT INTO info (name, address, gender, pekerjaan, pendidikan) VALUES ('$name', '$address', '$gender', '$pekerjaan' , '$pendidikan')";
mysqli_query($db, $query);
$_SESSION['msg'] = "Address Saved";
//refresh after update with input newers data
header('location: index.php');
}

if(isset($_POST['update'])){
$name = mysql_real_escape_string($_POST['name']);
$address = mysql_real_escape_string($_POST['address']);
$id = mysql_real_escape_string($_POST['id']);
$gender =  mysql_real_escape_string($_POST['gender']);
$pekerjaan =  mysql_real_escape_string($_POST['pekerjaan']);
$pendidikan =  mysql_real_escape_string($_POST['pendidikan']);

mysqli_query($db, "UPDATE info SET name = '$name', address='$address', gender='$gender', pekerjaan='$pekerjaan', pendidikan='$pendidikan' WHERE id =$id");
$_SESSION['msg'] = "Data updated";
header('location: index.php');

}


if(isset($_GET['delete'])){
$id = mysql_real_escape_string($_GET['id']);
mysqli_query($db, "DELETE from info WHERE id=$id");
$_SESSION['msg'] = "Address delete";
header('location: index.php');

}

$results = mysqli_query($db, "SELECT * FROM info")

?>