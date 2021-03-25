<?php
include 'connection.php';
if (isset($_POST['action'])) {
$post_id = $_POST['post_id'];
$action = $_POST['action'];
$username = $_SESSION['uname'];
$user = "select * from users where username = '$username'";
$run_user = mysqli_query($conn,$user);
$row = mysqli_fetch_array($run_user);
$user_id=$row['user_id'];
switch ($action) {
			case 'like':
				$sql = "INSERT INTO post_votes (user_id, post_id, vote)
					 		VALUES ('$user_id', '$post_id', 'like')
					 		ON DUPLICATE KEY UPDATE vote='like'";
				break;
			case 'dislike':
				$sql  = "INSERT INTO post_votes (user_id, post_id, vote)
					 		VALUES ('$user_id','$post_id', 'dislike')
					 		ON DUPLICATE KEY UPDATE vote='dislike'";
				break;
			case 'unlike':
				$sql = "DELETE FROM post_votes
							WHERE user_id='$user_id'
							AND post_id='$post_id'";
				break;
			case 'undislike':
				$sql = "DELETE FROM post_votes
							WHERE user_id='$user_id'
							AND post_id='$post_id'";
				break;
			default:
				break;
		}
mysqli_query($conn,$sql);
echo getRatings($post_id);
exit(0);
}



  function getRatings($post_id)
  {
    global $conn;
    $rating = array();
    $likes_query = "select COUNT(*) from post_votes where post_id = '$post_id' AND vote='like'";
    $dislikes_query = "select COUNT(*) from post_votes where post_id = '$post_id' AND vote='dislike'";

    $like_rs = mysqli_query($conn,$likes_query);
    $dislikes_rs = mysqli_query($conn,$dislikes_query);

    $likes = mysqli_fetch_array($like_rs);
    $dislikes = mysqli_fetch_array($dislikes_rs);

    $rating = [
      'likes'=>$likes[0],
      'dislikes'=>$dislikes[0]
    ];
    return json_encode($rating);
  }


  function getLikes($post_id){
global $conn;
$sql = "select COUNT(*) from post_votes where post_id = '$post_id' AND vote = 'like'";
$rs = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($rs);
return $result[0];

  }



    function getDislikes($post_id){
  global $conn;
  $sql = "select COUNT(*) from post_votes where post_id = '$post_id' AND vote = 'dislike'";
  $rs = mysqli_query($conn,$sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];

    }

    function userLiked($post_id){
      global $conn;
      global $user_id;

      $sql = "select * from post_votes where user_id ='$user_id' AND vote = 'like'";

      $result = mysqli_query($conn,$sql);

      if (mysqli_num_rows($result)>0) {
        return true;
      }else{
        return false;
      }
    }

    function userDisliked($post_id){
      global $conn;
      global $user_id;
      $sql = "select * from post_votes where user_id ='$user_id' AND vote = 'dislike'";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result)>0) {
        return true;
      }else{
        return false;
      }
    }
?>
