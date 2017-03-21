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
?>
             
              <li><a href="subject_Container.php">subject_Container</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    
    </div> <!-- /container -->

<?php
  include('footer.php');
?>
