<!DOCTYPE html>
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
<body>
    <h2>New Case</h2>
	<style>
	.hidden{
		display:none;
		}
	</style>
	<form method="POST">
	
		<div>
		    <p align="left"><b>Case ID:<?=$_POST['id']?></b></p>
		    <div style=" border:2px solid green; margin:auto;width:90%;display:flex;flex-direction:column; justify-content:center;padding:10px">
                <div style="border:2px solid red;text-align:left">
                    <p>Date & Time Reported:<input type="text"></p>
                    <p>INVESTIGATING OFFICER:<input type="text"></p>
                </div>
                <div style="border:2px solid blue">
                    <div style=" border:2px solid pink; margin:auto;width:100%;display:flex;flex-direction:column; justify-content:center;padding:10px">
                        <table border="1" style="text-align:left;">
                            <tr>
                                <td>PARTICULARS OF COMPLAINANT</td>
                                <td>PARTICULARS OF ACCUSED</td>
                                
                            </tr>
                            <tr>
                                <td>NAME:<input type="text"></td>
                                <td>NAME:<input type="text"></td>
                            </tr>
                            <tr>
                                <td>RESIDENTIAL ADDRESS: <input type="text"></td>
                                <td>RESIDENTIAL ADDRESS: <input type="text"></td>

                            </tr>
                            <tr>
                                <td>BUSINESS ADDRESS:<input type="text"></td>
                                <td>BUSINESS ADDRESS:<input type="text"></td>

                            </tr>
                            <tr>
                                <td>IDENTITY NUMBER:<input type="text"></td>
                                <td>IDENTITY NUMBER:<input type="text"></td>

                            </tr>
                            <tr>
                                <td>OCCUPATION:<input type="text"></td>
                                <td>OCCUPATION:<input type="text"></td>

                            </tr>
                            <tr>
                                <td>NATIONALITY/TRIBE:<input type="text"></td>
                                <td>NATIONALITY/TRIBE:<input type="text"></td>

                            </tr>
                            <tr>
                                <td>CELL NO:<input type="text"></td>
                                <td>CELL NO:<input type="text"></td>

                            </tr>
                            <tr>
                                <td>VILLAGE:<input type="text"></td>
                                <td>VILLAGE:<input type="text"></td>

                            </tr>
                            <tr>
                                <td>CHIEF:<input type="text"></td>
                                <td>CHIEF:<input type="text"></td>

                            </tr>
                            <tr>
                                <td>DISCTRICT:<input type="text"></td>
                                <td>DISCTRICT:<input type="text"></td>

                            </tr>
                        </table>
                        <div align="left">
                            <p style="margin-top:10px;border:2px solid yellow">OFFENCE:<input type="text"></p>
                            <p style="border:2px solid yellow">DATE/TIME/PLACE OF OCCURANCE:<input type="text"></p>
                            <p style="border:2px solid yellow">VALUE OF PROPERTY STOLEN:<input type="text"></p>
                            <p style="border:2px solid yellow">VALUE OF PROPERTY RECOVERED:<input type="text"></p>
                            <p style="border:2px solid yellow">DATE OF ARREST:<input type="text"></p>
                        </div>
                    </div>
                </div>
            </div>	
		</div>
        <br>
        <input type="submit" value="Enter Case"/>
		<a href="addCase.php">Back</a></span>
        <a href="witness.php">witness</a></span>
	</form>
    <p></p>
	<script src="scripts.js">

</script>
<link href="admin.css" type="text/css" rel="stylesheet">
<? 
					echo '
					<div style="margin:auto;">
        <div style="margin:auto ;width:90%%;text-align:center;">
            
            <div Border="1"  style="padding:20px;margin-top:150px;display:flex;:width:100%;text-align:left;flex-direction:column;justify-content:center;border:2px solid red;">
                .<p>Witness</p>
                <div style="display:flex;flex-direction:row;">
                    <p>Name:<input type="text"></p>
                    <p>Gender:<input type="text"></p>
                </div>
                <div style="display:flex;flex-direction:row;">
                    <p>Residential address:<input type="text"></p`>
                    <p>Bussiness address:<input type="text"></p`>
                </div>
                <div style="display:flex;flex-direction:row;">
                    <p>Occupation:<input type="text"></p>
                    <p>Nationality or Tribe:<input type="text"><br>
                </div>
                <div style="display:flex;flex-direction:row;">
                    <p>Village:<input type="text"></p>
                    <p>Chief:<input type="text"><br>
                    <p>District:<input type="text"></p>
                </div>
                <div style="display:flex;flex-direction:row;">
                    <p>Passport/Identity:<input type="text"></p><br>
                    <p>NumberIssue:<input type="text"></p>
                    <p>DateDate:<input type="text"></p>
            </div>
            <div>
                <textarea style="margin:20px 20px;width:95%;"name="" id="" cols="30" rows="30"></textarea>
            </div>
            </div>
        </div>
        <div>

        </div>
    </div>';
	?>

        <footer class="footer" style="text-align:center;">
			<hr>
            <div class="">
                <h2>THE UNIVERSITY OF ZAMBIA</h2>
                <h3>SECURITY DEPARTMENT</h3>
                <p>All rights are reserved by UNZA</p>
                <p>Copyright &copy 2023</p>
            </div>
            
        </footer>
</body>
</html>
