<? ob_start(); ?>
<?php
	include('ketnoi.php');
	session_start();	
?>
<? ob_flush(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/AdminCss.css">
 <script type="text/javascript">
 $(document).ready(function()
            {
            	$('#imgInp').on('change', function() 
            	{
		            readPath(this);
		            });
            	$('#imgInp_update').on('change', function() 
            	{
		            readPath_update(this);
		            });
            	$("#btn_Update").click(function()
            	{
			        $("#md_txtNhanDe").val("Glenn Quagmire");
			    });
			    $('.modal-del').click(function()
			    {
			    	$('.hidden-del').val($(this).val());
			    	$('#delete').modal('show');
			    });
            });
     function readPath(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
          $('#blah').attr('src', e.target.result);
            }
          reader.readAsDataURL(input.files[0]);
                }
            }
    function readPath_update(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
          $('#blah_update').attr('src', e.target.result);
            }
          reader.readAsDataURL(input.files[0]);
                }
            }
 </script>
<style>
*{padding:0;margin:0;}
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}
.my-float{
	margin-top:22px;
}
.container-fluid li
{
	width:150px;
}
.admin_panel:hover
{
	
	background-color:#0CF;
	font-weight: bold;
}
.modal-body {
    max-height: calc(25% - 100px);
    overflow-y: auto;
}
</style>
</head>
<body>
	<div id="header">
    		<div style="text-align:center; font-size:50px; color:#FFF; margin-top:20px">	TRANG QUẢN LÝ CỬA HÀNG </div>
    </div>
    <hr> 
  <nav class="navbar navbar-default">
  	<div class="navbar-header" style="width:150px">
          <a class="navbar-brand" style="background-color:#CCC;font-size:18px" href="admin.php">Admin Panel</a>
        </div>
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li class="admin_panel"><a href="admin.php?ID=addadmin">Thêm Admin</a></li>
          <li class="admin_panel"><a href = "admin.php?ID=mMember" name = "managerUser">Quản lý User</a></li>
          <li style="width:200px" >
                <div class="dropdown" style="margin-top:8px">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Quản lý thông tin sách
                    <span class="caret"></span></button>
                        <ul style="width:200px" class="dropdown-menu">
                            <li><a href="admin.php?ID=Books" name="QLSach" >Quản lí sách</a></li>
                            <li ><a href="admin.php?ID=LoaiS" name = "LoaiS">Quản lý thể loại sách</a></li>
                            <li><a href="admin.php?ID=TacGia" name="QLTacGia" >Quản lí tác giả</a></li>
                            <li ><a href="admin.php?ID=NhaPhatHanh" name = "QL_NPH">Quản lý nhà phát hành</a></li>
                        </ul>
                </div>
          </li>
          <li class="admin_panel"><a href="admin.php?ID=change_pass">Đổi mật khẩu</a></li>
          <li class="admin_panel"><a href="logout.php">Đăng xuất</a></li>
          <li class="admin_panel" style="width:200px" ><a href="index.php">Quay về trang chủ</a></li>
        </ul>
      </div>
  </nav>
   </div>
