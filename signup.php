
<?php
include_once 'header.php';

 ?>

    <section class="main-container">
        <div class="main-wrapper">
          <h2>SignUp</h2>

          <form class="signup-form" action="includes/signup.inc.php " method="POST">


            <input type="text" name="first" placeholder="first name">
            <input type="text" name="last" placeholder="last name">
            <input type="text" name="email" placeholder="E-main">
            <input type="text" name="uid" placeholder="username">
            <input type="password" name="pwd" placeholder="password">


            <button type="submit" name="submit">SignUp</button>


          </form>

        </div>
    </section>

<?php

include_once 'footer.php'

 ?>
