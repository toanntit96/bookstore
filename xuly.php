<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="css/AdminCss.css">
 <script type="text/javascript">
 $(document).ready(function()
            {
                
                $('#imgInp').on('change', function() 
                {
                    readPath(this);
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

   
 </script>
<style>
.container-fluid li
{
    width:130px;
}
.admin_panel:hover
{
    
    background-color:#0CF;
    font-weight: bold;
}

.modal-body {
    max-height: calc(100% - 150px);
    overflow-y: auto;
}
</style>
<?php
    session_start();
    // xỬ LÝ ĐĂNG KÝ TÀI KHOẢN + XÓA TÀI KHOẢN
    //Nhúng file kết nối với database
    include('ketnoi.php'); 
    //Lấy dữ liệu từ file dangky.php
	$biencheck = 0;
    if(!isset($_SESSION['Book']))
        $_SESSION['Book'] = 0;
    else $_SESSION['Book'] = 1;
    ///////////////////////////////////////////////////////////////////////////////////////////
    ///////                             THÊM TÀI KHOẢN THÀNH VIÊN                         /////
    ///////////////////////////////////////////////////////////////////////////////////////////
    if(isset($_POST['txtUsername']))
	{
        $username   = addslashes($_POST['txtUsername']);
        $password   = md5(addslashes($_POST['txtPassword']));
        $email      = addslashes($_POST['txtEmail']);
        $fullname   = addslashes($_POST['txtFullname']);
        $birthday   = addslashes($_POST['txtBirthday']);
        $sex        = addslashes($_POST['txtSex']);
        if (!$username || !$password || !$email || !$fullname || !$birthday || !$sex)
            {
                echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
                 exit;
             }
         //Kiểm tra tên đăng nhập này đã có người dùng chưa
         if (mysql_num_rows(mysql_query("SELECT username FROM member WHERE username='$username'")) > 0){
            echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
         }
          
         //Kiểm tra email đã có người dùng chưa
         if (mysql_num_rows(mysql_query("SELECT email FROM member WHERE email='$email'")) > 0)
            {
                 echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }
        
        
        //Lưu thông tin thành viên vào bảng
         @$addmember = mysql_query("
            INSERT INTO member (
                username,
                password,
                email,
                fullname,
                birthday,
                sex, 
				level
            )
            VALUE (
                '{$username}',
                '{$password}',
                '{$email}',
                '{$fullname}',
                '{$birthday}',
                '{$sex}',
				2
            )
        ");
    
    
        //Thông báo quá trình lưu
        if ($addmember){
			 echo "Đăng ký thành công. <a href='dangnhap.php'>Quay lại đăng nhập</a>";
			 $biencheck = 1;
		}
           
        else
             echo "Có lỗi xảy ra. <a href='dangky.php'>Thử lại</a>";
        
    }

  

/////////////////////////////////////////////////////////////////////////////////////////////
//                                XỬ LÝ XÓA TÀI KHOẢN                                   ////
    /////////////////////////////////////////////////////////////////////////////////////
    
    if(isset($_POST['checkdelete']))   //'checkdelete bên admin.php là 1 mảng checkdelete[]'
	{
        foreach ($_POST['checkdelete'] as $check) 
		{
            $sql = "DELETE FROM member WHERE id_member = $check";
			$querydelete = mysql_query($sql);
            if(!$querydelete)
			{
                echo "Error!!! <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }			
		}	
		$biencheck = 1;		
       	echo "Đã xóa !!!. <a href='javascript: history.go(-1)'>Trở lại</a>";
       		
	}	                         
	
//////////////////////////////////////////////////////////////////////////////////////////////	
//                                       THỂ LOẠI SÁCH                                          /////
/////////////////////////////////////////////////////////////////////////////////////////////
    	// XỬ LÝ XÓA LOẠI SÁCH
    
    if(isset($_POST['deleteTheLoai']))   //'checkdelete bên admin.php là 1 mảng checkdelete[]'
	{
		$querydelete = 1;
        foreach ($_POST['chk_DelLoaiSach'] as $check) 
		{
            $sql = "DELETE FROM theloai WHERE id_theloai = $check";
			$querydelete = mysql_query($sql);
            if(!$querydelete)
			{
                echo "Error!!! <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }			
		}
		if($querydelete)			
       		echo "Đã xóa !!!. <a href='javascript: history.go(-1)'>Trở lại</a>";
		$biencheck = 1;			
       	
       		
	}	 
/////////////////////////////////////////////////////////////////////////////////
// XỬ LÝ CẬP NHẬT THỂ LOẠI SÁCH
    
    if(isset($_POST['updateTheLoai']))   //'checkdelete bên admin.php là 1 mảng checkdelete[]'
	{	
		$i=0;
		$update = 1;
        foreach ($_POST['update'] as $update) 
		{
			$val = "tenloai".$i;
			$tenloai = $_POST[$val];
            $sql = "UPDATE theloai SET tenloai = '".$tenloai."' WHERE id_theloai = $update ";
			$update = mysql_query($sql);
            if(!$update)
			{
               echo "Error!!! <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }
			$i++;			
		}
		if($update)			
       		echo "Cập nhật thành công. <a href='javascript: history.go(-1)'>Trở lại</a>";
		$biencheck = 1;
	}                        
	
//////////////////////////////////////////////////////////////////////////////////////////////	
//////                                      TÁC GIẢ                                     //////  
/////////////////////////////////////////////////////////////////////////////////////////////
        // XỬ LÝ XÓA TÁC GIẢ
    
    if(isset($_POST['deleteTacGia']))   //'checkdelete bên admin.php là 1 mảng checkdelete[]'
    {
        $querydelete = 1;
        foreach ($_POST['chk_DelTacGia'] as $check) 
        {
            $sql = "DELETE FROM author WHERE id_author = $check";
            $querydelete = mysql_query($sql);
            if(!$querydelete)
            {
                echo "Error!!! <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }           
        }
        if($querydelete)            
            echo "Đã xóa !!!. <a href='javascript: history.go(-1)'>Trở lại</a>";
        $biencheck = 1;         
        
            
    }    
/////////////////////////////////////////////////////////////////////////////////
// XỬ LÝ CẬP NHẬT TÁC GIẢ
    
    if(isset($_POST['updateTacGia']))   //'checkdelete bên admin.php là 1 mảng checkdelete[]'
    {   
        $i=0;
        $update = 1;
        foreach ($_POST['update'] as $update) 
        {
            $val = "tacgia".$i;
            $author = $_POST[$val];
            $sql = "UPDATE author SET name = '".$author."' WHERE id_author = $update ";
            $update = mysql_query($sql);
            if(!$update)
            {
                echo "Error!!! <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }
            $i++;           
        }
        if($update)         
            echo "Cập nhật thành công. <a href='javascript: history.go(-1)'>Trở lại</a>";
        $biencheck = 1;
    }                        

//////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////  
//////                                      NHÀ PHÁT HÀNH                               //////  
/////////////////////////////////////////////////////////////////////////////////////////////
        // XỬ LÝ XÓA NHÀ PHÁT HÀNH
    
    if(isset($_POST['deleteNPH']))   //'checkdelete bên admin.php là 1 mảng checkdelete[]'
    {
        $querydelete = 1;
        foreach ($_POST['chk_DelNhaPhatHanh'] as $check) 
        {
            $sql = "DELETE FROM nha_phat_hanh WHERE id_nhaphathanh = $check";
            $querydelete = mysql_query($sql);
            if(!$querydelete)
            {
                echo "Error!!! <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }           
        }
        if($querydelete)            
            echo "Đã xóa !!!. <a href='javascript: history.go(-1)'>Trở lại</a>";
        $biencheck = 1;         
        
            
    }    
/////////////////////////////////////////////////////////////////////////////////
// XỬ LÝ CẬP NHẬT NHÀ PHÁT HÀNH
    
    if(isset($_POST['updateNPH']))   //'checkdelete bên admin.php là 1 mảng checkdelete[]'
    {   
        $i=0;
        $update = 1;
        foreach ($_POST['update'] as $update) 
        {
            $val = "NPH".$i;
            $NhaPhatHanh = $_POST[$val];
            $sql = "UPDATE nha_phat_hanh SET name = '".$NhaPhatHanh."' WHERE id_nhaphathanh = $update ";
            $update = mysql_query($sql);
            if(!$update)
            {
                echo "Error!!! <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }
            $i++;           
        }
        if($update)         
            echo "Cập nhật thành công. <a href='javascript: history.go(-1)'>Trở lại</a>";
        $biencheck = 1;
    }                        

//////////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////////
/////                               XÓA SẢN PHẨM (SÁCH)                                 ////
///////////////////////////////////////////////////////////////////////////////////////////
    if($_SESSION['Book'] == "1" )
    {

    	if(isset($_REQUEST['ID']) && isset($_REQUEST['btn']) && $_REQUEST['btn'] == "Del")  
        {   
            $id = $_REQUEST['ID'];
            $sql = "DELETE FROM product WHERE id_product = $id";
                $querydelete = mysql_query($sql);
                if(!$querydelete)
                {
                    echo "Error!!! <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }           
            if($querydelete)            
                echo "Đã xóa !!!. <a href='javascript: history.go(-1)'>Trở lại</a>";
            $biencheck = 1;         
        } 
    }
///////////////////////////////////////////////////////////////////////////////////////////	
//                                  XỬ LÝ CẬP NHẬT SÁCH                             ////
////////////////////////////////////////////////////////////////////////////////////////
    ///  FORM CẬP NHẬT                        
if($_SESSION['Book'] == "1" )
{   
    if(isset($_REQUEST['ID']) && isset($_REQUEST['btn']) && $_REQUEST['btn'] == "Up")  
    {   
        if($_REQUEST['btn'] == "Up")
            $id = $_REQUEST['ID'];
        $sql = "SELECT * FROM product WHERE id_product = $id";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        echo '
<form  action="xuly.php?ID=';echo $id;echo'&&Act=UpdateBook" method="post" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Cập nhật</h3>
        </div>
        <div class="modal-body">
            <table border="1" class="table table-striped">
                <tr>
                    <td>Nhan đề</td>
                    <td><input type="text" value="';echo $row['name'];echo'" class="form-control" required name="txt_NhanDe"></td>
                    <td >Giá</td>
                    <td>
                        <input type="text" value="';echo $row['gia'];echo'" class="form-control" required name="txt_Gia">
                    </td>
                </tr>
                <tr>
                    <td >Hình</td>
                    <td>                                       
                        <input name="img_Sach" type="file" id="imgInp" />
                        <img id="blah" src="images/books/';echo $row['image'];echo'" width="120px" height="170px" alt="your image" />
                    </td>
                    <td>Thể loại</td>
                    <td>
                        <select class="form-control" name="slc_TheLoai">';
                        $sql1 = "(select * from theloai where id_theloai = $row[id_theloai]) UNION (SELECT * FROM theloai 
                                WHERE id_theloai NOT IN ((select id_theloai from theloai where id_theloai = $row[id_theloai]))) 
                                        ";                              
                        $query1 = mysql_query($sql1);
                        while($arr = mysql_fetch_array($query1))
                        {                                       
                            echo "
                             <option value='".$arr['id_theloai']."'>$arr[tenloai]</option>
                            ";
                         }
                        echo'</select>
                    </td>
<!-- ------------------------  Select option thể loại sách-------------------------    -->
                </tr>
                <tr>
                    <td>Số lượng tồn</td>
                    <td><input value="';echo $row['so_luong'];echo'" class="form-control" type="text" required name="txt_SoLuong"></td>
                    <td>Tác giả</td>';
                    echo'<td>';
                    echo '<select class="form-control" name="slc_TacGia">';
                    $sql1 = "(select * from author where id_author = $row[id_author]) UNION (SELECT * FROM author 
                                WHERE id_author NOT IN ((select id_author from author where id_author = $row[id_author])))  
                                        ";                            
                    $query1 = mysql_query($sql1);
                    while($arr = mysql_fetch_array($query1))
                    {                                       
                        echo "
                            <option value='".$arr['id_author']."'>$arr[name]</option>
                        ";
                    }
                    echo'</select>
                                                            
                    </td>
<!--  ---------------------------------- Select option Tác giả -----------------------      -->
                </tr> 
                <tr>
                        <td>Ngày Upload</td>
                        <td><input value="';echo $row['ngay_upload'];echo'" class="form-control" type="date" name="dt_NgayUpload"></td>
                        <td>Nhà phát hành</td>';
                        echo'<td>';
                        echo '<select class="form-control" name="slc_NhaPhatHanh">';
                        $sql1 = "(select * from nha_phat_hanh where id_nhaphathanh = $row[id_nhaphathanh]) 
                                UNION (SELECT * FROM nha_phat_hanh 
                                WHERE id_nhaphathanh 
                                    NOT IN ((select id_nhaphathanh from nha_phat_hanh where id_nhaphathanh = $row[id_nhaphathanh])))    
                                        ";                              
                        $query1 = mysql_query($sql1);
                        while($arr = mysql_fetch_array($query1))
                        {                                       
                            echo "
                                  <option value='".$arr['id_nhaphathanh']."'>$arr[name]</option>
                                ";
                        }
                        echo'</select>
                                                            
                        </td>
<!-- --------------------------------  Select option nhà phát hành-----------------------         -->
                </tr>
                <tr>
                    <td >Thông tin mô tả </td>
                    <td colspan="3">
                        <textarea class="form-control" name="txt_TTMoTa" rows="5" cols="100" >';
                        echo $row['TTGioiThieu']; echo'
                        </textarea>
                    </td>
                                                            
                </tr> 
            </table>
        </div>
 <div class="modal-footer">
    <!-- Button -->
       <div class="form-group">
            <button type="submit" class="btn btn-success">Xác nhận</button>
            <a href="admin.php?ID=Books" class="btn btn-default btn-danger" >Close</a>
        </div>                                                   
</div>      
</div>  
</form>
        ';
        $biencheck = 1;
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////
///////                 XỬ LÝ CẬP NHẬT SÁCH
if(isset($_REQUEST['Act']) && isset($_REQUEST['ID']))
{
    if($_REQUEST['Act'] == "UpdateBook")
    {


    $id = $_REQUEST['ID'];
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
    ///     kiểm tra các dữ liệu
    
    //////////////////////////
    // Xử lý up hình lên server
        $output_dir = "C:/xampp/htdocs/bookstore/images/books/";

        if(isset($_FILES["img_Sach"]))
        {
            //Filter the file types , if you want.
            if ($_FILES["img_Sach"]["error"] > 0)
            {
                if($_FILES["img_Sach"]["error"] == 4)
                {
                    $sql = "UPDATE product SET 
                                `id_author`=   ".$id_tacgia.",
                                `name` =        '".$NhanDe."',
                                `so_luong` =    ".$SoLuong.",
                                `gia` =         ".$Gia.",
                                `ngay_upload` = '".$date_up."',
                                `id_nhaphathanh` = ".$id_NhaPhatHanh.",
                                `id_theloai` =  ".$id_theloai.",
                                `TTGioiThieu` = '".$TTMoTa."'
                        WHERE id_product = $id
                    ";
                }
                else
                    echo "Error Image: " . $_FILES["img_Sach"]["error"]."<br>";
            }
            else
            {
                $img_name = $_FILES['img_Sach']['name'];
                move_uploaded_file($_FILES["img_Sach"]["tmp_name"],$output_dir.$_FILES["img_Sach"]["name"]);
                $sql = "UPDATE product SET 
                        `id_author`=   ".$id_tacgia.",
                        `name` =        '".$NhanDe."',
                        `image` =       '".$img_name."',
                        `so_luong` =    ".$SoLuong.",
                        `gia` =         ".$Gia.",
                        `ngay_upload` = '".$date_up."',
                        `id_nhaphathanh` = ".$id_NhaPhatHanh.",
                        `id_theloai` =  ".$id_theloai.",
                        `TTGioiThieu` = '".$TTMoTa."'
                WHERE id_product = $id
            ";
            }

        }
        /// --> OK đã up lên server
    ///////////////////////////
    $result = mysql_query($sql);
    if($result) echo "Cập nhật thành công. <a href='javascript: history.go(-1)'>Trở lại</a>";
    else echo "Có lỗi phát sinh!!!";
    $biencheck = 1;
    }
    
}
//////////////////////////////////////////////////////////////////////////////////////////////	


    
    if($biencheck == 0)
	{
		header("Location:Admin.php?ID=mMember");
	}	                  
    
?>
