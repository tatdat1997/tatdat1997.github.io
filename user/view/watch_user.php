<?php
	//session_start();
	include"../../header/header.php";
    include"../../connect/connectDB.php"; 
?>
<form method="POST" action="../model/update_user.php">
	<div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://static.thenounproject.com/png/85573-200.png" alt=""/>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Tài Khoản Của Tôi</h3>
                        <div class="row register-form">
                            <div class="col-md-20" style="display: flex">
                                <div class="row register-form">
		                            <div class="col-md-12">
		                            	<?php
		                            		$id_user =$_SESSION['id_user'];
				                            $sql = "SELECT * FROM tb_user WHERE id_user ='$id_user'";
				                              if ($result = mysqli_query($con, $sql)) {
									    		$row = mysqli_fetch_array($result);
											}
				                        ?>
		                                <div class="form-group">
		                                	<label for="name">Họ Và Tên</label>		                                	
				                                <input type="text" class="form-control"  value="<?php echo $row['name']; ?>" name="Name" disabled />
		                                </div>
		                                <div class="form-group">
		                                	<label for="address">Địa Chỉ</label>
		                                    <input type="text" class="form-control"  value="<?php echo $row['address']; ?>" name="address" disabled />
		                                </div>
		                                <div class="form-group">
		                                	<label for="phone">Số Điện Thoại</label>
		                                    <input type="text" class="form-control"  value="<?php echo $row['phone']; ?>" name="phone" disabled />
		                                </div>
		                                <div class="form-group">
		                                	<label for="gender">Giới Tính</label>
		                                    <input type="text" class="form-control"  value="<?php echo $row['gender']; ?>" name="gender" disabled />
		                                </div>
		                                <!-- <div class="form-group">
		                                	<label for="account">Tên Tài Khoản</label>
		                                    <input type="text" class="form-control"  value="<?php echo $row['account']; ?>" name="account" disabled />
		                                </div>
		                                <div class="form-group">
		                                	<label for="password">Mật Khẩu</label>
		                                    <input type="password" class="form-control"  value="<?php echo $row['password']; ?>" name="password" disabled />
		                                </div> -->
		                            </div>
		                            <div class="col-md-12" style="display: flex">
		                                <div class="form-group">
		                                   <button class="btn"  name="change">Cập Nhật Thông Tin
		                                   </button>
		                                </div>
		                                <div class="form-group">
		                                    <button class="btn" name="cancel">Hủy</button>
		                                </div>
                            		</div>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>