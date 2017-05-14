<?php
/*
 * Codejudge

 * Scoreboard page
 */
	require_once('../functions.php');
	if(!loggedin())
		header("Location: login.php");
	else
		include('header.php');
		connectdb();
?>
							<li><a href="subject_Container.php">Subject Container</a></li>
							<li><a href="index.php">Teacher Panel</a></li>
							<li><a href="users.php">Users</a></li>
							<li class="active"><a href="scoreboard.php">Scoreboard</a></li>
							<li><a href="logout.php">Logout</a></li>


            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    The current standings of all the participants, the number of problems they have attempted and solved.
    <table class="table table-striped">
      <thead><tr>
        <th>Name</th>



      </tr></thead>

       
      </tbody>
      </table>
    </div> <!-- /container -->

<?php
	include('footer.php');
?>
