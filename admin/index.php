<?php
require_once "pdo.php";
session_start();
require "../usercheck.php";

?>
<?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
include "header.php";
?>
<h2 align="left">Administrator</h2>


<div style="margin-top:100px;display:flex;flex-direction:row;justify-content:center">
	
	<div style="margin-right:10%"><a href="users.php"style="margin-right:70px;justify-content:center;flex-direction:column"><img src="../data/images/users.png" style="width:100px;height:125px"><p>USERS</p></a></div>
	<div style="margin-right:5%"><a href="case.php"style="margin-right:70px;justify-content:center;flex-direction:column"><img src="../data/images/case.png" style=" margin-top:8px;margin-bottom:20px;width:100px;height:100px"><p>CASES</p></a></div>
	
	
</div>

<hr>
       
            <div class="foot-note">
                <footer>
                <h2>THE UNIVERSITY OF ZAMBIA</h2>
                <h3>SECURITY DEPARTMENT</h3>
                <p>All rights are reserved by UNZA</p>
                <p>Copyright &copy 2023</p>
                </footer>
            </div>
           
</body>
</html>
