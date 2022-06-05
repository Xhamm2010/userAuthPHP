<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($username, $email, $password);
}





function registerUser($username, $email, $password)
{

    $handle = fopen('../storage/users.csv', 'a'); //open file in read mode 
    $no_row = count(file("../storage/users.csv"));
    //converting array into string
    $data = $no_row.",".$username.",".$email.",".$password;
    fwrite($handle, $data."\n"); //write to file
    fclose($handle); //close file

    echo "<br><h1>User Successfully Registered<h1><br>";
    # code...
}
