<?php
/*
 * Codejudge
 * * NANTIPAT TULLWATTANA SOFTWARE ENGINEER
 * Licensed under MIT License.
 *
 * Solution submission page
 */
	require_once('../functions.php');
	if(!loggedin())
		header("Location: login.php");
	else
		include('header1.php');
		connectdb();
?>

              <li><a href="index.php">Problems</a></li>
              <li><a href="submissions.php">Submissions</a></li>
              <li><a href="scoreboard.php">Scoreboard</a></li>
              <li><a href="account.php">Account</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    <?php

        $query = "SELECT sl FROM `problems` WHERE event_id in (SELECT event_id FROM event WHERE subject_id = '977-001')";
        $result = mysql_query($query);

				  while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
								$query1 = "DELETE FROM `solve` WHERE username in (SELECT username FROM users WHERE sl = '".$_SESSION['sl']."') and problem_id in (SELECT problem_id WHERE problem_id = '$row[0]' )";
								$result1 = mysql_query($query1);
								echo $query1 ."<br>";
					}

?>
<?php
	include('footer.php');
?>
