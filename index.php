 <?php 
 // Tokens are stored in session so you have to initialize session data
 session_start();
 // Then include the NoCSRF class
 require_once('lib/noCSRF.php');
 $token = NoCSRF::generate( 'csrf_token' );
 
 $pageTitle = "Login here..";
 include_once "header.php";
 ?>
 
 <?php
 if (isset($_GET['error'])) {
 	$Msg="Email/Password incorrect";
 	$type="danger";
 } 
 
 
 if (isset($Msg) && $Msg != "" )
 	{
 	  echo "<div class=\"alert alert-$type\">$Msg</div>";
 	} 
 ?>
 <form class="form-signin" action="login.php" method="post" id="signin" >
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
           <p>
          Are you a new User ? <a href="register.php" class="btn btn-xs btn-link" role="button">Sign up</a> 
          </p>
          <p>
          Forgot your password ?<a href="#" class="btn btn-xs btn-link" role="button">Reset password</a>
          </p>
        </div>
        <input type="hidden" name="csrf_token" value="<?=$token;?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
 
 <?php include_once 'footer.php'; ?>