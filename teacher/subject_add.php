<style>

.button {
    background-color: #4CAF50; /* Green */
    border-radius: 10px;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button2 {background-color: #357EC7; /*ิblue enter button*/
  border-radius: 10px;
  border: none;
  color: black;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;}

.button3 {background-color: #BCC6CC;/*back button */
  border-radius: 10px;
  border: none;
  color: black;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;}



.button4 {background-color: #e7e7e7; color: black; /* Gray */
}


.button5 {background-color: #FFDB58; }
</style>
<?php
/*
 * Codejudge
 * NANTIPAT TULLWATTANA SOFTWARE ENGINEER
 * Licensed under MIT License.
 *
 * The main page that lists all the problem
 */
require_once('../functions.php');
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');
if(isset($_POST['action'])) {
  $username = array_key_exists('username', $_POST) ? mysql_real_escape_string(trim($_POST['username'])) : "";
  if($_POST['action']=='subject_add') {

    $SubjectNo= array_key_exists('SubjectNo', $_POST) ? mysql_real_escape_string(trim($_POST['SubjectNo'])) : "";
    $SubjectName= array_key_exists('SubjectName', $_POST) ? mysql_real_escape_string(trim($_POST['SubjectName'])) : "";
    if(trim($SubjectNo) == "" and trim( $SubjectName) == "") {
        header("Location: subject_add.php?derror=1"); // empty entry
      } else {
        connectdb();
        $query = "SELECT salt,hash FROM users WHERE username='".$username."'";
        $result = mysql_query($query);


        $sql="INSERT INTO `subject` ( `subject_id` , `subject_name` , `Teacher_id`) VALUES ('".$SubjectNo."', '". $SubjectName."','".$_SESSION['sl']."')";
        mysql_query($sql);
        header("Location: subject_Container.php");

      }
    }
  }


  ?>
  <style>
  input[type=text] {
    width: 25%;
    padding: 15px 20px;
    margin: 10px 0;
    box-sizing: border-box;
    border: 2px solid gray;
    border-radius: 4px;
  }
  </style>
  <li class="active"><a href="subject_Container.php">Subject Container</a></li>
  <li><a href="index.php">Teacher Panel</a></li>
  <li><a href="users.php">Users</a></li>
  <li><a href="scoreboard.php">Scoreboard</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>
<?php
if(isset($_GET['logout']))
  echo("<div class=\"alert alert-info\">\nYou have logged out successfully!\n</div>");
else if(isset($_GET['error']))
  echo("<div class=\"alert alert-error\">\nIncorrect username or password!\n</div>");
else if(isset($_GET['registered']))
  echo("<div class=\"alert alert-success\">\nYou have been registered successfully! Login to continue.\n</div>");
else if(isset($_GET['exists']))
  echo("<div class=\"alert alert-error\">\nUser already exists! Please select a different username.\n</div>");
else if(isset($_GET['derror']))
  echo("<div class=\"alert alert-error\">\nPlease enter all the details asked before you can continue!\n</div>");
?>
<div class="container">
  <br><br><br><br>
  <div class="tile is-parent">
    <article class="tile is-child notification is-info">
      <p class="title"><font size = '6'>Add Subject</font></p>
      <p align = 'right'>
      <form method="post" action="subject_add.php">
        <input type="hidden" name="action" value="subject_add"/>
        <label class="label"><font size = '3'>Subject No</label>
        <p class="control">
          <input class="input is-success" name='SubjectNo' type="text" placeholder="" >
        </p>
        <label class="label"><font size = '3'>Subject Name</label>
        <p class="control has-icon has-icon-right">
          <input class="input is-success" name='SubjectName' type="text" placeholder="" >
          <span class="icon is-small">
            <i class="fa fa-check"></i>
          </span>
        </p>
        <div class="control is-grouped">
          <p class="control">
          <input class="button2" type="submit" name="submit" value="Submit"/>
        </div>
      </form>
      <button class="button3" onClick='window.history.back();'>Back</button>
      </p>
    </div> <!-- /container -->

    <?php
    include('footer.php');
    ?>
