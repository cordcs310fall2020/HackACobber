<?php 

$fileconf = "../database/db.config";
$env = json_decode(file_get_contents($fileconf)); 
$dbco= mysqli_connect($env->host, $env->root, $env->pass, $env->db, $env->port);
include('dlinks.php');
// Admin user variables
$user_id = 0;
$isEditingUser = false;
$username = "";
$email = "";
$firstname = "";
$lastname = "";
$address = "";
$postal_code = "";
$position = "";
$verified = 0;  
$errors = [];

/* - - - - - - - - - - 
-  Admin users actions
- - - - - - - - - - -*/
// if user clicks the create admin button
if (isset($_POST['create_user'])) {
	createAdmin($_POST);
}
// if user clicks the Edit admin button
if (isset($_GET['edit-user'])) {
	$isEditingUser = true;
	$user_id = $_GET['edit-user'];
	editAdmin($user_id);
}
// if user clicks the update admin button
if (isset($_POST['update_user'])) {
	updateAdmin($_POST);
}
// if user clicks the Delete admin button
if (isset($_GET['delete-user'])) {
	$user_id = $_GET['delete-user'];
	deleteAdmin($user_id);
}
/* - - - - - - - - - - - -
-  Admin users functions
- - - - - - - - - - - - -*/
/* * * * * * * * * * * * * * * * * * * * * * *
* - Receives new admin data from form
* - Create new admin user
* - Returns all admin users with their roles 
* * * * * * * * * * * * * * * * * * * * * * */



