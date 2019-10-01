<?php 
	include"../../header/header.php";
    include"../../connect/connectDB.php"; 
?>
<br>
<form method="POST" action="../model/createsubject.php">
	<div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://static.thenounproject.com/png/85573-200.png" alt=""/>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Apply as a Employee</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name *" value="" name="subject" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name *" value="" name="year" />
                                </div>
                            </div>
                            <div class="col-md-6" style="display: flex">
                                <div class="form-group">
                                   <button class="btn" name="register">Đăng ký</button>
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
</form>
<br>
<?php 
	include"../../footer/footer.php"
?>