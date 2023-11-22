<?php
require_once "pdo.php";//connect to database
session_start();//start session 
require "../usercheck.php";//check if user is logged in
include "header.php";//get the header for the admin user
//check if all fields are filled in if so then send the new data to the database to update info
if ( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])
     && isset($_POST['password']) && isset($_POST['user_id']) ) {

    // Data validation ensure that they are not empty
    if ( strlen($_POST['fname']) < 1 || strlen($_POST['password']) < 1 || strlen($_POST['lname']) < 1 || strlen($_POST['email']) < 1 ||strlen($_POST['password']) < 1 ) {
        $_SESSION['error'] = 'Missing data';
        header("Location: editUser.php?user_id=".$_POST['user_id']);//reload the page with error message missing data
        return;
    }
//check if user entered an email
    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Bad data';
        header("Location: editUser.php?user_id=".$_POST['user_id']);//reload the page with error message bad data
        return;
    }
	//sql statement to update user data
    $sql = "UPDATE users SET first_name = :fname,
    		last_name = :lname,
            email = :email, password = :password
            WHERE users.user_id = :user_id";
    //pdo to prepare sql ststement        
    $stmt = $pdo->prepare($sql);
    //executing sql statement in the form of array that is gotten from entered form data from edit user page
    $stmt->execute(array(//here we pair the dummy variables put in the sql statement(:fname ,:email .....) to the actual data collected from the user
    //this prevents sql injection 
        ':fname' => $_POST['fname'],
        ':lname' => $_POST['lname'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
        ':user_id' => $_POST['user_id']));
    $_SESSION['success'] = 'Record updated';//set success message 
    header( 'Location: users.php' ) ;//go to users page
    return;
}

// Guardian: Make sure that user_id is present when the page loads 
if ( ! isset($_GET['user_id']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: users.php');
  return;
}

else{//if user id is present when the page loads get the existing data from the database
$stmt = $pdo->prepare("SELECT * FROM users where user_id = :xyz");//prepare sql statement
$stmt->execute(array(":xyz" => $_GET['user_id']));//execute sql ststement
$row = $stmt->fetch(PDO::FETCH_ASSOC);//associate each value as a key value pair e.g column name firstname = actual data in the database according to userid
if ( $row === false ) {//if no rows are detected
    $_SESSION['error'] = 'Bad value for user_id';//add error message in session
    header( 'Location: users.php' ) ;//go back to users page with error message
    return;
}

// Flash pattern if there are any errors show them
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
//keeping the collected data from the database in variables (maybe to reduce typing time)
$lname = htmlentities($row['last_name']);
$fname = htmlentities($row['first_name']);
$email = htmlentities($row['email']);
$password = htmlentities($row['password']);
$user_id = $row['user_id'];
}
?>
<p>Edit User</p>
<form method="post">
<p>First Name:
<input type="text" name="fname" value="<?= $fname ?>"></p>
<p>Last Name:
<input type="text" name="lname" value="<?= $lname ?>"></p>
<p>Email:
<input type="text" name="email" value="<?= $email ?>"></p>
<p>Password:
<input type="text" name="password" value="<?= $password ?>"></p>

<input type="hidden" name="user_id" value="<?= $user_id ?>">
<p><input type="submit" value="Update"/>
<a href="users.php">Cancel</a></p>
</form>
<hr/>
  <footer>
            <div class="foot-note">
                <h2>THE UNIVERSITY OF ZAMBIA</h2>
                <h3>SECURITY DEPARTMENT</h3>
                <p>All rights are reserved by UNZA</p>
                <p>Copyright &copy 2023</p>
            </div>
           
        </footer>

</body>
