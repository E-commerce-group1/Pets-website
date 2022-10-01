<?php

include('database.php');
// signup form insert and validation
try {
    $newUser = new Database();

    if (isset($_POST['signup'])) {
        $email = $_POST['email'];
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $pass = $_POST['password'];
        $mobile = $_POST['mobile'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $postal = $_POST['postalcode'];
        $userRoll = "user";

        //set the user rolls 
        if ($email == 'admin@admin.com') {
            $userRoll = "admin";
        }
        //create the new object 

        //sent the data which is realated to the users table 
        try {
            // $testEmail = $newUser->checkEmail($email);
            if ($newUser->checkEmail($email) == true) {
                echo "<script> alert('this mail is used') </script>";
            } else {
                //insert the new user in the database table 'users'
                $newUser->insertIntoUserTable($email, $pass, $firstName, $lastName, $mobile, $userRoll);

                //gettign the id of the currenct user to link it with his address 
                $userID = $newUser->getId($email);

                // insert the new user address data in the address table 
                $newUser->insertIntoUserAddressTable($userID, $address1, $address2, $city, $postal, $country, $mobile);


                // it should be redirect to the user page if here 
            }
        } catch (PDOException $e) {
            echo "Insertion faild : " . $e->getMessage();
        }
    }
} catch (PDOException $error) {
    echo "faild getting the data : " . $error->getMessage();
}

try {

    if (isset($_POST['signin'])) {
        $loginEmail = $_POST['email'];
        $loginPassword = $_POST['password'];

        // check if the email is admin to redirect him to the admin page
        if ($loginEmail == 'Admin@admin.com' && $loginpass == 'Admin') {
            header("Location: admin.php");
            exit();
        }
        //check if the emial is not exist -> redirect to the user page
        elseif (!$newUser->checkLoginEmail($loginEmail)) {
            header("Location: ../view\login.html"); //done
            exit();
        } elseif ($newUser->checkPasswordToEmail($loginEmail, $loginPassword) == false) {
            // header("Location: ../view\login.html"); //done
            echo "<script> alert('you password not match you email')</script>";
            // exit();
        } else {
            // if the the email and password exist and match the user will be redirect to his profile ;
            header("Location: http://localhost/pets-website/view/about.html");
        }
    }
} catch (PDOException $er) {
    echo "falid to login" . $er->getMessage();
}
