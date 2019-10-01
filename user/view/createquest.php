<?php 
	include"../../connect/connectDB.php"; 
	session_start();
	if(isset($_POST['cancel'])){
		header('location: menu-user.php');
	}
	if(isset($_SESSION['chooseSub'])){
		$chooseSub = $_SESSION['chooseSub'];
		$sql = mysqli_query($con,"SELECT * FROM tb_subject WHERE id_subject = '$chooseSub'");
		$rows = mysqli_fetch_assoc($sql);
	}else{
		if(isset($_POST['chooseSub'])){
			$chooseSub = $_POST['subject'];
			$sql = mysqli_query($con,"SELECT * FROM tb_subject WHERE id_subject = '$chooseSub'");
			$rows = mysqli_fetch_assoc($sql);
			$_SESSION['chooseSub'] = $chooseSub;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tạo câu hỏi</title>
    <link href="/create-quest/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/footer.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/easyui.css">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/registeruser.css">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/icon.css">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/demo.css">
    <link rel="stylesheet" type="text/css" href="/create-quest/css/header.css">
    <script type="text/javascript" src="/create-quest/js/jquery.min.js"></script>
    <script src="/create-quest/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/create-quest/js/jquery.easyui.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="banner">
    <div class="container">
  <!-- Brand -->
  <a class="navbar-brand" href="../../index.php"><span>TPT</span> Software</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
           <!-- Dropdown -->
        <?php 
          if(isset($_SESSION['id_user'])){
            $id_user = $_SESSION['id_user'];
            $sql = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user ='$id_user'");
            $row = mysqli_fetch_assoc($sql);
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <?php echo $row['name'] ?>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/create-quest/user/view/watch_user.php">Tài Khoản Của Tôi</a>
            <a class="dropdown-item" href="/create-quest/user/view/changce_password.php">Đổi Mật Khẩu</a>
            <a class="dropdown-item" href="/create-quest/user/model/logout.php">Đăng xuất</a>
          </div>
        </li>
        <?php 
          }else{

        ?>
        <li class="nav-item">
            <a class="nav-link" href="user/view/formlogin.html">Đăng nhập</a>
          </li>
        <?php
        } ?>
        </ul>
      </div>
        </div>
    </nav>
<br>

<div class="creatquest">
	<form method="POST" action="../model/createquest.php">
	<h2 class="text-center"><?php echo $rows['name_subject']; ?></h2>
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
	  	  <div class="input-group-prepend">
		    <span class="input-group-text" id="">Mức độ:</span>
		  </div>	
	      <select class="btn btn-outline-primary" id="sel1" name="level">
	        <option value="1">Dễ</option>
	        <option value="2">Khó</option>
	        <option value="3">Cực Khó</option>
	      </select>	
	    
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="">Câu hỏi:</span>
		  </div>
	
	  </div>
	  <textarea type="text" class="form-control" aria-label="Text input with dropdown button" name="quest"></textarea>
	</div>

	<hr>
	<div class="btn-creat col-12 text-center">
	<!-- <button class="btn btn-warning" name="return">Quay về</button> -->
    <button class="btn btn-success" name="add">Thêm</button>
    <button class="btn btn-danger"  name="cancel">Hủy</button>
	</div>
</form>
</div>
<?php include '../../footer/footer.php'; ?>
