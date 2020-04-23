<?php include_once('lib/header.php'); require_once('functions/alert.php'); ?>
<p>
<?php
     print_alert(); ?>
</p>

<p> Welcome to the hospital </P>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Welcome to SMG Hospital for the Ignorant</h1>
  <p class="lead">This is a specialist hospital for sure</p>
  <p class="lead">Come as you are, its completely free.</p>
  <a class="btn btn-bg btn-outline-secondary" href="login.php">Login</a>
  <a class="btn btn-bg btn-outline-secondary" href="register.php">Register</a>
</div>

<hr>
<?php include_once('lib/footer.php');  ?>