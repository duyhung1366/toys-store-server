 <?php
 include "connect.php";
 $tenSP = $_POST['tenSP'];
 $hinhAnh = $_POST['hinhAnh'];
 $moTa = $_POST['moTa'];
 $giaTien = $_POST['giaTien'];
 $thuongHieu = $_POST['thuongHieu'];
 $type = $_POST['type'];
 $id = $_POST['id'];
 $query = 'UPDATE `SanPham` SET `tenSP`="'.$tenSP.'", `hinhAnh`="'.$hinhAnh.'", `moTa`="'.$moTa.'", `giaTien`="'.$giaTien.'", `thuongHieu`="'.$thuongHieu.'", `type`="'.$type.'" WHERE `id`="'.$id.'" ';
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