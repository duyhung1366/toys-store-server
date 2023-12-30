 <?php
 include "connect.php";
 $idDH = $_POST['idDH'];
 $statusDH = $_POST['statusDH'];
 $query = 'UPDATE `DonHang` SET `statusDH`= "'.$statusDH.'" WHERE `idDH`="'.$idDH.'" ';
 $data = mysqli_query($conn,$query);
 if ($data==true) {
 	$arr = [
 		'success' => true,
 		'message' => "Xác nhận thành công"
 	];
 }else{
  	$arr = [
 		'success' => false,
 		'message' => "Xác nhận thất bại"
 	];
 }
 	print_r(json_encode($arr));
?>