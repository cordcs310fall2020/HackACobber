<?php 
function getPublishedPosts() {
	global $dbco;
	$sql = "SELECT * FROM posts_table WHERE published=true";
	$result = mysqli_query($dbco, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}
function getAllPosts() {
	global $dbco;
	$sql = "SELECT * FROM posts_table";
	$result = mysqli_query($dbco, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}
function getPostTopic($post_id){
	global $dbco;
	$sql = "SELECT * FROM topics_table WHERE id= (SELECT topic_id FROM post_topic_table WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($dbco, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}

function getPublishedPostsByTopic($topic_id) {
	global $dbco;
	$sql = "SELECT * FROM posts_table ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic_table pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
				HAVING COUNT(1) = 1)";
	$result = mysqli_query($dbco, $sql);
	
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getTopicNameById($id)
{
	global $dbco;
	$sql = "SELECT name FROM topics_table WHERE id=$id";
	$result = mysqli_query($dbco, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}

function getPost($slug){
	global $dbco;
	
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts_table WHERE slug='$post_slug' AND published=true";
	$result = mysqli_query($dbco, $sql);
	
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
}

function getAllTopics()
{
	global $dbco;
	$sql = "SELECT * FROM topics_table";
	$result = mysqli_query($dbco, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}
function getKeywords($sk){
	global $dbco;
	$sql = isset($_GET['k']) ? $_GET['k'] : '';
 	$search_string = "SELECT * FROM posts_table WHERE ";
	$display_words = "";
 	$keywords = explode(' ', $sql);			
	foreach ($keywords as $word){
		$search_string .= "slug LIKE '%".$word."%' OR ";
		$display_words .= $word.' ';
	}
	$search_string = substr($search_string, 0, strlen($search_string)-4);
	$display_words = substr($display_words, 0, strlen($display_words)-1);
	
	$result = mysqli_query($dbco, $search_string);
	$result_count = mysqli_num_rows($result);
	return $display_words;
}

?>