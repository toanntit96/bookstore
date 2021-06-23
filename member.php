<?php
	session_start();
	include('ketnoi.php');	
	mysql_query("SET NAMES 'utf8'");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="css/AdminCss.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="Javascript/jquery-3.2.1.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<script>
  
</script>
<style>
.container-fluid li
{
	width:200px;
}
.container-fluid li:hover
{
	
	background-color:#0CF;
	font-weight: bold;
}
</style>

</head>

<body>

	<div id="header">
    		<div style="text-align:center; font-size:50px; color:#FFF; margin-top:20px">	TRANG CÁ NHÂN </div>
    </div>
    <hr>
    
  <nav class="navbar navbar-default">
  	<div class="navbar-header" style="width:200px">
          <a class="navbar-brand" style="background-color:#CCC;font-size:18px" href="#">User Panel</a>
        </div>
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li ><a href="member.php?ID=Thongtin">Thông tin cá nhân</a></li>
          <li ><a href="member.php?ID=change_pass">Đổi mật khẩu</a></li>
          <li ><a href="logout.php">Đăng xuất</a></li>
          <li ><a href="index.php">Quay về trang chủ</a></li>
        </ul>
      </div>
  </nav>
   </div>
    <div id="main"  style="text-align: center;">
<?php
	/// Kiểm tra tồn tại user admin 
	if (isset($_SESSION['username']))
	{	 
		$ten = $_SESSION['username'];
		$sql = "SELECT id_member,level FROM member WHERE username = '$ten'";
		$query = mysql_query($sql);
		$arr = mysql_fetch_array($query);
		$quyenhan = $arr['level'];
		$_SESSION['id_member'] = $arr['id_member'];
		$row = mysql_num_rows($query);
		if($row == 0)
		{	
			header("Location:index.php");	
		}
	
	// CÁC CÔNG CHỨC NĂNG TRONG TRANG CÁ NHÂN
			if(isset($_GET['ID']))
			{		
				//////////		Thông tin cá nhân
				if($_GET['ID'] == 'Thongtin' )
				{
					$sql = "SELECT * FROM member WHERE username = '".$ten."'";
					$result = mysql_query($sql);
					$arr1 = mysql_fetch_array($result);
					$fullname = $arr1['fullname'];
					echo '
<form class="form-horizontal" action="member.php?ID=Update" method="post">
	<fieldset>
	
	<!-- Form Name -->
	<legend>Thông tin cá nhân</legend>
	
	<!-- Text input Họ tên-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Họ tên</label>  
	  <div class="col-md-4">
	  <input id="textinput" name="txt_fullname" type="text" placeholder="" class="form-control input-md" required value="';
	  echo $fullname;        // value ho ten
	  echo'">
		
	  </div>
	</div>
	
	<!-- Multiple Radios (inline) Giới tính -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="radios">Giới tính</label>
	  <div style="text-align:left" class="col-md-4"> 
		<label class="radio-inline">';
		 echo $arr1['sex'];       /// Value Gioi tinh
		 echo '
		</label> 
		
	  </div>
	</div>

	
	<!-- Select Basic Ngày sinh -->
	<div class="form-group">
		<label class="control-label col-md-4" for="registration-date">Ngày sinh</label>
		<div class="col-md-4">
			<div class="input-group registration-date-time">
				<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
				<input class="form-control" name="date_ngaysinh" type="date" value="';
				
				echo $arr1['birthday'];echo'">';   // Ngày sinh
				
				echo'
			</div>
		</div>    
	</div>
	
	
	<!-- Text input Email-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textinput">Email</label>  
	  <div class="col-md-4">
	  <input name="txt_email" type="text" class="form-control input-md" required value="';
	  echo $arr1['email'];echo'">';       // Value Email
	  echo '
	  </div>
	</div>

	
	
	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="singlebutton"></label>
	  <div class="col-md-4">
		<input type="submit" class="btn btn-success" value="Xác nhận"></button>
	  </div>
	</div>
	
	</fieldset>
</form>
';
				}
/////////////////////////////////////////////////////////////////////////////////////////////////////
			/// XÁC NHẬN CẬP NHẬT THÔNG TIN
					if($_GET['ID'] == 'Update')
					{
							if(isset($_POST['txt_fullname']) && isset($_POST['txt_email']) && isset($_POST['date_ngaysinh']))
							{
								$fullname   = addslashes($_POST['txt_fullname']);
								$email   = addslashes($_POST['txt_email']);
								$date      = addslashes($_POST['date_ngaysinh']);
								if (!$fullname || !$email )
									{
										echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
										 exit;
									}
								  
								 //Kiểm tra email đã có người dùng chưa
								 if (mysql_num_rows(mysql_query("SELECT email FROM member WHERE email='$email'")) > 0)
									{
										 echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
										exit;
									}
									$sql = "UPDATE member 
											SET fullname = '".$fullname."',
												email = '".$email."',
												birthday = '".$date."'
											WHERE id_member = ".$_SESSION['id_member']."
											";
											echo $sql;
								//Lưu thông tin thành viên vào bảng
								 $addmember = mysql_query($sql);
								//Thông báo quá trình
								if ($addmember)
								{
									 echo "Đã cập nhật lại thông tin thành công!";
								}
								   
								else
									 echo "Có lỗi xảy ra. Thử lại!!!";
								
							}																
					}
			
					

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////// 	TRANG Đổi mật khẩu  --> Gọi qua trang change_pass.php
					if(isset($_GET['ID']))
					{
						if($_GET['ID'] == 'change_pass' )	
						{
						echo '<form action="change_pass.php?add=member" method="post" class="form-horizontal">
								<fieldset>
	
							<!-- Form Name -->
							<legend>Đổi mật khẩu</legend>
							
							<!-- Text input Họ tên-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Mật khẩu cũ</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="txtPassword" type="password" placeholder="" class="form-control input-md" required >						
							  </div>
							</div>
							
							<!-- Text input Pass-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Mật khẩu mới</label>  
							  <div class="col-md-4">
							  <input name="txtPassword1" type="password" class="form-control input-md" required >
							  </div>
							</div>
							
							<!-- Text input Pass-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Nhập lại mật khẩu</label>  
							  <div class="col-md-4">
							  <input name="txtPassword2" type="password" class="form-control input-md" required >
							  </div>
							</div>


							<!-- Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="singlebutton"></label>
							  <div class="col-md-4">
								<input type="submit" class="btn btn-success" name="change_pass" value="Xác nhận"></button>
							  </div>
							</div>
							
							</fieldset>
							</form';
						}
					}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



}

}
else header("Location:index.php");
?>

</body>
</html>
