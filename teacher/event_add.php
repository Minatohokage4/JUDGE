<style>
.button {
    background-color: #00FF00 ; /* Green */
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
}

.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */
.button4 {background-color: #e7e7e7; color: black;} /* Gray */
.button5 {background-color: #555555;} /* Black */
</style>
<?php

require_once('../functions.php');
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');
$subject_id = $_POST["subject_id"];
  ?>
  <style>
  input[type=text] {
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid red;
    border-radius: 4px;
  }
  </style>
  <li><a href="subject_Container.php">subject_Container</a></li>
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
      <p class="title"><font size = '6'>Add Event</font></p>
      <p align = 'right'>
      <form method="post" action="add_event.php">
        <input type="hidden" name="action" value="subject_add"/>
        <label class="label">Event Name</label>
        <p class="control has-icon has-icon-right">
          <input class="input is-success" name='event_name' type="text" placeholder="Event Name" >
          <input type='hidden' name='subject_id' value='<?php echo $subject_id; ?>'>
          <span class="icon is-small">
            <i class="fa fa-check"></i>
          </span>
        </p>
        <div class="control is-grouped">
          <p class="control">
          <input class="button2" type="submit" name="submit" value="Submit"/>
        </div>
      </form>
      <button class="button3" onclick="window.location.href='event_Container.php'">Back</button>
      </p>
    </div> <!-- /container -->

    <?php
    include('footer.php');
    ?>
