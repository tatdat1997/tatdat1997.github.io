<?php
	include'../../connect/connectDB.php';
	if(isset($_POST['cancel'])){
	header('location: ../../index.php');
	}
	if(isset($_POST['register'])){  
	$Name = $_POST['Name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$account = $_POST['account'];
	$password = md5($_POST['password']);
	$repassword = md5($_POST['repassword']);

	$sql = mysqli_query($con,"SELECT count(*) as total FROM tb_user WHERE account ='$account'");
    $row = mysqli_fetch_assoc($sql);

	if($Name ==""){
		echo"<script>alert('Vui lòng điền đầy đủ thông tin');
          window.location.assign('../view/register.php');</script>";
	}else if($address ==""){
		echo"<script>alert('Vui lòng điền đầy đủ thông tin');
          window.location.assign('../view/register.php');</script>";
	}else if($phone ==""){
		echo"<script>alert('Vui lòng điền đầy đủ thông tin');
          window.location.assign('../view/register.php');</script>";
	}else if($account ==""){
		echo"<script>alert('Vui lòng điền đầy đủ thông tin');
          window.location.assign('../view/register.php');</script>";
	}else if($row['total']>0){
			echo"<script>alert('Tài khoản đã tồn tại.');
          window.location.assign('../view/register.php');</script>";
	}
	else if($password ==""){
		echo"<script>alert('Vui lòng điền đầy đủ thông tin');
          window.location.assign('../view/register.php');</script>";
	}else if($repassword ==""){
		echo"<script>alert('Vui lòng điền đầy đủ thông tin');
          window.location.assign('../view/register.php');</script>";
	}else if($password !=$repassword){
		echo"<script>alert('Xác Nhận Mật Khẩu Sai, Vui lòng nhập lại !');
          window.location.assign('../view/register.php');</script>";
	}else{
		$sql  = mysqli_query($con,"INSERT INTO tb_user VALUES(NULL, '$Name','$address','$phone','$gender','1','$account','$password')");
		echo"<script>alert('Đăng ký thành công !');
          window.location.assign('../view/formlogin.html');</script>";
	}
  }
?>