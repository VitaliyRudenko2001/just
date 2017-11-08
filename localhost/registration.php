<?php
setcookie('e-mail','');
?>
<html>
<head>
    <meta charset="utf-8">
<title>Open Server</title>
</head>
<style>
#main_div{
    background-color:antiquewhite;
    height: 45%;
    width:35%;
    margin:auto;
}
#registration_text{
    height: 20%;
    background-color:deepskyblue;
}
#reg_text{
    color:white;
    text-align: center;
    font-size: 200%;
    padding-top: 5%;
    text-shadow: 0px 0px 6px rgba(255,255,255,0.7);

}
#registration_pole_text{
   text-align: center;
    text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
    0px 8px 13px rgba(0,0,0,0.1),
    0px 18px 23px rgba(0,0,0,0.1);

}
#e-mail{
    text-align: center;

}



</style>
<script>
    function f_click(){
        var p=/^[a-z0-9_\.\-]{6,16}$/i;
        if(document.getElementById('e-mail').value=="" || document.getElementById('password').value==""){
            window.alert("Enter please your data");
            return false;
        }
        if(!p.test(document.getElementById('password').value)) {
            window.alert("Неверный пароль");
            return false;
        }
        p = /^[a-z0-9_\.\-]+@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;
        if(!p.test(document.getElementById('e-mail').value)){
            window.alert("неверный емейл!");
            return false;
        }
return true;

    }

</script>

<body background="background_photo.jpg">

<form action = "registration_script.php" name="frm" id="frm" method="POST" onsubmit="return f_click()">
    <div id="main_div">

    <div id="registration_text">
     <p id="reg_text">Регистрация</p>
    </div>
      <div id="registration_pole">

       <p id="registration_pole_text">E:MAIL:</p>
         <center> <input type="search" placeholder="Введите ваш e-mail" name="e-mail" id="e-mail" autocomplete="off"> </center> <br>


          <p id="registration_pole_text">PASSWORD<p>
          <center> <input type="password" id="password" name="pass" autocomplete="off"> </center> <br>


          <center><input type="submit" value="Зарегестрироваться"></center>
<a href="autorisation.php">Есть уже аккаунт? Войдите!</a>


      </div>
    </div>
</form>
</body>
</html>
