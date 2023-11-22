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

<div class="usr">
<p><h2>FRONT DESK OFFICER</h2></p>
</div>

<b><h1><a href="case.php">CASES</a></h1></b>
<!-- <a href="logout.php">Logout</a> -->

<style>
b h1 a{
    text-decoration:none;
}
 .usr{
    text-align:left;
}
footer{
    align:center;
    padding-top:2cm;
}

</style>

  <footer>
    <hr/>
            <div class="foot-note">
                <h2>THE UNIVERSITY OF ZAMBIA</h2>
                <h3>SECURITY DEPARTMENT</h3>
                <p>All rights are reserved by UNZA</p>
                <p>Copyright &copy 2023</p>
            </div>
           
        </footer>