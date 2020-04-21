<?php
$mysql = new mysqli('localhost','root','','');
$mysql->set_charset('utf8');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['username']) && isset($_POST['username']))
        $username = htmlspecialchars($_POST['username']);
}else{
    header("location:login.php");
}
    if(!empty($_POST['password']) && isset($_POST['password'])){
        $password = htmlspecialchars($_POST['password']);
    }else{
        header("location:login.php");
    }

    $password = md5($password);
    $query = "SELECT id FROM users WHERE email ='$username' AND password ='$password' "; //11
    $execute= $mysql->query($query);
    if ($execute->num_rows === 1 ) {
        $_SESSION['user'] = $execute->fetch_assoc()["id"]; // 11
        header("location:http://localhost/admin.php");
    }
    else{
        header("location:http://localhost/startupbusiness/login.html");
        die;
    }


