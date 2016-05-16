 <?php 
 $pageTitle = "Login here..";
 include_once "header.php";
 ?>
 
 <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
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
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
 
 <?php include_once 'footer.php'; ?>