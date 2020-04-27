<?php
    //Get values pass from form in login.php file
    $username = $_POST['user'];
    $password = $_POST['pass'];

    //connect to the server and select database
    $connect=mysqli_connect("localhost","root","");
    mysqli_select_db($connect,"login");

    //to prevent MySQL Injection
    $username=stripcslashes($_POST['user']);
    $password=stripcslashes($_POST['pass']);
    $username=mysqli_real_escape_string($connect,$_POST['user']);
    $password=mysqli_real_escape_string($connect,$_POST['pass']);

    //query the db for user
    $result=mysqli_query($connect,"select * from users where username = '$username' and password = '$password'") 
            or die("Failed to query database".mysqli_error($connect));
    $row=mysqli_fetch_array($result);
    if($row['username']==$username && $row['password']==$password){
        echo "Login success!!! Welcome ",$row['username'];
        header('Location: cart.html');
    } else{
        echo "Failed to login!";
    }

?>