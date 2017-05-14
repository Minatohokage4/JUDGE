<style>


.button {
    background-color: #357EC7; /* Green */
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

.button2 {background-color: #357EC7; /*ิblue enter button*/}

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
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color:  #0000FF ;
    color: white;
}
</style>

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

<?php
require_once('../functions.php');
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');
$event_id = $_POST['event_id'];
$event_name = $_POST['event_name'];


?>

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
      <p class="title"><font size = '6'>Edit Event</p>
      <form method="post" action="edit_event.php">
        <input type="hidden" name="action" value="edit"/>

        <label class="label"><font size = '3'>Event Name</label>
        <p class="control has-icon has-icon-right">

          <input class="input is-success" name='event_name' type="text" value="<?php echo $event_name; ?>" >
          <input type='hidden' name='event_id' value="<?php echo $event_id; ?>">

          <span class="icon is-small">
            <i class="fa fa-check"></i>
          </span>
        </p>
        <div class="control is-grouped">
          <p class="control">

            <input class="button is-primary" type="submit" name="submit" value="Submit"/>
          </p>
          <p class="control">
            <button class="button3"  onClick='window.history.back();'>Back</button>
          </p>
        </div>
      </form>
    </div> <!-- /container -->

    <?php
    include('footer.php');
    ?>
