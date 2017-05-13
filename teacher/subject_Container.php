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
<li class="active"><a href="subject_Container.php">subject_Container</a></li>
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
        <p class="title"><font size = '14'>My Subject</font></p>
        <p align = 'right'>
        <a class="button is-primary" onclick='location.replace("subject_add.php")' >Build Subject</a></p>
        <br><br>
        <table class="table">
          <thead>
            <tr>

              <th><abbr >Subject Name</abbr></th>
              <th><abbr >Subject No.</abbr></th>
              <th><abbr ></abbr></th>
              <th><abbr >Detail</abbr></th>
              <th><abbr ></abbr></th>
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
            echo "<input type='submit' class='button2' value='Enter'>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form method='post' action='edit_s.php'>";
            echo "<input type='hidden' name='subject_id' value=".$row[0].">";
            echo "<input type='hidden' name='subject_name' value=".$row[1].">";
            echo "<input type='submit' class='button5' value='Edit'>";
            echo "</form>";
            echo "<td>";
            echo "<form method='post' action='delete_subject.php'>";
            echo "<input type='hidden' name='subject_id' value=".$row[0].">";
            echo "<input type='submit' class='button3' value='Delete'>";
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
