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
 
              <li class="active"><a href="#">Scoreboard</a></li>
           
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
           <?php
        $query = "SELECT name,sl FROM problems WHERE event_id=2";
        $result = mysql_query($query);
        // add variable
        $problems_by_id=array();
        while($row = mysql_fetch_array($result)) {
            echo "<th>".$row[0]."</th>";
            $problems_by_id[]=$row[1];
        }
      ?>
    
        
      </tr></thead>
      <tbody>
      <?php
        $query = "SELECT username, status FROM users WHERE username!='admin' AND Type=0";
        $result = mysql_query($query);
        while($row = mysql_fetch_array($result)) {
          echo("<tr><td>".$row['username']." ");
            for ($i=0; $i < count($problems_by_id); $i++) { 
          $sql = "SELECT * FROM solve WHERE ( status='2'  AND problem_id=$problems_by_id[$i] AND username='".$row['username']."')";
          $res = mysql_query($sql);
          if($row['status'] == 0) 
                echo("</a> <span class=\"label label-important\">Banned</span>");
          echo("</td><td><span class=\"badge badge-success\">".mysql_num_rows($res));
          }
        }
       /* $i=0;
       	while($row = mysql_fetch_array($result)) {
       		// displays the user, problems solved and attempted
       		$sql = "SELECT * FROM solve WHERE ( status='2' AND problem_id=$problems_by_id[$i] AND username='".$row['username']."')";

       		$res = mysql_query($sql);

       		echo("<tr><td>".$row['username']." ");
       		if($row['status'] == 0) echo("</a> <span class=\"label label-important\">Banned</span>");
       		echo("</td><td><span class=\"badge badge-success\">".mysql_num_rows($res));
       		$i++;
       	}*/
      ?>
      </tbody>
      </table>
    </div> <!-- /container -->

<?php
	include('footer.php');
?>
