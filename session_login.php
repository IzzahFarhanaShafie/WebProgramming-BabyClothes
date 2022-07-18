<?php
include_once 'db.php';

session_start(); 
	
	$sid = $_SESSION['staffid'];
	
	$stmt = $conn->prepare("SELECT * FROM tbl_staffs_a167688_pt2 WHERE fld_staff_id = '$sid'");

	$stmt->execute();
	
	$readrow = $stmt->fetch(PDO::FETCH_ASSOC);

	$sid = $readrow['fld_staff_id_id'];
	$name = $readrow['fld_staff_name'];
	$pass = $readrow['fld_staff_passsword'];
	$pos = $readrow['fld_position'];

if($sid==''){
	header("location:login.php");
	}
	else {
	header("");
	}
?>