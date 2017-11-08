<?php
setcookie('e-mail',$_POST['e-mail'],time()+3600,'/');
    function check_mail($mail,$link,$pass){
        $query = "SELECT * FROM registered_users";
        $result = mysqli_query($link,$query) or die ("Ошибка подключения: ".mysqli_error($link));
        $rows = mysqli_num_rows($result);
        for($i = 0;$i<$rows;$i++){
            $row=mysqli_fetch_row($result);
            if($mail==$row[1]) {
                if($pass==$row[2])
                    return true;
            }
        }
        return false;
    }




    $host = "localhost";
    $database = "accounts";
    $user = "root";
    $password = "usedrugs3";
    $link = mysqli_connect($host, $user, $password,$database)
    or die("error connecting to mysql server");



    $email = htmlentities(mysqli_real_escape_string($link,$_POST['e-mail']));
    $pass = htmlentities(mysqli_real_escape_string($link,$_POST['pass']));



    $checked_mail=check_mail($email,$link,$pass);
    mysqli_close($link);
    if($checked_mail==true) {
        echo "Вы успешно авторизовались!";
        echo "<html title=\"Моя крутая страница\">
               <head>
               <meta charset=\"utf-8\">
               <meta http-equiv='refresh' content=\"3;URL=index.php\">
               </head>
              <body>
               <br>
               Перенаправления на главную страницу через 3 секунды!
              </body>
              </html>";
    }

    else {
        setcookie('e-mail','');
        echo "<html title=\"Моя крутая страница\">
               <head>
               <meta charset=\"utf-8\">
               <meta http-equiv='refresh' content=\"3;URL=autorisation.php\">
               </head>
              <body>
               <br>
               Вы неверно ввели пароль, попробуйте еще раз через 3 секунды
              </body>
              </html>";
    }

    ?>



