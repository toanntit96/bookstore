// JavaScript Document
function validate(frm){
	var ten = frm.txtUsername.value;
	if(ten == ""){
		
		window.alert("Ban chua nhap Username");
		return false;
	}
	
	ten = frm.txtPassword.value;
	if(ten == ""){
		window.alert("Ban chua nhap Password");
		return false;
		}
		
	ten = frm.txtFullname.value;
	if(ten == ""){
		window.alert("Ban chua nhap ten");
		return false;
		}

	ten = frm.txtBirthday.value;
	
	// Validate ngay thang theo dinh dang M/D/Y
	var reg = /^((((0[13578])|(1[02]))[\/]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\/]?(([0-2][0-9])|(30)))|(02[\/]?[0-2][0-9]))[\/]?\d{4}$/;
	
	var bien = reg.test(ten);
	if(!bien){
		window.alert("Ngay thang nam sinh sai");
		return false;
	}
	
	var email = frm.txtEmail.value;
	
	// Validate Email
	reg =  /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;
	bien = reg.test(email);
	if(!bien){
		window.alert("Nhập sai Email. Đề nghị nhập lại");
		return false;
	}
}