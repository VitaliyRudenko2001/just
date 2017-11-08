<?php
function now_id(&$id,$link){
    $query = "SELECT * FROM registered_users";
    $result=mysqli_query($link,$query) or die("Ошибка подключения!");
    $rows=mysqli_num_rows($result);
    for($i = 0;i<$rows;$i++){
       $row=mysqli_fetch_row($result);
        if($_COOKIE['e-mail']==$row[1]){
            $id=$row[0];
            return true;
        }

    }
}

$host="localhost";
$database="accounts";
$user="root";
$password="usedrugs3";

$link=mysqli_connect($host,$user,$password,$database) or die("error connecting to mysql server");

$text = htmlentities(mysqli_real_escape_string($link,$_POST['text']));
$data = date('l jS \of F Y h:i:s A');
$id;
now_id($id,$link);
$query="INSERT INTO post VALUES (NULL,'$id','$text','$data')";
$result = mysqli_query($link,$query) or die ("It seems we got error!");
mysqli_close($link);
header("Location:index.php");
exit();
?>