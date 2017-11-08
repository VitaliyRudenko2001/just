<?php
setcookie('e-mail',$_POST['e-mail'],time()+3600,'/');
function check_mail($mail,$link){
    $query = "SELECT * FROM registered_users";
    $result = mysqli_query($link,$query) or die ("Ошибка подключения: ".mysqli_error($link));
    $rows = mysqli_num_rows($result);
    for($i = 0;$i<$rows;$i++){
        $row=mysqli_fetch_row($result);
        if($mail==$row[1])
            return false;
    }
    return true;
}



//Подключения к базе данных
$host = "localhost";
$database = "accounts";
$user = "root";
$password = "usedrugs3";
$link = mysqli_connect($host, $user, $password,$database)
or die("error connecting to mysql server");
//закончили подключения к базе

//получения значения с формы
$email = htmlentities(mysqli_real_escape_string($link,$_POST['e-mail']));
$pass = htmlentities(mysqli_real_escape_string($link,$_POST['pass']));
//закончили получения значения формы

//проверяем, существует ли пользователь с таким же емейлом в базе данных mysql
$checked_mail=check_mail($email,$link);
//закончили проверку
//если не существует - добавляем пользователя в базу!
if($checked_mail==true) {
    $action = "INSERT INTO registered_users VALUES (NULL,'$email','$pass')";
    $result = mysqli_query($link, $action) or die ("Ошибка!" . mysqli_error($link));

    echo "<html title=\"Моя крутая страница\">
               <head>
               <meta charset=\"utf-8\">
               <meta http-equiv='refresh' content=\"3;URL=index.php\">
               </head>
              <body>
               <br>
               Вы успешно зарегестрировались <br>
               Перенаправления на главную страницу через 3 секунды
              </body>
              </html>";

}
//если сущесвует - не добавляем
else{
    setcookie('e-mail','');
    echo "<html title=\"Моя крутая страница\">
               <head>
               <meta charset=\"utf-8\">
               <meta http-equiv='refresh' content=\"3;URL=registration.php\">
               </head>
              <body>
               <br>
              Пользователь с таким e-mail уже существует<br>
              попробуйте еще раз через 3 секунды
              </body>
              </html>";
}
mysqli_close($link);
?>



