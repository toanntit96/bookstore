<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>BookStore</title>
        <link rel="stylesheet"href="css/style1.css" type="text/css"/>
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
        <meta http-equiv="content-type"content="text/http; charset=UTF-8">
        <script src="jquery.js"></script>
       <script type="text/javascript" src="slider.js"></script>   
    </head>
    <body>
        <div id="all">
            <!-- phan top -->
                 
            <div id="top">
                <div id="top-left">
                    <ul>
                        <li><a href="#"><img src="images/google.png"></a></li>
                        <li><a href="#"><img src="images/facebook.png"></a></li>
                        <li><a href="#"><img src="images/zing.png"></a></li>
                        <li><a href="#"><img src="images/yahoo.png"></a></li>
                    </ul>
                </div>
                <div id="top-right">
                   
 <ul>
                        <li><img src="images/login.png"></li>
                        <li><a href="dangnhap.php">Đăng nhập</a></li>
                        <li><a href="dangky.php">Đăng kí</a></li>
                    </ul>
                   
                </div>   
            </div> 
            
            <!-- phan header -->
               
            <div id="header">
                <div style="float: left;width: 250px;height: 54px;margin: 50px 0 0 10px;"><a href="index.php"><img src="images/logo.png" width="250" height="80" alt="logo"></a></div>
                <div style="float: right;width: 400px;height: 93px;">
                    <div id="shopcart">
                        <img src="images/shopcart.png">
                        <div id="info-cart">
                            <?php
	$ok=1;
	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $k=>$v)
		{
			if(isset($k))
			{
			$ok=2;
			}
		}
	}

	if ($ok != 2)
	 {
		echo '<p>0 sản phẩm</p>';
	} else {
		$items = $_SESSION['cart'];
		echo '<p><a href="cart.php">'.count($items).' sản phẩm</a></p>';
	}
