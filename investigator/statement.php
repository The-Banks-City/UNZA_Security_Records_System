<div>
<?php

include "header.php";

require_once "pdo.php";
session_start();
// Guardian: Make sure that case id is present
if ( ! isset($_GET['case_id']) ) {
  $_SESSION['error'] = "Missing case_id";
  header('Location: statement.php');
  return;
}
$user = $_SESSION['user'];
//getting information about case that was clicked on case page
$stmt = $pdo->prepare("SELECT * FROM complainant where case_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['case_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//error if case is not found
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for case_id';
    header( 'Location: case.php' ) ;//redirects to case page if no case is found 
    return;
}
// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
$caseid=$row['case_id'];//sets case id to variable caseid
if ( isset($_POST['statement']) ) {
    // Data validation
    if ( strlen($_POST['statement']) < 1) {//error to shw if case staement is not made
        $_SESSION['error'] = 'Missing data';
        header("Location:statement.php?case_id=".$caseid);//redirect to statemet input page
        return;

    }
  
    else{
 
    //preparing statement to send data to the database, the case_id, statemet and the investigator name
    $sql = "INSERT INTO investigation (case_id,statement,investigator) VALUES (:caseid,:statement,:invest)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(//array to send the data to database
        ':statement' => $_POST['statement'],
        ':caseid' => $caseid,
        ':invest' => $user));
    $_SESSION['success'] = 'Statement added';//messege to user if succesful
    header( 'Location: investigate.php?case_id='.$caseid);//redirect to case page
    return;
    }
}

?>
</div>
<h2>Case Number : <?= htmlentities($row['case_id']); ?></h2>
<form method="post">
<p><label>COMMENTS:<br>
<textarea name="statement" rows="10" cols="100" required></textarea></label></p>
<input type="submit" value="submit">
</form> 
<a href="case.php">Cases</a>
<?php  echo('<a href="investigate.php?case_id='.$row['case_id'].'">back</a>');?>

<style>
a{
    text-decoration:none;
    font-size:0.7cm;
    margin:0.6cm;
}

</style>
<hr/>
        <footer align="center">
            <div class="foot-note">
                <h2>THE UNIVERSITY OF ZAMBIA</h2>
                <h3>SECURITY DEPARTMENT</h3>
                <p>All rights are reserved by UNZA</p>
                <p>Copyright &copy 2023</p>
            </div>
           
        </footer>

