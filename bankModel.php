<?php
require_once("dbconfig.php");

function newAct($id,$type) {
	global $db;
	$sql = "SELECT * from bank where id=? and type=?";
	$stmt = mysqli_prepare($db, $sql); 
	mysqli_stmt_bind_param($stmt, "si", $id, $type); 
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if($r=mysqli_fetch_assoc($result)) {
		return $r['bid'];
	} else {
		$sql="insert into bank (id,type) values (?,?)";
		$stmt = mysqli_prepare($db, $sql); 
		mysqli_stmt_bind_param($stmt, "si", $id,$type); 
		mysqli_stmt_execute($stmt);
		return mysqli_insert_id($db);
	}
	return 0;
}

function deposit($i,$m) {
	global $db;
	$sql = "update bank set balance=balance +? where bid=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii", $m, $i);
	mysqli_stmt_execute($stmt);
	return mysqli_affected_rows($db);
}

function withdraw($i,$m) {
	global $db;
	$sql = "update bank set balance=balance -? where bid=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii", $m, $i);
	mysqli_stmt_execute($stmt);
	return mysqli_affected_rows($db);
}
?>