?> 
                           
                        </div>
                    </div>
                </div>
                <div style="float: right;width: 400px;height: 60px;">
                  <div id="phone">
                       <div id="ship">
                      
                    </div> 
                    </div>
                    
                    <div id="search-box">
                       <form action="timkiem.php" id="search-form" method="get">
                            <input type="text" name ="search" placeholder="search for here..." id="textsearch"/>
                            <button type="submit" name ="ok" value ="search" id="search-button"></button>
                        </form>
                    </div>
                    
                </div>
            </div>
            </div>
            <!-- phan menu -->
              <div id="menu">
                <ul>
                    <img src="images/home.png">
                    <li style="border-left: 1px dotted #999999;"><a href="index.php">DANH MỤC SÁCH</a></li>
                   
                </ul>
            </div>
            <!-- phan slider -->
                   <div id="abs">
                      <div id="menu-left">
                        <ul>
                            <li>   <a href="#">Kho Sách Giảm Giá</a>
                                
                            </li>
                            <li> <a  href="#">Sách Bán Chạy </a>
                               
                            </li>
                             <li>   <a href="#">Sách Mới Phát Hành</a></li>
                              <li>   <a href="#">Sách Sắp Phát Hành</a></li>
                               <li> <a href="#">Sách Ngoại Văn</a>
                               <ul  class="menu1" id="menu1" >
                                 <li> <a href="#">Literature & Fiction</a>
                                </li> 
                                      <li> <a href="#">Literature & Fiction</a>
                                
                                      <li> <a href="#">Literature & Fiction</a>
                                 
                                            
                                </ul></li>
                                <li>   <a href="#">Sách Kinh Tế</a>
                                 <ul class="menu1" id="menu2" style="border:1px #CCCCCC dotted; ">
                           <a href="#"></a>
                           <li> <a href="#"></a></li>
                                    <li style="float:left;> <a href="#">DANH MỤC</a>
                                    <ul><li> <a href="#">Marketing-Bán Hàng</a></li>
                                    <li> <a href="#">Ngoại Thương</a></li>
                                    <li> <a href="#">Nhân Sự & Làm Việc</a></li>
                                     <li> <a href="#">Nhân Vật & Kinh Doanh</a></li>
                                    <li> <a href="#">Phân Tích & kinh Tế</a></li>
                                    <li> <a href="#">Quản Trị-Lãnh Đạo</a></li>
                                     <li> <a href="#">Tài Chính & Tiền Tệ</a></li>
                                    <li> <a href="#">Tài Chính - Kế Toán</a></li>
                                    <li> <a href="#">Văn Bản Luật</a></li>
                                    <li> <a href="#">Đầu Tư & Chứng Khoán</a></li>
                                     
                                    </ul></li>
                                    <li  style="float:left;"> <a href="#">TÁC GIẢ</a>
                                     <ul><li> <a href="#">Philip Kotler</a></li>
                                    <li> <a href="#">Robert T.Kiyosaki</a></li>
                                    <li> <a href="#">Brane Tracy</a></li>
                                     <li> <a href="#">Sharon L.</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                    <li> <a href="#">4</a></li>
                                     
                                    </ul></li>
                                     <li  style="float:left;"> <a href="#">NHÀ PHÁT HÀNH</a>
                                      <ul><li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                    <li> <a href="#">4</a></li>
                                     
                                    </ul></li>
                                    
                                </ul></li>
                                 <li>   <a href="#">Sách Văn Học Trong Nước</a>
                                 <ul class="menu1" id="menu3" >
                                <a href="#"></a>
                                    <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">5</a></li>
                                            
                                            
                          </ul></li>
                                  <li>   <a href="#">Sách Văn Học Nước Ngoài</a>
                                  <ul class="menu1" id="menu4" >
                                 <a href="#"></a>
                                    <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">5</a></li>
                                            
                                </ul></li>
                                  <li>   <a href="#">Sách Thường Thức - Đời Sống</a>
                                  <ul class="menu1" id="menu5" >
                               <a href="#"></a>
                                    <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">5</a></li>
                                            
                                            
                                </ul></li>
                                   <li>   <a href="#">Sách Thiếu Nhi</a>
                                    <ul class="menu1" id="menu6" >
                               <a href="#"></a>
                                    <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">5</a></li>
                                            
                                            
                                </ul></li>
                                    <li>   <a href="#">Sách Phát Triển Bản Thân</a>
                                    <ul class="menu1" id="menu7" >
                                <a href="#"></a>
                                    <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">5</a></li>
                                            
                                            
                                </ul></li>
                                     <li>   <a href="#">Sách Tin Học - Ngoại Ngữ</a>
                                     <ul class="menu1" id="menu8" >
                                <a href="#"></a>
                                    <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">5</a></li>
                                            
                                            
                                </ul></li>
                                      <li>   <a href="#">Sách Chuyên Ngành</a>
                                      <ul class="menu1" id="menu9" >
                                <a href="#"></a>
                                    <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">5</a></li>
                                            
                                </ul></li>
                                       <li>   <a href="#">Sách Giáo Khoa - Giáo Trình</a>
                                       <ul class="menu1" id="menu10" >
                                <a href="#"></a>
                                    <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">5</a></li>
                                            
                                            
                                </ul></li>
                                        <li>   <a href="#">Tạp Chí</a>
                                        <ul class="menu1" id="menu11" >
                                 <a href="#"></a>
                                    <li> <a href="#">2</a></li>
                                    <li> <a href="#">3</a></li>
                                    <li> <a href="#">4</a></li>
                                     <li> <a href="#">5</a></li>
                                            
                                            
                                </ul></li>
                        </ul>
                        </div>
                       <div id="slider">
                      
                        <ul>
                               <li><a href="#"> <img src="images/slide1.jpg"  /></a></li>
                              <li><a href="#"><img src="images/slide2.jpg" /></a> </li>
                            <li><a href="#"> <img src="images/slide3.jpg" /></a> </li>
                              <li><a href="#"> <img src="images/slide4.jpg" /></a> </li>
                        </ul>
                      </div>
               
              
               
  
           </div>
        
    
         
            <!-- phan main -->
            <div id="main">
                <div id="main-left" >
           
  
<?php
	//connent to database
	include('ketnoi.php');
?>
	<div id="box">
		<form method="post" enctype="multipart/form-data">
			<?php
				if(isset($_FILES['video'])){
					$name=$_FILES['video']['name'];
					$type=explode('.',$name);
					$type=end($type);
					$size=$_FILES['video']['size'];
					$random_name=rand();
					$tmp=$_FILES['video']['tmp_name'];
					
					if($type!='mp4' && $type!='MP4' && $type!='flv' && $type!='mkv'){
						$message='Video Format Not Supported.';
					}else{
						move_uploaded_file($tmp,'videos/'.$random_name.'.'.$type);
						mysql_query("INSERT INTO videos VALUES('','$name','$random_name.$type')");
						$message='Successfully Uploaded';
					}
						echo $message."<br/><br/>";
				}
			?>
			Select Video : <br/>
			<input type="file" name="video"/><br/>
			<input type="submit" value="Upload" class="submit"/>
		</form>
	</div>
	<div id="box">
		<?php
			$query=mysql_query("SELECT `id`,`name`,`url` FROM videos");
			while($run=mysql_fetch_array($query)){
				$video_id=$run['id'];
				$video_name=$run['name'];
				$video_url=$run['url'];
		?>
			<a href="view.php?video=<?php echo $video_url; ?>">
			<div id="url">
				<?php echo $video_name; ?>
			</div>
		
		
		<?php	
			}
		
		?>


              
                 </div>
               
               
                
             
             <!-- phan footer-->
            <div id="footer">             <div id="char"><h4 >Copyright © Thiết kế và lập trình website</h4>
         <h5 style="font-size:20px">Hà Nội University of science and technology <br> Điện thoại 1900 6401</h5>
            </div>
              
</div>
            
        </div>
        
    </body>
</html>
