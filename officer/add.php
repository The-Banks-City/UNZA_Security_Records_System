<?php
require_once "pdo.php";
session_start();
require "../usercheck.php";
if ( isset($_POST['firstname']) && isset($_POST['email'])&& isset($_POST['lastname'])
     && isset($_POST['password'])&& isset($_POST['phone'])) {

    // Data validation
    if ( strlen($_POST['firstname']) < 1 ||strlen($_POST['lastname']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: add.php");
        return;
    }

    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Bad data';
        header("Location: add.php");
        return;
    }

    $sql = "INSERT INTO users (first_name,last_name, email, password,phone)
              VALUES (:fname,:lname, :email, :password,:phone)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':fname' => $_POST['firstname'],
        ':lname' => $_POST['lastname'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
        ':phone' => $_POST['phone']));
    $_SESSION['success'] = 'Record Added';
    header( 'Location: data.php' );
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
?>
<p>Add A New User</p>
<form method="post">
<p>First Name:
<input type="text" name="firstname"></p>
<p>Last Name:
<input type="text" name="lastname"></p>
<p>Email:
<input type="email" name="email"></p>
<p>Password:
<input type="password" name="password"></p>
<p>Phone:
<input type="text" name="phone"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
