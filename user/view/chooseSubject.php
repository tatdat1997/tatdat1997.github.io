<?php 
    include"../../connect/connectDB.php"; 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chọn môn</title>
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
            $id_pack = $row['id_pack_subject'];
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
<form method="POST" action="../view/createquest.php">
    <div class="container register">
        <h3 class="title-header">Chọn bộ câu hỏi</h3>
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="../css/img/phoenix.png"/>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active text-center" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3>Chọn môn học</h3>
                        <div class="input-group-prepend">
                            <?php  
                                $sql = mysqli_query($con,"SELECT * FROM tb_subject WHERE id_pack_subject = '$id_pack' ORDER BY id_subject");
                            ?>
                            <select class="btn btn-outline-primary col-md-8" id="sel1" name="subject">
                                <?php while ($rows = mysqli_fetch_assoc($sql)) { ?>
                                <option value="<?php echo $rows['id_subject']; ?>"><?php echo $rows['name_subject']; ?></option>
                                <?php } ?>
                            </select>                                   
                        </div>
                        <button class="btn btn-success col-md-4" name="chooseSub">Tạo Câu hỏi</button>
                        <button class="btn btn-danger col-md-4" name="cancel">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php 
    include"../../footer/footer.php"
?>
