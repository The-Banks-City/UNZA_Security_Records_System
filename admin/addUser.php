<?php

require "../pdo.php";//connect to database
session_start();//start session 
require "../usercheck.php";//check if user is logged in
include "header.php";//get the header for the admin user
//checking to see if all fields are filled in
if ( isset($_POST['firstname']) && isset($_POST['email'])&& isset($_POST['lastname'])
     && isset($_POST['password'])&& isset($_POST['phone'])) {

    // Data validation ensuring the fields are not empty
    if ( strlen($_POST['firstname']) < 1 ||strlen($_POST['lastname']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: addUser.php");
        return;
    }

    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Bad data';
        header("Location: addUser.php");
        return;
    }
    
     $email=$_POST['email'];
     $stmt = $pdo->query("SELECT * FROM users WHERE email LIKE '$email' ");
     $row_num = $stmt->rowCount();
     echo $row_num;
  	if($row_num>1){
  	  $_SESSION['error'] = 'User Already Exist';
        header("Location:addUser.php");
        return;
  	}else{
	$password = encryptData($_POST['password'], $key);
	
  	//sql statement to be sent to executed
    $sql = "INSERT INTO users (first_name,last_name, email, password,phone,role)
              VALUES (:fname,:lname, :email, :password,:phone,:role)";
    $stmt = $pdo->prepare($sql);
     //executing sql statement in the form of array that is gotten from entered form data from edit user page
    $stmt->execute(array(//here we pair the dummy variables put in the sql statement(:fname ,:email .....) to the actual data collected from the user
    //this prevents sql injection 
        ':fname' => $_POST['firstname'],
        ':lname' => $_POST['lastname'],
        ':email' => $_POST['email'],
        ':password' => $password,
        ':role' => $_POST['role'],
        ':phone' => $_POST['phone']));
    $_SESSION['success'] = 'Record Added';
    header( 'Location: users.php' );
    return;
    }
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

?>
<!--
Form for the colection of data from user
!-->
<h3 style="margin-bottom:20px">Add A New User</h3>
<form method="post">
<p>
<input type="text" name="firstname" placeholder="First Name"></p>
<p>
<input type="text" name="lastname" placeholder="Last Name"></p>
<p>
<input type="email" name="email" placeholder="Email"></p>
<p>
<input type="password" name="password" placeholder="password"></p>
<p>
<input type="text" name="phone" placeholder="Phone Number"></p>
<p>
<select name="role" >
		<option value="admin">Admin</option>
		<option value="officer"> Officer</option>
		<option value="investigator"> Investigator</option>
</select></p>
<p><input type="submit" value="Add New"/>
<a href="users.php">Back</a></p>
</form>


  <footer style="padding-top:1cm;">
  <hr/>
            <div class="foot-note">
                <h2>THE UNIVERSITY OF ZAMBIA</h2>
                <h3>SECURITY DEPARTMENT</h3>
                <p>All rights are reserved by UNZA</p>
                <p>Copyright &copy 2023</p>
            </div>
           
        </footer>

</body>
