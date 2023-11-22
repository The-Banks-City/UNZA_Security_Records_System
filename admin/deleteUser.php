<?php
require_once "pdo.php";//ensure there is a connection to the database
session_start();//start session 
require "../usercheck.php";//check if user is logged in
include "header.php";//get the header for the admin user
//check to see if the delete key was clicked and the user id are set 
if ( isset($_POST['delete']) && isset($_POST['user_id']) ) {
    $sql = "DELETE FROM users WHERE user_id = :zip";//sql ststement
    $stmt = $pdo->prepare($sql);//pdo to prepare sql ststement
    $stmt->execute(array(':zip' => $_POST['user_id']));//execution of sql statement (this ensures no ad data is gotten from the user and prevents sql injection) 
    $_SESSION['success'] = 'Record deleted';//message to show record was deleted
    header( 'Location: users.php' ) ;//goes back to the users page
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['user_id']) ) {
  $_SESSION['error'] = "Missing user_id";//set the session to have the error message MIssing user id
  header('Location: users.php');//go back to users page with the error message MIssing user id
  return;//end process
}

$stmt = $pdo->prepare("SELECT first_name, last_name, user_id FROM users where user_id = :xyz");//pdo statement to be sent
$stmt->execute(array(":xyz" => $_GET['user_id']));//executing pdo statement
$row = $stmt->fetch(PDO::FETCH_ASSOC);//getting the data in form of key value array
if ( $row === false ) {//if there are no values
    $_SESSION['error'] = 'Bad value for user_id';//message put in session
    header( 'Location: users.php' ) ;//go back to users page
    return;//end process
}

?>
<p>Confirm: Deleting <?= htmlentities($row['first_name']) ?>  <?=htmlentities($row['last_name']) ?></p>
<!-- form to comfirm deletion of the user !-->
<form method="post">
<input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
<input type="submit" value="Delete" name="delete">
<a href="users.php">Cancel</a>
</form>
</body>
