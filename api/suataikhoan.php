 <?php
 include "connect.php";
 $name = $_POST['name'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $passWord = $_POST['passWord'];
 $id = $_POST['id'];

 $query = 'UPDATE `user` SET `name`="'.$name.'", `phone`="'.$phone.'", `email`="'.$email.'", `passWord`="'.$passWord.'" WHERE `id`="'.$id.'" ';
 $data = mysqli_query($conn,$query);
 if ($data==true) {
 	$arr = [
 		'success' => true,
 		'message' => "Cập nhật thông tin thành công"
 	];
 }else{
  	$arr = [
 		'success' => false,
 		'message' => "Cập nhật thông tin thất bại"
 	];
 }
 	print_r(json_encode($arr));
?>