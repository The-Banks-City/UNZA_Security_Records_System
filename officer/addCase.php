<?php
include "header.php";


require_once "pdo.php";
session_start();
$stm = $pdo->query("SELECT * FROM complainant ORDER BY case_id DESC LIMIT 1");
$rows = $stm->fetch(PDO::FETCH_ASSOC);
$_POST['id'] = $rows['case_id']+1;

if ( isset($_POST['name']) && isset($_POST['nrc']) && isset($_POST['gender'])
     && isset($_POST['phone']) && isset($_POST['campus'])&& isset($_POST['age'])&& isset($_POST['occupation'])&& isset($_POST['crime'])&& isset($_POST['location'])) {

	// Data validation
    if ( strlen($_POST['name']) < 1 || strlen($_POST['nrc']) < 1 || strlen($_POST['occupation']) < 1 || strlen($_POST['phone']) < 1) {       
        $_SESSION['error'] = 'Missing data';
        header("Location: addCase.php");
        return;
    }
    if($_POST['location']==="hostel"){
		$l=$_POST['location'];
		$w=$_POST['hostel'];
		$locate= $w ."-".$l;
		$_POST['locate'] = $locate;
	}
	if($_POST['location']==="school"){
		$l=$_POST['location'];
		$w=$_POST['school'];
		$locate= $w ."-".$l;
		$_POST['locate'] =$locate;
	}
	if(($_POST['location'] !=="school" ) && ($_POST['location']!=="hostel")){
		$_POST['locate'] = $_POST['location'];
	}
		echo $_POST['locate'];
    $sql = "INSERT INTO complainant (case_id,name,phone,occupation,nrc,campus,location,age,gender,crime)
             VALUES (:id,:name,:phone,:occupation,:nrc,:campus,:location,:age,:gender,:crime)";
             echo "entering data................";
             echo $_POST['id'],$_POST['name'],$_POST['phone'],$_POST['occupation'],$_POST['nrc'],$_POST['campus'],$_POST['locate'],$_POST['age'],$_POST['gender'],$_POST['crime'];
    $stmt = $pdo->prepare($sql);
			echo "done.........";
    $stmt->execute(array(
		':id' => $_POST['id'],
        ':name' => $_POST['name'],
        ':phone' => $_POST['phone'],
        ':occupation' => $_POST['occupation'],
        ':nrc' => $_POST['nrc'],
        ':campus' => $_POST['campus'],
        ':location' => $_POST['locate'],
        ':age' => $_POST['age'],
        ':gender' => $_POST['gender'],
        ':crime' => $_POST['crime']
        ));
    
    echo"<br><br> done ..................tdhfhg";
    $user = $_SESSION['user'];
    $timestamp = time();
	$formatted_time = date("Y-m-d H:i:s",$timestamp);
    //preparing statement to send data to the database, the case_id, statemet and the investigator name
    $sql = "INSERT INTO investigation (case_id,statement,investigator,date_added) VALUES (:caseid,:statement,:invest,:time)";
    echo $_POST['statement'],$_POST['id'],$user,$formatted_time;
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(//array to send the data to database
        ':statement' => $_POST['statement'],
        ':caseid' => $_POST['id'],
        ':invest' => $user,
        ':time' =>$formatted_time));
    $_SESSION['success'] = 'Record Added';
    header( 'Location: case.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
?>
<body style="text-align:center;">

 <h2>New Case</h2>
	<style>
	.hidden{
		display:none;
		}
	</style>
	<form method="POST">
	
		<div>
			<p align="left"><b>Case ID:<?=$_POST['id']?></b></p>
			<div style="text-align:center; border:2px solid green; margin:auto;width:90%;display:flex;flex-direction:row; justify-content:center;">
				
				<div style="border:2px solid blue; margin:5px;width:40%;">
				<p style="margin-top:20px;">Victim Info</p><hr>
					<p>
					
						<input type="text" name="name" placeholder="Name of Complainant"required>
					</p>
					<p>
					<input type="text" name="nrc" pattern="\d{6}/\d{2}/\d{1}" placeholder="NRC:000000/00/0"required>
					</p>
					
					<p>
					
					<input type="text" name="phone" placeholder="Phone Number" required pattern=".{10}">
					</p>
					<p></p>
					<input type="number" name="age" min="7" placeholder="Age"required>
					<br><br>
					<p>Gender:
					
					<select name="gender" required>
						<option value="Male"> Male</option>
						<option value="Female"> Female</option>
					</select>
					</p>
				</div>
				<div style="border:2px solid yellow;margin:5px;width:40%;">
					<p style="margin-top:20px;">Case Info</p><hr>
					<p>Occupation:
					<select name="occupation" required>
						<option value="Student"> Student</option>
						<option value="Lecturer">Lecturer</option>
						<option value="Civilian">Civilian</option>
					</select>
	</p>
					<p>Campus:
					<select name="campus" required>
						<option value="Main"> Main</option>
						<option value="Ridgeway"> RidgeWay</option>
					</select>
	</p>
					<p>Location
				
					<div style=" display:flex;flex-direction:row;justify-content:center;">
					<select id="location" name="location" onchange="showHideOption()"required>
						<option value="Goma Fields">Goma Fields</option>
						<option value="Goma Lakes">Goma Lakes</option>
						<option value="hostel">Hostels</option>
						<option value="school">Schools</option>
					</select>
					<!--- for schools!--->
					<select id="school" name="school" style="display: none;">
						<option value=""></option>
						<option value="Agriculture">Agriculture</option>
						<option value="Education">Education</option>
						<option value="Biology">Biology</option>
						<option value="Engineering">Engineering</option>
						<option value="Vet">Vet</option>
						<option value="Law">Law</option>
						<option value="Natural Science">Natural Science</option>
						<option value="GSB">GSB</option>
						<option value="Confucious">Confucious</option>
					</select>
					<select id="hostels" name="hostel" style="display: none;">
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
					</div></p>
					<p>Crime type:</p>
					<select  id="crime" name="crime" onchange="showHideOption()" required>
						<option selected="selected" value="">Select</option>
						<option value="domestic-violence">Domestic Violence</option>
						<option value="murder">Murder</option>
						<option value="assault">Assault</option>
						<option value="theft">Theft</option>
						<option value="vandalism">Vandalism</option>
					</select>
				</div>
			</div>
			<div style="border:2px solid green;margin:auto;width:90%;">
				<p style="margin-top:15px;">STATEMENT:<br>
				<textarea name="statement" rows="10" style="width:90%"></textarea></td>
				</p>
				<input type="submit" value="Enter Case"/>
				<a href="case.php">Cancel</a></span>
			</div>
		</div>
	</form>
	<script>
function showHideOption() {
  var selectBox = document.getElementById("location");
  var conditionalOption = document.getElementById("school");
  var conditionalOption1 = document.getElementById("hostels");

  if (selectBox.value === "school") {
    conditionalOption.style.display = "block"; // Show the option
    conditionalOption1.style.display = "none";
  }
  else if (selectBox.value === "hostel") {
    conditionalOption1.style.display = "block"; // Show the option
      conditionalOption.style.display = "none";
  } else {
    conditionalOption.style.display = "none"; // Hide the option
    conditionalOption1.style.display = "none";
  }
}
</script>


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
<!-- <br>
<a href="case.php">Cancel</a>
<a href="index.php">Home</a> -->


<hr>
        <footer>
            <div class="foot-note">
                <h2>THE UNIVERSITY OF ZAMBIA</h2>
                <h3>SECURITY DEPARTMENT</h3>
                <p>All rights are reserved by UNZA</p>
                <p>Copyright &copy 2023</p>
            </div>
            
        </footer>