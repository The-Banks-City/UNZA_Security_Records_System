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
<style>
.usr{
    text-align:left;
}

a{
    text-decoration:none;
    font-size:1cm;
}

footer{
    align:center;
    padding-top:2cm;
}

</style>

<div class="usr">
<h2>INVESTIGATOR</h2>
</div>

<a href="case.php">CASES</a>
<!--<a href="logout.php">Logout</a>-->

  <footer>
    <hr/>
     <div class="foot-note">
     <h2>THE UNIVERSITY OF ZAMBIA</h2>
     <h3>SECURITY DEPARTMENT</h3>
     <p>All rights are reserved by UNZA</p>
     <p>Copyright &copy 2023</p>
     </div>           
  </footer>
