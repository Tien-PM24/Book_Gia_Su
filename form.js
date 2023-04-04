function Check_Name() {
    var name= document.getElementById("Name").value;
    var erro=document.querySelector(".erro_name")
    var nameRegex = /^[a-zẠ-ZÀ-ÿ]+(([',. -][a-zẠ-ZÀ-ÿ ])?[a-zẠ-ZÀ-ÿ]*)*$/;
    if (!nameRegex.test(name)) {
    erro.innerHTML="Tên không hợp lệ";
     return false;
   } else {
     erro.innerHTML="";
     console.log(name)
     return true;
   }
 }
 function Check_Email(){
    var email=document.querySelector("#Email").value;
    var erro=document.querySelector(".erro_email");
    var emailRegex = /^\S+@\S+\.\S+$/;
    if (!emailRegex.test(email)) {
      erro.innerHTML="Email không hợp lệ"
      return false;
    }else {
      erro.innerHTML="";
      return true;
    }
 }

 function Check_Address(){
  var Address=document.querySelector("#Address").value;
  var erro=document.querySelector(".erro_address")
  var addressRegex = /^[a-zA-Z0-9\s,'-]*$/;
  if (!addressRegex.test(Address)) {
    erro.innerHTML="Địa chỉ không hợp lệ!";
    return false;
  }else {
    erro.innerHTML="";
    return true;
  }
 }

 function Check_Passwork(){
  var password=document.querySelector("#Passwork").value;
  var erro=document.querySelector(".erro_password");
  var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[0-9a-zA-Z@$!%*?&]{8,}$/;
  if (!passwordRegex.test(password)) {
    erro.innerHTML="Mật khẩu không hợp lệ! Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường và số.";
    return false;
  }else {
    erro.innerHTML="";
    return true;
  }
 }

 function Check_Confirm(){
  var pass=document.querySelector("#Passwork").value;
  var pass_conf=document.querySelector("#Confirm").value

  if(pass != pass_conf){
      var erro=document.querySelector(".erro_confirm").innerHTML="Không chính xác"
      return false
  }else {
    erro.innerHTML="";
    return true;
  }
 }
