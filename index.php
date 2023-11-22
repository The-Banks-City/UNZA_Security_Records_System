
<?php
 require_once "pdo.php";
 session_start();
 if(isset($_SESSION['error'])){
	  echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
	 }
 unset($_SESSION["role"]);
	
 ?>
 <?php
if(isset($_POST['email']) && isset($_POST['password']) ){
   
   // echo("<p>Handling POST data....</p>\n");
    $sql = "SELECT role,first_name,last_name,password FROM users WHERE email = :em";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
       ':em' => $_POST['email'],
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $row_num = $stmt->rowCount();
    if($row_num !== 1){
   		 echo 'nooooooooooo';
    }
    else{
		echo "nown password".$row['password'];
		$enteredpassword = $_POST['password'];
		$password = decryptData($row['password'], $key);
    	if( $password !== $enteredpassword){
			$_SESSION['error'] = "wrong password";
			header("Location:index.php");
		}
		else{
				$role =$row['role'];
       	if($role == 'admin'){
			$_SESSION["role"] = 'admin';
            $_SESSION["success"] = "Welcome Admin.";
            $_SESSION["user"] = $row['first_name']." ".$row['last_name'];
        	echo"<script> window.location.assign('admin/index.php');</script>";
        }
        elseif($role == 'officer'){
			$_SESSION["role"] = 'officer';
            $_SESSION["success"] = "Welcome Officer.";
            $_SESSION["user"] = $row['first_name']." ".$row['last_name'];
        		echo"<script> window.location.assign('officer/index.php');</script>";
        }
        else{
			$_SESSION["role"] = 'investigator';
            $_SESSION["success"] = "Welcome Investigator.";
                $_SESSION["user"] = $row['first_name']." ".$row['last_name'];
        	echo"<script> window.location.assign('investigator/index.php');</script>";
        }
			}
    }
}
?>


  <head>
  	<title>UNZA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/css/style.css">

<!-- Check this out -->

	<style>
     body{
		background: gray;
		/* background-image: url(data/images/logo.svg);*/
	}

    </style>

	</head>
	<body>
	<section class="ftco-section">
		<div class="container " style="margin-top:-40px;">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(data/images/logo.svg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>

			      	</div>
							<form method="post" class="signin-form">
								<div class="form-group mt-3">
									<input type="email" class=" form-control" name="email" required>
									<label class=" form-control-placeholder"  for="email">Email</label>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" name="password" class=" form-control" required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="signin form-control btn btn-primary rounded submit px-3">Sign In</button>
								</div>

		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>

	</body>


