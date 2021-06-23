<?php
    $ketnoi['Server']['name'] = 'localhost'; //Tên server, nếu dùng hosting free thì cần thay đổi
    $ketnoi['Database']['dbname'] = "bookstore"; //Đây là tên của Database
    $ketnoi['Database']['username'] = 'root'; //Tên sử dụng Database
    $ketnoi['Database']['password'] = '';//Mật khẩu của tên sử dụng Database
    $connect = mysql_connect(
        "{$ketnoi['Server']['name']}",
        "{$ketnoi['Database']['username']}",
        "{$ketnoi['Database']['password']}")
    or
        die("Không thể kết nối database");
    mysql_select_db("{$ketnoi['Database']['dbname']}")
    or
        die("Không thể chọn database");
	mysql_query("SET NAMES 'utf8'");
?>