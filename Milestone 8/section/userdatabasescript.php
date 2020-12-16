<?php

$username = "";
$email = "";
$firstname = "";
$lastname = "";
$errors = [];
include_once('dlinks.php');

      if (isset($_POST['submit_login'])) {
        if (empty($_POST['username'])) {
            $errors['username'] = 'Username or Email required';
        }
        if (empty($_POST['password'])) {
            $errors['password'] = 'Password required';
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if (count($errors) === 0) {
            $query = "SELECT * FROM user_table WHERE username=? OR email=? LIMIT 1";
            $stmt = $dbco->prepare($query);
            $stmt->bind_param('ss', $username, $password);
    
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) { // if password matches
                    $stmt->close();
                    $_SESSION['user'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['firstname'] = $user['firstname'];
                    $_SESSION['lastname'] = $user['lastname'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['verified'] = $user['verified'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['message'] = 'You are logged in!';
                    $_SESSION['type'] = 'alert-success';
                    if ( in_array($_SESSION['user']['role'] == 1)) {
                        $_SESSION['message'] = "You are now logged in";
                        // redirect to admin area
                        header($headerlocation .$actual_admin_link);
                        exit(0);
                    } else {
                        $_SESSION['message'] = "You are now logged in";
                        // redirect to public area
                        header($headerlocation .$actual_default_link);				
                        exit(0);
                    }
                } else { // if password does not match
                    $errors['login_fail'] = "Wrong username or password";
                }
            } else {
                $_SESSION['message'] = "Database error. Login failed!";
                $_SESSION['type'] = "alert-danger";
            }
        }
    }


// Users of ChurchDatabase request 
      if (isset($_POST['submit_request'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $token = bin2hex(random_bytes(80)); // generate unique token
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password
        $state ="";
        $country = "" ; 
        $address = "" ;
        $postal_code = "" ;  
        $phone = "" ; 
        $position ="";
        $role = 0;
        $verified = 0;  
        $profile_pic = "";     

        if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'First Name required';
        }
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'Last Name required';
        }
        if (empty($_POST['username'])) {
            $errors['username'] = 'Username required';
        }
        if (empty($_POST['email'])) {
            $errors['email'] = 'Email required';
        }
        if (empty($_POST['password'])) {
            $errors['password'] = 'Password required';
        }
        if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordverifiaction']) {
            $errors['passwordverifiaction'] = 'The two passwords do not match';
        }


       
    
        // Check if email already exists
        $sql = "SELECT * FROM user_table WHERE email='$email' LIMIT 1";
        $result = mysqli_query($dbco, $sql);
        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = "Email already exists";
        }
        // Check if username already exists
        $sql = "SELECT * FROM user_table WHERE username='$username' LIMIT 1";
        $result = mysqli_query($dbco, $sql);
        if (mysqli_num_rows($result) > 0) {
            $errors['username'] = "Username already exists";
        }
    
        if (count($errors) === 0) {
            $query = "INSERT INTO user_table (firstname, lastname, username, email, password, address, state, postal_code, country, phone, position, role, verified, token, profile_pic, signup_date, updated_date)
            VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$address', '$state', '$postal_code', '$country', '$phone', '$position', '$role', '$verified', '$token', '$profile_pic', now(), now())";
            mysqli_query($dbco, $query);

			// get id of created user
			$result = mysqli_insert_id($dbco); 

			// put logged in user into session array
    
            if ($result) {
    
                // TO DO: send verification email to user
                // sendVerificationEmail($email, $token);
    
                
			    $_SESSION['user'] = getUserById($result);
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['verified'] = 0;
                $_SESSION['message'] = 'You are logged in and your acount need to be activated!';
                $_SESSION['type'] = 'alert-success';
                header($headerlocation .$actual_default_link);
                exit(0);
               
            } else {
                $_SESSION['error_msg'] = "Database error: Could not register user";
                exit(0);
            }
        }
    }
    function getUserById($id)
	{
		global $dbco;
		$sql = "SELECT * FROM user_table WHERE id=$id LIMIT 1";
		$result = mysqli_query($dbco, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user; 
    }
    

    /*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['submit_reset_password'])) {
    $email = mysqli_real_escape_string($dbco, $_POST['email']);
    // ensure that the user exists on our system
    $query = "SELECT email FROM user_table WHERE email='$email'";
    $results = mysqli_query($dbco, $query);
  
    if (empty($email)) {
      array_push($errors, "Your email is required");
    }else if(mysqli_num_rows($results) <= 0) {
      array_push($errors, "Sorry, no user exists on our system with that email");
    }
    // generate a unique random token of length 100
    $token = bin2hex(random_bytes(80));
  
    if (count($errors) == 0) {
      // store token in the password-reset database table against the user's email
      $sql = "INSERT INTO user_table (email, token) VALUES ('$email', '$token')";
      $results = mysqli_query($dbco, $sql);
  
      // Send email to user with the token in a link they can click on
      $to = $email;
      $subject = "Reset your password on churchdatabase.org";
      $msg = "Hi Member of the ChurchDatabase, click on this <a href=\"newpassword.php?token=" . $token . "\">link</a> to reset your password on our site";
      $msg = wordwrap($msg,70);
      $headers = "From: info@churchdatabase.org";
      mail($to, $subject, $msg, $headers);
      header('location: pending.php?email=' . $email);
    }
  }
  
  // ENTER A NEW PASSWORD
  if (isset($_POST['submit_new_password'])) {
    $newpassword = mysqli_real_escape_string($db, $_POST['newpassword']);
    $newpasswordvalidation = mysqli_real_escape_string($db, $_POST['newpasswordvalidation']);
  
    // Grab to token that came from the email link
    $token = $_SESSION['token'];
    if (empty($newpassword) || empty($newpasswordvalidation)) array_push($errors, "Password is required");
    if ($newpassword !== $newpasswordvalidation) array_push($errors, "Password do not match");
    if (count($errors) == 0) {
      // select email address of user from the password_reset table 
      $sql = "SELECT email FROM user_table WHERE token='$token' LIMIT 1";
      $results = mysqli_query($dbco, $sql);
      $email = mysqli_fetch_assoc($results)['email'];
  
      if ($email) {
        $newpassword = md5($newpassword);
        $sql = "UPDATE user_table SET password='$newpassword' WHERE email='$email'";
        $results = mysqli_query($dbco, $sql);
        header($headerlocation .$actual_default_link);
      }
    }
  }
?>