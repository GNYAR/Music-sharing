function req(){

    var msg="";

    if( document.forms["form1"]["Name"].value == "" ){
        msg += "姓名不可空白!\n";
    }

    if( document.forms["form1"]["Acc"].value == "" ){
        msg += "帳號不可空白!\n";
    }

    if( document.forms["form1"]["PW"].value == "" ){
        msg += "密碼不可空白!\n";
    }

    var email = document.forms["form1"]["Mail"].value;
    var emailR = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
    if(  email == "" ){
        msg += "電子郵件不可空白!\n";
    }else if(email.search(emailR)==-1){
        msg += "電子郵件格式錯誤!\n";
    }

    if( document.forms["form1"]["Phone"].value == "" ){
        msg += "手機不可空白!\n";
    }
    
    if( msg == "" ){
        alert("確認送出");
        return true;
    }else{
        alert(msg);
        return false;
    }
}