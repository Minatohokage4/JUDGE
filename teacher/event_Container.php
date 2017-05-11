
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
connectdb();
$subject_id = $_POST["subject_id"];
?>

</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>

<div class="container">

  <form action="problem.php" method="post" name='form1'>
    <div class="tile is-parent">
      <article class="tile is-child notification is-info">
        <p class="title">My Event</p>
        <table class="table">
          <thead>
            <tr>
              <th><abbr >No.</abbr></th>
              <th><abbr >Event</abbr></th>
              <th><abbr >Detail</abbr></th>

            </tr>
          </thead>

          <tbody>
            <?php

            connectdb();



            $query = "SELECT event_id,event_name FROM event where subject_id='$subject_id'";
            $result = mysql_query($query);
            while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>";
              echo "<div class='control is-grouped'>";
              echo "<p class='control'>";
              echo "<form method='post' action='problem.php'>";
              echo "<input type='hidden' name='event_id' value=".$row[0].">";
              echo "<input type='submit' class='button is-success' value='Enter'>";

              echo "</form>";

              echo "</p>";
              echo "</div>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>

      </article>
    </div>
  </form>
</div>
<!-- /container -->

<?php
include('footer.php');
?>
