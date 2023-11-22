<?php
include "header.php";

require_once "pdo.php";
session_start();

if ( isset($_POST['name']) && isset($_POST['nrc']) && isset($_POST['gender'])
     && isset($_POST['phone']) && isset($_POST['campus'])&& isset($_POST['age'])&& isset($_POST['occupation'])&& isset($_POST['crime'])&& isset($_POST['hostel'])) {

	// Data validation
    if ( strlen($_POST['name']) < 1 || strlen($_POST['nrc']) < 1 || strlen($_POST['occupation']) < 1 || strlen($_POST['phone']) < 1) {       
        $_SESSION['error'] = 'Missing data';
        header("Location: addCase.php");
        return;
    }
    if($_POST['age']== 0){
      $_SESSION['error'] = 'Age cannot be 0';
        header("Location: addCase.php");
        return;
    }
    $sql = "INSERT INTO complainant (name,phone,occupation,nrc,campus,hostel,age,gender,crime)
             VALUES (:name,:phone,:occupation,:nrc,:campus,:hostel,:age,:gender,:crime)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':phone' => $_POST['phone'],
        ':occupation' => $_POST['occupation'],
        ':nrc' => $_POST['nrc'],
        ':campus' => $_POST['campus'],
        ':hostel' => $_POST['hostel'],
        ':age' => $_POST['age'],
        ':gender' => $_POST['gender'],
        ':crime' => $_POST['crime']
        ));
    $_SESSION['success'] = 'Record Added';
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
?>

<style>
caption{
	align:center;
	
}
table{
	align-items: center;

}
a{
	text-decoration:none;
	font-size:0.6cm;
	margin:1%;
}
</style>

<caption><h2>New Case</h2></caption>
<table>
<tr>
<td>
<form method="post">
<p>Name of Complainant:
</p>
<input type="text" name="name" >
<p>NRC:
</p>
<input type="text" name="nrc">
<p>Gender:
</p>
<select name="gender" >
	<option value="Male"> Male</option>
	<option value="Female"> Female</option>
</select>
<p>Phone Number:
</p>
<input type="text" name="phone">
<p>Campus:
</p>
<select class="form-control" name="campus" >
	<option value="Main"> Main</option>
	<option value="Ridgeway"> RidgeWay</option>
</select>
<td></td><td></td><td></td><td></td>
<td>
<p>Details of Crime:
</p>
<input type="textarea" name="Details">
<p>Age
</p>
<input type="number" name="age" min="17"required>
<p>Occupation:
</p>
<select name="occupation" >
	<option value="Male"> Student</option>
	<option value="Lecturer">Lecturer</option>
	<option value="Civilian">Civilian</option>
</select>
<p>Crime type:
</p>
	<select  name="crime" >
	<option selected="selected" value="">Select</option>
	<?php
	//preparing statement using pdo
		$stmt = $pdo->query("SELECT * FROM crime_type");
		//loop to get data from database
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
		<!--getting data in form of key value association array and we are collecting only the des == description of crime-->
		<option value="<?php echo $row['des'] ?>"> <?php echo $row['des']?> </option>
		<?php
		}
		?> </select>
<p>Hostel:
</p>
	<select name="hostel" >
	<?php
	//preparing statement using pdo
		$stmt = $pdo->query("SELECT * FROM hostel");
		//loop to get data from database
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
		<!--getting data in form of key value association array and we are collecting only the des == description of crime-->
		<option value="<?php echo $row['hostel'] ?>"> <?php echo $row['hostel']?> </option>
		<?php
		}
		?> </select>
		
		
		<input type="submit" value="Enter Case"/>
</form>
</td>
</tr>
<tr><tr>

</table>

<a href="case.php">Cancel</a></span></tr></tr>

<hr/>
  <footer>
            <div class="foot-note">
                <h2>THE UNIVERSITY OF ZAMBIA</h2>
                <h3>SECURITY DEPARTMENT</h3>
                <p>All rights are reserved by UNZA</p>
                <p>Copyright &copy 2023</p>
            </div>
           
        </footer>