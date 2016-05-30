<?php
session_start();
require_once 'config/database.php';
require_once 'lib/userMgmt.php';
require_once('lib/noCSRF.php');

$db = new database ();
$con = $db->connect ();
$user = new users ( $con );

// check post data
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	//csrf token validation
	try
	{
		// Run CSRF check, on POST data, in exception mode, for 10 minutes, in one-time mode.
		NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
		// form parsing, DB inserts, etc.
		
		//data sanitization and login check
		$user->email = $user->sanitizedata ( $_POST ["email"] );
		$user->password = md5 ( $_POST ["password"] );
		if ($user->userlogin () == 1) {
			// login success
			$_SESSION['logged_user']= $user->email;
			$user->redirect ( 'home.php' );
		} else {
			// Username password incorrect
			$user->redirect ( 'index.php?error=' );
		}
		
	}
	catch ( Exception $e )
	{
		// CSRF attack detected
		$result = $e->getMessage() . ' Form ignored.';
	}
} 

else {
	// prevents direct script access
	$user->redirect ( 'index.php' );
}





