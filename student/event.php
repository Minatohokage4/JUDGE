<?php

require_once('../functions.php');
connectdb();
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');

?>

<li><a href="subject.php">Subject</a></li>

</ul>
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
     // echo $username ;
     echo "<p align = 'right'><font size = '5'>คุณเข้าสู่ระบบในชื่อ
     <a href='profile.php?username=$username'> $username </a><a href='../logout.php'>(LogOut)</a></font></p>" ;


?>
<div class="container">
  <form action="index.php" method="post" name='form1'>
  <br><br><br><br>
    <div class="tile is-parent">
      <article class="tile is-child notification is-info">
        <p class="title">My Event</p>
        <p class="title" align="right">
        <table class="table">
          <thead>
            <tr>
              <th><abbr >Subject No.</abbr></th>
              <th><abbr >Event Name.</abbr></th>
              <th><abbr >Detail</abbr></th>
            </tr>
          </thead>

          <tbody>

<?php
      $subject_id = $_GET['subject_id'];
//echo $subject_id ;
  connectdb();

  $query = "SELECT * FROM `event` WHERE subject_id = '".$subject_id."'";
  $result = mysql_query($query);

if(mysql_num_rows($result)==0){
  echo "<tr>";
  echo "<td>"."None"."</td>";
  echo "<td>"."None"."</td>";
  echo "<td>";
  echo "<div class='control is-grouped'>";
  echo "<p class='control'>";
  echo "<form method='post' action='index.php'>";
  echo "</p>";
  echo "<p class='control'>";
  echo "</form>";
  echo "<button class='button is-warning' onClick='history.back()' >";
  echo "No Details";
  echo "</p>";
  echo "</div>";
  echo "<td>";
  echo "</td>";
  echo "</tr>";
}else {
      while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
          echo "<tr>";
          echo "<td>".$row[2]."</td>";
          echo "<td>".$row[1]."</td>";
          echo "<td>";
          echo "<div class='control is-grouped'>";
          echo "<p class='control'>";
          echo "<form method='post' action='problem.php'>";
          echo "</p>";
          echo "<p class='control'>";
          echo "</form>";
          echo "<button class='button is-success'>";
          echo "<a href='index.php?event_id=$row[0]'>";
          echo "Enter";
          echo "</p>";
          echo "</div>";
          echo "<td>";
          echo "</td>";
          echo "</tr>";
        }
}
 ?>
</tbody>
</table>
<p class="control" >
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<button class="button is-danger" onClick="history.back()" align="center">Cancel</button>
</p>
</article>
</div>
</form>
</div> <!--

 <?php
 include('footer.php');
 ?>
