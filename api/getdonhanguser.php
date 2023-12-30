<?php
include "connect.php";
$id = $_POST['id'];
$query = 'SELECT * FROM `DonHang` WHERE `id` = "'.$id.'" ORDER BY idDH DESC';
$data = mysqli_query($conn,$query);
$result = array();
while ($row = mysqli_fetch_assoc($data)) {
	$result[] = ($row);
}
if (!empty($result)) {
	$arr = [
		'success' => true,
		'message' => "thanh cong",
		'result' => $result
	];
}else{
	$arr = [
		'success' => false,
		'message' => "Chưa có đơn hàng nào !!!",
		'result' => $result
	];
}
print_r(json_encode($arr));
?>