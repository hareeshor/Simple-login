 <?php 
 require_once 'config/database.php';
 require_once 'lib/userMgmt.php';
 
 $db = new database();
 $con = $db->connect();
 
 $user = new users($con);
 
 
 $username = $email = $password = $cpass  = "";
 $Msg="";
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 	$username= $user->sanitizedata($_POST["username"]);
 	$email=$_POST["email"];
  	if (empty($_POST["username"])) {
 		$Msg = "Username is required <br/>";
 		$type = "danger";
 	} 
 	elseif (empty($_POST["pwd"])) {
 		$Msg .= "Password is required <br/>";
 		$type = "danger";
 	}  
 	elseif (empty($_POST["cpwd"])) {
 		$Msg .= "Confirm Password is required <br/>";
 		$type = "danger";
 	} 
 	elseif ($_POST["pwd"] != $_POST["cpwd"]) {
 		$Msg .= "Password and Confirm Password does not match";
 		$type = "danger";
 	} 	
 	elseif(empty($_POST["email"])) {
 		$Msg .= "Email is required <br/>";
 		$type = "danger";
 	} 	
 	else {
 		$user->password = $_POST["pwd"];
 		$user->username = $_POST["username"];
 		$user->email = $_POST["email"];
 		if($user->getUserinfo($username) == 1){
 			$Msg = "Username already exists please create new";
 			$type = "danger";
 		} 
 		else {
 			if ($user->registerUser() == 1) {
 				$Msg = "User account has been created";
 				$type = "success";
 				header('Location: home.php');
 				exit;
 			}
 			else {
 				$Msg = "Unable to create user account, please try again later";
 				$type = "danger";
 			}
 		} 		
 	}
 } 
 
 $pageTitle = "New user - Sign up ";
 include_once "header.php";
 ?>
 <h3>User Registration</h3> 
 
 <?php
 if (isset($Msg) && $Msg != "" )
 	{
 	  echo "<div class=\"alert alert-$type\">$Msg</div>";
 	} 
 ?>

 <form class="form-horizontal register" method="post" id="register" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" maxlength="25" value="<?php echo $username;  ?>">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-7"> 
      <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" maxlength="15">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
    <div class="col-sm-7"> 
      <input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="Confirm password" maxlength="15">
    </div>
  </div>  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-7">
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" maxlength="35" value="<?php echo $email;  ?>">
    </div>
  </div>

  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
 
 <?php include_once 'footer.php'; ?>
