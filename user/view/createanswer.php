<?php 
    include"../../connect/connectDB.php"; 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tạo trả lời</title>
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
	<form method="POST" action="../model/createanswer.php">
	<h2 class="text-center">Câu hỏi</h2>
	<div class="input-group mb-3">
		<?php 
			$sql = mysqli_query($con,"SELECT * FROM tb_question ORDER BY id_question DESC LIMIT 1");
			$row = mysqli_fetch_array($sql);
			$id_question = $row['id_question'];
			$sql_count = mysqli_query($con,"SELECT count(*) as total FROM tb_answer WHERE id_question = '$id_question'");
			$sql_ans = mysqli_query($con,"SELECT * FROM tb_answer WHERE id_question = '$id_question'");
			$array = array('A','B','C','D','E','F','G','H','I','J','K','L');
		?>
	  <textarea type="text" class="form-control" aria-label="Text input with dropdown button" name="quest" disabled="disabled"><?php echo $row['content']?></textarea>
	</div>


	<h2 class="text-center">Đáp án</h2>
	<p>(Chọn vào ô đáp án đúng)</p>
	<?php
		$i=0;
		$row_total = mysqli_fetch_array($sql_count);
		if(isset($_SESSION['finish'])){
			$finish = $_SESSION['finish'];
			if(($finish == 1) && ($row_total['total'] > 0)){
				while ($row_ans = mysqli_fetch_assoc($sql_ans)) {
			?>
				<div class="input-group-prepend1 col-sm-6">
			    	<span class="btn btn-primary" id=""><?php echo $array[$i]; $i++;?></span>
			  		<input type="text" disabled="disabled" class="form-control" value="<?php echo $row_ans['answer']; ?>">
			  	</div>
			  	
			<?php
				}
			?>
					<div class="btn-creat col-12 text-center">
					<button class="btn btn-warning" name="add_ans" disabled="">Thêm đáp án</button>
				    <button class="btn btn-success" name="add_finish">Thêm câu hỏi</button>
				</div>
			<?php
			}else{
				if(($row_total['total'] > 0)){
					while ($row_ans = mysqli_fetch_assoc($sql_ans)) {
				?>
					<div class="input-group-prepend1 col-sm-6">
			    	<span class="btn btn-primary" id=""><?php echo $array[$i]; $i++;?></span>
			  		<input type="text" disabled="disabled" class="form-control" value="<?php echo $row_ans['answer']; ?>">
			  	</div>
			<?php
			}
			?>
					<div class="input-group-prepend1 col-sm-6">
				    <span class="btn btn-primary" id=""><input type="checkbox" name="trueAnswer" value="1"></span>
					<input type="text" class="form-control" value="" name="answer">
				</div> 
				<div class="btn-creat col-12 text-center">
					<button class="btn btn-warning" name="add_ans">Thêm đáp án</button>
				    <button class="btn btn-success" name="add">Xác nhận</button>
				    <button class="btn btn-danger"  name="cancel">Hủy</button>
				</div>
			<?php
				}
			}
		}else{
			?>
			<div class="input-group-prepend1 col-sm-6">
			    <span class="btn btn-primary" id=""><input type="checkbox" name="trueA" value="1"></span>
				<input type="text" class="form-control"  name="A">
			</div>
			<div class="input-group-prepend1 col-sm-6">
			    <span class="btn btn-primary" id=""><input type="checkbox" name="trueB" value="1"></span>
				<input type="text" class="form-control"  name="B">
			</div>
			<div class="input-group-prepend1 col-sm-6">
			    <span class="btn btn-primary" id=""><input type="checkbox" name="trueC" value="1"></span>
				<input type="text" class="form-control" name="C">
			</div>
			<div class="input-group-prepend1 col-sm-6">
			    <span class="btn btn-primary" id=""><input type="checkbox" name="trueD" value="1"></span>
				<input type="text" class="form-control"  name="D">
			</div>

			<div class="btn-creat col-12 text-center">
			<button class="btn btn-warning" name="add_ans">Thêm đáp án</button>
		    <button class="btn btn-success" name="add">Xác nhận</button>
		    <button class="btn btn-danger"  name="cancel">Hủy</button>
			</div>
			<?php }?>
</form>
</div>
<br>

<?php 
    include"../../footer/footer.php"
?>