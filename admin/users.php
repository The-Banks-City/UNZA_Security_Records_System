<?php
require_once "pdo.php";//connect to database
session_start();//start session 
require "../usercheck.php";//check if user is logged in
include "header.php";//get the header for the admin user
?>
<div  class="container"style="text-align:right; padding:10px;">
		<a href="addUser.php"><button type="button" class="btn btn-primary" style="margin-right:50px;">Add new user</button></a>
	<!--go to add user page!-->
	<a href="index.php"><button type="button" class="btn btn-success">Home</button></a><!--go to add home page!-->
</div>

<?php
echo"<h2>Users</h2>";
//check if there is an error
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";//print the error
    unset($_SESSION['error']);//remove error message
}//check if there is a success message
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";//print message
    unset($_SESSION['success']);//remove success message
}
//print first column with titles for the data to be fetched
echo('<table border="1" class="table w-l  ">'."\n");
echo '<thead class="thead-light">';
echo'<tr>';
echo'<th scope="col">User id</th>';
echo'<th scope="col">First</th>';
echo'<th scope="col">LastName</th>';
echo'<th scope="col">Role</th>';
echo'<th scope="col">Email</th>';
echo'<th scope="col">Actions</th>';
echo'</tr>';
echo'</thead>';
//printing first column ends here
$stmt = $pdo->query("SELECT first_name,last_name, email, password,user_id,role FROM users ORDER BY first_name");//getting data from the dataase using a pdo statement
//printing of table with collected data starts here using loop
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {//running of pdo statemment
      echo' <tbody>';
      echo' <tr>';
      echo'<td>'.htmlentities($row['user_id']).'</td>';
      echo'<td>'.htmlentities($row['first_name']).'</td>';
      echo'<td>'.htmlentities($row['last_name']).'</td>';
      echo'<td>'.htmlentities($row['role']).'</td>';
      echo'<td>'.htmlentities($row['email']).'</td>';
      echo'<td>';
      echo('<a href="editUser.php?user_id='.$row['user_id'].'">Edit</a> / ');//opens the edit user page with the user id set to the user row in which the link was cliked 
	  echo('<a href="deleteUser.php?user_id='.$row['user_id'].'">Delete</a>');//opens the delete user page with the user id set to the user row in which the link was cliked
	  echo'</td>';
      echo'</tr>';
}
?>
</tbody>
</table>

<br>
</div>
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
