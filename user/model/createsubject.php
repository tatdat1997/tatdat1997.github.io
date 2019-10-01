<?php
  include"../../connect/connectDB.php"; 
	if(isset($_POST['register'])){
		$subject = $_POST['subject'];
		$year = $_POST['year'];
		if($subject=="" || $year==""){
			echo"<script>alert('Vui lòng điền đầy đủ thông tin');
              window.location.assign('../view/createsubject.php');</script>";
		}else{
			$sql = mysqli_query($con,"INSERT INTO tb_subject VALUES(NULL,'$subject','$year','1')");
			echo"<script>alert('Đăng ký môn học thành công');
              window.location.assign('../view/createsubject.php');</script>";
		}
	}
	if(isset($_POST['cancel'])){
		header('location: ../../index.php');
	}
?>