function createAdmin($request_values){
    // Users of ChurchDatabase request 
        
	if(isset($request_values['role'])){
		$role = esc($request_values['role']);
	}
        global $headerlocation, $actual_admin_users_link, $dbco,$errors,$firstname,$lastname,$username,$email, $token, $password, $state, $country,$address,$postal_code,$phone,$position,$role, $verified, $profile_pic;  
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $token = bin2hex(random_bytes(80)); // generate unique token
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password
        $state =$_POST['state'];
        $country = $_POST['country'] ; 
        $address = $_POST['address'] ;
        $postal_code = $_POST['postal_code'] ;  
        $phone = $_POST['phone'] ; 
        $position =$_POST['position'];
        $role = $_POST['role'];
        $verified = 1;  
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
    
		        $_SESSION['message'] = "Admin user created successfully";
                $_SESSION['type'] = 'alert-success';
                header($headerlocation .$actual_admin_users_link);
                exit(0);
               
            } else {
                $_SESSION['error_msg'] = "Database error: Could not register user";
                exit(0);
            }
        }

}
/* * * * * * * * * * * * * * * * * * * * *
* - Takes admin id as parameter
* - Fetches the admin from database
* - sets admin fields on form for editing
* * * * * * * * * * * * * * * * * * * * * */
function editAdmin($user_id)
{
	global $dbco, $username, $role, $isEditingUser, $user_id, $email;

	$sql = "SELECT * FROM user_table WHERE id=$user_id LIMIT 1";
	$result = mysqli_query($dbco, $sql);
	$user = mysqli_fetch_assoc($result);

	// set form values ($username and $email) on the form to be updated
	$username = $user['username'];
	$email = $user['email'];
}
function verifyUser($request_values){
	global $headerlocation, $actual_admin_users_link, $dbco, $verified;
	// get id of the admin to be updated
    $user_id = $request_values['admin_id'];
    $verified = 1;
	$query = "UPDATE user_table SET verified='$verified' WHERE id=$user_id";
	
    if (mysqli_query($dbco, $sql)) {

		$_SESSION['message'] = "User updated successfully";
		$_SESSION['type'] = 'alert-success';
        header($headerlocation .$actual_admin_users_link);
		exit(0);
	}
}
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
* - Receives admin request from form and updates in database
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function updateAdmin($request_values){
	global $headerlocation, $actual_admin_users_link, $dbco, $errors, $role, $username, $isEditingUser, $user_id, $email;
	// get id of the admin to be updated
	$user_id = $request_values['admin_id'];
	// set edit state to false
	$isEditingUser = false;

	$username = esc($request_values['username']);
	$email = esc($request_values['email']);
	$password = esc($request_values['password']);
	$passwordConfirmation = esc($request_values['passwordConfirmation']);
	if(isset($request_values['role'])){
		$role = $request_values['role'];
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		//encrypt the password (security purposes)
		$password = md5($password);

		$query = "UPDATE user_table SET username='$username', email='$email', role='$role', password='$password' WHERE id=$user_id";
		mysqli_query($dbco, $query);

		$_SESSION['message'] = "Admin user updated successfully";
		$_SESSION['type'] = 'alert-success';
        header($headerlocation .$actual_admin_users_link);
		exit(0);
	}
}
// delete admin user 
function deleteAdmin($user_id) {
	global $headerlocation, $actual_admin_users_link, $dbco;
	$sql = "DELETE FROM user_table WHERE id=$user_id";
	if (mysqli_query($dbco, $sql)) {
		$_SESSION['message'] = "User successfully deleted";
		$_SESSION['type'] = 'alert-success';
        header($headerlocation .$actual_admin_users_link);
		exit(0);
	}
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
* - Returns all admin users and their corresponding roles
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function getUsers(){
	global $dbco, $roles;
	$sql = "SELECT * FROM user_table WHERE role=1 OR role=0";
	$result = mysqli_query($dbco, $sql);
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $users;
}
function getAdminUsers(){
	global $dbco, $roles;
	$sql = "SELECT * FROM user_table WHERE role=1";
	$result = mysqli_query($dbco, $sql);
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $users;
}
/* * * * * * * * * * * * * * * * * * * * *
* - Escapes form submitted value, hence, preventing SQL injection
* * * * * * * * * * * * * * * * * * * * * */
function esc(String $value){
	// bring the global db connect object into function
	global $dbco;
	// remove empty space sorrounding string
	$val = trim($value); 
	$val = mysqli_real_escape_string($dbco, $value);
	return $val;
}
// Receives a string like 'Some Sample String'
// and returns 'some-sample-string'
function makeSlug(String $string){
	$string = strtolower($string);
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}

// Admin user variables
// ... varaibles here ...

// Topics variables
$topic_id = 0;
$isEditingTopic = false;
$topic_name = "";

/* - - - - - - - - - - 
-  Admin users actions
- - - - - - - - - - -*/
// ... 

/* - - - - - - - - - - 
-  Topic actions
- - - - - - - - - - -*/
// if user clicks the create topic button
if (isset($_POST['create_topic'])) { createTopic($_POST); }
// if user clicks the Edit topic button
if (isset($_GET['edit-topic'])) {
	$isEditingTopic = true;
	$topic_id = $_GET['edit-topic'];
	editTopic($topic_id);
}
// if user clicks the update topic button
if (isset($_POST['update_topic'])) {
	updateTopic($_POST);
}
// if user clicks the Delete topic button
if (isset($_GET['delete-topic'])) {
	$topic_id = $_GET['delete-topic'];
	deleteTopic($topic_id);
}


/* - - - - - - - - - - - -
-  Admin users functions
- - - - - - - - - - - - -*/
// ...

/* - - - - - - - - - - 
-  Topics functions
- - - - - - - - - - -*/
// get all topics from DB
function getAllTopics()
{
	global $dbco;
	$sql = "SELECT * FROM topics_table";
	$result = mysqli_query($dbco, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}
function createTopic($request_values){
	global $headerlocation, $actual_topics_link, $dbco, $errors, $topic_name;
	$topic_name = esc($request_values['topic_name']);
	// create slug: if topic is "Life Advice", return "life-advice" as slug
	$topic_slug = makeSlug($topic_name);
	// validate form
	if (empty($topic_name)) { 
		array_push($errors, "Topic name required"); 
	}
	// Ensure that no topic is saved twice. 
	$topic_check_query = "SELECT * FROM topics_table WHERE slug='$topic_slug' LIMIT 1";
	$result = mysqli_query($dbco, $topic_check_query);
	if (mysqli_num_rows($result) > 0) { // if topic exists
		array_push($errors, "Topic already exists");
	}
	// register topic if there are no errors in the form
	if (count($errors) == 0) {
		$query = "INSERT INTO topics_table (name, slug) VALUES ('$topic_name', '$topic_slug')";
		mysqli_query($dbco, $query);

		$_SESSION['message'] = "Topic created successfully";
		$_SESSION['type'] = 'alert-success';
        header($headerlocation .$actual_topics_link);
		exit(0);
	}
}
/* * * * * * * * * * * * * * * * * * * * *
* - Takes topic id as parameter
* - Fetches the topic from database
* - sets topic fields on form for editing
* * * * * * * * * * * * * * * * * * * * * */
function editTopic($topic_id) {
	global $dbco, $topic_name, $isEditingTopic, $topic_id;
	$sql = "SELECT * FROM topics_table WHERE id=$topic_id LIMIT 1";
	$result = mysqli_query($dbco, $sql);
	$topic = mysqli_fetch_assoc($result);
	// set form values ($topic_name) on the form to be updated
	$topic_name = $topic['name'];
}
function updateTopic($request_values) {
	global $headerlocation, $actual_topics_link, $dbco, $errors, $topic_name, $topic_id;
	$topic_name = esc($request_values['topic_name']);
	$topic_id = esc($request_values['topic_id']);
	// create slug: if topic is "Life Advice", return "life-advice" as slug
	$topic_slug = makeSlug($topic_name);
	// validate form
	if (empty($topic_name)) { 
		array_push($errors, "Topic name required"); 
	}
	// register topic if there are no errors in the form
	if (count($errors) == 0) {
		$query = "UPDATE topics_table SET name='$topic_name', slug='$topic_slug' WHERE id=$topic_id";
		mysqli_query($dbco, $query);

		$_SESSION['message'] = "Topic updated successfully";
		$_SESSION['type'] = 'alert-success';
        header($headerlocation .$actual_topics_link);
		exit(0);
	}
}
// delete topic 
function deleteTopic($topic_id) {
	global $headerlocation, $actual_topics_link, $dbco;
	$sql = "DELETE FROM topics_table WHERE id=$topic_id";
	if (mysqli_query($dbco, $sql)) {
		$_SESSION['message'] = "Topic successfully deleted";
		$_SESSION['type'] = 'alert-success';
        header($headerlocation .$actual_topics_link);
		exit(0);
	}
}


// Post variables
$post_id = 0;
$isEditingPost = false;
$published = 0;
$title = "";
$post_slug = "";
$body = "";
$featured_image = "";
$post_topic = "";

/* - - - - - - - - - - 
-  Post functions
- - - - - - - - - - -*/
// get all posts from DB
function getAllPosts()
{
	global $dbco;
	
	// Admin can view all posts
	// Author can only view their posts
	if ($_SESSION['user']['role'] == 1) {
		$sql = "SELECT * FROM posts_table";
	} elseif ($_SESSION['user']['role'] == 0) {
		$user_id = $_SESSION['user'];
		$sql = "SELECT * FROM posts_table WHERE user_id=$user_id";
	}
	$result = mysqli_query($dbco, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}
// get the author/username of a post
function getPostAuthorById($user_id)
{
	global $dbco;
	$sql = "SELECT username FROM user_table WHERE id=$user_id";
	$result = mysqli_query($dbco, $sql);
	if ($result) {
		// return username
		return mysqli_fetch_assoc($result)['username'];
	} else {
		return null;
	}
}


/* - - - - - - - - - - 
-  Post actions
- - - - - - - - - - -*/
// if user clicks the create post button
if (isset($_POST['create_post'])) { createPost($_POST); }
// if user clicks the Edit post button
if (isset($_GET['edit-post'])) {
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
}
// if user clicks the update post button
if (isset($_POST['update_post'])) {
	updatePost($_POST);
}
// if user clicks the Delete post button
if (isset($_GET['delete-post'])) {
	$post_id = $_GET['delete-post'];
	deletePost($post_id);
}

/* - - - - - - - - - - 
-  Post functions
- - - - - - - - - - -*/
function createPost($request_values)
	{
		global $headerlocation, $actual_posts_link, $dbco, $errors, $title, $featured_image, $topic_id, $body, $published;
		$title = esc($request_values['title']);
		$body = htmlentities(esc($request_values['body']));
		if (isset($request_values['topic_id'])) {
			$topic_id = esc($request_values['topic_id']);
		}
		if (isset($request_values['publish'])) {
			$published = esc($request_values['publish']);
		}
		// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
		$post_slug = makeSlug($title);
		// validate form
		if (empty($title)) { array_push($errors, "Post title is required"); }
		if (empty($body)) { array_push($errors, "Post body is required"); }
		if (empty($topic_id)) { array_push($errors, "Post topic is required"); }
		// Get image name
	  	$featured_image = $_FILES['featured_image']['name'];
	  	if (empty($featured_image)) { array_push($errors, "Featured image is required"); }
	  	// image file directory
	  	$target = ROOT_PATH."/assets/img/" . basename($featured_image);
	  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
	  		array_push($errors, "Failed to upload image. Please check file settings for your server");
	  	}
		// Ensure that no post is saved twice. 
		$post_check_query = "SELECT * FROM posts_table WHERE slug='$post_slug' LIMIT 1";
		$result = mysqli_query($dbco, $post_check_query);

		if (mysqli_num_rows($result) > 0) { // if post exists
			array_push($errors, "A post already exists with that title.");
		}
		// create post if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO posts_table (user_id, title, slug, image, body, published, created_date, updated_date) VALUES(1, '$title', '$post_slug', '$featured_image', '$body', $published, now(), now())";
			if(mysqli_query($dbco, $query)){ // if post created successfully
				$inserted_post_id = mysqli_insert_id($dbco);
				// create relationship between post and topic
				$sql = "INSERT INTO post_topic_table (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";
				mysqli_query($dbco, $sql);

				$_SESSION['message'] = "Post created successfully";
				$_SESSION['type'] = 'alert-success';
                header($headerlocation .$actual_posts_link);
				exit(0);
			}
		}
	}

	/* * * * * * * * * * * * * * * * * * * * *
	* - Takes post id as parameter
	* - Fetches the post from database
	* - sets post fields on form for editing
	* * * * * * * * * * * * * * * * * * * * * */
	function editPost($role_id)
	{
		global $dbco, $title, $post_slug, $body, $published, $isEditingPost, $post_id;
		$sql = "SELECT * FROM posts_table WHERE id=$role_id LIMIT 1";
		$result = mysqli_query($dbco, $sql);
		$post = mysqli_fetch_assoc($result);
		// set form values on the form to be updated
		$title = $post['title'];
		$body = $post['body'];
		$published = $post['published'];
	}

	function updatePost($request_values)
	{
		global $headerlocation, $actual_posts_link, $dbco, $errors, $post_id, $title, $featured_image, $topic_id, $body, $published;

		$title = esc($request_values['title']);
		$body = esc($request_values['body']);
		$post_id = esc($request_values['post_id']);
		if (isset($request_values['topic_id'])) {
			$topic_id = esc($request_values['topic_id']);
		}
		// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
		$post_slug = makeSlug($title);

		if (empty($title)) { array_push($errors, "Post title is required"); }
		if (empty($body)) { array_push($errors, "Post body is required"); }
		// if new featured image has been provided
		if (isset($_POST['featured_image'])) {
			// Get image name
		  	$featured_image = $_FILES['featured_image']['name'];
		  	// image file directory
		  	$target = ROOT_PATH."/assets/img/" . basename($featured_image);
		  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
		  		array_push($errors, "Failed to upload image. Please check file settings for your server");
		  	}
		}

		// register topic if there are no errors in the form
		if (count($errors) == 0) {
			$query = "UPDATE posts_table SET title='$title', slug='$post_slug', views=0, image='$featured_image', body='$body', published=$published, updated_date=now() WHERE id=$post_id";
			// attach topic to post on post_topic table
			if(mysqli_query($dbco, $query)){ // if post created successfully
				if (isset($topic_id)) {
					$inserted_post_id = mysqli_insert_id($dbco);
					// create relationship between post and topic
					$sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";
					mysqli_query($dbco, $sql);
					$_SESSION['message'] = "Post created successfully";
					$_SESSION['type'] = 'alert-success';
                    header($headerlocation .$actual_posts_link);
					exit(0);
				}
			}
			$_SESSION['message'] = "Post updated successfully";
			$_SESSION['type'] = 'alert-success';
            header($headerlocation .$actual_posts_link);
			exit(0);
		}
	}
	// delete blog post
	function deletePost($post_id)
	{
		global $headerlocation, $actual_posts_link, $dbco;
		$sql = "DELETE FROM posts_table WHERE id=$post_id";
		if (mysqli_query($dbco, $sql)) {
			$_SESSION['message'] = "Post successfully deleted";
			$_SESSION['type'] = 'alert-success';
            header($headerlocation .$actual_posts_link);
			exit(0);
		}
    }
    // if user clicks the publish post button
