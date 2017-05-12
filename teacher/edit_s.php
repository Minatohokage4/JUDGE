<?php
require_once('../functions.php');
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');
$subject_id = $_POST['subject_id'];
$subject_name = $_POST['subject_name'];

?>

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
      <p class="title">Edit Subject</p>
      <form method="post" action="edit_subject.php">
        <input type="hidden" name="action" value="edit"/>
        <label class="label">Subject No</label>
        <p class="control">
          <input class="input is-success" name='subject_id_0' type="text" value="<?php echo $subject_id; ?>" >

        </p>
        <label class="label">Subject Name</label>
        <p class="control has-icon has-icon-right">

          <input class="input is-success" name='subject_name' type="text" value="<?php echo $subject_name; ?>" >

          
          <input type='hidden' name='subject_id' value="<?php echo $subject_id; ?>">

          <span class="icon is-small">
            <i class="fa fa-check"></i>
          </span>
        </p>
        <div class="control is-grouped">
          <p class="control">

            <input class="button is-primary" type="submit" name="submit" value="Submit"/>
          </p>
          <p class="control">
            <a class='button is-danger'  onClick='window.history.back();'>Back</a>
          </p>
        </div>
      </form>
    </div> <!-- /container -->

    <?php
    include('footer.php');
    ?>
