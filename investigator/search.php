<?php 
	require_once "pdo.php";
	session_start();
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
	<head></head>
	<body>
	<form method="post">
	<p>age</p>
	<input name="age" type="number">
	<input type="submit" value=submit>
</form>
<p><a href="case.php">Back</a></p>
<div>
<?php


if(isset($_POST['age'])){
	 $age = $_POST['age'];
	 
	 if($age==""){
	  $_SESSION['error'] = 'Missing data';
        header("Location: case.php");
        return;
	 }
	 
$stmt = $pdo->query("SELECT * FROM complainant WHERE age LIKE '%$age%' ");
  $row_num = $stmt->rowCount();
  if($row_num<1){
  	  $_SESSION['error'] = 'No Record Found';
        header("Location: case.php");
        return;
  }
  else{
	echo('<table border="1">'."\n");
    echo "<tr><td>";
    echo("case id");
    echo("</td><td>");
    echo("name");
    echo("</td><td>");
    echo("phone number");
    echo("</td><td>");
    echo("Occupation");
    echo("</td><td>");
    echo("nrc number");
    echo("</td><td>");
    echo("Campus");
    echo("</td><td>");
    echo("crime");
    echo("</td></tr>\n");
   
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['case_id']));
    echo("</td><td>");
    echo(htmlentities($row['name']));
    echo("</td><td>");
    echo(htmlentities($row['phone']));
    echo("</td><td>");
    echo(htmlentities($row['occupation']));
    echo("</td><td>");
    echo(htmlentities($row['nrc']));
    echo("</td><td>");
    echo(htmlentities($row['campus']));
    echo("</td><td>");
    echo(htmlentities($row['crime']));
    echo("</td></tr>\n");
	}
}	
	}
 	?>	
</div>


	</body>
</html>
