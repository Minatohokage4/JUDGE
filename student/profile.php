<?php

require_once('../functions.php');
connectdb();
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');

?>


<script language="JavaScript">
function chkdel(){if(confirm('Want to Update your profile')){
	return true;
}else{
	return false;
}
}
</script>

<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>
</div>
<table>


</table>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>
<br>
<?php
    $query = "SELECT `username`, `email` FROM `users`  WHERE sl ='".$_SESSION['sl']."'";
    $result = mysql_query($query);
    $query2 = "SELECT `name`, lastname FROM profile  WHERE sl ='".$_SESSION['sl']."'";
    $result2 = mysql_query($query2);
      while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
       $username =  "$row[0]";
       $email = "$row[1]" ;
         }
     // echo $username ;
     while($row = mysql_fetch_array($result2,MYSQLI_NUM)) {
      $name =  "$row[0]";
      $lastname = "$row[1]" ;
        }
        echo "<p align = 'right'><font size = '5'>คุณเข้าสู่ระบบในชื่อ
        <a href='profile.php?username=$username'> $username </a><a href='../logout.php'>(LogOut)</a></font></p>" ;


?>
<br>
<div class="container">

  <tbody>
    <?php
      if(isset($_GET['changed']))
        echo("<div class=\"alert alert-success\">\nSettings Saved!\n</div>");
      /*else if(isset($_GET['passerror']))
        echo("<div class=\"alert alert-error\">\nThe old password is incorrect!\n</div>");
      else if(isset($_GET['derror']))
        echo("<div class=\"alert alert-error\">\nPlease enter all the details asked before you can continue!\n</div>");*/
    ?>
<form action="update_profile.php" method="post">
      <div class="tile is-parent">
        <article class="tile is-child notification is-info">
          <p class="title">Profile</p>
          <table class="table">
          <font  color="#000000" size="4">UserName :<br>
          </font> <input type="text" color="#FF0000" style="width:560px"
           readonly="readonly" name="username" style="background:#FF0000" value="<?php echo $username ;?>" placeholder = "<?php echo $username ;?>"><br>
          <font  color="#000000" size="4">Name     :</font><br>
        </font> <input type="text" style="width:560px" name="name" value="<?php echo $name ;?>" placeholder = "<?php echo $name ;?>"><br>
          <font  color="#000000" size="4">LastName :</font><br>
        </font> <input type="text" style="width:560px" name="lastname" value="<?php echo $lastname ;?>" placeholder = "<?php echo $lastname;?>"><br>
          <font  color="#000000" size="4">Email    :</font><br>
        </font> <input type="text" style="width:560px" name="email" value="<?php echo $email ;?>"  placeholder = "<?php echo $email;?>" ><br>

        </da>


          <br><br><br>
        <div class="control is-grouped">
          <p class="control">
            <button class="button is-primary" onclick="return chkdel();">Update</button>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          </p>
          </form>
          <form action="subject.php" method="post">
          <p class="control">
            <button class="button is-danger" onClick='history.back()'>Cancel</button>
          </p>
          </form>
        </div>
      </tbody>
</table>
  </article>

</div>

</div> <!-- /container -->

<?php
include('footer.php');
?>
