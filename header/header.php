<?php
 $con=mysqli_connect("localhost","root","","question") or die("Ket noi khong thanh cong");
 mysqli_set_charset($con, "UTF8");
 ob_start();
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
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

    <a class="navbar-brand" href="/create-quest/index.php"><span>TPT</span> Software</a>

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

<div class="banner">
	<div class="container">
	<div class="banner-text">
	<div class="banner-heading">
	Hân hạnh được phục vụ!
	</div>
	<div class="banner-sub-heading">
	Chào mừng các bạn đã đến với website của chúng tôi!
	</div>
  <?php  
    if(isset($_SESSION['id_user'])){
  ?>
    <a type="button" href="/create-quest/user/view/menu-user.php" class="btn btn-warning text-dark btn-banner">Bắt đầu</a>
  <?php }else{ ?>
	 <a type="button" href="/create-quest/user/view/formlogin.html" class="btn btn-warning text-dark btn-banner">Bắt đầu</a>
  <?php } ?>
	</div>
	</div>
</div>
<section id="about">

<!-- <div class="container">
	<div class="text-intro">
	<h2>Thông tin</h2>
		<p>Website của chúng tôi phục vụ cho việc tạo bảng câu hỏi trắc nghiệm từ các mẫu câu hỏi mà các bạn cung cấp</p>
	</div>
</div> -->


</section>
<script type="text/javascript">
		$(document).on("scroll", function(){
		if
      ($(document).scrollTop() > 86){
		  $("#banner").addClass("shrink");
		}
		else
		{
			$("#banner").removeClass("shrink");
		}
	});
</script>







