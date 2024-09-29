<?php
  include_once 'header.php';
?>

    <div class="form">
        <h1>Login page</h1>
    <form action="includes/login.inc.php" method="POST">

        <input type = "text" id = "fname" name = "uid" placeholder = "Email/user name">

        <input type = "password" id="lname" name = "pwd" placeholder = "password">

        <button name = "submit" type = "submit">Login</button>

    </form>
    <p>New here ? <a href="signup.php">Register</a></p>
    </div>


<?php
  include_once 'footer.php';
?>