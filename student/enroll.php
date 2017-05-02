<?php

require_once('../functions.php');
connectdb();
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');

?>

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
  <form action="problem.php" method="post" name='form1'>
  <br><br><br><br>
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

            </tr>
          </thead>

          <tbody>

<?php
echo "<script language=\"JavaScript\">";
echo "alert('ลงทะเบียนในวิชานี้เรียบร้อยแล้ว')";
echo "</script>";
connectdb();
 $subject_id=$_POST["subject_id"];
//echo "$subject_id";

  $query = "SELECT subject_id,subject_name FROM subject  WHERE subject_id='$subject_id'";
  $result = mysql_query($query);
  $subject_name ;
  //echo "$query" ;
  //echo "<br>";
  while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
    //echo "$row[0]";
    $subject_name = "$row[1]";
    }
    //echo "$subject_name" ;

    $query = "INSERT INTO `regis`(`subject_id`, `subject_name`, `student_id`) VALUES ('$subject_id','$subject_name','".$_SESSION['sl']."')";
    //echo "$query1";
    $result = mysql_query($query);
    $query1 = "SELECT subject_id,subject_name FROM regis  WHERE student_id='".$_SESSION['sl']."'";
    $result1 = mysql_query($query1);
    while($row = mysql_fetch_array($result1,MYSQLI_NUM)) {
        echo "<tr>";
        echo "<td>".$row[0]."</td>";
        echo "<td>".$row[1]."</td>";
        echo "<td>";
        echo "<div class='control is-grouped'>";
        echo "<p class='control'>";
        echo "<form method='post' action='problem.php'>";
        echo "</p>";
        echo "<p class='control'>";
        echo "</form>";
        echo "<button class='button is-success'>";
        echo "Enter";
        echo "</p>";
        echo "</div>";
        echo "<td>";
        echo "<button class='button is-danger'>";
        echo "<a href='unroll.php?subject_id=$row[0]'>";
        echo "Unenroll</a></td>";
        echo "</button>";
        echo "</td>";
        echo "</tr>";
      }

?>

<Meta http-equiv="refresh"content="1;URL=subject.php">
</tbody>
</table>
</article>
</div>
</form>
</div> <!-- /container -->

<?php
include('footer.php');
?>
