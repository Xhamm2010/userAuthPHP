<?php
session_start();

logout();

function logout(){
 
if ($_SESSION['email'] != FALSE) {
    session_unset();
    session_destroy();
    header("Location: ../forms/login.html");
   # code...
}else{

    echo "<h1>Not Successful</h1>";
}
echo "<br>";

}

echo "HANDLE THIS PAGE";
