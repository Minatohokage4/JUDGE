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

?>

<li><a href="subject_Container.php">subject_Container</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>
<?php
  if(isset($_GET['changed']))
    echo("<div class=\"alert alert-success\">\nSettings Saved!\n</div>");
  if(isset($_GET['delete']))
      echo("<div class=\"alert alert-success\">\nDelete Complete\n</div>");

  ?>

<div class="container">
  <form action="event_Container.php" method="post" name='form1'>
    <br><br><br><br>
    <div class="tile is-parent">
      <article class="tile is-child notification is-info">
        <p class="title">My Subject</p>
        <a class="button is-primary" onclick='location.replace("subject_add.php")'>Build Subject</a>
        <table class="table">
          <thead>
            <tr>

              <th><abbr >Subject Name</abbr></th>
              <th><abbr >Subject No.</abbr></th>
              <th><abbr >Detail</abbr></th>

            </tr>
          </thead>

          <tbody>
            <?php
            connectdb();
            $query = "SELECT subject_id,subject_name FROM subject  WHERE Teacher_id='".$_SESSION['sl']."'";

            $result = mysql_query($query);
           /* $fields = mysql_fetch_array($result);
           $_SESSION['subject_id'] = $fields['subject_id'];*/
           echo "<div class='control is-grouped'>";
           while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
            echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row[1]."</td>";
            echo "<td>";
            echo "<p class='control'>";
            echo "<form method='post' action='event_Container.php'>";
            echo "<input type='hidden' name='subject_id' value=".$row[0].">";
            echo "<input type='submit' class='button is-success' value='Enter'>";
            echo "</form>";
            echo "<form method='post' action='edit.php'>";
            echo "<input type='hidden' name='subject_id' value=".$row[0].">";
            echo "<input type='hidden' name='subject_name' value=".$row[1].">";
            echo "<input type='submit' class='button is-success' value='Edit'>";
            echo "</form>";
            echo "<form method='post' action='delete_subject.php'>";
            echo "<input type='hidden' name='subject_id' value=".$row[0].">";
            echo "<input type='submit' class='button is-success' value='Delete'>";
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
</div> <!-- /container -->

<?php
include('footer.php');
?>
