 <?php
 include "connect.php";
 $idDH = $_POST['idDH'];
 $nameDH = $_POST['nameDH'];
 $phoneDH = $_POST['phoneDH'];
 $diachiDH = $_POST['diachiDH'];
 $priceDH = $_POST['priceDH'];
 $statusDH = $_POST['statusDH'];
 $date = $_POST['date'];
 $id = $_POST['id'];
 $payment = $_POST['payment'];
 $query = 'INSERT INTO `DonHang`( `idDH`, `nameDH`, `phoneDH`, `diachiDH`, `priceDH`, `statusDH`, `date`, `id`, `payment`) VALUES ("'.$idDH.'","'.$nameDH.'","'.$phoneDH.'","'.$diachiDH.'","'.$priceDH.'","'.$statusDH.'","'.$date.'","'.$id.'","'.$payment.'")';
 $data = mysqli_query($conn,$query);
 if ($data==true) {
 	$arr = [
 		'success' => true,
 		'message' => "thanh cong"
 	];
 }else{
 	$arr = [
 		'success' => false,
 		'message' => "khong thanh cong"
 	];
 }
 	print_r(json_encode($arr));
?>