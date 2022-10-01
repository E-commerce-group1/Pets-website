<?php

include 'config.php';
session_start();


$id = $_GET["id"];

//    echo $id;

$sql = "SELECT * FROM users WHERE id =$id";

$getData = $conn->query($sql);

$all = $getData->fetchAll(PDO::FETCH_OBJ);

print_r($all);








$old_pass = $_POST['old_pass'];
$previous_pass = md5($_POST['previous_pass']);
$previous_pass = filter_var($previous_pass);
$new_pass = md5($_POST['new_pass']);
$new_pass = filter_var($new_pass);
$confirm_pass = md5($_POST['confirm_pass']);
$confirm_pass = filter_var($confirm_pass);

if (!empty($previous_pass) || !empty($new_pass) || !empty($confirm_pass)) {
  if ($previous_pass != $old_pass) {
    $message[] = 'old password not matched!';
  } elseif ($new_pass != $confirm_pass) {
    $message[] = 'confirm password not matched!';
  } else {
    $update_password = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
    $update_password->execute([$confirm_pass, $user_id]);
    $message[] = 'password has been updated!';
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>user profile update</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="./view/style/updateprofile.css">

</head>

<body>



  <h1 class="title"> update <span>user</span> profile </h1>

  <section class="update-profile-container">

    <?php
    $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
    $select_profile->execute([$user_id]);
    print_r($user_id);
    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
    ?>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
        <div class="inputBox">
          <span>firstname : </span>
          <input type="text" name="first_name" required class="box" placeholder="enter your firstname" value="<?= $fetch_profile['first_name']; ?>">
          <span>lastname : </span>
          <input type="text" name="last_name" required class="box" placeholder="enter your lastname" value="<?= $fetch_profile['last_name']; ?>">
          <span>email : </span>
          <input type="email" name="email" required class="box" placeholder="enter your email" value="<?= $fetch_profile['email']; ?>">

        </div>
        <div class="inputBox">
          <input type="hidden" name="old_pass" value="<?= $fetch_profile['password']; ?>">
          <span>old password :</span>
          <input type="password" class="box" name="previous_pass" placeholder="enter previous password">
          <span>new password :</span>
          <input type="password" class="box" name="new_pass" placeholder="enter new password">
          <span>confirm password :</span>
          <input type="password" class="box" name="confirm_pass" placeholder="confirm new password">

        </div>
      </div>
      <div class="flex-btn">
        <input type="submit" value="update profile" name="update" class="btn">
        <a href="profile.php" class="option-btn">go back</a>
      </div>
    </form>

  </section>

</body>

</html>
<?php


if (isset($_POST["update"])) {
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $old_pass = $_POST['old_pass'];
  $previous_pass = md5($_POST['previous_pass']);
  $previous_pass = filter_var($previous_pass);
  $new_pass = md5($_POST['new_pass']);
  $new_pass = filter_var($new_pass);
  $confirm_pass = md5($_POST['confirm_pass']);
  $confirm_pass = filter_var($confirm_pass);


  $sql = "UPDATE users SET first_name=:first_name,last_name=:last_name email=:email `password`=:`password` WHERE id=$id";


  $query = $db->prepare($sql);

  $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
  $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);

  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);


  $result = $query->execute();

  header("location: index.php");
}


?>