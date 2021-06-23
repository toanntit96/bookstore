
        <?php
				if(isset($_GET['ID'])){
					
					if($_GET['ID'] == 'mUpload' || $_GET['ID'] == 'mUpload'){
						
						//id_product name image gia so_luong thuoc_menu ngay_upload id_member
					
						echo '<form action="xuly.php" method="post"><div><table id="divtable" cellspacing = "25px">';
							echo'<thead>';
								echo'<tr>';
								
									echo'<td class = "thead">Delete</td>'; 
									//echo'<td class = "thead">ID_product</td>'; 
									echo'<td class = "thead">Name</td>';
									echo'<td class = "thead" style="width: 3em;">Gia</td>';
									echo'<td class = "thead">So luong</td>';
									echo'<td class = "thead">Thuoc menu</td>';
									echo'<td class = "thead">Ngay upload</td>';
									echo'<td class = "thead">Nguoi Upload</td>';
									
								echo'</tr>';
							echo'</thead>';
							
							echo'<tbody>';
								
								mysql_select_db("demo", $connect);
								
								$sql = "select id_product from product";
								mysql_query("SET NAMES 'utf8'");
								$query = mysql_query($sql);
								$total =  mysql_affected_rows();
								$sotrang = 0;
								if(isset($_GET['page'])){
								
									$sotrang = $_GET['page'];
									if($sotrang <= 0 ){
										$sotrang = 1;
										}
								
								}
								$limitdisplay = 10;
								$start = $sotrang * $limitdisplay ;
								//for($i = 1; i < $total; i++){
										
										$sql = "select * from product where thuoc_menu = 1 limit $start, $limitdisplay";
										mysql_query("SET NAMES 'utf8'");
										$query = mysql_query($sql);
										//$start = $start + $limit + 1;	
										
										while($row = mysql_fetch_array($query)){
										
											echo'<tr>';
											echo'<td>'; echo'<input type = "checkbox" name = "checkdeleteupload[]" value = "';
												echo $row['id_product'];  echo'">'; echo'</td>';
												
											//echo'<td>';
											echo'<input type="hidden" name = "indentify[]" value = "';echo $row['id_product']; echo'">';
											//echo'</td>';
											
											echo'<td>'; echo $row['name']; echo'</td>';
											
											echo'<td>'; echo $row['gia']; echo'</td>';
											
											echo'<td>'; echo $row['so_luong']; echo'</td>'; 
											
											echo'<td>'; echo '<input type="text" name="changemenu[]" style="width: 4em;" placeholder="Menu" 															 												'; echo'"</input></td>'; 
											
											echo'<td>'; echo $row['ngay_upload']; echo'</td>';
											echo'<td>'; 
											
												$idmember = $row['id_member'];
												$selectname = "select username from member where id_member = '$idmember' ";
												mysql_query("SET NAMES 'utf8'");
												$queryname = mysql_query($selectname);
												$ketqua = mysql_fetch_array($queryname);
												
												echo $ketqua['username']; echo'</td>';
											echo'</tr>';
										
										}
									//}
								
								
								
								
							echo'</tbody>';
												
						echo'</table></div>';				
						echo '<br><input type="submit" class="xoa" value ="Xóa và lưu thay đổi"> </form>';
						echo '<style> 
										
										.xoa{
											height: 3em;
											font-family: Helvetica Neue;
											background-color: red;
											color: white;
											margin-left: 3em;
										}
						
									</style>';
						include('phantrang.php');
						
					}
					
					
					
					
					if($_GET['ID'] == 'validate'){
						
						
						 if(isset($_POST['txtUsernameadmin']) ){
				
							if(isset($_POST['txtPasswordadmin']) ){
					
								$usernameadmin = $_POST['txtUsernameadmin'];
								$passworkadmin = md5($_POST['txtPasswordadmin']);
                    
                   				if(!$usernameadmin || !$passworkadmin){
                        			echo 'Are you carzy !!!. Should enter data';
                   				} 
                   	 			else{
									mysql_select_db("demo", $connect);	
                        			$sql = "INSERT INTO admin(username, password) VALUES ('$usernameadmin', '$passworkadmin')";
									mysql_query("SET NAMES 'utf8'");
                        			$query = mysql_query($sql);
                        
                        			if(!$query){
                            			echo "Error: cannot save on database. <a href = 'Admin.php?ID=addadmin'>Do it again </a>";
                        			}
                        			else{
                            			echo "Sucessful. Click <a href = 'trangchu.php'>here</a> back to home page";
									}
		
				   				}
                			}  			
						}
						
					}
					
					
					
					
					if($_GET['ID'] == 'addadmin'){
						
						echo
							' <form action = "Admin.php?ID=validate" method="post"> 
								 <div id="addadmin" >
							
       						 		<p>Username</p><input type="text" name="txtUsernameadmin"><br><br>
        
       						 		<p>Password</p><input type="password" name="txtPasswordadmin"><br><br>
             
            				 		<input type="submit" value="Thêm Admin">
								
								</div>
							 </form>';
					}
					
					if($_GET['ID'] == 'mMember'){
						echo '<form action="xuly.php" method="post"><div><table id="divtable" cellspacing = "25px">';
							echo'<thead>';
								echo'<tr>';
								
									echo'<td class = "thead">Delete</td>';
									echo'<td class = "thead">id_member</td>'; 
									echo'<td class = "thead">username</td>';
									echo'<td class = "thead">email</td>';
									echo'<td class = "thead">fullname</td>';
									echo'<td class = "thead">birthday</td>';
									echo'<td class = "thead">sex</td>';
									echo'<td class = "thead">level</td>';
									
								echo'</tr>';
							echo'</thead>';
							
							echo'<tbody>';
								
								mysql_select_db("demo", $connect);
								$sql = "select * from member";
								//$query = mysql_query($sql);
								
								$total =  mysql_affected_rows();
								$sotrang = 0;
								if(isset($_GET['page'])){
								
									$sotrang = $_GET['page'];
								
								}
								$limitdisplay = 10;
								$start = $sotrang * $limitdisplay ;
								//for($i = 1; i < $total; i++){
										
										$sql = "select * from member limit $start, $limitdisplay";
										mysql_query("SET NAMES 'utf8'");
										$query = mysql_query($sql);
								
								
								while($row = mysql_fetch_array($query)){
										
										echo'<tr>';
										echo'<td>'; echo'<input type = "checkbox" name = "checkdelete[]" value = "'; echo $row['id_member'];  echo'">'; echo'</td>';
										echo'<td>'; echo $row['id_member']; echo'</td>';
										echo'<td>'; echo $row['username']; echo'</td>';
										echo'<td>'; echo $row['email']; echo'</td>';
										echo'<td>'; echo $row['fullname']; echo'</td>'; 
										echo'<td>'; echo $row['birthday']; echo'</td>'; 
										echo'<td>'; echo $row['sex']; echo'</td>';
										echo'<td>'; echo $row['level']; echo'</td>';
										echo'</tr>';
										
								}
								
								
							echo'</tbody>';
												
						echo'</table></div>';				
						echo '<br><input type="submit" class="xoa" value ="Xoa nguoi dung">';
						echo '<style> 
										
										.xoa{
											height: 3em;
											font-family: Helvetica Neue;
											background-color: red;
											color: white;
											margin-left: 3em;
										}
						
									</style>';
						echo'</form';
					}
	
				}

		?> 
	   
   