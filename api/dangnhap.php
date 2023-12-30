<?php
//  include "connect.php";	
//  $email = $_POST['email'];
//  $passWord = $_POST['passWord'];

// //check data
//  $query = 'SELECT * FROM `user` WHERE `email` = "'.$email.'" AND `passWord`= "'.$passWord.'" ';
//  $data = mysqli_query($conn,$query);
//  $result = array();
//  while ($row = mysqli_fetch_assoc($data)) {
//      $result[] = ($row);
//  }

//  if (!empty($result)) {
//  	$arr = [
//  		'success' => true,
//  		'message' => "Đăng nhập thành công",
//         'result' => $result
//  	];
//  }else{
//  	$arr = [
//  		'success' => false,
//  		'message' => "Đăng nhập thất bại",
//         'result' => $result
//  	];
//  }
//  print_r(json_encode($arr));
include "connect.php";

$email = $_POST['email'];
$enteredPassword = $_POST['passWord'];

// Check data
$query = "SELECT * FROM `user` WHERE `email` = '$email'";
$data = mysqli_query($conn, $query);
$result = array();

while ($row = mysqli_fetch_assoc($data)) {
    $result[] = $row;
}

if (!empty($result)) {
    $storedHashedPassword = $result[0]['passWord']; // Lấy mật khẩu đã băm từ cơ sở dữ liệu

    // Kiểm tra mật khẩu đã nhập với mật khẩu đã băm trong cơ sở dữ liệu
    if (password_verify($enteredPassword, $storedHashedPassword)) {
        $arr = [
            'success' => true,
            'message' => "Đăng nhập thành công",
            'result' => $result
        ];
    } else {
        $arr = [
            'success' => false,
            'message' => "Mật khẩu không đúng",
            'result' => $result
        ];
    }
} else {
    $arr = [
        'success' => false,
        'message' => "Tài khoản không tồn tại",
        'result' => $result
    ];
}

print_r(json_encode($arr));
?>