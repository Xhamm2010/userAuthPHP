<?php
session_start();
if (isset($_POST['submit'])) {
    $email =  $_POST['email'];
    $newpassword = $_POST['password'];

    //reset function call
    resetPassword($email, $newpassword);
}


function resetPassword($email, $newpassword)
{
    //checking if user input matches that of csv file
    $handle = fopen('../storage/users.csv', 'r+');
    while (!feof($handle)) {
        $store = fgetcsv($handle);
        if ($store) {
            if ($store[2] == $email) {
                //updating the new_password
                $updated = array_replace($store, ['3' => $newpassword]);
                print_r($updated);
                # code...
            } else {
                echo "<h1>Password Reset Not Sucessful</h1>";
                // header("Location: login.php");
            }

            # code...
        }
    }
    fclose($handle);
    //  write the updated password into the csv file
    $handle = fopen('../storage/users.csv', 'w+');
     fwrite($handle, implode(',', $updated));
    fclose($handle);
    echo "<h1>You Have Successfully Updated Your Password</h1>";
    echo "<br>";
    
}
echo "HANDLE THIS PAGE";
