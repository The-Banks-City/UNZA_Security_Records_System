<?php
include "header.php";

require_once "pdo.php";
session_start();
require "../usercheck.php";
?>
<html>
<head>

<style>

    button{
    background-color:blue;
    border-radius:10px;
    margin-top:1cm;
     
    }

    button a{
    text-decoration:none;
    color:white;
    }
    
    </style>

</head><body>
  
	<form method="post">
	<p>Search Key</p>
	<select name="search" >
		<option value="nrc"> Nrc</option>
		<option value="name">Name</option>
		<option value="Campus"> Campus</option>
		<option value="crime"> Crime</option>
		<option value="age"> Age</option>
</select>
	<input name="key" type="text">
	<input type="submit" value=Search>
</form>
    <div class="btn">
    <button><a href="index.php">Home</a></button>
    </div>
<div>
<?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
	
    echo('<table> <caption align="center"> <h2>');
    echo("Reported cases");
    echo('</h2> </camption> </table>');
    echo('<table width="100%">');
    // echo('<table border="1">'."\n");
    echo "<tr><td><b>";
    echo("CASE ID");
    echo("</b></td><td><b>");
    echo("NAME");
    echo("</b></td><td><b>");
    echo("PHONE NUMBER");
    echo("</b></td><td><b>");
    echo("GENDER");
    echo("</b></td><td><b>");
    echo("NRC NUMBER");
    echo("</b></td><td><b>");
    echo("CAMPUS");
    echo("</b></td><td><b>");
    echo("AGE");
    echo("</b></td><td><b>");
    echo("CRIME");
    echo("</b></td></tr>\n");

if(isset($_POST['search']) && isset($_POST['key'])){
	 if($_POST['key']==""){
	  $_SESSION['error'] = 'Missing data';
        header("Location: case.php");
        return;
	 }
	 $key=$_POST['key'];
	 $search = $_POST['search'];
     $stmt = $pdo->query("SELECT * FROM complainant WHERE $search LIKE '%$key%' ");
     $row_num = $stmt->rowCount();
  if($row_num<1){
  	  $_SESSION['error'] = 'No Record Found';
        header("Location: case.php");
        return;
  }
}
else{
$stmt = $pdo->query("SELECT * FROM complainant");
}
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['case_id']));
    echo("</td><td>");
    echo(htmlentities($row['name']));
    echo("</td><td>");
    echo(htmlentities($row['phone']));
    echo("</td><td>");
    echo(htmlentities($row['gender']));
    echo("</td><td>");
    echo(htmlentities($row['nrc']));
    echo("</td><td>");
    echo(htmlentities($row['campus']));
    echo("</td><td>");
    echo(htmlentities($row['age']));
    echo("</td><td>");
    echo(htmlentities($row['crime']));
    echo("</td><td>");
    echo('<a href="investigate.php?case_id='.$row['case_id'].'">View Case</a> ');
    echo("</td></tr>\n");
	}

?>
</table>

<hr/>
        <footer>
            <div class="foot-note">
                <h2>THE UNIVERSITY OF ZAMBIA</h2>
                <h3>SECURITY DEPARTMENT</h3>
                <p>All rights are reserved by UNZA</p>
                <p>Copyright &copy 2023</p>
            </div>
           
        </footer>
