<?php
	include"../../header/header.php";
	include'../../connect/connectDB.php';
	if(isset($_POST['change'])){
	header('location: ../view/changce_user.php');
	}
	if(isset($_POST['cancel'])){
	header('location: ../view/menu-user.php');
	}
	if(isset($_POST['change_user'])){
		$id_user =$_SESSION['id_user'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		//$account = $_POST['account'];
		//$password = $_POST['password'];
		//$repassword = $_POST['repassword'];
		echo $name;
		if($name ==""){
			echo"<script>alert('Vui lòng điền đầy đủ thông tin');
	          window.location.assign('../view/changce_user.php');</script>";
		}else if($address ==""){
			echo"<script>alert('Vui lòng điền đầy đủ thông tin');
	          window.location.assign('../view/changce_user.php');</script>";
		}else if($phone ==""){
			echo"<script>alert('Vui lòng điền đầy đủ thông tin');
	          window.location.assign('../view/changce_user.php');</script>";
		// }else if($account ==""){
		// 	echo"<script>alert('Vui lòng điền đầy đủ thông tin');
	 //          window.location.assign('../view/changce_user.php');</script>";
		}
		// else if($password ==""){
		// 	echo"<script>alert('Vui lòng điền đầy đủ thông tin');
	 //          window.location.assign('../view/changce_user.php');</script>";
		// }else if($repassword ==""){
		// 	echo"<script>alert('Vui lòng điền đầy đủ thông tin');
	 //          window.location.assign('../view/changce_user.php');</script>";
		// }else if($password !=$repassword){
		// 	echo"<script>alert('Xác Nhận Mật Khẩu Sai, Vui lòng nhập lại !');
	 //          window.location.assign('../view/changce_user.php');</script>";
		// }
		else{
			$sql  = mysqli_query($con,"UPDATE tb_user SET name='$name',address='$address',phone='$phone',gender='$gender'  where id_user=$id_user");
			echo"<script>alert('Cập Nhật Thông Tin thành công !');
	          window.location.assign('../view/watch_user.php');</script>";
		}
	}
	
?>