if (isset($_GET['publish']) || isset($_GET['unpublish'])) {
	$message = "";
	if (isset($_GET['publish'])) {
		$message = "Post published successfully";
		$post_id = $_GET['publish'];
	} else if (isset($_GET['unpublish'])) {
		$message = "Post successfully unpublished";
		$post_id = $_GET['unpublish'];
	}
	togglePublishPost($post_id, $message);
}
// delete blog post
function togglePublishPost($post_id, $message)
{
	global $headerlocation, $actual_posts_link, $dbco;
	$sql = "UPDATE posts_table SET published=!published WHERE id=$post_id";
	
	if (mysqli_query($dbco, $sql)) {
		$_SESSION['message'] = $message;
		$_SESSION['type'] = 'alert-success';
        header($headerlocation .$actual_posts_link);
		exit(0);
	}
}
// if user clicks the publish post button
if (isset($_GET['verified']) || isset($_GET['unverified'])) {
	$message = "";
	if (isset($_GET['verified'])) {
		$message = "User verified successfully";
		$post_id = $_GET['publish'];
	} else if (isset($_GET['unverified'])) {
		$message = "User successfully unverified";
		$post_id = $_GET['unverified'];
	}
	togglePublishPost($post_id, $message);}

function toggleVerifyUser($user_id, $message)
{
	global $headerlocation, $actual_admin_users_link, $dbco;
	$sql = "UPDATE user_table SET verified=!verified WHERE id=$user_id";
	
	if (mysqli_query($dbco, $sql)) {
		$_SESSION['message'] = $message;
		$_SESSION['type'] = 'alert-success';
        header($headerlocation .$actual_admin_users_link);
		exit(0);
	}
}
?>