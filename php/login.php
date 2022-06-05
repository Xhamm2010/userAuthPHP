<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    loginUser($email, $password);
}


function loginUser($email, $password)
{
    //checking if user input matches that of csv file
    $handle = fopen('../storage/users.csv', 'r+');
    while (!feof($handle)) {
        $store = fgetcsv($handle);
        if ($store) {
            if (($store[3] == $password) && ($store[2] == $email)) {
                echo "<h1>Login Was Sucessful</h1>";
                session_start();
                $_SESSION['email'] = $email;
                header("Location: ../dashboard.php");
                # code...
            } else {
                echo "<h1>Login Was Not Sucessful</h1>";
                 header("Location: ../forms/login.html");
            }

            # code...
        }
    }

    fclose($handle);
}
echo "<br>";

echo "HANDLE THIS PAGE";
