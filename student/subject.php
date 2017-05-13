<?php
require_once('../functions.php');
connectdb();
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');
  $query2 = "SELECT `name`, lastname FROM profile  WHERE sl ='".$_SESSION['sl']."' ";
  $result2 = mysql_query($query2);

  if(mysql_num_rows($result2)==0){
    header("Location:register_student.php");
  }
?>

<script language="JavaScript">
function chkdel(){if(confirm('Want to unenroll this subject?')){
	return true;
}else{
	return false;
}
}
</script>

<div class="tabs is-centered">
  <ul>
    <li class="is-active"><a>Subject</a></li>
    <li ><a href="profile.php">
    <figure class="image is-16x16" style="margin-right: 8px;">
          <img src="http://bulma.io/images/jgthms.png">
        </figure>
        Profile
        </a>
      </li>
  </ul>


</div>
</div><!--/.nav-collapse -->
</div>
</div>
</div>

<?php
    $query = "SELECT `username` FROM `users`  WHERE sl ='".$_SESSION['sl']."'";
    $result = mysql_query($query);

    while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
       $username =  "$row[0]";
    }
      //echo $username ;
      echo "<p align = 'right'><font size = '5'>คุณเข้าสู่ระบบในชื่อ
      <a href='profile.php?username=$username'> $username </a>";
      echo "<a class='button is-small is-danger is-outlined' href='../logout.php'>Logout</a><br><br>";
      echo date("l") ."&nbsp". date("d M Y")."<br>"."<br>" ."</font>" ;
      include('time.php');
      echo "</p>"."<br>";

?>
<div class="columns">
  <br><br>
  <div class="column">
    <br><br><br><br>
    <nav class="panel">
  <p class="panel-heading">
    calendar
  </p>
    <?php
include('calendar.php');
//include('clock.html');

    ?>
  </nav>
  </div>
<div class="column">
<div class="container">
  <br>
    <div class="tile is-parent">
      <article class="tile is-child notification is-info">
        <p class="title">My Subject</p>
        <p class="title" align="right">
        <a class="button is-primary"  onclick='location.replace("subject_add.php")'>Enroll Subject</a>
        <table class="table">
          <thead>
            <tr>

              <th><abbr >Subject No.</abbr></th>
              <th><abbr >Subject Name.</abbr></th>
              <th><abbr >Detail</abbr></th>
              <th><abbr ></abbr></th>
            </tr>
          </thead>

          <tbody>
            <?php

            $query = "SELECT subject_id,subject_name FROM regis  WHERE student_id='".$_SESSION['sl']."'";

            $result = mysql_query($query);
           /* $fields = mysql_fetch_array($result);
            $_SESSION['subject_id'] = $fields['subject_id'];*/


  if(mysql_num_rows($result)==0){
      echo "<tr>";
      echo "<td>"."None"."</td>";
      echo "<td>"."None"."</td>";
      echo "<td>";
      echo "<div class='control is-grouped'>";
      echo "<p class='control'>";
      echo "</p>";
      echo "<p class='control'>";
      echo "</form>";
      echo "<button class='button is-warning'>";
      echo "NoDetail</a></td>";
      echo "</button>";
      echo "</td>";
      echo "</p>";
      echo "</div>";
      echo "<td>";
      echo "</tr>";
            }else {
              while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
                echo "<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>";
                echo "<div class='control is-grouped'>";
                echo "<p class='control'>";
                echo "</p>";
                echo "<p class='control'>";
                echo "</form>";
                echo "<button class='button is-success' >";
                echo "<a href='event.php?subject_id=$row[0]'>";
                echo "Enter</a></td>";
                echo "</button>";
                echo "</p>";
                echo "</div>";
                echo "<td>";
                echo "<button class='button is-danger' onclick='return chkdel();' >";
                echo "<a href='unroll.php?subject_id=$row[0]'>";
                echo "Unenroll</a></td>";
                echo "</button>";
                echo "</td>";
                echo "</tr>";
            }
          }

            ?>


          </tbody>
        </table>
      </article>
    </div>
</div></div></div></div>

<?php
include('footer.php');
?>
</div>
