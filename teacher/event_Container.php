
<?php


require_once('../functions.php');
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');
connectdb();
$subject_id = $_POST["subject_id"];
?>
<style>
.button {
    background-color: #4CAF50; /* Green */
    border-radius: 10px;
    border: none;
    color: black;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
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

.button3 {background-color: #FF7373;/* Red delete button */
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
  border-radius: 10px;
  border: none;
  color: black;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
  }


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
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: black;
}
</style>
<li class="active"><a href="subject_Container.php">subject_Container</a></li>
<li><a href="index.php">Teacher Panel</a></li>
<li><a href="active">Users</a></li>
<li><a href="scoreboard.php">Scoreboard</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>

<div class="container">
    <div class="tile is-parent">
      <article class="tile is-child notification is-info">
      <p class="title"><font size = '14'>My Event</font></p>
      <p align = 'right'>
      <form action="event_add.php" method="post">
      <input type='hidden' name='subject_id' value='<?php echo $subject_id; ?>'>
      <input type="submit" class='button' value="Add Event"></a></p>
      </form>
        <br><br>
        <table>
          <thead>
            <tr>
              <th><abbr >No.</abbr></th>
              <th><abbr >Event</abbr></th>
              <th><abbr ></abbr></th>
              <th><abbr >Detail</abbr></th>
              <th><abbr ></abbr></th>
            </tr>
          </thead>

          <tbody>
            <?php

            connectdb();



            $query = "SELECT event_id,event_name FROM event where subject_id='$subject_id'";
            $result = mysql_query($query);


            if(mysql_num_rows($result)==0){
              echo "<tr>";
              echo "<td>"."None"."</td>";
              echo "<td>"."None"."</td>";
              echo "<td>"."</td>";
              echo "<div class='control is-grouped'>";
              echo "<p class='control'>";
              echo "<td>";
              echo "<form method='post' action='subject_Container.php'>";
              echo "<input type='submit' class='button4' value='No Detail'>";
              echo "</form>";
              echo "</td>";
              echo "<td>"."</td>";
              echo "</div>";
              echo "</tr>";
            }else {
              while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
                echo "<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>";
                echo "<div class='control is-grouped'>";
                echo "<p class='control'>";
                echo "<form method='get' action='index.php'>";
                echo "<input type='hidden' name='event_id' value=".$row[0].">";
                echo "<input type='submit' class='button2' value='Enter'>";
                echo "</form>";
                echo "</td>";
                echo "<td>";
                echo "<form method='post' action='edit_e.php'>";
                echo "<input type='hidden' name='event_id' value=".$row[0].">";
                echo "<input type='hidden' name='event_name' value=".$row[1].">";
                echo "<input type='submit' class='button5' value='Edit'>";
                echo "</form>";
                echo "</td>";
                echo "<td>";
                echo "<form method='post' action='delete_event.php'>";
                echo "<input type='hidden' name='event_id' value=".$row[0].">";
                echo "<input type='submit' class='button3' value='Delete'>";
                echo "</form>";
                echo "</p>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
                    }
            }
            ?>
          </tbody>
        </table>

      </article>
    </div>

</div>
<!-- /container -->

<?php
include('footer.php');
?>
