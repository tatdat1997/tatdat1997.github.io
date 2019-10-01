<?php
	include"../../header/header.php";
	include'../../connect/connectDB.php';
	if(isset($_POST['cancel'])){
	header('location: ../../index.php');
	}
	if(isset($_POST['reset_pass'])){
		$id_user =$_SESSION['id_user'];
		$pass = md5($_POST['pass']);
		$newpass = md5($_POST['newpass']);
		$renewpass = md5($_POST['renewpass']);
		$id_user =$_SESSION['id_user'];
		$sql = "SELECT * FROM tb_user WHERE id_user ='$id_user'";
		if ($result = mysqli_query($con, $sql)){
			$row = mysqli_fetch_array($result);
		}
		//echo $row['password'];	 
		if($pass !=$row['password']){
			echo"<script>alert('Mật khẩu củ không đúng, vui lòng nhập lại !');
	          window.location.assign('../view/changce_password.php');</script>";
		}else if($pass ==""){
			echo"<script>alert('Vui lòng điền đầy đủ thông tin');
	          window.location.assign('../view/changce_password.php');</script>";
		}else if($newpass ==""){
			echo"<script>alert('Vui lòng điền đầy đủ thông tin');
	          window.location.assign('../view/changce_password.php');</script>";
		}else if($renewpass ==""){
			echo"<script>alert('Vui lòng điền đầy đủ thông tin');
	          window.location.assign('../view/changce_password.php');</script>";
		}else if($newpass !=$renewpass){
			echo"<script>alert('Xác Nhận Mật Khẩu Sai, Vui lòng nhập lại !');
	          window.location.assign('../view/changce_password.php');</script>";
		}
		else{
			$sql  = mysqli_query($con,"UPDATE tb_user SET password='$newpass' where id_user=$id_user");
			echo"<script>alert('Đổi Mật Khẩu thành công !');
	          window.location.assign('../view/formlogin.html');</script>";
		}
	//header('location: ../../index.php');
	}
?>