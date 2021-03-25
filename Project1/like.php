
<?php include 'server.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		  <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

</script>
		<title></title>
	</head>
	<body>

<?php foreach ($posts as $post): ?>
<center>
	<div class="tr">

	<?php echo $post['text']; ?></br>
<i
<?php if(userLiked($post['post_id'])): ?>
	 class="fa fa-thumbs-up like-btn"
<?php else: ?>
	 class="fa fa-thumbs-o-up like-btn"
<?php endif ?>

	data-id="<?php echo $post['post_id']; ?>"></i>
	<span class="likes"> <?php echo getLikes($post['post_id']) ?></span>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<i
		<?php if (userDisliked($post['post_id'])): ?>
		 class="fa fa-thumbs-down dislike-btn"
		<?php else: ?>
		 class="fa fa-thumbs-o-down dislike-btn"
		<?php endif ?>

	 data-id="<?php echo $post['post_id']; ?>"></i>
<span class="dislikes"> <?php echo getDislikes($post['post_id']) ?></span>
	</div>
<?php endforeach; ?>


<script src="inc/script.js" ></script>

	</body>
</html>
