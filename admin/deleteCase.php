<?php
require_once "pdo.php";//ensure there is a connection to the database
session_start();//start session 
require "../usercheck.php";//check if user is logged in
include "header.php";//get the header for the admin user
//check to see if the delete key was clicked and the user id are set 
if ( isset($_POST['delete']) && isset($_POST['case_id']) ) {
	echo "deleting......................";
    $stmt = $pdo->prepare("DELETE FROM complainant WHERE case_id = :xyz");//sql ststement
    $stmt->execute(array(":xyz" => $_POST['case_id']));//execution of sql statement (this ensures no ad data is gotten from the user and prevents sql injection) 
    $_SESSION['success'] = 'Record deleted';//message to show record was deleted
    header( 'Location: case.php' ) ;//goes back to the users page
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['case_id']) ) {
  $_SESSION['error'] = "Missing user_id";//set the session to have the error message MIssing user id
  header('Location: case.php');//go back to users page with the error message MIssing user id
  return;//end process
}

$stmt = $pdo->prepare("SELECT name, case_id FROM complainant where case_id = :xyz");//pdo statement to be sent
$stmt->execute(array(":xyz" => $_GET['case_id']));//executing pdo ststement
$row = $stmt->fetch(PDO::FETCH_ASSOC);//getting the data in form of key value array
if ( $row === false ) {//if there are no values
    $_SESSION['error'] = 'Bad value for case_id';//message put in session
    header( 'Location: case.php' ) ;//go back to users page
    return;//end process
}

?>
<p>Confirm: Deleting <?= htmlentities($row['name']) ?></p>
<p>Confirm: case id <?= htmlentities($row['case_id']) ?></p>
<!-- form to comfirm deletion of the user !-->
<form method="post">
<input type="hidden" name="case_id" value="<?= $row['case_id'] ?>">
<input type="submit" value="Delete" name="delete">
<a href="case.php">Cancel</a>
</form>
</body>
