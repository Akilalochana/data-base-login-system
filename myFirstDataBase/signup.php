<?php
  include_once 'header.php';
?>

    <div class="form">
        <h1>Login page</h1>
    <form action="includes/signup.inc.php" method="POST">

        <input type="text" id="fname" name="name" placeholder="name">
        <input type="text" id="fname" name="email" placeholder="Email">
        <input type="text" id="fname" name="uid" placeholder="User name">
        <input type="password" id="fname" name="pwd" placeholder="password">

        <input type="password" id="lname" name="pwdrepeat" placeholder="repeat password">

        <button name = "submit" type="submit">Register</button>

        <p>Already have an account? <a href="login.php">Log in</a></p>

    </form>
    </div>


<?php
  include_once 'footer.php';
?>