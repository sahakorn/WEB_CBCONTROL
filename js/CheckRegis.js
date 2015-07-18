// JavaScript Document
var temp;
function Check_name(name) {
    if (name.length > 0) {
        if (!name.match(/^[ก-ฮa-zA-Z" "]+$/)) {
            alert("ชื่อของคุณต้องประกอบด้วยตัวอักษร เท่านั้น");
            return false;
        }
        else { return true; }
    }
}
function CheckEmail(email) {
    if (email.length > 0) {
        if (email.indexOf(' ') >= 0) {
            alert("email ห้ามมีเว้นวรรค");
            return false;
        }
        else if (email.indexOf('@') == -1) {
            alert("รูปแบบ email ของคุณไม่ถูกต้อง");
            return false;
        }
    }
    else {
        return true;
    }
}
function Pass(pass) {
    alert(password.id);
    //if(temp.indexOf('
}
function CheckPass(repass) {
    if (pass.value != repass) {
        alert("พาสเวิร์สไม่ตรงกัน");
    }

}
function CheckUser(username) {
    if (username.length > 0) {
        if (username.indexOf(' ') >= 0) {
            alert("username ห้ามมีเว้นวรรค");
            return false;
        }
        else if (!username.match(/^[ก-ฮa-z0-9_]+$/))
            alert("Username ควรมีอักษร a-z หรืประกอบด้วยตัวเลข");
        return false;
    }
    else { return true; }
}
function Checkbtn(btn) {
    if (name.value == "" || email.value == "" || pass.value == "" || username.value == "") {
        alert("กรุณากรอกข้อมูลให้ครับ ทุกช่อง ");
        return false;
    }
    else { return true; }
	
}