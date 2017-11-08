<?php
setcookie('e-mail','');
?>

<html>
<head>
    <meta charset="utf-8">

    <?php
    ?>
</head>
<style>
    #main_div{
        background-color:antiquewhite;
        height: 45%;
        width:35%;
        margin:auto;
        border-radius: 10px;
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
   function check_values(){
  if(document.getElementById('e-mail').value=="" || document.getElementById('password').value==""){
      alert("Please, enter your data");
      return false;
  }
      return true;
   }


</script>



<body background="background_photo.jpg">
<form action = 'autorisation_script.php' method="POST" id="frm" onsubmit="return check_values()">
    <div id="main_div">

        <div id="registration_text">
            <p id="reg_text">Вход</p>
        </div>
        <div id="registration_pole">

            <p id="registration_pole_text">E:MAIL:</p>
            <center> <input type="search" placeholder="Введите ваш e-mail" name="e-mail" id="e-mail" autocomplete="off"> </center> <br>


            <p id="registration_pole_text">PASSWORD<p>
            <center> <input type="password" id="password" name="pass" autocomplete="off"> </center> <br>


            <center><input type="submit" value="Войти"></center>
            <a href="registration.php">Нету аккаунта? Создайте!</a>

</form>
</body>
</html>


