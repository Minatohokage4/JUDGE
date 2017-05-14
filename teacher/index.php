<?php
/*
 * Codejudge

 * Codjudge admin panel
 */
	require_once('../functions.php');
	if(!loggedin())
		header("Location: login.php");
	else
		include('header.php');
		connectdb();
		$event_id = $_GET["event_id"];
    
    //echo $event_id;
?>
<style>
.button {
    background-color: #4CC552 ; /* Green Build subject*/
    border-radius: 10px;
    border: none;
    color: black;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
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



.button5 {background-color: #FFDB58; /* yellow edit button */
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

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 10px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color:  #66CCFF ;
    color: black;
}
</style>
							<li><a href="subject_Container.php">Subject Container</a></li>
              <li class="active"><a href="#">Teacher Panel</a></li>
              <li><a href="users.php">Users</a></li>
							<li><a href="scoreboard.php">Scoreboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <?php
        if(isset($_GET['changed']))
          echo("<div class=\"alert alert-success\">\nSettings Saved!\n</div>");
        else if(isset($_GET['passerror']))
          echo("<div class=\"alert alert-error\">\nThe old password is incorrect!\n</div>");
        else if(isset($_GET['derror']))
          echo("<div class=\"alert alert-error\">\nPlease enter all the details asked before you can continue!\n</div>");
      ?>
      <ul class="nav nav-tabs">
        <li class="active"><a href="#">General</a></li>
        <li><a href="problems.php?event_id=<?php echo $event_id ?>">Problems</a></li>
      </ul>
      <div>
        <div>
          <form method="post" action="update.php">
          <?php
          	$query = "SELECT name, accept, c, cpp, java, python FROM prefs";
          	$result = mysql_query($query);
          	$fields = mysql_fetch_array($result);
          ?>
          <input type="hidden" name="action" value="settings"/>
          Name of event: <input name="name" type="text" value="<?php echo($fields['name']);?>"/><br/>
          <input name="accept" type="checkbox" <?php if($fields['accept']==1) echo("checked=\"true\"");?>/> <span class="label label-important">Accept submissions</span><br/>
          <h1><small>Languages</small></h1>
          <input name="c" type="checkbox" <?php if($fields['c']==1) echo("checked=\"true\"");?>/> C<br/>
          <input name="cpp" type="checkbox" <?php if($fields['cpp']==1) echo("checked=\"true\"");?>/> C++<br/>
          <input name="java" type="checkbox" <?php if($fields['java']==1) echo("checked=\"true\"");?>/> Java<br/>
          <input name="python" type="checkbox" <?php if($fields['python']==1) echo("checked=\"true\"");?>/> Python<br/><br/>
          <input class="button2" type="submit" name="submit" value="Save Settings"/>
          </form>
          <hr/>

          <form method="post" action="update.php">
          <input type="hidden" name="action" value="password"/>
          <h1><small>Change Password</small></h1>
          Old password: <input type="password" name="oldpass"/><br/>
          New password: <input type="password" name="newpass"/><br/><br/>
          <input class="button5" type="submit" name="submit" value="Change Password"/>
          </form>
          <hr/>

          <form method="post" action="update.php">
          <input type="hidden" name="action" value="email"/>
          <h1><small>Change Email</small></h1>
          <?php
          	$query = "SELECT email FROM users WHERE username='aziz'";
          	$result = mysql_query($query);
          	$fields = mysql_fetch_array($result);
          ?>
          Email: <input type="email" name="email" value="<?php echo $fields['email'];?>"/><br/><br/>
          <input class="button5" type="submit" name="submit" value="Change Email"/>
          </form>
        </div>
      </div>
    </div> <!-- /container -->

<?php
	include('footer.php');
?>
