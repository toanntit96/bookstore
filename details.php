<?php session_start();?>
<?php $page_title='Book Store';
include('templates/header.inc');
$connect = mysql_connect("localhost","root", "");
mysql_select_db("bookstore", $connect);
mysql_query("SET NAMES 'utf8'");
?>
    <body>
        <div id="all">
            <!-- phan top -->
                 
            <div id="top">
                <div id="top-right">
                   
   <?php
if (isset($_SESSION['username'])){
echo 'Xin chào: <i style="color:#00F;"> '.$_SESSION['username']." &nbsp"; 
echo '  &nbsp<a href="logout.php">Đăng xuất</a>';
}
else{
echo  '<ul>
                        <li><img src="images/login.png"></li>
                        <li><a href="dangnhap.php">Đăng nhập</a></li>
                        <li><a href="dangky.php">Đăng kí</a></li>
                    </ul>';

}?>
                   
                </div>   
            </div> 
            
            <!-- phan header -->
               
            <div id="header">
                <div style="float: left;width: 250px;height: 54px;margin: 40px 0 0 10px;"><a href="index.php"><img src="images/logo.png" width="250" height="80" alt="logo"></a></div>
                <div style="float: right;width: 400px;height: 93px;">
                    <div id="shopcart">
                        <img src="images/shopcart.png">
                        <div id="info-cart">
                          
                           
                        </div>
                    </div>
                </div>
                <div style="float: right;width: 400px;height: 60px; margin: 30px 0px 0px 0px;">
                  <div id="phone">
                       <div id="ship">
                      
                    </div> 
                    </div>
                    
                   
                    
                </div>
            </div>
            </div>
            <!-- phan menu -->
            <?php include('templates/menu_left.php');?>
            
            <?php

						$idsanpham = $_GET['id'];
						$sql = "SELECT product.name AS TenSP, product.gia, author.name AS TenTG, nha_phat_hanh.name AS TenNPH, product.TTGioiThieu\n"
    . "FROM product,author,nha_phat_hanh\n"
    . "WHERE product.id_product = $idsanpham AND product.id_author = author.id_author AND product.id_nhaphathanh = nha_phat_hanh.id_nhaphathanh";
						$sql2 = "SELECT image, so_luong FROM product WHERE id_product = $idsanpham";
						
						
						if(!($query = mysql_query($sql))){
							exit;
							
						};
						
						if(!($query2 = mysql_query($sql2))){
							
							exit;
						}
						
						$row = mysql_fetch_array($query);
						$row2 = mysql_fetch_array($query2);
						
					?>
         
            <!-- phan main -->
            <div id="main">
           		 <!-- phan main_left-->
                 
                <div id="main-left" >
					<div class="titlebook">
                    	<div style="margin-left:0px;"> <span>Thông tin chi tiết quyển sách</span> </div>
						<div style="margin-top:50px;" id = "images">
                    	
						<?php
							 echo '<img src="images/books/'; echo $row2['image'];
							 echo'"width= 300 height=500>';
						 ?>
						 						 
						</div>
				 
                 	
						<div style="margin-top:50px; margin-left:100px;" id = "info">
                    
						<form action = "" method = "post">
						 	<ul>
							 
							 	<li class="details"><b>Tên Sản Phẩm:</b>  <?php echo $row['TenSP'];?>
                                
                                </li ><br>
                                
							 	<li class="details"> <b>Giá Bán:</b> <?php echo $row['gia'];?> Nghìn VNĐ
                                
                                </li><br>
                                
							 	<li class="details"><b>Nhà Phát Hành:</b> <?php echo $row['TenNPH'];?> 
                                
                                </li><br>
                                
							 	<li class="details"><b>Tác Giả:</b> <?php echo $row['TenTG'];?>
                                
                                </li ><br>
							 	
                                <li class="details"><b> Tình Trạng:</b>
                                 <?php 
								 	if($row2['so_luong'] > 0)
									 echo 'Còn hàng';
									else
									 echo 'Hết hàng';
								 ?>
                                </li><br>   
                                
                                <li class="details" ><b> Miêu tả: </b> <br>  <?php echo $row['TTGioiThieu'] ?>
                                </li><br>
							 
							 	<li> 
                                <?php 
									echo '<a href="index.php?id='; echo $idsanpham; echo '#dh"><button class="btn btn-success" style="height: 55px; width: 120px; background-color: blue; color: red; color: white;margin-top: 30px; margin-left: 100px;" value="Đặt hàng ngay" type="button"> Đặt hàng ngay </button> </a>';
								?> 
                                 </li>
	 
						 	</ul>
						</form>
						
						
					</div>
				 				 
				 </div>
                    </div>
                    <a name="next"></a>
                  
             <!-- phan footer-->
           <?php include('templates/footer.inc');?>