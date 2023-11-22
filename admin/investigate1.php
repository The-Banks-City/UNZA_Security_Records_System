<div>
<?php

require_once "pdo.php";
session_start();
if ( ! isset($_SESSION["role"]) ) { 
	header("Location:../index.php");
}

 include "header.php";


// require_once "pdo.php";
// session_start();
// require "../usercheck.php";
?><!DOCTYPE html>

<?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
// Guardian: Make sure that case id is present
if ( ! isset($_GET['case_id']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: case.php');
  return;
}
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
$caseid=$row['case_id'];//sets case id to variable caseid
?>
</div >
<div style="text-align:center;display:flex;justify-content:center;">
	<div style="margin-top:100px;">
<h2>Case Number : <?= htmlentities($row['case_id']); ?></h2>

<table border="1">
<tr>
<td>Name : <?= htmlentities($row['name']); ?></td>
<td>Phone : <?= htmlentities($row['phone']); ?></td>
</tr>
<tr>
<td>crime : <?= htmlentities($row['crime']) ?></td>
<td>Hostel : <?= htmlentities($row['hostel']); ?></td>
</tr>
<tr>
<td>Nrc : <?= htmlentities($row['nrc']); ?></td>
<td>Date Reported : <?= htmlentities($row['date_added']) ?></td>
</tr>
</table>
<br>
<a href="case.php">Cases</a>
<!-- <h2>Stements</h2>
<hr> -->

<!--?php
//getting statements
// $stmt = $pdo->query("SELECT * FROM investigation WHERE case_id LIKE '%$caseid%' ORDER BY assigned_date DESC");
// $row_num = $stmt->rowCount();//get number of rows
//   if($row_num<1){
//   echo '<p style="color:red">No comments found</p>';//if no rows print erro message
//   }else{
//print out ststements using a ;loop
// while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
//     echo "<div><p>";
//     echo "Date Reported </p><p>".(htmlentities($row['assigned_date']));
//     echo"</p><p>";
//     echo "Investigator </p><p>".(htmlentities($row['investigator']));
//     echo"</p><p>";
//     echo "Statement </p><p>".(htmlentities($row['statement']));
//     echo"</p><p>";
//     echo"<hr></div>";
 
// 	}
// }
// ?-->

<br>
<h2>Reports</h2>
<hr>
<?php
$stmt = $pdo->query("SELECT * FROM investigation WHERE case_id=$caseid ORDER BY date_added DESC");
$row_num = $stmt->rowCount();
  if($row_num<1){
   echo '<p style="color:red">No comments found</p>';
  }else{

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<div><p>";
    echo "Date Reported </p><p>".(htmlentities($row['date_added']));
    echo"</p><p>";
    echo "Investigator </p><p>".(htmlentities($row['investigator']));
    echo"</p><p>";
    echo "Statement </p><p>".(htmlentities($row['statement']));
    echo"</p><p>";
    echo"<hr></div>";
 
	}
}
?>



<hr/>
  <footer align="center">
            <div class="foot-note">
                <h2>THE UNIVERSITY OF ZAMBIA</h2>
                <h3>SECURITY DEPARTMENT</h3>
                <p>All rights are reserved by UNZA</p>
                <p>Copyright &copy 2023</p>
            </div>
           
        </footer>

</body>
</html>