<div id="main"  style="text-align: center;">
<?php
ob_start(); 
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
	// CÁC CHỨC NĂNG TRONG TRANG QUẢN LÝ
		if(isset($_GET['ID']))
		{	
				//////////////////////////////////////////////////////////////////////	
				//////////		THÊM ADMIN 											//
				//////////////////////////////////////////////////////////////////////
				if($_GET['ID'] == 'addadmin' && $quyenhan==1) 
					echo ' <div>Bạn không có quyền thêm admin </div> ';
				if($_GET['ID'] == 'addadmin' && $quyenhan==0)
				{
					echo
						'
						<form class="form-horizontal" action = "admin.php?ID=validate" method="post">
						  <fieldset>
						  <!-- Form Name -->
							<legend>Thêm admin</legend>
							
							<!-- Text input Họ tên-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Tên đăng nhập</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="txtUsernameadmin" type="text" placeholder="" class="form-control input-md" required >						
							  </div>
							</div>
							
							<!-- Text input Pass-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Email</label>  
							  <div class="col-md-4">
							  <input name="txtEmail" type="text" class="form-control input-md" required >
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
						</form>';
				}
/////////////////////////////////////////////////////////////////////////////////////////////////////
/// 							XÁC NHẬN THÊM TÀI KHOẢN ADMIN 									////
				////////////////////////////////////////////////////////////////////////////////
					if($_GET['ID'] == 'validate')
					{
						   // xỬ LÝ ĐĂNG KÝ TÀI KHOẢN
							if(isset($_POST['txtUsernameadmin']))
							{
								$username   = addslashes($_POST['txtUsernameadmin']);
								$password   = md5('123456');
								$email      = addslashes($_POST['txtEmail']);
								if (!$username || !$password || !$email )
									{
										echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
										 exit;
									 }
								 //Kiểm tra tên đăng nhập này đã có người dùng chưa
								 if (mysql_num_rows(mysql_query("SELECT username FROM member WHERE username='$username'")) > 0)
								 {
									echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
									exit;
								 }
								  
								 //Kiểm tra email có đúng định dạng hay không
								 if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
									 {
										echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
										 exit;
									}
								  
								 //Kiểm tra email đã có người dùng chưa
								 if (mysql_num_rows(mysql_query("SELECT email FROM member WHERE email='$email'")) > 0)
									{
										 echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
										exit;
									}

								//Lưu thông tin vào bảng
								 @$addmember = mysql_query("
									INSERT INTO member 
									(
										username,
										password,
										email,
										fullname,
										birthday,
										sex,
										level
									)
									VALUE 			
									(
										'{$username}',
										'{$password}',
										'{$email}',
										'admin',
										'',
										'',
										1				
									)
								");				/// Quyền 1: Admin dưới quyền Admin quản trị			
							
							
								//Thông báo quá trình lưu
								if ($addmember)
								{
									 echo "Đã thêm admin mới thành công." ;
								}
								   
								else
									 echo "Có lỗi xảy ra.";
								
							}
					}
////////////////////////////////////////////////////////////////////////////////////////////////////
/////////							QUẢN LÝ USER 												////
					////////////////////////////////////////////////////////////////
					if($_GET['ID'] == 'mMember')
					{
						echo '<form action="xuly.php" method="post">
						<div>
							<table class="table table-striped">
							<thead>
								<tr>
									<td colspan="8" style="font-size:25px">DANH SÁCH TÀI KHOẢN TRONG CỬA HÀNG</td>
								</tr>
								<tr style="background-color:#0069A8; color: white;">
									<td >Select</td>
									<td>id_member</td>
									<td >username</td>
									<td >email</td>
									<td >fullname</td>
									<td >birthday</td>
									<td>sex</td>
									<td>level</td>
								</tr> 
							</thead> ' ;
						echo'<tbody>';
						$sql = "SELECT * FROM member WHERE level = 1 OR level = 2 ";
						$query = mysql_query($sql);		
						$total =  mysql_affected_rows();
						$sotrang = 0;
						if(isset($_GET['page']))
						{
							$sotrang = $_GET['page'];		
						}
						$limitdisplay = 10;
						$start = $sotrang * $limitdisplay ;
						if($quyenhan == 0)										
							$sql = "SELECT * FROM member WHERE level = 1 OR level = 2  ORDER BY id_member LIMIT $start, $limitdisplay";
						if($quyenhan == 1)
							$sql = "SELECT * FROM member WHERE level = 2 ORDER BY id_member LIMIT $start, $limitdisplay ";
						$query = mysql_query($sql);
						while($row = mysql_fetch_array($query))
						{
							echo'<tr style="background-color:#CCCCCC; ">';
							echo'<td>'; echo'<input type = "checkbox" class="form-control" name = "checkdelete[]" value = "'; 
							echo $row['id_member'];  
							echo'">'; echo'</td>';
							echo'<td >'; echo $row['id_member']; echo'</td>';
							echo'<td>'; echo $row['username']; echo'</td>';
							echo'<td>'; echo $row['email']; echo'</td>';
							echo'<td>'; echo $row['fullname']; echo'</td>'; 
							echo'<td>'; echo $row['birthday']; echo'</td>'; 
							echo'<td>'; echo $row['sex']; echo'</td>';
							switch($row['level'])
							{
								case 1: $str_level = "Admin";
										break;
								case 2:$str_level = "User";
										break;
							}
							echo'<td>'; echo $str_level; echo'</td>';
							echo'</tr>';		
						}	
						echo'</tbody>';				
						echo'</table></div>';				
						echo '<br><input type="submit" class="btn btn-warning xoa" value ="Xóa" style="background-color: red;">';
						echo'</form';
						$link = 'Admin.php';
						$mess = '?ID=mMember';
						include('phantrang.php');
					}
			
//////////////////////////////////////////////////////////////////////////////////////////////	
//                                       QUẢN LÝ LOẠI SÁCH                               /////
/////////////////////////////////////////////////////////////////////////////////////////////

					if($_GET['ID'] == 'LoaiS')
					{
						$result = mysql_query("SELECT * FROM `theloai`");
						if(mysql_num_rows($result)>0)
						{
							echo ' <form action="xuly.php" method="post">
							<div>
								<table style="width:800px;margin-left:300px" border="1" class="table table-striped">
								<thead>
									<tr>
										<td colspan="2" style="font-size:25px">DANH SÁCH CÁC THỂ LOẠI SÁCH</td>
									</tr>
									<tr style="background-color:#0069A8; color: white;">
										<td >Select</td>
										<td>Thể loại</td>
									</tr> 
								</thead> ' ;
							echo '<tbody>  ';
							$i=0;						
							while($arr = mysql_fetch_array($result))
							{
								echo'<tr style="background-color:#CCC; ">';
								echo'<td>'; 
									echo'<input class="form-control" type = "checkbox" name = "chk_DelLoaiSach[]" value = "'; 
									echo $arr['id_theloai'];  
									echo'">';
								 	
								echo'</td>';
								echo'<td >'; 
									echo'<input type="hidden" name = "update[]" value = "'; 
									echo $arr['id_theloai'];  
									echo'">';
								
									echo "<input type='text' name='tenloai".$i."' value='".$arr['tenloai']."'\>";
									
								echo'</td>';
								$i++;
							}
							
							echo'</tbody>';				
							echo'</table></div> ';
							echo  '
							<div class="container">
							  <!-- Trigger the modal with a button -->
							  <div>
							  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Thêm dữ liệu</button>				
							  <button type="submit" class="btn btn-primary btn-lg" name="updateTheLoai">Cập nhật</button>
							  <input type="submit" class="btn btn-warning xoa" name="deleteTheLoai" value ="Xóa" style="background-color: red;">											   								
							  </div>
							  </form>
							  <!-- Modal -->
							  <div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
								
								  <!-- Modal Thêm thể loại sách-->
								  <form action="admin.php?ID=AddLoaiS" method="post">
								  <div class="modal-content">
										
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <h4 class="modal-title">Thêm thể loại sách</h4>
											</div>
											<div class="modal-body">
											  Tên thể loại &nbsp; <input type="text" required name="name_theloai">
											  
											</div>
											<div class="modal-footer">
											  <button type="submit" class="btn btn-success">Xác nhận</button>
											  <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
											</div>
										
								  </div>
								  </form>
								</div>
							
							  </div>
							  
							</div> 
						';				
							
							echo'</form';
						echo "</div>";
						
						}
					}
/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////					XÁC NHẬN THÊM LOẠI SÁCH MỚI
if($_GET['ID'] == 'AddLoaiS')
{
	$theloai = $_POST['name_theloai'];
	$sql = "INSERT INTO theloai VALUES (null,'".$theloai."')";
	$result = mysql_query($sql);
	if($result) echo"Đã thêm thành công";
	else echo "Có lỗi phát sinh!!!";
	
}
//////////////////////////////////////////////////////////////////////////////////////////////	
//////                             QUẢN LÝ TÁC GIẢ                                     //////  
/////////////////////////////////////////////////////////////////////////////////////////////
					if($_GET['ID'] == 'TacGia')
					{
						$result = mysql_query("SELECT * FROM `author`");
						if(mysql_num_rows($result)>0)
						{
							echo ' <form action="xuly.php" method="post">
							<div>
								<table style="width:800px;margin-left:300px" border="1" class="table table-striped">
								<thead>
									<tr>
										<td colspan="2" style="font-size:25px">DANH SÁCH TÁC GIẢ</td>
									</tr>
									<tr style="background-color:#0069A8; color: white;">
										<td >Select</td>
										<td>Tác giả</td>
									</tr> 
								</thead> ' ;
							echo '<tbody>  ';
							$i=0;						
							while($arr = mysql_fetch_array($result))
							{
								echo'<tr style="background-color:#CCC; ">';
								echo'<td>'; 
									echo'<input class="form-control" type = "checkbox" name = "chk_DelTacGia[]" value = "'; 
									echo $arr['id_author'];  
									echo'">';
								 	
								echo'</td>';
								echo'<td >'; 
									echo'<input type="hidden" name = "update[]" value = "'; 
									echo $arr['id_author'];  
									echo'">';
								
									echo "<input type='text' name='tacgia".$i."' value='".$arr['name']."'\>";
									
								echo'</td>';
								$i++;
							}
							
							echo'</tbody>';				
							echo'</table></div> ';
							echo  '
							<div class="container">
							  <!-- Trigger the modal with a button -->
							  <div>
							  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Thêm tác giả</button>				
							  <button type="submit" class="btn btn-primary btn-lg" name="updateTacGia">Cập nhật</button>
							  <input type="submit" class="btn btn-warning xoa" name="deleteTacGia" value ="Xóa" style="background-color: red;">											   								
							  </div>
							  </form>
							  <!-- Modal -->
							  <div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
								
								  <!-- Modal Thêm thể loại sách-->
								  <form action="admin.php?ID=AddTacGia" method="post">
								  <div class="modal-content">
										
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <h4 class="modal-title">Thêm tác giả</h4>
											</div>
											<div class="modal-body">
											  Tên tác giả &nbsp; <input type="text" required name="name_author">
											  
											</div>
											<div class="modal-footer">
											  <button type="submit" class="btn btn-success">Xác nhận</button>
											  <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
											</div>
										
								  </div>
								  </form>
								</div>
							
							  </div>
							  
							</div> 
						';				
							
						echo'</form';
						echo "</div>";
						
						}
					}
/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////					XÁC NHẬN THÊM TÁC GIẢ
if($_GET['ID'] == 'AddTacGia')
{
	$author = $_POST['name_author'];
	$sql = "INSERT INTO author VALUES (null,'".$author."')";
	$result = mysql_query($sql);
	if($result) echo "Đã thêm thành công";
	else echo "Có lỗi phát sinh!!!";
	
}
//////////////////////////////////////////////////////////////////////////////////////////////	
//////                             QUẢN LÝ NHÀ PHÁT HÀNH                                     //////  
/////////////////////////////////////////////////////////////////////////////////////////////	
					if($_GET['ID'] == 'NhaPhatHanh')
					{
						$result = mysql_query("SELECT * FROM `nha_phat_hanh`");
						if(mysql_num_rows($result)>0)
						{
							echo ' <form action="xuly.php" method="post">
							<div>
								<table style="width:800px;margin-left:300px" border="1" class="table table-striped">
								<thead>
									<tr>
										<td colspan="2" style="font-size:25px">DANH SÁCH CÁC NHÀ PHÁT HÀNH</td>
									</tr>
									<tr style="background-color:#0069A8; color: white;">
										<td >Select</td>
										<td>Nhà phát hành</td>
									</tr> 
								</thead> ' ;
							echo '<tbody>  ';
							$i=0;						
							while($arr = mysql_fetch_array($result))
							{
								echo'<tr style="background-color:#CCC; ">';
								echo'<td>'; 
									echo'<input class="form-control" type = "checkbox" name = "chk_DelNhaPhatHanh[]" value = "'; 
									echo $arr['id_nhaphathanh'];  
									echo'">';
								 	
								echo'</td>';
								echo'<td >'; 
									echo'<input type="hidden" name = "update[]" value = "'; 
									echo $arr['id_nhaphathanh'];  
									echo'">';
								
									echo "<input type='text' name='NPH".$i."' value='".$arr['name']."'\>";
									
								echo'</td>';
								$i++;
							}
							
							echo'</tbody>';				
							echo'</table></div> ';
							echo  '
							<div class="container">
							  <!-- Trigger the modal with a button -->
							  <div>
							  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Thêm dữ liệu</button>				
							  <button type="submit" class="btn btn-primary btn-lg" name="updateNPH">Cập nhật</button>
							  <input type="submit" class="btn btn-warning xoa" name="deleteNPH" value ="Xóa" style="background-color: red;">											   								
							  </div>
							  </form>
							  <!-- Modal -->
							  <div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
								
								  <!-- Modal Thêm thể loại sách-->
								  <form action="admin.php?ID=AddNPH" method="post">
								  <div class="modal-content">
										
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <h4 class="modal-title">Thêm nhà phát hành</h4>
											</div>
											<div class="modal-body">
											  Tên nhà phát hành &nbsp; <input type="text" required name="name_NPH">
											  
											</div>
											<div class="modal-footer">
											  <button type="submit" class="btn btn-success">Xác nhận</button>
											  <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
											</div>
										
								  </div>
								  </form>
								</div>
							
							  </div>
							  
							</div> 
						';				
							
							echo'</form';
						echo "</div>";
						
						}
					}
/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////					XÁC NHẬN THÊM NHÀ PHÁT HÀNH
if($_GET['ID'] == 'AddNPH')
{
	$NPH = $_POST['name_NPH'];
	$sql = "INSERT INTO nha_phat_hanh VALUES (null,'".$NPH."')";
	$result = mysql_query($sql);
	if($result) echo "Thêm thành công";
	else echo "Có lỗi phát sinh!!!";

	
}

////////////////////////////////////////////////////////////////////////////////////////////////////
////////////  								QUẢN LÝ SÁCH 										////
////////////////////////////////////////////////////////////////////////////////////////////////////
					if($_GET['ID'] == 'Books')
					{		$_SESSION['Book'] = "1";
							echo '
							<div>
							<table class="table table-striped">
							<thead>
								<tr>
									<td colspan="10" style="font-size:25px">DANH SÁCH CÁC LOẠI SÁCH</td>
								</tr>
								<tr style="background-color:#0069A8; color: white;">
									<td >Select</td>
									<td>Image</td>
									<td>Name</td>
									<td >Giá</td>
									<td >Thể loại</td>
									<td >Tác giả</td>
									<td >Nhà phát hành</td>
									<td>Số lượng tồn</td>
									<td>Ngày Upload</td>
									<td>Thông tin mô tả</td>
									<td>Số lượng mua</td>
								</tr> 
							</thead> ';
							echo'<tbody>';
							$sql = "select id_product from product";
							$query = mysql_query($sql);
							$total =  mysql_affected_rows();
							$sotrang = 0;
							if(isset($_GET['page']))
							{
								
									$sotrang = $_GET['page'];
									if($sotrang <= 0 )
									{
										$sotrang = 1;
									}		
							}
								
					
							$limitdisplay = 10;
							$start = $sotrang * $limitdisplay ;			
							$sql = "select * from product  limit $start, $limitdisplay";
							$query = mysql_query($sql);
							$i = 0;								
							while($row = mysql_fetch_array($query))
							{
								echo'
								<tr style="background-color:#CCCCCC; ">
										<td>
									    <a href="xuly.php?ID=';echo $row['id_product'];echo'&&btn=Up"class="btn btn-primary form-control glyphicon glyphicon-pencil" >
									    </a>

									    <button class="btn btn-danger glyphicon glyphicon-trash form-control modal-del" value="';echo $row['id_product'];echo'">
									    </button>


									    ';
								echo'</td>';
								echo '<td>
										<img id="image_preview';echo $i;echo '"  src="images/books/';echo $row['image'];echo'" value="" width="120" height="170">';
								    
								echo'</td>';
									/////				Image của sách
								echo'<td>'; 
									
										echo	$row['name'];
										
								echo'</td>';
								////// 					In ra nhan đề
								echo'<td style="width:100px">'; 

										echo	$row['gia'];
										
								echo'</td>';
								///// 					In ra giá sách
								echo'<td>';
								$sql1 = "select * from theloai where id_theloai = $row[id_theloai]
										";								
								$query1 = mysql_query($sql1);
								$arr = mysql_fetch_array($query1);
																		
									echo $arr['tenloai'];
								echo'
								</td>';
								///// 			Select option thể loại sách
								echo'<td>';
 
									$sql1 = "select * from author where id_author = $row[id_author]
										";								
								$query1 = mysql_query($sql1);
								$arr = mysql_fetch_array($query1);
																		
									echo $arr['name'];

								echo'</td>';
								///// 				Tên tác giả
								echo'<td>';
								$sql1 = "select * from nha_phat_hanh 
										where id_nhaphathanh = $row[id_nhaphathanh]";					
								$query1 = mysql_query($sql1);
								$arr = mysql_fetch_array($query1);										
									echo $arr['name'];
								
								echo'</td>';
								//// 			Select option Nhà phát hành
								echo'<td style="width:50px">'; 
									echo $row['so_luong']; 
								echo'</td>';  
								/////			Số lượng sách còn 
								echo'<td style="width:150px">'; 
									echo $row['ngay_upload'];
									
								echo'</td>';
								////			Ngày Upload
								echo'<td style="width:500px">';
										echo $row['TTGioiThieu'];
								echo'</td>';
								////			Thông tin giới thiệu sách
								echo'<td>'; 
									echo $row['soluongnguoimua']; 
								echo'</td>';
								/////			Số lượng người mua
								echo'</tr>';
							}
							echo'</tr></tbody>';					
							echo'</table></div>';
							echo '<button type="button" class="float fa fa-plus my-float" data-toggle="modal" data-target="#myModal">
								</button>';
							echo '<div class="container">
							  <!-- Trigger the modal with a button -->
							  <!-- Modal -->
							  <div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog" style="width:60%">
								  <form  action="admin.php?ID=AddSach" method="post" enctype="multipart/form-data">
								  <div class="modal-content">
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <h4 class="modal-title">Thêm sách</h4>
											</div>
											<div class="modal-body">
													<table border="1" class="table table-striped">
														<tr>
															<td>Nhan đề</td>
															<td><input type="text" class="form-control" required name="txt_NhanDe"></td>
															<td >Giá</td>
															<td>
																<input type="text" class="form-control" required name="txt_Gia">
															</td>
														</tr>
														<tr>
															<td >Hình</td>
															<td>
																   
													        <input name="img_Sach"  type="file" id="imgInp" />
													        <img id="blah" src="#" width="120px" height="170px" alt="your image" />
   
															</td>
															<td>Thể loại</td>';
															echo'<td>';
															echo '<select class="form-control" name="slc_TheLoai">';
															$sql1 = "select * from theloai";								
															$query1 = mysql_query($sql1);
															while($arr = mysql_fetch_array($query1))
															{										
																echo "
																			
																				<option value='".$arr['id_theloai']."'>$arr[tenloai]</option>
																		";
															}
															echo'</select>
															
															</td>
														<!--	///// 			Select option thể loại sách    -->
														</tr>
														<tr>
															<td>Số lượng</td>
															<td><input class="form-control" type="text" required name="txt_SoLuong"></td>
															<td>Tác giả</td>';
															echo'<td>';
															echo '<select class="form-control" name="slc_TacGia">';
															$sql1 = "select * from author";								
															$query1 = mysql_query($sql1);
															while($arr = mysql_fetch_array($query1))
															{										
																echo "
																			
																				<option value='".$arr['id_author']."'>$arr[name]</option>
																		";
															}
															echo'</select>
															
															</td>
														<!--	///// 			Select option Tác giả 		-->
														</tr> 
														<tr>
															<td>Ngày Upload</td>
															<td><input class="form-control" type="date" name="dt_NgayUpload"></td>
															<td>Nhà phát hành</td>';
															echo'<td>';
															echo '<select class="form-control" name="slc_NhaPhatHanh">';
															$sql1 = "select * from nha_phat_hanh";								
															$query1 = mysql_query($sql1);
															while($arr = mysql_fetch_array($query1))
															{										
																echo "
																			
																				<option value='".$arr['id_nhaphathanh']."'>$arr[name]</option>
																		";
															}
															echo'</select>
															
															</td>
														<!--	///// 			Select option nhà phát hành 		-->
														</tr>
														<tr>
															<td >Thông tin mô tả </td>
															<td colspan="3">
																<textarea class="form-control" name="txt_TTMoTa" rows="5" cols="100" ></textarea>
															</td>
															
														</tr> 
													</table>
											</div>
											<div class="modal-footer">
													<!-- Button -->
													<div class="form-group">
														  <button type="submit" class="btn btn-success">Xác nhận</button>
												  		  <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
													</div>
													
											</div>		
												  
									</div>	
									</form>
								</div>
							</div>';
echo '<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<form action="xuly.php?btn=Del" method="POST">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Thông báo !!!</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger">
       	<span class="glyphicon glyphicon-warning-sign"></span> Bạn thật sự muốn xóa quyển sách này?
       </div>
       <input type="hidden" class="hidden-del" name="ID">
      </div>
        <div class="modal-footer ">
        <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
  	</form>
      <!-- /.modal-dialog --> 
    </div>';
}
		
/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////					XÁC NHẬN THÊM SÁCH
if($_GET['ID'] == 'AddSach')
{
	$NhanDe = $_POST['txt_NhanDe'];
	$Gia = $_POST['txt_Gia'];
	$SoLuong = $_POST['txt_SoLuong'];
	$TTMoTa = $_POST['txt_TTMoTa'];
	$date_up = $_POST['dt_NgayUpload'];
	$id_theloai = $_POST['slc_TheLoai'];
	$id_tacgia = $_POST['slc_TacGia'];
	$id_NhaPhatHanh = $_POST['slc_NhaPhatHanh'];
	$img_name="";
	//////////////////////////
	/// 	kiểm tra các dữ liệu
	
	//////////////////////////
	// Xử lý up hình lên server
		$output_dir = "C:/xampp/htdocs/bookstore/images/books/";

		if(isset($_FILES["img_Sach"]))
		{
		    //Filter the file types , if you want.
		    if ($_FILES["img_Sach"]["error"] > 0)
		    {
		      echo "Error: " . $_FILES["img_Sach"]["error"];
		    }
		    else
		    {
		    	$img_name = $_FILES['img_Sach']['name'];
		        move_uploaded_file($_FILES["img_Sach"]["tmp_name"],$output_dir.$_FILES["img_Sach"]["name"]);
		    }

		}
		/// --> OK đã up lên server
	///////////////////////////

	$sql = "INSERT INTO `product`(`id_product`, 
						`id_author`, 
						`name`, 
						`image`, 
						`so_luong`, 
						`gia`, 
						`ngay_upload`, 
						`id_nhaphathanh`, 
						`id_theloai`, 
						`TTGioiThieu`, 
						`soluongnguoimua`,
						 `id_khuyenmai`) 
						VALUES (null,
						".$id_tacgia.",
						'".$NhanDe."',
						'".$img_name."',
						".$SoLuong.",
						".$Gia.",
						'".$date_up."',
						".$id_NhaPhatHanh.",
						".$id_theloai.",
						'".$TTMoTa."',
						0,
						0
						)";
$result = mysql_query($sql);
	if($result) echo "Đã thêm thành công";
	else echo "Có lỗi phát sinh!!!";	
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////// 						TRANG Đổi mật khẩu  --> Gọi qua trang change_pass.php 					/.///////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if(isset($_GET['ID']))
					{
						if($_GET['ID'] == 'change_pass' )	
						{
						echo '<form action="change_pass.php" method="post" class="form-horizontal">
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
}
}
?>
<? ob_flush(); ?>
</body>
</html>