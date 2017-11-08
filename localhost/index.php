<script>
   function clicker(){
       var p = document.getElementById('txt');
       if(p.value==""){
           window.alert("Please, write text!");
           return false;
       }
       else{
           return true;
       }
   }

</script>

<?php
function get_values(&$id_email,$link,$id_of_writer){
  $query = "SELECT * FROM registered_users";
  $result = mysqli_query($link,$query) or die("Error connecting!");
  $rows = mysqli_num_rows($result);
    for($i = 0;$i<$rows;$i++){
        $row = mysqli_fetch_row($result);
        if($id_of_writer==$row[0]){
            $id_email=$row[1];
            return true;
        }
    }

}



$var = 5;
if(isset($_COOKIE['e-mail'])){
    echo "<div style='background-color:  #20d6be;'>";
    echo "<p align='center'><a href = 'autorisation.php'>Exit!</a></p>";
    echo "</div>";
    echo "<p style='text-decoration-color: orangered'>Hi user! Your e-mail is</p> ".$_COOKIE['e-mail'];
    echo "<html>";
    echo "<body background='background_photo.jpg'>";
    echo "<center>";
    echo "<form action = 'vxod_php1.php' method='post' onsubmit='return clicker()'>";
    echo "<textarea placeholder='write your post! :)' name='text' rows='3' cols='50' id='txt'>";
    echo "</textarea>";
    echo "<center>";
    echo "<input type='submit' value='Send'>";
    echo "</center>";
    echo "</form>";
    //дальше идут посты и бд!
    echo "<div style='word-wrap:break-word;'>";
    $host = "localhost";
    $database = "accounts";
    $user = "root";
    $password = "usedrugs3";
    $link = mysqli_connect($host,$user,$password,$database);
    $text;
    $id_email;
    $query = "SELECT * FROM post";
    $result = mysqli_query($link,$query) or die("Eroor connecting to database!");
    $rows = mysqli_num_rows($result);
    for($i = 0;$i<$rows;$i++){
        $row = mysqli_fetch_row($result);
        $text = $row[2];//Если что здесь задать кодировку!
        get_values($id_email,$link,$row[1]);
        echo "<div style = 'background-color: antiquewhite; height: 15%; width: 30%; margin-top: 5%;'>";
        echo "<div style = 'background-color: olive;'>";
        echo "Written by: ".$id_email;
        echo "</div>";
        echo $text;
        echo "</div>";
    }

    echo "</div>";


    echo "</center>";
    echo "<body>";
    echo "</html>";
}
else{
    $html1='
   <html>
    <head>
    <meta charset="utf-8";
    </head>
    <body>
    Вы не авторизованы!<br>
    Если у вас нету аккаунта - <a href="registration.php">создайте!</a> <br>
    Если у вас есть аккаунт - <a href="autorisation.php">войдите!</a>
    </body>
    </html>
    ';
}
echo $html1;
?>
