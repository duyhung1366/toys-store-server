<?php
 include "connect.php";	
 $name = $_POST['name'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $passWord = $_POST['passWord'];

// //check data
//  $query = 'SELECT * FROM `user` WHERE `email` = "'.$email.'" ';
//  $data = mysqli_query($conn,$query);
//  $numrow = mysqli_num_rows($data);
//  if ($numrow == 1) {
//  	$arr = [
//  		'success' => false,
//  		'message' => "Email đã tồn tại"
//  	];
//  }else{
//  $hashedPassword = password_hash($passWord, PASSWORD_DEFAULT);

//  //insert
//  $query = 'INSERT INTO `user` (`name`,`phone`,`email`,`passWord`) VALUES("'.$name.'","'.$phone.'","'.$email.'","'.$hashedPassword.'")';
//  $data = mysqli_query($conn,$query);

//  if ($data == true) {
//  	$arr = [
//  		'success' => true,
//  		'message' => "Đăng ký thành công"
//  	];
//  }else{
//  	$arr = [
//  		'success' => false,
//  		'message' => "Đăng ký không thành công"
//  	];
//  }
//  }
//  print_r(json_encode($arr));
include "connect.php";

// Validate and sanitize input data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? mysqli_real_escape_string($conn, $_POST['email']) : false;
$passWord = mysqli_real_escape_string($conn, $_POST['passWord']);

if (!$name || !$phone || !$email || !$passWord) {
    $arr = [
        'success' => false,
        'message' => "Dữ liệu đầu vào không hợp lệ"
    ];
    print_r(json_encode($arr));
    exit();
}

// Check if email already exists
$query = "SELECT * FROM `user` WHERE `email` = '$email'";
$result = mysqli_query($conn, $query);
$numrows = mysqli_num_rows($result);

if ($numrows > 0) {
    $arr = [
        'success' => false,
        'message' => "Email đã tồn tại"
    ];
} else {
    // Hash the password
    $hashedPassword = password_hash($passWord, PASSWORD_DEFAULT);

    // Insert new user
    $insertQuery = "INSERT INTO `user` (`name`, `phone`, `email`, `passWord`) VALUES ('$name', '$phone', '$email', '$hashedPassword')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        $arr = [
            'success' => true,
            'message' => "Đăng ký thành công"
        ];
    } else {
        $arr = [
            'success' => false,
            'message' => "Đăng ký không thành công"
        ];
    }
}

print_r(json_encode($arr));
?>