 <?php
 include "connect.php";
 $tenSP = $_POST['tenSP'];
 $hinhAnh = $_POST['hinhAnh'];
 $moTa = $_POST['moTa'];
 $giaTien = $_POST['giaTien'];
 $thuongHieu = $_POST['thuongHieu'];
 $type = $_POST['type'];

 $query = 'INSERT INTO `SanPham`(`tenSP`,`hinhAnh`,`moTa`,`giaTien`,`thuongHieu`,`type`) VALUES ("'.$tenSP.'","'.$hinhAnh.'","'.$moTa.'","'.$giaTien.'","'.$thuongHieu.'","'.$type.'")';
 $data = mysqli_query($conn,$query);
 if ($data==true) {
 	$arr = [
 		'success' => true,
 		'message' => "them thanh cong"
 	];
 }else{
 	$arr = [
 		'success' => false,
 		'message' => "khong thanh cong"
 	];
 }
 	print_r(json_encode($arr));
?>